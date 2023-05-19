<div>
    <h1>Repositorios</h1>
    <form action="{{ route('repositories.update', $repository) }}" method="POST">
        @csrf
        @method('PUT')
        <lavel>URL *</lavel>
        <input type="text" name="url" value="{{ $repository->url }}"/>

        <lavel>description *</lavel>
        <textarea type="text" name="url">{{ $repository->description }}</textarea>

        <input type="submit" name="url" value="Editar"/>

    </form>
</div>