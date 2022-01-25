<?php
namespace src\handlers; 

use \src\models\Provider;
/**
 * Classe responsavel por manipular produdos no banco de dados 
 */
class ProviderHandler
{
	/**
	 * @return Provider
	**/
	public static function allProviders()
	{
		//forma correta de enviar uma lista para um view
		$providers = [];

		$providerList = Provider::select()->get();

		foreach($providerList as $providerItem){
			$provider = new Provider();

			$provider->id = $providerItem['id'];
			$provider->name = $providerItem['name'];

			$providers[] = $provider;
		}

		return $providers;
	}

	public function addProvider($name, $email, $type, $cpf, $cnpj, $phone, $address, $idUser)
	{
		if(!empty($idUser)){

			try {

				Provider::insert([
					'name' => $name,
					'type' => $type,
					'cnpj' => $cnpj,
					'cpf' => $cpf,
					'address' => $address,
					'phone' => $phone,
					'email' => $email,
					'id_user' => $idUser
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