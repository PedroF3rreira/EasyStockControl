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

$router->get('/produto/entrada/{search}', 'ProductController@entryProduct');
$router->get('/produto/entrada', 'ProductController@entryProduct');
$router->post('/produto/entrada/{search}', 'ProductController@entryProductAction');
$router->post('/produto/entrada', 'ProductController@entryProductAction');

$router->get('/produto/saida/{search}', 'ProductController@outputProduct');
$router->get('/produto/saida', 'ProductController@outputProduct');
$router->post('/produto/saida/{search}', 'ProductController@outputProductAction');
$router->post('/produto/saida', 'ProductController@outputProductAction');

$router->get('/produto/alterar/{id}', 'ProductController@updateProduct');
$router->get('/produto/alterar', 'ProductController@updateProduct');
$router->post('/produto/alterar/{id}', 'ProductController@updateProductAction');
$router->post('/produto/alterar', 'ProductController@updateProductAction');

$router->get('/fornecedor/cadastro', 'ProviderController@newProvider');
$router->post('/fornecedor/cadastro', 'ProviderController@newProviderAction');