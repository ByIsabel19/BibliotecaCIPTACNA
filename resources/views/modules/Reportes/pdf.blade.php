<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{ $titulo }}</title>
  <style>
    body { font-family: sans-serif; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    table, td, th { border: 1px solid black; padding: 6px; }
    th { background: #eee; }
  </style>
</head>
<body>

  <h2>{{ $titulo }}</h2>

  <table>
    <thead>
      @if ($tipo == 'usuarios')
        <tr>
          <th>ID</th><th>Nombre</th><th>Email</th>
        </tr>
      @endif

      @if ($tipo == 'autores')
        <tr>
          <th>ID</th><th>Nombre</th><th>Apellido</th>
        </tr>
      @endif

      @if ($tipo == 'items')
        <tr>
          <th>ID</th>
          <th>Título</th>
          <th>Autor</th>
          <th>Categoría</th>
          <th>Carrera</th>
          <th>Universidad</th>
        </tr>
      @endif

      @if ($tipo == 'carreras')
        <tr>
          <th>ID</th><th>Carrera</th><th>Capítulo</th>
        </tr>
      @endif

      @if ($tipo == 'universidades')
        <tr>
          <th>ID</th><th>Nombre</th><th>Ciudad</th>
        </tr>
      @endif
    </thead>

    <tbody>
      @foreach ($data as $d)
        <tr>

          @if ($tipo == 'usuarios')
            <td>{{ $d->id }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->email }}</td>
          @endif

          @if ($tipo == 'autores')
            <td>{{ $d->id }}</td>
            <td>{{ $d->nombre }}</td>
            <td>{{ $d->apellido }}</td>
          @endif

          @if ($tipo == 'items')
            <td>{{ $d->id }}</td>
            <td>{{ $d->titulo }}</td>
            <td>{{ $d->autor->nombre ?? '—' }}</td>
            <td>{{ $d->categoria->nombre ?? '—' }}</td>
            <td>{{ $d->carrera->nombre_carrera ?? '—' }}</td>
            <td>{{ $d->universidad->nombre_universidad ?? '—' }}</td>
          @endif

          @if ($tipo == 'carreras')
            <td>{{ $d->id }}</td>
            <td>{{ $d->nombre_carrera }}</td>
            <td>{{ $d->capitulo->nombre_capitulo ?? '—' }}</td>
          @endif

          @if ($tipo == 'universidades')
            <td>{{ $d->id }}</td>
            <td>{{ $d->nombre_universidad }}</td>
            <td>{{ $d->ciudad }}</td>
          @endif

        </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
