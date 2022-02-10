<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;
use \src\handlers\ProductHandler;
use \src\handlers\ProviderHandler;
use \src\handlers\EntryHandler;
use \src\handlers\OutputHandler;

class ProductController extends Controller {

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();

        if(!$this->loggedUser){

            $this->redirect('/login');    
        }
    }

    /**
     * renderiza view com os fornecedores e menssagens
     * **/
    public function new() {
        
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

         $providers = ProviderHandler::allProviders();

        $this->render('/products/create', [
                'loggedUser' => $this->loggedUser,
                'page' => 'cadastro',
                'flash' => $flash,
                'providers' => $providers,
                'msg' => $msg
            ]
        );
    }
    /**
     * processa dados vindo do formulário
     * e chama handle para tratar da inserção no banco de dados
     * **/
    public function newAction()
    {
        $smallDesc = filter_input(INPUT_POST, 'small_desc', FILTER_SANITIZE_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, 'price');
        $qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);
        $qtdMin = filter_input(INPUT_POST, 'qtd_min', FILTER_SANITIZE_NUMBER_INT);
        $provider = filter_input(INPUT_POST, 'provider', FILTER_SANITIZE_NUMBER_INT);
        $longDesc = filter_input(INPUT_POST, 'long_desc', FILTER_SANITIZE_SPECIAL_CHARS);
        $idUser = $this->loggedUser->id;

        if($smallDesc && $price && $qtd && $qtdMin && $provider){

            $res = ProductHandler::addProduct(
                $smallDesc, 
                $price,
                $qtd,
                $qtdMin,
                $provider,
                $longDesc,
                $idUser
            );

            if($res){
                $_SESSION['msg'] = 'Produto cadastrado com sucesso!';
                $this->redirect('/produto/cadastro');
            }
        }
        else{
            $_SESSION['flash'] = "Todos os campos obrigatorios devem estar preenchidos";
            $this->redirect('/produto/cadastro');
        }
    }

    /**
     * renderiza pagina de entrada de produtos
     * se rota não receber argumentos
     * se receber renderiza mesma pagina mas preenchida 
     * com dados vindos do banco e dados
     * @param string $args
     * 
     * ao acessar a rota /produto/entrada
     * controller verifica se rota foi acessada com algum valor em args 
     * se args estiver vazio (acessado via GET) renderiza a tela normalmente com parametro product vazio
     * se não (acessado via POST submeteu o form de pesquisa) executa o handler searchProduct(value) que faz uma busca no banco de dados e retorna
     * o produto pelo id ou small_desc
     *  
     * **/
    public function entryProduct($args = [])
    {
        $flash = '';
        $msg = '';
        $product = [];

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';  
         }
         if (!empty($_SESSION['msg'])) {
             $msg = $_SESSION['msg'];
             $_SESSION['msg'] = '';   
         }

         if(!empty($args)){
            $product = ProductHandler::searchProductById(trim($args['id']));
         }

         $this->render('/products/entry', [
            'loggedUser' => $this->loggedUser,
            'page' => 'entrada',
            'flash' => $flash,
            'msg' => $msg,
            'product' => $product
        ]); 
    }

    public function entryProductAction($args = [])
    {   
        
        /**
         * verifica se a rota foi enviada com argumentos
         * se args não estiver vazio pega o que vem em id de args recupera do formulário
         * entry e qtd e chama o handler productQtyEntry e em seguida adiciona o registro com o 
         * hendloer addEntry()
         * 
        **/

        if(!empty($args)){
            $id = $args['id'];
            $entry = filter_input(INPUT_POST, 'entry',FILTER_SANITIZE_NUMBER_INT);
            $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);

            if($entry > 0){
                $res = ProductHandler::productQtyEntry($id, $qty, $entry);
                EntryHandler::addEntry($this->loggedUser->id, $id, $qty, $entry);

                if($res){
                    $_SESSION['msg'] = 'Entrada realizada com sucesso!';
                    $this->redirect('/produto/entrada');
                }
                else{
                   $_SESSION['flash'] = 'Um erro correu entre em contato com desenvolvedor:(';
                   $this->redirect('/produto/entrada');   
               }
            }
            else{
                $_SESSION['flash'] = 'Quantidade da entrada têm de ser maior que 0';
                $this->redirect('/produto/entrada');        
            }
        }

        /**
        *se $args estiver vazio pega valor do formulario de pesquisa
        * e verifica se existe se existir redireciona para a rota /produto/entrada/{id}
        **/
        $productId = null;

        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if($search){
            $productId = ProductHandler::productExists($search);
        }

        if($productId){
            $this->redirect("/produto/entrada/$productId");
        }
        else{
            $_SESSION['flash'] = 'Produto não encontrado';
            $this->redirect('/produto/entrada');
        } 

    }
      /*
        verificaçao que não permite numeros negativos
        usada em volta dos outros ifs
        if($qty > -1){
            }
        else{
           $_SESSION['flash'] = 'Dados não estão preenchidos corretamente';
           $this->redirect('/produto/entrada');   
       }*/ 


    /**
     * Controla processo de baixa em produtos
     * */

    /**
     * renderiza pagina de saída de produtos
     * se rota não receber argumentos
     * se receber renderiza mesma pagina mas preenchida 
     * com dados vindos do banco e dados
     * @param array $args 
     * **/
     public function outputProduct($args = [])
     {
        $flash = '';
        $msg = '';
        $product = [];

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';  
         }
         if (!empty($_SESSION['msg'])) {
             $msg = $_SESSION['msg'];
             $_SESSION['msg'] = '';   
         }
        if(!empty($args)){
            $product = ProductHandler::searchProductById($args['id']);
        }

        $this->render('/products/output', [
            'loggedUser' => $this->loggedUser,
            'page' => 'saida',
            'flash' => $flash,
            'msg' => $msg,
            'product' => $product
        ]);  
    }

    public function outputProductAction($args = [])
    {   
        if(!empty($args)){
          
            $id = $args['id'];

            $output = filter_input(INPUT_POST, 'output',FILTER_SANITIZE_NUMBER_INT);
            $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_NUMBER_INT);

            if($qty){
                if($output){
                    
                    $res = ProductHandler::productQtyOutput($id, $qty, $output);
                    OutputHandler::addOutput($this->loggedUser->id, $id, $qty, $output);

                    if($res){
                        $_SESSION['msg'] = 'Saída realizada com sucesso!';
                        $this->redirect('/produto/saida');
                    }
                    else{
                       $_SESSION['flash'] = 'Um erro correu entre em contato com desenvolvedor:(';
                       $this->redirect('/produto/saida');   
                   }
               }
               else{
                    $_SESSION['flash'] = 'Saída Têm de ser maior que 0';
                    $this->redirect('/produto/saida');        
                }
            }
            else{
               $_SESSION['flash'] = 'Quantidade Têm de ser maior que 0';
               $this->redirect('/produto/saida');   
           }  
        }

        //se $args estiver vazio
        $productId = null;
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if($search){
            $productId = ProductHandler::productExists($search);
        }

        if($productId){
            $this->redirect("/produto/saida/$productId");
        }
        else{
            $_SESSION['flash'] = 'Produto não encontrado';
            $this->redirect('/produto/saida');
        } 
    }


    /**
     * update
     * 
     * */
     /**
     * renderiza pagina de saída de produtos
     * se rota não receber argumentos
     * se receber renderiza mesma pagina mas preenchida 
     * com dados vindos do banco e dados
     *@param array $args 
     * **/
     public function updateProduct($args = [])
     {
        $flash = '';
        $msg = '';
        $product = [];

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';  
         }
         if (!empty($_SESSION['msg'])) {
             $msg = $_SESSION['msg'];
             $_SESSION['msg'] = '';   
         }
        if(!empty($args)){
            $product = ProductHandler::searchProductById(intval($args['id']));
        }
        
        $providers = ProviderHandler::allProviders();
        
        $this->render('/products/update', [
            'loggedUser' => $this->loggedUser,
            'page' => 'alterar',
            'flash' => $flash,
            'msg' => $msg,
            'product' => $product,
            'providers' => $providers
        ]);  
    }

    public function updateProductAction($args = [])
    {   
        if(!empty($args)){
          
          $id = intval($args['id']);

            $smallDesc = filter_input(INPUT_POST, 'small_desc',FILTER_SANITIZE_SPECIAL_CHARS);
            $longDesc = filter_input(INPUT_POST, 'long_desc',FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_input(INPUT_POST, 'price');
            $qty_min = filter_input(INPUT_POST, 'qty_min', FILTER_SANITIZE_NUMBER_INT);
            $provider = filter_input(INPUT_POST, 'provider', FILTER_SANITIZE_SPECIAL_CHARS);

            if($id && $smallDesc && $provider){
                $res = ProductHandler::setProduct($id, $smallDesc, $longDesc, $price, $qty_min, $provider);

                if($res){
                    $_SESSION['msg'] = 'Produto altualizado com suscesso!';
                    $this->redirect('/produto/alterar');
                }
                else{
                    $_SESSION['flash'] = 'Ocorreu um erro';
                    $this->redirect('/produto/alterar');
                }
            }
            else{
                $_SESSION['flash'] = 'Dados não preenchidos!';
                $this->redirect('/produto/alterar');
            }
        }

        //se $args estiver vazio
        $productId = null;
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if($search){
            $productId = ProductHandler::productExists($search);
        }

        if($productId){
            $this->redirect("/produto/alterar/$productId");
        }
        else{
            $_SESSION['flash'] = 'Produto não encontrado';
            $this->redirect('/produto/alterar');
        } 
    }

    /**
     * função que deleta produtos do sistema
     * 
     * **/
     public function deleteProduct($args = [])
     {
         $flash = '';
        $msg = '';
        $product = [];

        if(!empty($_SESSION['flash'])){
             $flash = $_SESSION['flash'];
             $_SESSION['flash'] = '';  
         }
         if (!empty($_SESSION['msg'])) {
             $msg = $_SESSION['msg'];
             $_SESSION['msg'] = '';   
         }
        if(!empty($args)){
            $product = ProductHandler::searchProduct(trim($args['id']));
        }
        
        $this->render('/products/delete', [
            'loggedUser' => $this->loggedUser,
            'page' => 'excluir',
            'flash' => $flash,
            'msg' => $msg,
            'product' => $product,
        ]);  
    }

    public function deleteProductAction($args = [])
    {   
       if(!empty($args)){

          $id = intval($args['id']);

          if($id){
            $res = ProductHandler::deleteProduct($id);

                if($res){
                    $_SESSION['msg'] = 'Produto altualizado com suscesso!';
                    $this->redirect('/produto/excluir');
                }
                else{
                    $_SESSION['flash'] = 'Ocorreu um erro';
                    $this->redirect('/produto/excluir');
                }
            }
            else{
                $_SESSION['flash'] = 'Dados não preenchidos!';
                $this->redirect('/produto/excluir');
            }
        }

            //se $args estiver vazio
        $productId = null;
        $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);

        if($search){
            $productId = ProductHandler::productExists($search);
        }

        if($productId){
            $this->redirect("/produto/excluir/$productId");
        }
        else{
            $_SESSION['flash'] = 'Produto não encontrado';
            $this->redirect('/produto/excluir');
        } 
    }
}