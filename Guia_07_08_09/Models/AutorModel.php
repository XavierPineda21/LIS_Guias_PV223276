<?php
require_once('Model.php');

class AutorModel extends Model {
    public function get($id = '') {
        if($id == '') {
            $query = "SELECT * FROM Autores";
        } else {
            $query = "SELECT * FROM Autores WHERE codigo_autor = :codigo";
            return $this->get_query($query, [':codigo' => $id]);
        }
        return $this->get_query($query);
    }

    public function insert($autor = []) {
        $query = "INSERT INTO Autores (codigo_autor, nombre_autor, nacionalidad) 
                 VALUES (:codigo_autor, :nombre_autor, :nacionalidad)";
        return $this->set_query($query, $autor);
    }

    public function delete($id = '') {
        $query = "DELETE FROM Autores WHERE codigo_autor = :codigo_autor";
        return $this->set_query($query, [':codigo_autor' => $id]);
    }

    public function update($autor = []) {
        $query = "UPDATE Autores SET 
                 nombre_autor = :nombre_autor, 
                 nacionalidad = :nacionalidad 
                 WHERE codigo_autor = :codigo_autor";
        
        return $this->set_query($query, $autor);
    }
}