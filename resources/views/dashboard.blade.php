@extends('layouts.app')

@section('content')
<div class="p-8">
    <h1 class="text-2xl font-bold mb-4">Bienvenido</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <a href="/negocios" class="p-6 bg-white border rounded shadow text-center">
            Negocios
        </a>

        <a href="/clientes" class="p-6 bg-white border rounded shadow text-center">
            Clientes
        </a>

        <a href="/clientes/crear" class="p-6 bg-white border rounded shadow text-center">
            Agregar Cliente
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="w-full p-6 bg-red-500 text-white rounded shadow">
                Cerrar Sesión
            </button>
        </form>

    </div>
</div>
@endsection