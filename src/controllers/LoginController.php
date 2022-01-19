<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {
    
    public function singin()
    {
        $flash = '';

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash']; 
             $_SESSION['flash'] = '';    
         }

         $this->render('singin', [
            'flash' => $flash
         ]);
    }

    public function singinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if($email && $password){
            
            $token = LoginHandler::verifyLogin($email, $password);
            
            if($token){

                $_SESSION['token'] = $token;
                $this->redirect('/');
            }
            else{
                $_SESSION['flash'] = 'Email ou senha está incorreto.';
                $this->redirect('/login');
            }
        }
        else{
            $_SESSION['flash'] = 'Email e senha não estão preenchidos';
            $this->redirect('/login');
        }   
    }

    public function singup()
    {
        $flash = '';

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash']; 
             $_SESSION['flash'] = '';    
         }

         $this->render('singup', [
            'flash' => $flash
         ]);
    }

    public function singupAction(){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST,'password');

        if($name && $email && $password){
            if(!LoginHandler::emailExists($email)){

                $token = LoginHandler::addUser($name, $email, $password);
                $_SESSION['token'] = $token;

                $this->redirect('/');
            }
            else{
                $_SESSION['flash'] = 'email já está cadastrado tente outro email';
                $this->redirect('/cadastro');
            }
        }
        else{
            $_SESSION['flash'] = 'Dados faltando completo o formulário';
            $this->redirect('/cadastro');
        }
    }
}