<?php
namespace src\handlers;

use \src\models\Entrie;
use \src\models\Product;
/**
 * 
 */
class EntryHandler
{
	public static function addEntry($idUser, $idProduct, $qty, $entry)
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
	public static function getLastEntries($limit = 5)
	{
		try {

			$entries = [];

			$entryList = Entrie::select('
				entries.id as idEntry,
				entries.qty, 
				entries.entry,
				entries.date_entry,
				entries.time_entry, 
				products.small_desc
				')
				->join('products', 'entries.id_product', '=', 'products.id')
				->orderBy('entries.id', 'desc')
				->limit(4)
			->get();

			foreach ($entryList as $entryItem) {
				$entry = new Entrie();
				
				$entry->id = $entryItem['idEntry'];
				$entry->qty = $entryItem['qty'];
				$entry->entry = $entryItem['entry'];
				$entry->dateEntry = $entryItem['date_entry'];
				$entry->timeEntry = $entryItem['time_entry'];
				
				$entry->product = new Product();
				$entry->product->smallDesc = $entryItem['small_desc'];

				$entries[] = $entry;
			}
			return $entries;

		} catch (PDOException $e) {
			return false;
		}
	}


}