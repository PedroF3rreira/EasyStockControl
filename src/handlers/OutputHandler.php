<?php 

namespace src\handlers;

use \src\models\Output;
use \src\models\Product;
/**
 * 
 */
class OutputHandler
{
	public static function addOutput($idUser, $idProduct, $qty, $output)
	{
		try {

			Output::insert([
				'id_user' => $idUser,
				'id_product' => $idProduct,
				'qty' => $qty,
				'output' => $output,
				'date_output' => date('Y-m-d'),
				'time_output' => date('H:i:s')
			])
			->execute();
			
			return true;

		} catch (PDOException $e) {
			return false;
		}
	}
	public static function getLastOutput($limit = 4)
	{
		try {

			$outputs = [];

			$outputList = Output::select('
				outputs.id as idOutput,
				outputs.qty, 
				outputs.output,
				outputs.date_output,
				outputs.time_output, 
				products.small_desc
				')
				->join('products', 'outputs.id_product', '=', 'products.id')
				->orderBy('outputs.id', 'desc')
				->limit(4)
			->get();

			foreach ($outputList as $outputItem){
				$output = new Output();
				
				$output->id = $outputItem['idOutput'];
				$output->qty = $outputItem['qty'];
				$output->output = $outputItem['output'];
				$output->dateOutput = $outputItem['date_output'];
				$output->timeOutput = $outputItem['time_output'];
				
				$output->product = new Product();
				$output->product->smallDesc = $outputItem['small_desc'];

				$outputs[] = $output;
			}
			return $outputs;

		} catch (PDOException $e) {
			return false;
		}
	}


}