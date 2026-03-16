<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fornecedores</h2>
            <a href="{{ route('fornecedores.create') }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                + Novo Fornecedor
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">Nome</th>
                            <th class="px-4 py-3">CNPJ</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Telefone</th>
                            <th class="px-4 py-3">Cidade/UF</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fornecedores as $fornecedor)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $fornecedor->nome }}</td>
                                <td class="px-4 py-3">{{ $fornecedor->cnpj }}</td>
                                <td class="px-4 py-3">{{ $fornecedor->email ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $fornecedor->telefone ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $fornecedor->cidade ?? '-' }}/{{ $fornecedor->estado ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('fornecedores.edit', $fornecedor->id) }}"
                                            class="px-3 py-1 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST"
                                            onsubmit="return confirm('Excluir este fornecedor?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700 transition">
                                                🗑️ Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">Nenhum fornecedor cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>