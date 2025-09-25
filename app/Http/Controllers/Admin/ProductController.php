<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if(Auth::user()->is_admin ?? false){
            $products = Product::with(['user', 'category'])->latest()->paginate(8);
        }
        else{
            $products = Product::with(['user', 'category'])
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(8);
        }
        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'sometimes|required|string|max:5000',
            'photo' => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ]);

        if($request->hasFile('photo')){
            $destination = storage_path('app/public/images');
            if(!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $file = $request->file('photo');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($destination, $filename);
            $validated['photo_path'] = $filename;
        }

        $validated['user_id'] = Auth::id();

        Product::create($validated);

        return redirect()->back()->with('success', 'Produto Criado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'sometimes|required|string|max:5000',
            'photo' => 'nullable|image|mimes:jpg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Garante que a pasta existe
            $destination = storage_path('app/public/images');
            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $file = $request->file('photo');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move($destination, $filename);
            $validated['photo_path'] = $filename;
        }

        $product->update($validated);

        return redirect()->back()->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }
}
