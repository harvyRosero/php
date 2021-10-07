<?php 

class App{
    function __construct()
    {
        echo "<P>nueva app</P>";
        $url = $_GET['url'];
        $url = rtrim($url, '/'); //borrar el ultimo caracter
        $url = explode('/', $url);

        // var_dump($url); //para ver los arrays

        $archivo_controller = 'controllers/' . $url[0] . '.php';
        if(file_exists($archivo_controller)){
            require_once 'controllers/main.php';
            $controller = new $url[0];

            if(isset($url[1])){
                $controller->{$url[1]}();
            }

        }else{
            require_once 'controllers/error.php';
            $controller = new Error1();
        }
    }
}

?>