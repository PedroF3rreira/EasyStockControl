<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProviderHandler;

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

    public function newProviderAction()
    {
     
     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
     $type = filter_input(INPUT_POST, 'type');
     $cpf = filter_input(INPUT_POST, 'cpf');
     $cnpj = filter_input(INPUT_POST, 'cnpj');
     $phone = filter_input(INPUT_POST, 'phone');
     $address = filter_input(INPUT_POST, 'address');
     $idUser = $this->loggedUser->id;

     if($name && $email && $cpf && $phone && $idUser){
            $res = ProviderHandler::addProvider(
                        $name, 
                        $email, 
                        $type,
                        $cpf,
                        $cnpj,
                        $phone,
                        $address,
                        $idUser
                    );

            if($res){
                $_SESSION['msg'] = 'Fornecedor cadastrado com sucesso!';
                $this->redirect('/fornecedor/cadastro');
            }
        }
        else{
            $_SESSION['flash'] = 'Falta preencher algum compo de no formulario';
            $this->redirect('/fornecedor/cadastro');
        }
    
    }   
}