<?php 
namespace src\handlers;

use \src\models\User;
/**
 * @author Pedro Daniel
 *
 * Classe responsavel por manipular e checar login
 * do sistema
 * 
 **/
class LoginHandler
{
	/**
	* Método que confere se o usuário esta logado ou não.
	* @access public
	* @return User $user
	**/
	public static function checkLogin()
	{
		if(!empty($_SESSION['token'])){

			$token = $_SESSION['token'];

			$data = User::select()
				->where('token', $token)
			->one();

			if($data){

				$loggedUser = new User();
				$loggedUser->id = $data['id'];
				$loggedUser->name = $data['name'];

				return $loggedUser;
			}
		}

		return false;
	}

	/**
	 * método responsavel verificar email e senha do usuario no banco de dados.
	 * @access public
	 * @param string email
	 * @param string password
	 * */
	public static function verifyLogin($email, $password)
	{
		$user = User::select()
			->where('email', $email)
		->one();

		if($user){
			if(password_verify($password, $user['password'])){

				$token = md5(time().rand(0,999).time());

				User::update()
					->set('token', $token)
					->where('email', $email)
				->execute();

				return $token;
			}
		}

		return false;
	}

	public static function emailExists($email)
	{
		$exists = User::select()->where('email', $email)->one();
		return 	$exists?true:false;	
	}

	public static function addUser($name, $email, $password)
	{
		$hash = password_hash($password, PASSWORD_DEFAULT);
		
		$token = md5(time().rand(0,999).time());

		User::insert([
			'name' => $name, 
			'email' => $email, 
			'password' => $hash,
			'token' => $token
		])->execute();

		return $token;

	}
}