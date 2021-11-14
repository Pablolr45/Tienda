<?php
session_start();
require dirname(__DIR__,2)."/vendor/autoload.php";
use Tienda\Categorias;
(new Categorias)->generarCategorias(4);
$datosCategorias = (new Categorias)->readAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title></title>
</head>
<body style="background-color:silver">
    <h3 class="text-center">Categorías</h3>
    <div class="container mt-2">
    <a href="crearCategoria.php" class="btn btn-primary mb-2"><i class="fas fa-user-plus"></i> Nueva Categoría</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($fila = $datosCategorias->fetch(PDO::FETCH_OBJ)){
                    echo <<<TXT
                    <tr>
                        <th scope="row">{$fila->id}</th>
                        <th>{$fila->nombre}</th>
                        <th>{$fila->descripcion}</th>
                    </tr>

                    TXT;
                }
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>