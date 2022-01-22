<?php
namespace src\handlers; 

use \src\models\Provider;
/**
 * Classe responsavel por manipular produdos no banco de dados 
 */
class ProviderHandler
{
	public static function allProviders()
	{
		$data = Provider::select()->get();

		if(count($data)){
			return $data;
		}
	}
}