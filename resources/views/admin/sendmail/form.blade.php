@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('admin.sendmail.send') }}" class="bg-sky-800 p-12 rounded-lg">
    @csrf
    <div class="mb-4">
        <label for="user_id" class="block font-semibold mb-1 text-white dark:text-gray-200">Usuário</label>
        <select name="user_id" id="user_id" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white">
            <option value="">Selecione um usuário</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
            @endforeach
        </select>
    </div>
    <div class="mb-4">
        <label for="subject" class="block font-semibold mb-1 text-white dark:text-gray-200">Assunto</label>
        <input type="text" name="subject" id="subject" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
    </div>
    <div class="mb-6">
        <label for="content" class="block font-semibold mb-1 text-white dark:text-gray-200">Conteúdo</label>
        <textarea name="content" id="content" rows="6" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required></textarea>
    </div>
    <button type="submit" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Enviar</button>
</form>
