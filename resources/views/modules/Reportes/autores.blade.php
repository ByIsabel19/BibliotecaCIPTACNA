<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Autores</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 class="title">Listado de Autores</h2>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Total Items</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($autores as $a)
        <tr>
            <td>{{ $a->nombre_autor }}</td>
            <td>{{ $a->items_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
