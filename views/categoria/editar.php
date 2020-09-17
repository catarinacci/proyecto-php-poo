<h1>Editar categoria</h1>

<form action="<?= base_url?>categoria/edit" method="POST">
    <label for="id">Ingresar ID</label>
    <input type="text" name="id" require>

    <label for="nombre">Ingresar nuevo nombre</label>
    <input type="text" name="nombre" require>

    <input type="submit" value="Editar">
    <a href="<?= base_url?>categoria/index" id="cancelar">
    Volver
    </a>
</form>