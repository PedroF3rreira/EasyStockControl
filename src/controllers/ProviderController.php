<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class ProviderController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if(!$this->loggedUser){

            $this->redirect('/login');    
        }
    }

    public function newProvider()
    {
        $flash = '';
        $msg = '';

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';  
         }
         if (!empty($_SESSION['msg'])) {
             $msg = $_SESSION['msg'];
             $_SESSION['msg'] = '';   
         }

         $this->render("/providers/create",[
                'loggedUser' => $this->loggedUser,
                'page' => 'Cadastro Fornecedor',
                'flash' => $flash,
                'msg' => $msg
         ]);

    }   
}