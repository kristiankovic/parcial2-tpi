<?php

namespace app\controllers;

class HomeController{

    public function index(){
        return $this->view("HomeView");
    }

    public function obtenerDatos(){
        
    }

    public function view($vista){

        if(file_exists("../app/views/$vista.php")){

            ob_start();

            include "../app/views/$vista.php";
            $content = ob_get_clean();
            return $content;
        }

        else{
            echo "error";
        }

        return "hola";
    }
}

?>