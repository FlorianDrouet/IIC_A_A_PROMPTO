<?php 

class Geoloc
{
	public $long;
	public $lat;

	function __construct()
	{
		
	}

	function getPosition()
	{
		if(isset($_COOKIE) && isset($_COOKIE['geolocation']))		
			list($long, $lat) = explode('###___###', $_COOKIE['geolocation']);	
		else
		{
			$ip = $_SERVER['REMOTE_ADDR']; // Recuperation de l'IP du visiteur
			$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip)); //connection au serveur de ip-api.com et recuperation des données
			if($query && $query['status'] == 'success') 
			{
				$long = $query['lon'];
				$lat = $query['lat'];
			}
			else
			{
				$long = 0;
				$lat = 0;
			}
		}

		$this->long = floatval($long);
		$this->lat = floatval($lat);
	}

	function distance($long, $lat)
	{
		$long = floatval($long);
		$lat = floatval($lat);

		//return (acos( sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($long1 - $long2)))) ) * 6371;
		$url = 'https://maps.googleapis.com/maps/api/distancematrix/json?';
		$url .= 'origins='.$this->lat.','.$this->long;
		$url .= '&destinations='.$lat.','.$long;
		$url .= '&key=AIzaSyCpBNazBlcBOS5-0vshJT2ycYqJGcozD7U';

		$data = file_get_contents($url);
		if($data)
		{
			$json = json_decode($data);

			if($json->status == 'OK' && $json->rows[0]->elements[0]->status != 'ZERO_RESULTS')			
				return $json->rows[0]->elements[0]->distance->value;
		}

		return (acos( sin(deg2rad($this->lat)) * sin(deg2rad($lat)) + (cos(deg2rad($this->lat)) * cos(deg2rad($lat)) * cos(deg2rad($this->long - $long)))) ) * 6371;
	}		

	function distToStr($d)
	{
		return ($d > 1000 ? round($d/1000,3).'km' : round($d).'m');
	}
}

$geolocalisation = new Geoloc();
?>