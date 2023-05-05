<?php

namespace Core\controller;

use stdClass;

abstract class Action
{

    //criar um atributo vazio
    protected $view;

    //método construtor da classe, ou seja, inicia os códigos contido nesse método
    //ao carregar a classe
    public function __construct()
    {
        $this->view = new stdClass();
    }

    //responsavel por renderizar (exibir) a pagina na tela
    protected function render($view, $layout = null)
    {
        $this->view->page = $view;

        if (file_exists("../app/views/layout/" . $layout . ".phtml")) {
            require_once("../app/views/layout/" . $layout . ".phtml");
        } else {
            $this->content();
        }
    }

    public function content()
    {
        //essa função que retorna o nome da classe passada como parametro
        $nome_da_classe =  get_class($this);
        $nome_da_classe = str_replace("App\\controllers\\", "", $nome_da_classe);
        $nome_da_classe = strtolower(str_replace("Controller", "", $nome_da_classe));

        require_once("../app/views/" . $nome_da_classe . "/" . $this->view->page . ".phtml");
    }
}
