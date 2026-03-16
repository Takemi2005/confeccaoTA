<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Estoque</h2>
            <a href="{{ route('estoque.create') }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                + Novo Item
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
                            <th class="px-4 py-3">Quantidade</th>
                            <th class="px-4 py-3">Preço Unit.</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($estoques as $estoque)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $estoque->nome }}</td>
                                <td class="px-4 py-3">{{ $estoque->descricao ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $estoque->quantidade }}</td>
                                <td class="px-4 py-3">R$ {{ number_format($estoque->preco_unitario, 2, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('estoque.edit', $estoque->id) }}"
                                            class="px-3 py-1 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('estoque.destroy', $estoque->id) }}" method="POST"
                                            onsubmit="return confirm('Excluir este item?')">
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
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">Nenhum item no estoque.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>