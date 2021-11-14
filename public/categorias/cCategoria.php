<?php
session_start();
require dirname(__DIR__, 2). "/vendor/autoload.php";
use Tienda\Categorias;

function hayError($n, $d){
    $error=false;
    if(strlen($n)==0){
        $error=true;
        $_SESSION['error_nombre']="Rellene el nombre !!!";
    }
    if(strlen($d)<=5){
        $error=true;
        $_SESSION['error_descripcion']="Este campo debe contener al menos 10 caracteres";
    }
    return $error;
    

}

if(isset($_POST['btnCrear'])){
    $nombre=trim(ucwords($_POST['nombre']));
    $descripcion=trim(ucfirst($_POST['descripcion']));
    $id=$_POST['id'];
    if(!hayError($id, $nombre, $descripcion)){
        (new Categorias)->setId($id)
        ->setNombre($nombre)
        ->setdescripcion($descripcion)
        ->create();
        $_SESSION['mensaje']="Categoria Creada.";
        header("Location:index.php");
    }
    else{
        header("Location:{$_SERVER['PHP_SELF']}");
    }

}


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
    <h3 class="text-center"></h3>
    <div class="container mt-2">
    <h3 class="text-center">Nueva Categoría</h3>
        <div class="container mt-2">
            <form name="crearCategoria" action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                <div class="bg-success p-4 text-white rounded shadow-lg m-auto" style="width:40rem">
                    <div class="mb-3">
                        <label for="t" class="form-label">Nombre categoria</label>
                        <input type="text" class="form-control" id="n" placeholder="nombre" name="nombre" required>
                        <?php
                            if(isset($_SESSION['error_nombre'])){
                                echo <<<TXT
                                <div class="mt-2 text-danger fw-bold" style="font-size:small">
                                    {$_SESSION['error_nom re']}
                                </div>
                                TXT;
                                unset($_SESSION['error_nombre']);
                            }
                        ?>       
                    </div>
                    <div class="mb-3">
                    <label for="s" class="form-label">Descripcion de categoria</label>
                    <textarea class="form-control" id="d" rows="4" name="descripcion"></textarea>
                    <?php
                        if(isset($_SESSION['error_descripcion'])){
                            echo <<<TXT
                            <div class="mt-2 text-danger fw-bold" style="font-size:small">
                                {$_SESSION['error_descripcion']}
                            </div>
                            TXT;
                            unset($_SESSION['error_descripcion']);
                        }
                    ?>       
                    </div>
                    <div>
                        <button type='submit' name="btnCrear" class="btn btn-info"><i class="fas fa-save"></i> Crear</button>
                        <button type="reset" class="btn btn-warning"><i class="fas fa-broom"></i> Limpiar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>