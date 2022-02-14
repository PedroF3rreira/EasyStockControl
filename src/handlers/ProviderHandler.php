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
				
				$data = Provider::select()
					->where('cnpj', $cnpj)
					->orWhere('cpf', $cpf)
				->one();
				
				if(!$data){
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
				}	

			} catch (PDOException $e) {
				echo "erro ".$e->getMessage();
			}
			
		}
		else{
			return false;
		}
	}

	public function getProviders($search)
	{
		try {

			$providers = [];

			$data = Provider::select()
				->where('name', 'like', "%$search%")
			->get();

			foreach($data as $item){
				$provider = new Provider();
				$provider->id = $item['id'];
				$provider->name = $item['name'];
				$provider->email = $item['email'];
				$provider->cnpj = $item['cnpj'];
				$provider->cpf = $item['cpf'];
				$provider->address = $item['address'];
				$provider->phone = $item['phone'];
				$provider->email = $item['email'];

				$providers[] = $provider;
			}
			
		} catch (PDOException $e) {
			return false;
		}

		return $providers;
	}
}