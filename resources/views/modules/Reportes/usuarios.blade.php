<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Usuarios</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 class="title">Listado de Usuarios</h2>

<table>
    <thead>
        <tr>
            <th>Correo electrónico</th>
            <th>Nombre</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $u)
        <tr>
            <td>{{ $u->email }}</td>
            <td>{{ $u->name }}</td>
            <td>{{ $u->activo == 0 ? 'Inactivo' : 'Activo' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h2 class="title">Lectores</h2>

<table>
    <thead>
        <tr>
            <th>Correo electrónico</th>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>CIP</th>
            <th>Activo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lectores as $l)
        <tr>
            <td>{{ $l->usuario->email }}</td>
            <td>{{ $l->usuario->name }}</td>
            <td>{{ $l->telefono }}</td>
            <td>{{ $l->cip }}</td>
            <td>{{ $l->usuario->activo == 0 ? 'Inactivo' : 'Activo' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
