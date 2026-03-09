<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Estoque</h2>
            <a href="{{ route('estoque.create') }}"
               class="px-4 py-2 bg-green-500 text-white text-xs font-semibold uppercase rounded-md hover:bg-green-600 transition">
                + Novo Item
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
                            <th class="pb-3 pr-6">Descrição</th>
                            <th class="pb-3 pr-6">Quantidade</th>
                            <th class="pb-3 pr-6">Preço Unit.</th>
                            <th class="pb-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($estoques as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 pr-6 font-medium">{{ $item->nome }}</td>
                                <td class="py-3 pr-6 text-gray-500">{{ $item->descricao ?? '—' }}</td>
                                <td class="py-3 pr-6">{{ $item->quantidade }}</td>
                                <td class="py-3 pr-6">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                                <td class="py-3 flex gap-2">
                                    <a href="{{ route('estoque.edit', $item) }}"
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs">
                                        Editar
                                    </a>
                                    <form action="{{ route('estoque.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Remover item?')">
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
                                <td colspan="5" class="py-6 text-center text-gray-400">Nenhum item no estoque</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>