<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pedidos</h2>
            <a href="{{ route('pedidos.create') }}"
                class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                + Novo Pedido
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
                            <th class="px-4 py-3">Nº Pedido</th>
                            <th class="px-4 py-3">Data</th>
                            <th class="px-4 py-3">Valor Total</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pedidos as $pedido)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3 font-medium">{{ $pedido->numero_pedido }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y') }}</td>
                                <td class="px-4 py-3">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                                <td class="px-4 py-3">
                                    @php
                                        $cores = [
                                            'pendente'   => 'bg-yellow-100 text-yellow-700',
                                            'aprovado'   => 'bg-green-100 text-green-700',
                                            'cancelado'  => 'bg-red-100 text-red-700',
                                            'entregue'   => 'bg-blue-100 text-blue-700',
                                        ];
                                        $cor = $cores[strtolower($pedido->status)] ?? 'bg-gray-100 text-gray-700';
                                    @endphp
                                    <span class="px-2 py-1 rounded text-xs font-semibold {{ $cor }}">
                                        {{ ucfirst($pedido->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('pedidos.edit', $pedido->id) }}"
                                            class="px-3 py-1 bg-yellow-400 text-white text-sm rounded hover:bg-yellow-500 transition">
                                            ✏️ Editar
                                        </a>
                                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST"
                                            onsubmit="return confirm('Excluir este pedido?')">
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
                                <td colspan="5" class="px-4 py-6 text-center text-gray-500">Nenhum pedido cadastrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>