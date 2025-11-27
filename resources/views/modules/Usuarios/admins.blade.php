@foreach ($item->where('rol_usuario','administrador') as $u)
<tr class="text-center">
    <td>{{ $u->email }}</td>
    <td>{{ $u->name }}</td>
    <td>{{ $u->rol_usuario }}</td>
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="{{ $u->id }}"
                {{ $u->activo ? 'checked' : '' }}>
        </div>
    </td>
    <td>
        <a href="{{ route('usuarios.edit', $u->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-user-pen"></i>
        </a>
    </td>
</tr>
@endforeach
