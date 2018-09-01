<?php  

namespace App;

use App\Models\SocialNetwork;


class Helper {

	public static function socialNetworks()
	{
		$socials = SocialNetwork::all();

		return $socials;
	}

	public static function infoContact()
	{
		return 'diaravel@contac.me';
	}

}