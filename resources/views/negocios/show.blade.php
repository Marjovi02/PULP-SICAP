<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Negocio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">{{ $negocio->nom_estab }}</h3>

                <p><strong>Dirección:</strong> {{ $negocio->direcc }}</p>
                <p><strong>Teléfono:</strong> {{ $negocio->telefono }}</p>
                <p><strong>Correo:</strong> {{ $negocio->correoelec }}</p>

                <div class="mt-4">
                    <a href="{{ route('negocios.index') }}" class="text-blue-600 hover:underline">
                        ← Volver a la lista
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>