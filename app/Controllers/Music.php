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
		$options = [
			'scope' => [
				'ugc-image-upload',
				'user-read-playback-state',
				'user-modify-playback-state',
				'user-read-currently-playing',
				'streaming',
				'app-remote-control',
				'user-read-email',
				'user-read-private',
				'playlist-read-collaborative',
				'playlist-modify-public',
				'playlist-read-private',
				'playlist-modify-private',
				'user-library-modify',
				'user-library-read',
				'user-top-read',
				'user-read-playback-position',
				'user-read-recently-played',
				'user-follow-read',
				'user-follow-modify',
			],
		];

		$settingModel = new \App\Models\Setting;
		$spotifySession = new SpotifySession(
			$settingModel->getByName('spotifyClientId')->value,
			$settingModel->getByName('spotifyClientSecret')->value,
			$settingModel->getByName('spotifyRedirectURI')->value
		);

		return redirect()->to($spotifySession->getAuthorizeUrl($options));
	}
}