<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Fornecedores</h2>
            <a href="{{ route('fornecedores.create') }}"
               class="px-4 py-2 bg-green-500 text-white text-xs font-semibold uppercase rounded-md hover:bg-green-600 transition">
                + Novo Fornecedor
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-sm text-left">
                    <thead class="border-b text-gray-500 uppercase text-xs">
                        <tr>
                            <th class="pb-3 pr-6">Nome</th>
                            <th class="pb-3 pr-6">CNPJ</th>
                            <th class="pb-3 pr-6">Email</th>
                            <th class="pb-3 pr-6">Telefone</th>
                            <th class="pb-3 pr-6">Cidade/UF</th>
                            <th class="pb-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($fornecedores as $fornecedor)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 pr-6 font-medium">{{ $fornecedor->nome }}</td>
                                <td class="py-3 pr-6">{{ $fornecedor->cnpj }}</td>
                                <td class="py-3 pr-6">{{ $fornecedor->email ?? '—' }}</td>
                                <td class="py-3 pr-6">{{ $fornecedor->telefone ?? '—' }}</td>
                                <td class="py-3 pr-6">{{ $fornecedor->cidade ?? '—' }}/{{ $fornecedor->estado ?? '—' }}</td>
                                <td class="py-3 flex gap-2">
                                    <a href="{{ route('fornecedores.edit', $fornecedor) }}"
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs">
                                        Editar
                                    </a>
                                    <form action="{{ route('fornecedores.destroy', $fornecedor) }}" method="POST"
                                          onsubmit="return confirm('Remover fornecedor?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-xs">
                                            Remover
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-6 text-center text-gray-400">Nenhum fornecedor cadastrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>