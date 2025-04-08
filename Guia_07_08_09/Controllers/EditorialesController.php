<?php
require_once 'Controller.php';
require_once 'Models/EditorialModel.php';
require_once 'Utils/validaciones.php';
class EditorialesController extends Controller{
    private $model;
    function __construct(){
        $this->model=new EditorialModel();
    }
    public function index(){
        $viewbag=[];
        $viewbag['editoriales']=$this->model->get();
        $this->render('index.php',$viewbag);
    }
    public function create(){
        
        $this->render("new.php");
    }
    public function insert(){
        $viewbag=array();
        if(isset(($_POST))){
        $errores=array();
        $editorial['codigo_editorial']=$_POST['codigo_editorial'];
        $editorial['nombre_editorial']=$_POST['nombre_editorial'];
        $editorial['contacto']=$_POST['contacto'];
        $editorial['telefono']=$_POST['telefono'];
        if(!isCodigoEditorial($editorial['codigo_editorial'])){
            array_push($errores,'El codigo debe segri el formato EDIxxx');
        }
        if (empty($editorial['nombre_editorial'])){
            array_push($errores,'Debe ingresar e nombre de editorial ');
        }
        if (!isText($editorial['contacto'])){
            array_push($errores,'Contacto erroneo');
        }
        if (!isPhone($editorial['telefono'])){
            array_push($errores,'El numero no tiene el formato correcto');
        }
        if (count($errores)==0){
            if( $this->model->insert($editorial)!=0){
            header('location:'.PATH.'/Editoriales');
            }
            else{
                array_push($errores,'Ya existe un editorial con este codigo');
                $viewbag['errores']=$errores;
                $viewbag['editorial']=$editorial;
                $this->render('new.oho',$viewbag);
            }
        }
        else {
            $viewbag['errores']=$errores;
            $viewbag['editorial']=$editorial;
            $this->render('new.php',$viewbag);
        }
        }
    }
public function delete($params){
    $codigo=$params[0];
    $this->model->delete($codigo);
    header('location'.PATH.'/Editoriales');
}
public function edit($params) {
    $codigo = $params[0];
    $viewbag['editorial'] = $this->model->get($codigo)[0];
    $this->render('edit.php', $viewbag);
}

public function update() {
    if (isset($_POST)) {
        $errores = array();
        $editorial = [
            'codigo_editorial' => $_POST['codigo_editorial'],
            'nombre_editorial' => $_POST['nombre_editorial'],
            'contacto' => $_POST['contacto'],
            'telefono' => $_POST['telefono']
        ];
        
        // Validaciones (similar al método insert)
        if (count($errores) == 0) {
            if ($this->model->update($editorial) > 0) {
                header('Location: ' . PATH . '/Editoriales');
            } else {
                $viewbag['errores'] = ['Error al actualizar'];
                $this->render('edit.php', $viewbag);
            }
        }
    }
    }
}