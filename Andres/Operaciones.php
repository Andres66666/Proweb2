<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos.css">
    
</head>
<body>
<h1 style="text-align: center;">Tabla Empleados</h1>
    <div class="row">
        <div class="column">
            <form method="POST" action="buscar.php">
                <label for="ID_accidente">ID del accidente:</label>
                <input type="text" name="ID_accidente" id="ID_accidente">
                <button type="submit" name="buscar">Buscar</button> 
        </form>
        </div>
    </div>
</body>
</html>