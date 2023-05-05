<?php

namespace Core\Init;

abstract class Bootstrap
{

    //uma classe abstrata é definida como qualquer outra classe
    //é especial: não pode ser instanciada
    //Servem como modelo para outras classes que a herdem
    //para ter um objeto da classe abstrata é necessário ter herança na classe
    //que a utilizar

    private $routes;

    //esse método abstrato vai ser implementado na classe herdeira ou classe filha
    abstract protected function initRoutes();


    //Método construtor é iniciado toda vez que chamamos a 
    //classe Route e nesse caso carrega o método
    // initRoutes (que contem as nossas rotas)
    public function __construct()
    {
        $this->initRoutes();
        $this->run($this->getUrl());
    }
    //Faz a inserção da rota no atributo $routes
    public function setRoutes(array $rota)
    {
        $this->routes = $rota;
    }
    //Pega o valor contido no atributo $routes
    public function getRoutes()
    {
        return $this->routes;
    }

    public function getUrl()
    {
        // retorna a url digitada no navegador em forma de string 
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    public function run($url)
    {
        $rota = array();
        //laço para percorrer todo o array $routes contido em initRoutes()
        foreach ($this->getRoutes() as $key => $route) {
            //verifica se a pagina digitada na url ($url) esta contida dentro 
            //do array $routes que esta dentro de initRoutes()
            if ($url == $route['route']) {
                //variavel $class recebe o nome do controlador e cria o 
                //caminho: "App\controllers\nome do controlador
                $class = "App\\controllers\\" . ucfirst($route['controller']);

                //capturamos qual a action solicitada pelo usuario na URL
                $action = $route['action'];

                $rota = array(
                    "classe" => $class,
                    "action" => $action,
                );
            }
        }

        //carregamos a página solicitada pelo usuário que está salva
        //na variável $action
        $this->loadView($rota);
    }



    public function loadView(array $rota)
    {
        if (!empty($rota)) {
            $controller = new $rota['classe'];
            $action = $rota['action'];
            $controller->$action();
        } else {
            $class = "App\\controllers\\ErrorController";
            $controller = new $class;
            $action = "error404";
            $controller->$action();
        }
    }
}
