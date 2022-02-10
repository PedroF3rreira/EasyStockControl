<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\EntryHandler;
use \src\handlers\OutputHandler;
use \src\handlers\ProductHandler;


class HomeController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if(!$this->loggedUser){

            $this->redirect('/login');    
        }
    }

    public function index() {

        $products = [];

        $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

        if($search){
            $products = ProductHandler::searchProduct($search);
        }


        $entries = EntryHandler::getLastEntries();
        $outputs = OutputHandler::getLastOutput();
         
        $this->render('home', [
                'loggedUser' => $this->loggedUser,
                'page' => 'home',
                'entries' => $entries,
                'outputs' => $outputs,
                'products' => $products
        ]);
    }
}