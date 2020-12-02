<?php

namespace App\Controllers;

class Setting extends BaseController 
{
	/**
	 * Index action
	 */
	public function index ()
	{
		$settingModel = new \App\Models\Setting();

		$settings 						 = [];
		$settings['spotifyClientId'] 	 = $settingModel->getByName('spotifyClientId')->value;
		$settings['spotifyClientSecret'] = $settingModel->getByName('spotifyClientSecret')->value;

		$data = [
			'title'    => 'Settings',
			'name' 	   => 'settings',
			'settings' => $settings,
		];

		return view('settings/index', $data);
	}
}