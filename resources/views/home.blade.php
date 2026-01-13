@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido, {{ Auth::user()->name }}</h1>

    <div style="display:flex; gap:20px; margin-top:20px;">
        <a href="{{ url('/negocios') }}">Negocios</a>
        <a href="{{ url('/clientes') }}">Clientes</a>
        <a href="{{ url('/clientes/create') }}">Agregar Cliente</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>
</div>
@endsection