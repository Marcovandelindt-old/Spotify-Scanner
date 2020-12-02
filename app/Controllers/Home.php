<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home',
			'name'	=> 'home',
		];

		echo view('home/index', $data);
	}
}
