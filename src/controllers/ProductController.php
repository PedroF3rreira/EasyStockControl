<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProductHandler;

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
        
        $flash = '';

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash']; 
             $_SESSION['flash'] = '';    
         }

        $this->render('/products/create', [
                'loggedUser' => $this->loggedUser,
                'page' => 'Cadastro',
                'flash' => $flash
            ]
        );
    }

    public function newAction()
    {
        $smallDesc = filter_input(INPUT_POST, 'small_desc', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price');
        $qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);
        $qtdMin = filter_input(INPUT_POST, 'qtd_min', FILTER_SANITIZE_NUMBER_INT);
        $forn = filter_input(INPUT_POST, 'forn', FILTER_SANITIZE_NUMBER_INT);
        $longDesc = filter_input(INPUT_POST, 'long_desc', FILTER_SANITIZE_SPECIAL_CHARS);
        $idUser = $this->loggedUser->id;

        if($smallDesc && $price && $qtd && $qtdMin && $forn){

            $res = ProductHandler::addProduct(
                $smallDesc, 
                $price,
                $qtd,
                $qtdMin,
                $forn,
                $longDesc,
                $idUser
            );

            if($res){
                $_SESSION['flash'] = 'Produto cadastrado com suscesso';
                $this->redirect('/produto/cadastro');
            }
        }
        else{
            $_SESSION['flash'] = "Todos os campos obrigatorios devem estar preenchidos";
            $this->redirect('/produto/cadastro');
        }
    }

}