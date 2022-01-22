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
}