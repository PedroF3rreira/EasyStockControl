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

$router->get('/produto/saida', 'ProductController@exitProduct');
$router->get('/produto/saida/{id}', 'ProductController@exitProductP');
$router->post('/produto/saida', 'ProductController@exitProductAction');
$router->post('/produto/saida/{id}', 'ProductController@exitProductActionP');


$router->get('/fornecedor/cadastro', 'ProviderController@newProvider');
$router->post('/fornecedor/cadastro', 'ProviderController@newProviderAction');