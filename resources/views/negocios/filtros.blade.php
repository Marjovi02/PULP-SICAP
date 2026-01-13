<form method="GET" action="{{ route('negocios.index') }}" class="mb-4">

    <div class="row">

        <!-- Estado -->
        <div class="col-md-2">
            <label class="form-label">Estado</label>
            <select name="estado_id" class="form-control">
                <option value="">Todos</option>
                @foreach($estados as $estado)
                    <option value="{{ $estado->id }}" {{ request('estado_id') == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Municipio -->
        <div class="col-md-2">
            <label class="form-label">Municipio</label>
            <select name="municipio_id" class="form-control">
                <option value="">Todos</option>
                @foreach($municipios as $municipio)
                    <option value="{{ $municipio->id }}" {{ request('municipio_id') == $municipio->id ? 'selected' : '' }}>
                        {{ $municipio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Categoría -->
        <div class="col-md-2">
            <label class="form-label">Categoría</label>
            <select name="categoria_id" class="form-control">
                <option value="">Todos</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tamaño -->
        <div class="col-md-2">
            <label class="form-label">Tamaño</label>
            <select name="tamano_id" class="form-control">
                <option value="">Todos</option>
                @foreach($tamanos as $t)
                    <option value="{{ $t->id }}" {{ request('tamano_id') == $t->id ? 'selected' : '' }}>
                        {{ $t->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Actividad -->
        <div class="col-md-2">
            <label class="form-label">Actividad</label>
            <select name="actividad_id" class="form-control">
                <option value="">Todos</option>
                @foreach($actividades as $a)
                    <option value="{{ $a->id }}" {{ request('actividad_id') == $a->id ? 'selected' : '' }}>
                        {{ $a->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Botón -->
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filtrar</button>
        </div>

    </div>

</form>