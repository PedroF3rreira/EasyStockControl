<?php
namespace src\handlers; 

use \src\models\Product;
/**
 * Classe responsavel por manipular produdos no banco de dados 
 */
class ProductHandler
{
	public static function addProduct($smallDesc, $price, $qtd, $qtdMin, $forn, $longDesc, $idUser)
	{
		if(!empty($idUser)){
			Product::insert([
				'small_desc' => $smallDesc,
				'long_desc' => $longDesc,
				'price' => $price,
				'id_provider' => $forn,
				'id_user' => $idUser,
				'qty' => $qtd,
				'qty_min' => $qtdMin,
				'included_at' => date('Y-m-d H:i:s'),
				'url_image' => 'default.jpg'
			])->execute();

			return true;
		}
		else{
			return false;
		}
	}
}