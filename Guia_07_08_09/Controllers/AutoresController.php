<?php
require_once 'Controller.php';
require_once 'Models/AutorModel.php';
require_once 'Utils/validaciones.php';

class AutoresController extends Controller {
    private $model;

    function __construct() {
        $this->model = new AutorModel();
    }

    public function index() {
        $viewbag['autores'] = $this->model->get();
        $this->render('index.php', $viewbag);
    }

    public function create() {
        $this->render('new.php');
    }

    public function insert() {
        $viewbag = [];
        if(isset($_POST)) {
            $errores = [];
            $autor = [
                'codigo_autor' => $_POST['codigo_autor'],
                'nombre_autor' => $_POST['nombre_autor'],
                'nacionalidad' => $_POST['nacionalidad']
            ];

            // Validaciones
            if(!isCodigoAutor($autor['codigo_autor'])) {
                array_push($errores, 'El código debe seguir el formato AUTxxx');
            }
            if(empty($autor['nombre_autor'])) {
                array_push($errores, 'Debe ingresar el nombre del autor');
            }
            if(!isText($autor['nacionalidad'])) {
                array_push($errores, 'Nacionalidad no válida');
            }

            if(count($errores) == 0) {
                if($this->model->insert($autor) > 0) {
                    header('Location: '.PATH.'/Autores');
                } else {
                    array_push($errores, 'Error al registrar el autor');
                    $viewbag['errores'] = $errores;
                    $viewbag['autor'] = $autor;
                    $this->render('new.php', $viewbag);
                }
            } else {
                $viewbag['errores'] = $errores;
                $viewbag['autor'] = $autor;
                $this->render('new.php', $viewbag);
            }
        }
    }

    public function edit($params) {
        $codigo = $params[0];
        $autor = $this->model->get($codigo);
        $this->render('edit.php', ['autor' => $autor[0]]);
    }

    public function update() {
        $viewbag = [];
        if(isset($_POST)) {
            $errores = [];
            $autor = [
                'codigo_autor' => $_POST['codigo_autor'],
                'nombre_autor' => $_POST['nombre_autor'],
                'nacionalidad' => $_POST['nacionalidad']
            ];

            // Validaciones
            if(!isCodigoAutor($autor['codigo_autor'])) {
                array_push($errores, 'Formato código: AUTxxx');
            }
            if(empty($autor['nombre_autor'])) {
                array_push($errores, 'Debe ingresar el nombre del autor');
            }
            if(!isText($autor['nacionalidad'])) {
                array_push($errores, 'Nacionalidad no válida');
            }

            if(count($errores) == 0) {
                if($this->model->update($autor) > 0) {
                    header('Location: '.PATH.'/Autores');
                } else {
                    array_push($errores, 'Error al actualizar el autor');
                    $viewbag['errores'] = $errores;
                    $viewbag['autor'] = $autor;
                    $this->render('edit.php', $viewbag);
                }
            } else {
                $viewbag['errores'] = $errores;
                $viewbag['autor'] = $autor;
                $this->render('edit.php', $viewbag);
            }
        }
    }

    public function delete($params) {
        $codigo = $params[0];
        $this->model->delete($codigo);
        header('Location: '.PATH.'/Autores');
    }
}