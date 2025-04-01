<?php
require_once 'Controller.php';
require_once 'Models/EditorialesModel.php'; 
require_once 'Utils/validaciones.php';
class EditorialesController extends Controller{
    private $model;

    function __construct(){
        $this->model = new EditorialModel();
    }

    public function index(){
        $viewBag=[];
        $viewBag['editoriales']=$this->model->get();
        $this->render("index.php",$viewBag);
    }

    public function create(){
        $this->render("new.php");
    }

    public function insert(){
        $viewBag=array();

        if(isset($_POST)){
            $errores=array();
            $editorial['codigo_editorial']=$_POST['codigo_editorial'];
            $editorial['nombre_editorial']=$_POST['nombre_editorial'];
            $editorial['contacto']=$_POST['contacto'];
            $editorial['telefono']=$_POST['telefono'];

            if(!isEditorial($editorial['codigo_editorial'])){
                array_push($errores, "El codigo debe seguir el formato EDIxxx");
            }

            if(empty($editorial['nombre_editorial'])){
                array_push($errores, "Debe ingresar el nombre de la editorial");
            }

            if(!isText($editorial['contacto'])){
                array_push($errores,"Contacto erroneo");
            }
            
            if(!isPhone($editorial['telefono'])){
                array_push($errores,"El Telefono ingresado no tiene el formato correcto");
            }

            if(count($errores)==0){
                if($this->model->insert($editorial)!=0){
                    header('location:'.PATH.'/editoriales');
                }
                else{
                    array_push($errores,"Ya existe una editorial con este codigo");
                    $viewBag['errores']=$errores;
                    $viewBag['editorial']=$editorial;
                    $this->render('new.php',$viewBag);
                }                
            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['editorial']=$editorial;
                $this->render('new.php',$viewBag);
            }
            
        }       
    }

    public function delete($params){
        $codigo=$params[0];
        $this->model->delete($codigo);
        header('location:'.PATH.'/editoriales');
    }

}