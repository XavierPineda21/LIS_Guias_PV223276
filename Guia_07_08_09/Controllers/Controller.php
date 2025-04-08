<?php  
abstract class Controller{
    public function render($view, $viewbag=[]){
        $file="Views/".static::class."/$view";
        $file=str_replace("Controller","",$file);        
        if (is_file($file)){
            extract($viewbag);
            ob_start();//abre el bufer
            require($file);
            $content=ob_get_contents();
            ob_end_clean();//cerrar el bufer
            echo $content;        
        }
        else{
            echo "<h1>Vista no encontrada</h1>";
        }
    }
}