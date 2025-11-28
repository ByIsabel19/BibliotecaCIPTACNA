<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Universidades</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .title { text-align: center; font-size: 18px; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>

<h2 class="title">Reporte de Universidades</h2>

<table>
    <thead>
        <tr>
            <th>Universidad</th>
            <th>Ítems vinculados</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($universidades as $u)
        <tr>
            <td>{{ $u->nombre_universidad }}</td>
            <td>{{ $u->cantidad_items }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
