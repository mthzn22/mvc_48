<?php

namespace App\controllers;

use Core\controller\Action;

class ErrorController extends Action
{
    public function error404() {
        $this->render("error404");
    }

}