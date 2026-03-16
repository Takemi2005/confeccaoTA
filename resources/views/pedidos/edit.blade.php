<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Pedido</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Número do Pedido <span class="text-red-500">*</span></label>
                        <input type="text" name="numero_pedido" value="{{ old('numero_pedido', $pedido->numero_pedido) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Data do Pedido <span class="text-red-500">*</span></label>
                        <input type="date" name="data_pedido" value="{{ old('data_pedido', $pedido->data_pedido) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Valor Total (R$) <span class="text-red-500">*</span></label>
                        <input type="number" name="valor_total" value="{{ old('valor_total', $pedido->valor_total) }}" step="0.01" min="0"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                        <select name="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="pendente"  {{ old('status', $pedido->status) == 'pendente'  ? 'selected' : '' }}>Pendente</option>
                            <option value="aprovado"  {{ old('status', $pedido->status) == 'aprovado'  ? 'selected' : '' }}>Aprovado</option>
                            <option value="entregue"  {{ old('status', $pedido->status) == 'entregue'  ? 'selected' : '' }}>Entregue</option>
                            <option value="cancelado" {{ old('status', $pedido->status) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Observações</label>
                        <textarea name="observacoes" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observacoes', $pedido->observacoes) }}</textarea>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            💾 Salvar
                        </button>
                        <a href="{{ route('pedidos.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                            Cancelar
                        </a>
                    </div>
                </form>

                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" class="mt-4"
                    onsubmit="return confirm('Tem certeza que deseja excluir este pedido?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                        🗑️ Excluir Pedido
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>