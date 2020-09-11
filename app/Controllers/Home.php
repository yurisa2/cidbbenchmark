<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('menu');
		return view('dashboard');
	}

	//--------------------------------------------------------------------

}
