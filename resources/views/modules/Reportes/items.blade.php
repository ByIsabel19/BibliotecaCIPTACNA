<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Items</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; vertical-align: top; }
        th { background: #eee; }
        .titulo { white-space: normal !important; }
    </style>
</head>
<body>

<h2 class="title">Listado de Items</h2>

<table>
    <thead>
        <tr>
            <th>Categoría</th>
            <th>Título</th>
            <th>Autor(es)</th>
            <th>Carrera</th>
            <th>Año</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $i)
        <tr>
            <td>{{ $i->categoria->nombre_categoria ?? 'N/A' }}</td>

            <!-- Título real -->
            <td class="titulo">{{ $i->nombre_item }}</td>

            <td>
                @foreach ($i->autores as $au)
                    {{ $au->nombre_autor }}<br>
                @endforeach
            </td>

            <td>{{ $i->carrera->nombre_carrera ?? 'N/A' }}</td>

            <!-- Año real -->
            <td>{{ $i->anio_item }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
