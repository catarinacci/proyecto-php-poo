<h1>Registrarse</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong class="alert_green">Registro completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'):?>
    <h3 class="alert_red">Registro fallido, introduce bien los datos</h3>
    
    <?php if(!empty($_SESSION['errores']['nombre'])): ?>
    <br>
    <strong class="alert_red"><?php echo $_SESSION['errores'] ['nombre'];?></strong>
    <?php endif; ?>
    
    <?php if(!empty($_SESSION['errores']['apellidos'])): ?>
    <br>
    <strong class="alert_red"><?php echo $_SESSION['errores'] ['apellidos'];?></strong>
    <?php endif; ?> 

    <?php if(!empty($_SESSION['errores']['email'])): ?>
    <br>
    <strong class="alert_red"><?php echo $_SESSION['errores'] ['email'];?></strong>
    <?php endif; ?> 

<?php endif; ?>
<?php Utils::deleteSession('register');?>
<?php Utils::deleteSession('errores');?>

<form action="<?=base_url?>usuario/save"method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" require />
    
    <label for="apellidos">Apellidos</label>
    <input type="text" name="apellidos" require />
    
    <label for="email">Email</label>
    <input type="email" name="email" require />
    
    <label for="password">Contraseña</label>
    <input type="password" name="password" maxlength="8" minlength="4" require />
    
    <input type="submit" value="Registrarse"/>
</form>
