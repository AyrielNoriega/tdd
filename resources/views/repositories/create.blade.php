<div>
    <h1>Repositorios</h1>
    <form action="{{ route('repositories.store') }}" method="POST">
        @csrf
        <lavel>URL *</lavel>
        <input type="text" name="url"/>

        <lavel>description *</lavel>
        <textarea type="text" name="url"></textarea>

        <input type="submit" name="url" value="Guardar"/>

    </form>
</div>