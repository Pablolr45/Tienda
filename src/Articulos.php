<?php
namespace Tienda;
use PDO;
use PDOException;
use Faker;

class Articulos extends Conexion
{
    private $id;
    private $nombre;
    private $precio;
    private $categoria_id;
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $q = "insert into articulos(nombre, precio, categoria_id) values (:n,:p,:cid)";
        $stmt = parent::$conexion->prepare($q);
        try {
            $stmt->execute([
                ':n' => $this->nombre,
                ':p' => $this->precio,
                ':cid' => $this->categoria_id

            ]);
        } catch (PDOException $ex) {
            die("Error al insertar articulo: " . $ex->getMessage());
        }
        parent::$conexion=null;
    }

    public function read($id){
        $q= "select articulos.*,nombre,precio,";
    }

    public function delete($id){
        $q="delete from articulos where id =:i";
        $stmt= parent::$conexion->prepare($q);
        try{
            $stmt->execute([
                ':i' => $id
            ]);
        } catch (PDOException $ex) {
            die("Error al borrar Articulo: " . $ex->getMessage());
        }
        parent::$conexion = null;
        
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
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }
}
