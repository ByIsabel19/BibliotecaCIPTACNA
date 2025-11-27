@foreach ($item->where('rol_usuario','lector') as $u)
<tr class="text-center">
    <td>{{ $u->email }}</td>
    <td>{{ $u->name }}</td>
    <td>{{ $u->rol_usuario }}</td>

    {{-- TELÉFONO --}}
    <td>
        {{ optional($u->lector)->telefono_lector ?? '—' }}
    </td>

    {{-- CIP --}}
    <td>
        {{ optional($u->lector)->cip_lector ?? '—' }}
    </td>

    {{-- ACTIVO --}}
    <td>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="{{ $u->id }}"
                {{ $u->activo ? 'checked' : '' }}>
        </div>
    </td>

    {{-- EDITAR --}}
    <td>
        <a href="{{ route('usuarios.edit', $u->id) }}" class="btn btn-warning">
            <i class="fa-solid fa-user-pen"></i>
        </a>
    </td>
</tr>
@endforeach
