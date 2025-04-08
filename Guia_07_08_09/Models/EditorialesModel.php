<?php
require_once('Model.php');
class EditorialModel extends Model {
    public function get($id='') {
       if($id==''){
        $queary="SELECT* FROM Editoriales";
       }
       else{
        $queary= "SELECT * FROM Editoriales WHERE codigo_editorial=:codigo";
        return $this->get_query($queary,[':codigo'=>$id]);
       }
        return $this->get_query($queary);
    }
    public function insert($editorial=array()){
        $queary="INSERT INTO Editoriales VALUES (:codigo_editorial,:nombre_editorial,:contacto,:telefono)";
        return $this->set_query($queary,$editorial);
    }
    public function delete($id=''){
        $query="DELETE FROM Editoriales WHERE codigo_editorial=:codigo_editorial";
        return $this->set_query($query,['codigo_editorial'=>$id]);
    }
    public function update($editorial=array()){
        $queary= "UPDATE Editoriales SET nombre_editorial=:nombre_editorial, contacto=:contacto, telefono=:telefono WHERE codigo_editorial=:codigo_editorial";
        return $this->set_query($queary,$editorial);
    }
}