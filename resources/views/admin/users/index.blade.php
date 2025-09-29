@vite(['resources/js/admin-users-modals.js'])
<x-admin-layout>
    <div class="py-4 px-4 text-white flex justify-between items-center max-w-7xl bg-sky-800 border mx-auto mt-10 rounded-lg">
        <h1 class="text-4xl uppercase font-semibold">Usuários</h1>
        @if(auth()->user()->is_admin ?? false)
            <button type="button" data-modal="createModal" class="hover:cursor-pointer border-none bg-transparent p-0 m-0">
                <div class="flex gap-2 justify-center items-center transition duration-300 ease-in-out hover:scale-105 border border-white rounded-lg px-2 py-2">
                    <h1 class="hidden text-lg font-bold md:block">Criar</h1>
                    <h1 class="text-xl">+</h1>
                </div>
            </button>
        @endif
    </div>

    <div class="overflow-x-auto rounded-lg border-gray-500 border max-w-7xl mx-auto mt-6">
        <table class="w-full">
            <thead>
                <tr class="bg-sky-800 text-center font-semibold tracking-wide text-white uppercase border-b border-gray-500">
                    <th class="px-4 py-4">ID</th>
                    <th class="px-4 py-4">Nome</th>
                    <th class="px-4 py-4">Email</th>
                    @if(auth()->user()->is_admin ?? false)
                        <th class="px-4 py-4">Admin</th>
                    @endif
                    <th class="px-4 py-4">Criado em</th>
                    <th class="px-4 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-300 text-center">
                @foreach ($users as $user)
                    <tr class="text-gray-700 hover:bg-green-100">
                        <td class="px-4 py-4">{{ $user->id }}</td>
                        <td class="px-4 py-4">{{ $user->name }}</td>
                        <td class="px-4 py-4">{{ $user->email }}</td>
                        @if(auth()->user()->is_admin ?? false)
                            <td class="px-4 py-4">{{ $user->is_admin ? 'Sim' : 'Não' }}</td>
                        @endif
                        <td class="px-4 py-4">{{ $user->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-4 w-fit">
                            <div class="bg-green-200 inline-block rounded-lg">
                                <button type="button"
                                    class="m-1 text-green-700 hover:text-indigo-900 font-semibold py-1 px-1"
                                    data-modal="viewModal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}"
                                    data-cpf="{{ $user->cpf }}"
                                    data-birth_date="{{ $user->birth_date }}"
                                    data-phone="{{ $user->phone }}"
                                    data-is_admin="{{ $user->is_admin ? 'Sim' : 'Não' }}"
                                    data-rua="{{ $user->rua }}"
                                    data-numero="{{ $user->numero }}"
                                    data-bairro="{{ $user->bairro }}"
                                    data-cidade="{{ $user->cidade }}"
                                    data-estado="{{ $user->estado }}"
                                    data-cep="{{ $user->cep }}"
                                    data-complemento="{{ $user->complemento }}"
                                    data-created_at="{{ $user->created_at->format('d/m/Y H:i') }}"
                                >Ver</button>
                            </div>
                            @if(auth()->user()->id == $user->id || auth()->user()->is_admin ?? false)
                                <div class="bg-blue-200 inline-block rounded-lg">
                                    <button type="button"
                                        class="m-1 text-blue-700 hover:text-indigo-900 font-semibold py-1 px-1"
                                        data-modal="editModal"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                        data-email="{{ $user->email }}"
                                        data-cpf="{{ $user->cpf }}"
                                        data-birth_date="{{ $user->birth_date }}"
                                        data-phone="{{ $user->phone }}"
                                        data-is_admin="{{ $user->is_admin }}"
                                        data-rua="{{ $user->rua }}"
                                        data-numero="{{ $user->numero }}"
                                        data-bairro="{{ $user->bairro }}"
                                        data-cidade="{{ $user->cidade }}"
                                        data-estado="{{ $user->estado }}"
                                        data-cep="{{ $user->cep }}"
                                        data-complemento="{{ $user->complemento }}"
                                    >Editar</button>
                                </div>
                                <div class="bg-red-200 inline-block rounded-lg">
                                    <button type="button"
                                        class="m-1 text-red-600 hover:text-red-900 font-semibold py-1 px-1"
                                        data-modal="deleteModal"
                                        data-id="{{ $user->id }}"
                                        data-name="{{ $user->name }}"
                                    >Excluir</button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6 max-w-7xl mx-auto">
        {{ $users->links() }}
    </div>
        
    @include('admin.users.modals.create-modal')
    @include('admin.users.modals.delete-modal')
    @include('admin.users.modals.view-modal')
    @include('admin.users.modals.edit-modal')
</x-admin-layout>
