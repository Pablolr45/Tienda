<?php
namespace Tienda;
use PDO;
use PDOException;
use Faker;

class Categorias extends Conexion{
    private $id;
    private $nombre;
    private $descripcion;

    public function __construct()
    {
        parent::__construct();
    }

    public function create(){
        $q="insert into categorias(nombre,descripcion) values (:n, :d)";
        $stmt = parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':n'=>$this->nombre,
                ':d'=>$this->descripcion
            ]);
        }catch(PDOException $ex){
            die ("Error al crear la categoria: ". $ex->getMessage());
        }
        parent::$conexion = null;
    }

    public function read($id){
        $q="select * from categorias where id=:i";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':i' => $id
            ]);
        } catch (PDOException $ex) {
            die("Error al leer la categoria: " . $ex->getMessage());
        }
        parent::$conexion = null;
        return $stmt->fetch(PDO::FETCH_OBJ);
    
    }
    public function generarCategorias($cantidad){
        if ($this->hayCategorias()==0){
            $faker = Faker\Factory::create('es_ES');
           for($i=0; $i<$cantidad;$i++){
            $nombre = $faker -> unique()->randomElement($cat= array('Televisores','Proyectores','Monitores','Cámaras Digitales'));
            $descripcion = $faker -> text(99);
            (new Categorias)-> setNombre($nombre)
            ->setDescripcion($descripcion)
            ->create();
           }
        }
    }

    public function hayCategorias(){
        $q="select * from categorias";
        $stmt = parent::$conexion->prepare($q);
        try{
            $stmt->execute();
            parent::$conexion=null;
        } catch (PDOException $ex){
            die ("No hay categorias");
        }

        return $stmt -> rowCount(); 
    }

    public function readAll(){
        $q="select * from categorias order by id";
        $stmt=parent::$conexion->prepare($q);
        try{
            $stmt->execute();
        }catch (PDOException $ex){
            die("Error al recuperar todos los datos: ".$ex->getMessage());
        }
        parent::$conexion=null; //cerramos la conexion
        return $stmt;
    }    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
