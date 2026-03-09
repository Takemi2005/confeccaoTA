<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nossa Confecção</h2>

        <a href="{{ route('clientes.create') }}" class="px-2 py-1 bg-gray-200 text-gray-700 text-sm rounded-md hover:bg-gray-300 transition">
        Novo Cliente
        </a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($clientes as $cliente)
                        <div class="border p-4 rounded shadow-sm">
                            <h3 class="font-bold text-lg">{{ $cliente->nome }}</h3>
                            <p class="text-sm text-gray-600">Autor: {{ $cliente->cpf }}</p>
                            <p class="mt-2 text-blue-600 font-bold">R$ {{ $cliente->telefone }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>