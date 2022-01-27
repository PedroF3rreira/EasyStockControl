<?php 

namespace src\handlers;

use \src\models\Exit;
use \src\models\Product;
/**
 * 
 */
class ExitHandler
{
	public static function addExit($idUser, $idProduct, $qty, $exit)
	{
		try {

			Entrie::insert([
				'id_user' => $idUser,
				'id_product' => $idProduct,
				'qty' => $qty,
				'entry' => $entry,
				'date_entry' => date('Y-m-d'),
				'time_entry' => date('H:i:s')
			])
			->execute();
			
			return true;

		} catch (PDOException $e) {
			return false;
		}
	}
	public static function getLastExits($limit = 4)
	{
		try {

			$exits = [];

			$entryList = Entrie::select('
				exits.id as idExit,
				exits.qty, 
				exits.exit,
				exits.date_exit,
				exits.time_exit, 
				products.small_desc
				')
				->join('products', 'exits.id_product', '=', 'products.id')
				->orderBy('exits.id', 'desc')
				->limit(4)
			->get();

			foreach ($exitList as $exitItem){
				$exit = new Exit();
				
				$exit->id = $entryItem['idExit'];
				$exit->qty = $entryItem['qty'];
				$exit->exit = $entryItem['exit'];
				$exit->dateEntry = $entryItem['date_exit'];
				$exit->timeEntry = $entryItem['time_exit'];
				
				$exit->product = new Product();
				$exit->product->smallDesc = $entryItem['small_desc'];

				$exits[] = $exit;
			}
			return $exits;

		} catch (PDOException $e) {
			return false;
		}
	}


}