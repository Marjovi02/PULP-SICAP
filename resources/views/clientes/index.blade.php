@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- ESTILOS --}}
    <style>
        :root {
            --rojo: #b71c1c;
            --rojo-hover: #d32f2f;
        }

        .btn-rojo {
            background-color: var(--rojo);
            border: none;
            color: white;
            font-weight: 500;
        }

        .btn-rojo:hover {
            background-color: var(--rojo-hover);
            color: white;
        }

        .btn-outline-rojo {
            border-color: var(--rojo);
            color: var(--rojo);
        }

        .btn-outline-rojo:hover {
            background-color: var(--rojo);
            color: white;
        }

        th {
            background-color: var(--rojo) !important;
            color: white !important;
            font-weight: 600;
        }

        td {
            color: #212529;
        }
    </style>


    {{-- ENCABEZADO --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-rojo">Clientes</h1>

        <a href="{{ route('clientes.create') }}" class="btn btn-rojo">
            + Agregar cliente
        </a>
    </div>

<form action="{{ route('clientes.importar') }}" method="POST" enctype="multipart/form-data" class="mb-3 d-flex gap-2">
    @csrf
    <input type="file" name="archivo" class="form-control" accept=".xlsx,.xls" required>
    <button class="btn btn-rojo">📥 Importar</button>
</form>



    {{-- TABLA --}}
    <div class="table-responsive">
        <table class="table table-bordered align-middle shadow-sm">

            <thead>
                <tr>
                    <th>Nombre del negocio</th>
                    <th>Razón social</th>
                    <th>Última nota</th>
                    <th class="text-center" style="width: 150px;">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($clientes as $cliente)

                    <tr>

                        {{-- Nombre del negocio --}}
                        <td class="fw-semibold">
                            {{ $cliente->nombre_negocio ?? '—' }}
                        </td>

                        {{-- Razón social --}}
                        <td>
                            {{ $cliente->nombre_empresa ?? '—' }}
                        </td>

                        {{-- Última nota --}}
                        <td>
                            @if($cliente->notas->isNotEmpty())
                                <span class="text-muted small">
                                    {{ \Illuminate\Support\Str::limit($cliente->notas->first()->nota, 50) }}
                                </span>
                            @else
                                <span class="text-muted small">Sin notas</span>
                            @endif
                        </td>

                        {{-- Acciones --}}
                        <td class="text-center">
                            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-outline-rojo px-3">
                                Ver detalles
                            </a>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center text-muted py-3">
                            No hay clientes registrados.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>
@endsection
