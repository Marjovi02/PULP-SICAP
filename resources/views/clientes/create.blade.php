@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h1 class="h3 mb-4">Agregar Cliente</h1>

    <form action="{{ route('clientes.store') }}" method="POST" class="card shadow-sm p-4 border-0">
        @csrf

        <!-- RAZÓN SOCIAL -->
        <div class="mb-3">
            <label class="form-label">Razón social (opcional)</label>
            <input type="text" name="nombre_empresa" class="form-control" value="{{ old('nombre_empresa') }}">
        </div>

        <!-- NOMBRE DEL NEGOCIO -->
        <div class="mb-3">
            <label class="form-label">Nombre del negocio</label>
            <input type="text" name="nombre_negocio" class="form-control" value="{{ old('nombre_negocio') }}" required>
        </div>

        <!-- DIRECCIÓN -->
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
        </div>

        <!-- REDES SOCIALES -->
        <div class="mb-3">
            <label class="form-label">Redes sociales</label>
            <input type="text" name="redes_sociales" class="form-control" value="{{ old('redes_sociales') }}">
        </div>

        <!-- TELÉFONO -->
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
        </div>

        <!-- CORREO -->
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">
        </div>

        <!-- GIRO COMERCIAL -->
        <div class="mb-3">
            <label class="form-label">Giro comercial</label>
            <input type="text" name="giro_comercial" class="form-control" value="{{ old('giro_comercial') }}">
        </div>

        <!-- TIPO DE VENTA SOLICITADA -->
        <div class="mb-3">
            <label class="form-label">Tipo de venta solicitada</label>
            <select name="tipo_venta" class="form-select">
                <option value="" selected disabled>Seleccionar</option>
                <option value="servicio">Servicio</option>
                <option value="producto">Producto</option>
                <option value="ambos">Ambos</option>
            </select>
        </div>

        <!-- HISTORIAL -->
        <div class="mb-3">
            <label class="form-label">Historial</label>
            <textarea name="historial" class="form-control" rows="3">{{ old('historial') }}</textarea>
        </div>

        <!-- BOTONES -->
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>

    </form>

</div>
@endsection


