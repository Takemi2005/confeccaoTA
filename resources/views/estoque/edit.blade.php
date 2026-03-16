<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Item do Estoque</h2>
            <a href="{{ route('estoque.index') }}"
                class="px-4 py-2 bg-gray-500 text-white text-sm rounded-md hover:bg-gray-600 transition">
                ← Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
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

                <form action="{{ route('estoque.update', $estoque->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                        <input type="text" name="nome" value="{{ old('nome', $estoque->nome) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                        <textarea name="descricao" rows="3"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300">{{ old('descricao', $estoque->descricao) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantidade</label>
                        <input type="number" name="quantidade" value="{{ old('quantidade', $estoque->quantidade) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            min="0" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preço Unitário (R$)</label>
                        <input type="number" name="preco_unitario" value="{{ old('preco_unitario', $estoque->preco_unitario) }}"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
                            step="0.01" min="0" required>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('estoque.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            💾 Salvar Alterações
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>