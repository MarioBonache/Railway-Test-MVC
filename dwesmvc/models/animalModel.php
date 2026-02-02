<?php

// Clase del modelo para trabajar con objetos Item que se almacenan en BD en la tabla ITEMS
class animalModel
{
    // Conexión a la BD
    protected $db;

    // Atributos del objeto item que coinciden con los campos de la tabla ITEMS
    private $id_anim;
    private $nombre;
    private $alimentacion;
    private $exotico;

    // Constructor que utiliza el patrón Singleton para tener una única instancia de la conexión a BD
    public function __construct()
    {
        //Traemos la única instancia de PDO
        $this->db = SPDO::singleton();
    }

    // Getters y Setters
    public function getid_anim()
    {
        return $this->id_anim;
    }
    public function setid_anim($id_anim)
    {
        return $this->id_anim = $id_anim;
    }

    public function getnombre()
    {
        return $this->nombre;
    }
    public function setnombre($nombre)
    {
        return $this->nombre = $nombre;
    }


        public function getalimentacion()
    {
        return $this->alimentacion;
    }
    public function setalimentacion($alimentacion)
    {
        return $this->alimentacion = $alimentacion;
    }

    public function getexotico()
    {
        return $this->exotico;
    }
    public function setexotico($exotico)
    {
        return $this->exotico = $exotico;
    }

    // Método para obtener todos los registros de la tabla ITEMS
    // Devuelve un array de objetos de la clase ItemModel
    public function getAll()
    {
        //realizamos la consulta de todos los items
        $consulta = $this->db->prepare('SELECT * FROM Animales');
        $consulta->execute();

        // OJO!! El fetchAll() funcionará correctamente siempre que el nombre
        // de los atributos de la clase coincida con los campos de la tabla
        $resultado = $consulta->fetchAll(PDO::FETCH_CLASS, "animalModel");

        //devolvemos la colección para que la vista la presente.
        return $resultado;
    }


    // Método que devuelve (si existe en BD) un objeto ItemModel con un código determinado
    public function getById($id_anim)
    {
        $gsent = $this->db->prepare('SELECT * FROM Animales WHERE id_anim = ?');
        $gsent->bindParam(1, $id_anim);
        $gsent->execute();

        $gsent->setFetchMode(PDO::FETCH_CLASS, "animalModel");
        $resultado = $gsent->fetch();

        return $resultado;
    }

    // Método que almacena en BD un objeto ItemModel
    // Si tiene ya código actualiza el registro y si no tiene lo inserta
    public function save()
    {
        if ($this->getById($this->getid_anim()) == null) {
            $consulta = $this->db->prepare('INSERT INTO Animales(id_anim,nombre,alimentacion,exotico) VALUES (?,?,?,?)');
            $consulta->bindParam(1, $this->id_anim);
            $consulta->bindParam(2, $this->nombre);
            $consulta->bindParam(3, $this->alimentacion);
            $consulta->bindParam(4, $this->exotico);
            $consulta->execute();
        } else {
            $consulta = $this->db->prepare('UPDATE Animales SET nombre=?,alimentacion=?,exotico=? WHERE id_anim=?');
            $consulta->bindParam(1, $this->nombre);
            $consulta->bindParam(2, $this->alimentacion);
            $consulta->bindParam(3, $this->exotico);
            $consulta->bindParam(4, $this->id_anim);
            $consulta->execute();
        }
    }

    // Método que elimina el ItemModel de la BD
    public function delete()
    {
        $consulta = $this->db->prepare('DELETE FROM Animales WHERE id_anim=?');
        $consulta->bindParam(1, $this->id_anim);
        $consulta->execute();
    }
}
?>