<?php namespace App\Controllers;

use App\Models\TesterModel;
use App\Models\ResultsModel;
use CodeIgniter\Test\Fabricator;

class Tester extends BaseController
{
	public function index()
	{
		$resultsModel = new ResultsModel;

		$data['results'] = $resultsModel->findAll();
		$data['fieldNames'] = $resultsModel->getFieldNames($resultsModel->table);

		// var_dump($data['results']); exit;


		foreach ($data['results'] as $key => $value) {
			$data['results'][$key]['runStart'] = date('Ymd H:i:s', $value['runStart']);
			$data['results'][$key]['runEnd'] = date('Ymd H:i:s', $value['runEnd']);
			$data['results'][$key]['runDuration'] = number_format($value['runDuration'], 2);
			$data['results'][$key]['itemAvg'] = number_format($value['itemAvg'], 2);
			$data['results'][$key]['itemMax'] = number_format($value['itemMax'], 2);
			$data['results'][$key]['itemMin'] = number_format($value['itemMin'], 2);

			unset($data['results'][$key]['updated_at']);
			unset($data['results'][$key]['deleted_at']);



		}


		echo view('menu');
		echo view('results', $data);

	}

	public function executeInsertTest($rounds = 10) {

		echo '<pre>';

		$dataModel = new TesterModel;
		$resultsModel = new ResultsModel;
		////////////////////////////

		$formatters = [   'test1' => 'unixTime',
											'test2' => 'email',
											'test3' => 'name',
											'test4' => 'address',
											'test5' => 'realText'
									];

		$fabricator = new Fabricator($dataModel, $formatters);

		////////////////////////////

		;

		$timeStats = array();
		$timeStats['runStart'] = \microtime(TRUE);
		$timeStats['runTimes'] = array();

		$timeStats['ids'] = array();

		for ($i=0; $i < $rounds; $i++) {
			$testData   = $fabricator->make();


			$runStart = \microtime(TRUE);

			// echo $runStart . '<br>';

		// 	$data = [   'test1' => rand(1111111111111111,999999999999999999),
		// 	'test2' => rand(1111111111111111,999999999999999999),
		// 	'test3' => rand(1111111111111111,999999999999999999),
		// 	'test4' => rand(1111111111111111,999999999999999999),
		// 	'test5' => rand(1111111111111111,999999999999999999)
		// ];

		$data = $testData;

		$ret = $dataModel->genericSave($data);
		$timeStats['ids'][] = $ret;
		$runEnd = \microtime(TRUE);

		// echo $runEnd . '<br>';
		$timeStats['runTimes'][$i] = $runEnd - $runStart;
	}

	$timeStats['runEnd'] = \microtime(TRUE);

	$timeStats['runDuration'] = $timeStats['runEnd'] - $timeStats['runStart'];

	$timeStats['itemAvg'] = array_sum($timeStats['runTimes']) / count($timeStats['runTimes']);
	$timeStats['itemMax'] = max($timeStats['runTimes']);
	$timeStats['itemMin'] = min($timeStats['runTimes']);

	$timeStats['idMax'] = max($timeStats['ids']);
	$timeStats['idMin'] = min($timeStats['ids']);

	$resultsModel->genericSave($timeStats);

	var_dump($timeStats);

}
//--------------------------------------------------------------------

}
