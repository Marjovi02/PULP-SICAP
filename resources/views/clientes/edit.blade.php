@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Título --}}
    <h1 class="fw-bold mb-4 text-danger">Editar cliente</h1>

    {{-- Mensajes --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    {{-- FORMULARIO --}}
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="card shadow-sm p-4 border-0">
        @csrf
        @method('PUT')

        {{-- RAZÓN SOCIAL --}}
        <div class="mb-3">
            <label class="form-label">Razón social (opcional)</label>
            <input type="text" name="nombre_empresa" class="form-control"
                   value="{{ old('nombre_empresa', $cliente->nombre_empresa) }}">
        </div>

        {{-- NOMBRE DEL NEGOCIO --}}
        <div class="mb-3">
            <label class="form-label">Nombre del negocio *</label>
            <input type="text" name="nombre_negocio" class="form-control"
                   value="{{ old('nombre_negocio', $cliente->nombre_negocio) }}" required>
        </div>

        {{-- DIRECCIÓN --}}
        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control"
                   value="{{ old('direccion', $cliente->direccion) }}">
        </div>

        {{-- REDES SOCIALES --}}
        <div class="mb-3">
            <label class="form-label">Redes sociales</label>
            <input type="text" name="redes_sociales" class="form-control"
                   value="{{ old('redes_sociales', $cliente->redes_sociales) }}">
        </div>

        {{-- TELÉFONO --}}
        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control"
                   value="{{ old('telefono', $cliente->telefono) }}">
        </div>

        {{-- CORREO --}}
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="correo" class="form-control"
                   value="{{ old('correo', $cliente->correo) }}">
        </div>

        {{-- GIRO COMERCIAL --}}
        <div class="mb-3">
            <label class="form-label">Giro comercial</label>
            <input type="text" name="giro_comercial" class="form-control"
                   value="{{ old('giro_comercial', $cliente->giro_comercial) }}">
        </div>

        {{-- TIPO DE VENTA --}}
        <div class="mb-3">
            <label class="form-label">Tipo de venta solicitada</label>
            <select name="tipo_venta" class="form-select">
                <option value="">Seleccionar</option>
                <option value="servicio" {{ $cliente->tipo_venta == 'servicio' ? 'selected' : '' }}>Servicio</option>
                <option value="producto" {{ $cliente->tipo_venta == 'producto' ? 'selected' : '' }}>Producto</option>
                <option value="ambos" {{ $cliente->tipo_venta == 'ambos' ? 'selected' : '' }}>Ambos</option>
            </select>
        </div>

        {{-- HISTORIAL --}}
        <div class="mb-3">
            <label class="form-label">Historial</label>
            <textarea name="historial" class="form-control" rows="3">{{ old('historial', $cliente->historial) }}</textarea>
        </div>

        {{-- BOTONES --}}
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-danger">Guardar cambios</button>

            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
@endsection
