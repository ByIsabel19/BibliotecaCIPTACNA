<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Universidades</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 5px; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 class="title">Listado de Universidades</h2>

@foreach ($universidades as $u)

<h3>{{ $u->nombre_universidad }}</h3>

<table>
    <thead>
        <tr>
            <th>Items vinculados</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($u->items as $item)
        <tr>
            <td>{{ $item->titulo }}</td>
        </tr>
        @empty
        <tr>
            <td>No tiene items</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endforeach

</body>
</html>
