<h2>Repositorios</h2>

<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Enlace</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($repositories as $repository)
                <tr>
                    <td>{{ $repository->id }}</td>
                    <td>{{ $repository->url }}</td>
                    <td>
                        <a href="{{ route('repositories.show', $repository) }}">
                            Ver
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('repositories.edit', $repository) }}">
                            Editar
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay repositorios creados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>