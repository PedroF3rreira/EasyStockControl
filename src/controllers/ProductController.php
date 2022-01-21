<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class ProductController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if(!$this->loggedUser){

            $this->redirect('/login');    
        }
    }

    public function new() {
        $this->render('/products/create', [
                'loggedUser' => $this->loggedUser,
                'page' => 'Cadastro'
            ]
        );
    }

}