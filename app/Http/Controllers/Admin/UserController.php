<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->is_admin ?? false) {
            $users = User::paginate(8);
        } else {
            $users = User::where('id', $user->id)->paginate(1);
        }
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = Auth::user();
        if ($user->is_admin ?? false || $user->id == $id) {
            $userData = User::findOrFail($id);
            return view('admin.users.show', compact('userData'));
        }
        abort(403);
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        if (!($user->is_admin ?? false)) abort(403);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'cpf' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'phone' => 'nullable|string|max:20',
            'profile_photo_path' => 'nullable|file|image|max:2048',
            'cep' => 'nullable|string|max:20',
            'rua' => 'nullable|string|max:255',
            'numero' => 'nullable|string|max:20',
            'bairro' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:255',
            'estado' => 'nullable|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'is_admin' => 'nullable|boolean',
        ]);
        $data['password'] = bcrypt($data['password']);
        if ($request->hasFile('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $path = $file->store('users', 'public');
            $data['profile_photo_path'] = $path;
        } else {
            unset($data['profile_photo_path']);
        }
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        if ($user->is_admin ?? false || $user->id == $id) {
            $userData = User::findOrFail($id);
            return view('admin.users.edit', compact('userData'));
        }
        abort(403);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if ($user->is_admin || $user->id == $id) {
            $userData = User::findOrFail($id);
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'cpf' => 'nullable|string|max:20',
                'birth_date' => 'nullable|date',
                'phone' => 'nullable|string|max:20',
                'profile_photo_path' => 'nullable|file|image|max:2048',
                'cep' => 'nullable|string|max:20',
                'rua' => 'nullable|string|max:255',
                'numero' => 'nullable|string|max:20',
                'bairro' => 'nullable|string|max:255',
                'cidade' => 'nullable|string|max:255',
                'estado' => 'nullable|string|max:255',
                'complemento' => 'nullable|string|max:255',
                'is_admin' => 'nullable|boolean',
            ]);
            if ($request->hasFile('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                $path = $file->store('users', 'public');
                $data['profile_photo_path'] = $path;
            } else {
                unset($data['profile_photo_path']);
            }
            $userData->update($data);
            return redirect()->route('admin.users.index')->with('success', 'Usuário atualizado!');
        }
        abort(403);
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if (!($user->is_admin ?? false)) abort(403);
        $userData = User::findOrFail($id);
        $userData->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuário excluído!');
    }
}
