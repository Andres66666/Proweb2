<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Iniciar sesión</h2>
   <!-- Formulario de inicio de sesión -->
<form action="Admistrador.php" method="post" class="form-group">
    <h1>Iniciar sesión</h1>
    <?php if (isset($error)) : ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    
    <div class="form-group">
        <label for="USUARIO">Usuario:</label>
        <input type="text" name="USUARIO" id="USUARIO" required>
    </div>
    <div class="form-group">
        <label for="CONTRASENIA">Contraseña:</label>
        <input type="password" name="CONTRASENIA" id="CONTRASENIA" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>