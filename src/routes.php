<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/login', 'LoginController@singin');
$router->post('/login', 'LoginController@singinAction');

$router->get('/cadastro', 'LoginController@singup');
$router->post('/cadastro', 'LoginController@singupAction');

$router->get('/produto/cadastro', 'ProductController@new');
$router->post('/produto/cadastro', 'ProductController@newAction');

$router->get('/produto/entrada', 'ProductController@entryProduct');
$router->get('/produto/entrada/{id}', 'ProductController@entryProductP');
$router->post('/produto/entrada', 'ProductController@entryProductAction');
$router->post('/produto/entrada/{id}', 'ProductController@entryProductActionP');

$router->get('/produto/saida', 'ProductController@outputProduct');
$router->get('/produto/saida/{id}', 'ProductController@outputProductP');
$router->post('/produto/saida', 'ProductController@outputProductAction');
$router->post('/produto/saida/{id}', 'ProductController@outputProductActionP');


$router->get('/fornecedor/cadastro', 'ProviderController@newProvider');
$router->post('/fornecedor/cadastro', 'ProviderController@newProviderAction');