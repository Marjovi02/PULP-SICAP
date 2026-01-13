@extends('layouts.app') 

@section('content') 
<div class="container">

<h1 class="mb-4">Negocios</h1> 
<form method="GET" action="{{ route('negocios.index') }}" class="row g-3 mb-4">

{{-- ENTIDAD --}} 
<div class="col-md-4"> 
    <label class="form-label">Entidad</label> 
    <select name="entidad" class="form-select"> 
        <option value="">-- Todas --</option> 
        @foreach ($entidades as $e) 
        <option value="{{ $e->entidad }}" 
            {{ $entidad == $e->entidad ? 'selected' : '' }}> 
            {{ $e->entidad }} 
        </option> 
        @endforeach 
        </select> 
    </div>    
    
{{-- ACTIVIDAD --}} 
<div class="col-md-4"> 
    <label class="form-label">Actividad</label> 
    <select name="actividad" class="form-select"> 
        <option value="">-- Todas --</option> 
        @foreach ($actividades as $a) 
        <option value="{{ $a->nombre }}" 
            {{ $actividad == $a->nombre ? 'selected' : '' }}> 
            {{ $a->nombre }} 
        </option> 
        @endforeach 
    </select> 
</div>

<div class="col-md-2 d-flex align-items-end"> 
    <button class="btn btn-primary w-100">Filtrar</button> 
</div>

</form>

{{-- TABLA --}} 
<div class="table-responsive"> 
    <table class="table table-striped"> 
        <thead> <tr> <th>ID</th> 
            <th>Nombre</th> 
            <th>Dirección</th> 
            <th>Teléfono</th> 
            <th>Correo</th> 
            <th>Entidad</th> 
            <th>Actividad</th> 
        </tr>

</thead> 
<tbody> 
    @forelse ($negocios as $n) 
    <tr> 
        <td>{{ $n->id }}</td> 
        <td>{{ $n->nom_estab }}</td> 
        <td>{{ $n->direcc }}</td> 
        <td>{{ $n->telefono }}</td> 
        <td>{{ $n->correoelec }}</td> 
        <td>{{ $n->entidad }}</td> 
        <td>{{ $n->nombre_act }}</td> 
    </tr> 
    @empty

    <tr> 
        <td colspan="7">No hay resultados</td> 
    </tr> 
    @endforelse 
</tbody> 
</table> 
</div>

{{-- PAGINACION --}} 
<div class="mt-3"> 
    {{ $negocios->links() }} 
</div> 

</div> 
@endsection