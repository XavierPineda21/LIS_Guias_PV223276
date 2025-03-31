<?php
require_once 'Controller.php';
require_once 'Models/EditorialesModel.php'; 
class EditorialesController extends Controller{
    private $model;

    function __constructor(){
        $this->model = new EditorialModel();
    }

    public function index(){
        $viewBag=[];
        $viewBag['editoriales']=$this->model->get();
        $this->render("index.php");
    }

    public function create(){
        $this->render("new.php");
    }
}