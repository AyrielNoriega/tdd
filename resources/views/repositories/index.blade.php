<h2>Repositorios</h2>

<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Enlace</th>
            </tr>
        </thead>
        <tbody>
            @forelse($repositories as $repository)
                <tr>
                    <td>{{ $repository->id }}</td>
                    <td>{{ $repository->url }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No hay repositorios creados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>