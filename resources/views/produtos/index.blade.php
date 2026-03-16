<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Produtos</h2>
            <a href="{{ route('produtos.create') }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                + Novo Produto
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
                            <th class="px-4 py-3">Descrição</th>
                            <th class="px-4 py-3">Preço</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produtos as $produto)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $produto->nome }}</td>
                                <td class="px-4 py-3">{{ $produto->descricao ?? '-' }}</td>
                                <td class="px-4 py-3">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('produtos.edit', $produto->id) }}"
                                            class="px-3 py-1 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                            onsubmit="return confirm('Excluir este produto?')">
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
                                <td colspan="4" class="px-4 py-6 text-center text-gray-500">Nenhum produto cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>