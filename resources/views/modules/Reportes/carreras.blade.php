<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Carreras</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 class="title">Listado de Carreras</h2>

<table>
    <thead>
        <tr>
            <th>Carrera</th>
            <th>Capítulo</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carreras as $c)
        <tr>
            <td>{{ $c->nombre_carrera }}</td>
            <td>{{ $c->capitulo->nombre_capitulo }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
