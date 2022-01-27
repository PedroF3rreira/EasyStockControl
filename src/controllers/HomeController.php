<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\EntryHandler;
use \src\handlers\OutputHandler;

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

        $entries = EntryHandler::getLastEntries();
        $outputs = OutputHandler::getLastOutput();

        $this->render('home', [
                'loggedUser' => $this->loggedUser,
                'page' => 'home',
                'entries' => $entries,
                'outputs' => $outputs
        ]);
    }
}