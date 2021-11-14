<?php
session_start();
if(!isset($_POST['id']) || !isset($_SESSION['username'])){
    header("Location:../");
    die();
}

require dirname(__DIR__, 2)."/vendor/autoload.php";
use Tienda\Categorias;

(new Categorias)->delete($_POST['id']);
$_SESSION['mensaje']="categori Borrada con éxito";
header("Location:../users/");
