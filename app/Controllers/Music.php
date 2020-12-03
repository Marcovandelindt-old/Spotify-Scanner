<?php

namespace App\Controllers;

use App\Libraries\SpotifyWebAPI\Request as SpotifyRequest;
use App\Libraries\SpotifyWebAPI\Session as SpotifySession;
use App\Libraries\SpotifyWebAPI\SpotifyWebAPI as SpotifyWebAPI;
use App\Libraries\SpotifyWebAPI\SpotifyWebAPIAuthException as SpotifyWebAPIAuthException;
use App\Libraries\SpotifyWebAPI\SpotifyWebAPIException as SpotifyWebAPIException;

class Music extends BaseController
{
	/**
	 * Index action
	 */
	public function index ()
	{

	}

	/**
	 * Authorize
	 */
	public function authorize ()
	{
		# Set new Spotify Session
		$settingModel 	= new \App\Models\Setting();
		$spotifySession = new SpotifySession(
			$settingModel->getByName('spotifyClientId')->value,
			$settingModel->getByName('spotifyClientSecret')->value,
			$settingModel->getByName('spotifyRedirectURI')->value
		);

		# Set scopes for authorizing the user
		$scopes = [
			'scope' => [
				'ugc-image-upload',
				'user-read-recently-played',
				'user-top-read',
				'user-read-playback-position',
				'user-read-playback-state',
				'user-read-currently-playing',
				'app-remote-control',
				'streaming',
				'playlist-modify-public',
				'playlist-modify-private',
				'playlist-read-collaborative',
				'user-follow-modify',
				'user-follow-read',
				'user-library-modify',
				'user-library-read',
				'user-read-email',
				'user-read-private',
			]
		];

		# Redirect to authorization url
		return redirect()->to($spotifySession->getAuthorizeUrl($options));
	}

	/**
	 * Set new Spotify Code
	 */
	public function setCode ()
	{
		if (!empty($this->request->getGet('code'))) {
			$code 		  = $this->request->getGet('code');
			$settingModel = new \App\Models\Setting();
			$existingCode = $settingModel->getByName('spotifyCode')->value;

			if ($existingCode != $code) {
				$settingModel->update(
					$settingModel->getByName('spotifyCode')->setting_id,
					[
						'value' => $code,
					]
				);
			}
		}

		return redirect()->to('/');
	}
}