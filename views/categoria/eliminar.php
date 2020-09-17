<h1>Eliminar categoria</h1>

<form action="<?= base_url?>categoria/delete" method="POST">
    <label for="id">Igresar Id</label>
    <input type="text" name="id" require>

    <input type="submit" value="Eliminar">
    <a href="<?= base_url?>categoria/index" id="cancelar">
    Volver
    </a>
</form>