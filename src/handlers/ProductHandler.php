<?php
namespace src\handlers; 

use \src\models\Product;
/**
 * Classe responsavel por manipular produdos no banco de dados 
 */
class ProductHandler
{
	/**
	 * 
	 * @param string smallDesc
	 * @param float price
	 * @param int qtd
	 * @param int qtdMin
	 * @param int provider
	 * 
	 * */
	public static function addProduct($smallDesc, $price, $qtd, $qtdMin, $provider, $longDesc, $idUser)
	{
		if(!empty($idUser)){

			try {
				date_default_timezone_set('America/Sao_Paulo');

				Product::insert([
					'small_desc' => $smallDesc,
					'long_desc' => $longDesc,
					'price' => $price,
					'id_provider' => $provider,
					'id_user' => $idUser,
					'qty' => $qtd,
					'qty_min' => $qtdMin,
					'included_at' => date('Y-m-d H:i:s'),
					'url_image' => 'default.jpg'
			])->execute();

			return true;	
			
			} catch (PDOException $e) {
				echo "erro ".$e->getMessage();
			}
			
		}
		else{
			return false;
		}
	}

	/**
	 * função faz uma busca pelo id ou descrição do produto
	 * retorn id do produto se encontrar senão retorna nulo
	 * @param $param
	 * @return int
	 * */
	public static function productExists($search)
	{
		try {

			$product = null;

			$data = Product::select()
			->where('id',$search)
			->orWhere('small_desc', 'like', "%$search%")
			->one();

			if($data){
				$product = $data['id'];
			}

			return $product;
			
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * pesquisa produto pelo id, se encontrado algum resultado retorna objeto Produto preenchido
	 * senão encontrado retorna nulo
	 * @param string $search
	 * @return object
	 * */
	public static function searchProduct($search)
	{
		try {

			if($search){
				$data = Product::select()
					->where('small_desc', 'like', $search.'%')
					->orWhere('id', $search)
				->one();

				if($data){

					$product = new Product();
					$product->id = $data['id'];
					$product->smallDesc = $data['small_desc'];
					$product->longDesc = $data['long_desc'];
					$product->price = $data['price'];
					$product->qtyMin = $data['qty_min'];
					$product->qty = $data['qty'];
					$product->idProvider = $data['id_provider'];

					return $product;
				}
			}
			
		} catch (PDOException $e) {
			return false;
		}
	}
	/**
	 * pesquisa produto pelo id, se encontrado algum resultado retorna objeto Produto preenchido
	 * senão encontrado retorna nulo
	 * @param sint $id
	 * @return object
	 * */
	public static function searchProductById($id)
	{
		try {

			if($id){
				$data = Product::select()
				->where('id', $id)
				->one();

				if($data){

					$product = new Product();
					$product->id = $data['id'];
					$product->smallDesc = $data['small_desc'];
					$product->longDesc = $data['long_desc'];
					$product->price = $data['price'];
					$product->qtyMin = $data['qty_min'];
					$product->qty = $data['qty'];
					$product->idProvider = $data['id_provider'];

					return $product;
				}
			}
			
		} catch (PDOException $e) {
			return false;
		}
	}
	/**
	 * soma valor de value com quantidade 
	 * e atualiza quantidade na tabela products
	 * @param int $id
	 * @param int $qty
	 * @param int $value
	 * **/
	public static function productQtyEntry($id, $qty, $value)
	{
		try {
			
			$qty += $value;
			
			Product::update()
				->set('qty', $qty)
				->where('id', $id)
			->execute();

			return true;
			
		} catch (PDOException $e) {
			return false;
		}
	}

	/**
	 * subitrai valor de value com quantidade 
	 * e atualiza quantidade na tabela products
	 * @param int $id
	 * @param int $qty
	 * @param int $value
	 * **/
	public static function productQtyOutput($id, $qty, $value)
	{
		try {
			//opcional verificaçao para não permitir dar saidas
			// maiores que quantidade disponivel
			$qty -= $value;
			
			Product::update()
				->set('qty', $qty)
				->where('id', $id)
			->execute();

			return true;
			
		} catch (PDOException $e) {
			return false;
		}
	}

	public static function setProduct($id, $smallDesc, $longDesc, $price, $qtyMin, $provider)
	{
		try {

			Product::update()
				->set([
					'small_desc' => $smallDesc,
					'long_desc' => $longDesc,
					'price' => $price,
					'qty_min' => $qtyMin,
					'id_provider' => $provider
				])
				->where('id', $id)
			->execute();
			
			return true;
		} catch (PDOException $e) {
			return false;
		}
	}
}