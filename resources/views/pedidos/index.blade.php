<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pedidos</h2>
            <a href="{{ route('pedidos.create') }}"
               class="px-4 py-2 bg-green-500 text-white text-xs font-semibold uppercase rounded-md hover:bg-green-600 transition">
                + Novo Pedido
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
                            <th class="pb-3 pr-6">Nº Pedido</th>
                            <th class="pb-3 pr-6">Data</th>
                            <th class="pb-3 pr-6">Valor Total</th>
                            <th class="pb-3 pr-6">Status</th>
                            <th class="pb-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pedidos as $pedido)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-3 pr-6 font-medium">{{ $pedido->numero_pedido }}</td>
                                <td class="py-3 pr-6">{{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y') }}</td>
                                <td class="py-3 pr-6">R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</td>
                                <td class="py-3 pr-6">
                                    @php
                                        $cores = [
                                            'pendente'   => 'bg-yellow-100 text-yellow-700',
                                            'aprovado'   => 'bg-green-100 text-green-700',
                                            'cancelado'  => 'bg-red-100 text-red-700',
                                            'entregue'   => 'bg-blue-100 text-blue-700',
                                        ];
                                        $cor = $cores[$pedido->status] ?? 'bg-gray-100 text-gray-700';
                                    @endphp
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $cor }}">
                                        {{ ucfirst($pedido->status) }}
                                    </span>
                                </td>
                                <td class="py-3 flex gap-2">
                                    <a href="{{ route('pedidos.edit', $pedido) }}"
                                       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-xs">
                                        Editar
                                    </a>
                                    <form action="{{ route('pedidos.destroy', $pedido) }}" method="POST"
                                          onsubmit="return confirm('Remover pedido?')">
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
                                <td colspan="5" class="py-6 text-center text-gray-400">Nenhum pedido cadastrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>