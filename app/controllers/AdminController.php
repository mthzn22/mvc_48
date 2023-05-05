<?php

namespace App\controllers;

use App\Controllers\AuthController;
use Core\controller\Action;

    class AdminController extends Action{
        public function index()
        {
            AuthController::validaAutenticacao();
            $this->render("index", "template_admin");
        }
    }
?>