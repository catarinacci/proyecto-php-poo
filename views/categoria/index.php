<h1>Gestionar categorias</h1>

<a href="<?= base_url?>categoria/crear" class="button " id="crear">
    Crear categoria
</a>
<a href="<?= base_url?>categoria/editar" class="button " id="editar">
    Editar categoria
</a>
<a href="<?= base_url?>categoria/eliminar" class="button" id="eliminar">
    Eliminar categoria
</a>
<table >
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()):?>
        <tr>
            <td><?= $cat->id;?></td>
            <td><?= $cat->nombre;?></td>
        </tr>
    <?php endwhile;?>
</table>