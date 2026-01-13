@extends('layouts.app')

@section('title', 'Detalles del cliente')

@section('content')

<style>
    :root {
        --rojo: #b71c1c;
        --rojo-hover: #d32f2f;
        --rojo-suave: #fff2f2;
    }

    .badge-rojo {
        background-color: var(--rojo);
        color: white;
        font-weight: 500;
    }

    .btn-rojo {
        background-color: var(--rojo);
        color: white;
        border: none;
    }

    .btn-rojo:hover {
        background-color: var(--rojo-hover);
        color: white;
    }

    .btn-outline-danger {
        border-color: #b71c1c;
        color: #b71c1c;
    }

    .btn-outline-danger:hover {
        background: #b71c1c;
        color: white;
    }

    .timeline-item {
        border-left: 3px solid var(--rojo);
        padding-left: 15px;
        margin-bottom: 20px;
        position: relative;
    }

    .timeline-item::before {
        content: "";
        position: absolute;
        left: -7px;
        top: 6px;
        width: 12px;
        height: 12px;
        background-color: var(--rojo);
        border-radius: 50%;
    }

    .dato-label {
        font-size: 0.9rem;
        color: #6c757d;
        text-transform: uppercase;
        font-weight: 600;
    }

    .dato-valor {
        font-size: 1.1rem;
        font-weight: 500;
    }
</style>




<div class="container py-4">


    {{-- ENCABEZADO --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold" style="color: var(--rojo);">Detalles del cliente</h1>

        <div class="d-flex gap-2">

            {{-- Editar --}}
            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-outline-rojo btn-sm">
                ✏️ Editar
            </a>

            {{-- Eliminar --}}
            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                  onsubmit="return confirm('¿Seguro que deseas eliminar este cliente?')" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger btn-sm">
                    🗑️ Eliminar
                </button>
            </form>

            {{-- Volver --}}
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary btn-sm">
                ← Volver
            </a>

        </div>
    </div>



    {{-- Datos principales --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body p-4">

            @foreach([
                'Nombre del negocio' => $cliente->nombre_negocio,
                'Razón social' => $cliente->nombre_empresa,
                'Dirección' => $cliente->direccion,
                'Redes sociales' => $cliente->redes_sociales,
                'Teléfono' => $cliente->telefono,
                'Correo' => $cliente->correo,
                'Giro comercial' => $cliente->giro_comercial,
                'Tipo de venta solicitada' => $cliente->tipo_venta,
                'Historial' => $cliente->historial,
            ] as $label => $valor)

                <div class="mb-4">
                    <div class="dato-label">{{ $label }}</div>
                    <div class="dato-valor">{{ $valor ?? '—' }}</div>
                </div>

            @endforeach

        </div>
    </div>



    {{-- NOTAS --}}
    <h3 class="fw-bold mb-3" style="color: var(--rojo);">Notas</h3>

    {{-- Formulario --}}
    <form action="{{ route('clientes.nota.store', $cliente) }}" method="POST" class="mb-4">
        @csrf
        <textarea name="nota" class="form-control mb-2" rows="2" placeholder="Agregar nota..." required></textarea>
        <button class="btn btn-rojo btn-sm">Guardar nota</button>
    </form>



    {{-- Timeline --}}
    @forelse($cliente->notas as $nota)

        <div class="timeline-item">

            {{-- Texto --}}
            <div class="fw-semibold">
                {{ $nota->nota }}
            </div>

            {{-- Fecha --}}
            <div class="text-muted small mb-2">
                {{ $nota->created_at->timezone('America/Mexico_City')->format('d M Y - h:i A') }}
            </div>

            {{-- Botón eliminar --}}
            <form action="{{ route('clientes.notas.destroy', [$cliente, $nota]) }}"
                  method="POST"
                  onsubmit="return confirm('¿Eliminar esta nota?');">

                @csrf
                @method('DELETE')

                <button class="btn btn-sm btn-outline-danger" title="Eliminar nota">
                    🗑
                </button>

            </form>

        </div>

    @empty

        <p class="text-muted fst-italic">Sin notas registradas.</p>

    @endforelse


</div> {{-- Cierra container --}}

@endsection



