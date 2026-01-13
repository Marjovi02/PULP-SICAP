<!DOCTYPE html>
<html>
<head>
    <title>Ver Negocios</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h1>Tabla de Negocios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Entidad</th>
                <th>Actividad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($negocios as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->nom_estab }}</td>
                <td>{{ $n->direcc }}</td>
                <td>{{ $n->telefono }}</td>
                <td>{{ $n->correoelec }}</td>
                <td>{{ $n->entidad }}</td>
                <td>{{ $n->nombre_act }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>