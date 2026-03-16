<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar Fornecedor</h2>
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

                <form action="{{ route('fornecedores.update', $fornecedore->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Nome <span class="text-red-500">*</span></label>
                        <input type="text" name="nome" value="{{ old('nome', $fornecedore->nome) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">CNPJ <span class="text-red-500">*</span></label>
                        <input type="text" name="cnpj" value="{{ old('cnpj', $fornecedore->cnpj) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email', $fornecedore->email) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Telefone</label>
                        <input type="text" name="telefone" value="{{ old('telefone', $fornecedore->telefone) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" name="endereco" value="{{ old('endereco', $fornecedore->endereco) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Cidade</label>
                            <input type="text" name="cidade" value="{{ old('cidade', $fornecedore->cidade) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Estado (UF)</label>
                            <input type="text" name="estado" value="{{ old('estado', $fornecedore->estado) }}" maxlength="2"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">CEP</label>
                        <input type="text" name="cep" value="{{ old('cep', $fornecedore->cep) }}" maxlength="9"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Observações</label>
                        <textarea name="observacoes" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('observacoes', $fornecedore->observacoes) }}</textarea>
                    </div>

                    <div class="flex items-center gap-4 mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            💾 Salvar
                        </button>
                        <a href="{{ route('fornecedores.index') }}"
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
                            Cancelar
                        </a>
                    </div>
                </form>

                <form action="{{ route('fornecedores.destroy', $fornecedore->id) }}" method="POST" class="mt-4"
                    onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                        🗑️ Excluir Fornecedor
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>