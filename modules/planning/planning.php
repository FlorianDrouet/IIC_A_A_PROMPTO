<?php 
require 'modules/google-api/vendor/autoload.php';

define('APPLICATION_NAME', 'Calendar');
define('CREDENTIALS_PATH', 'modules/token.json');
define('CLIENT_SECRET_PATH', 'modules/client_secret.json');
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR)
));

class Planning
{
	private $service, $client;

	function __construct()
	{		
		try
		{
		  $client = new Google_Client();
		  $client->setApplicationName(APPLICATION_NAME);
		  $client->setScopes(SCOPES);
		  $client->setAuthConfig(CLIENT_SECRET_PATH);
		  $client->setAccessType('offline');
		  $client->setApprovalPrompt ("force");
		}
		catch(Exception $e)
		{
			die('client : '.$e->getMessage());
		}

	    if (isset($_GET['code'])) {
	    	try
	    	{
	    		$client->authenticate($_GET['code']);
	        	file_put_contents(CREDENTIALS_PATH, json_encode($client->getAccessToken()));	       
	        	header('Location: index.php');
	        	exit;
	    	}
	    	catch(Exception $e)
	    	{
	    		die('Erreur token :'.$e->getMessage());
	    	}	        
	    }

  		// Load previously authorized credentials from a file.
	    if(file_exists(CREDENTIALS_PATH))
	        $client->setAccessToken(file_get_contents(CREDENTIALS_PATH));
	    else
	    {
	        // Request authorization from the user.
	        try
	        {
	            $authUrl = $client->createAuthUrl();
	            printf("Open the following link in your browser:\n<a href=\"%s\">%s</a>\n", $authUrl, $authUrl);
	            print 'Enter verification code: ';
	            exit;
	        }
	        catch(Exception $e)
	        {
	            die('auth : ' .$e->getMessage());
	        }        
	    }
 

		// Refresh the token if it's expired.
		if ($client->isAccessTokenExpired()) {
			try
			{
				$refreshTokenSaved = $client->getRefreshToken(); 
			}
			catch(Exception $e)
			{
				die('Refresh token : '.$e->getMessage());
			}

			try
			{
				$client->fetchAccessTokenWithRefreshToken($refreshTokenSaved);
			}
			catch(Exception $e)
			{
				die('Refresh token2 : '.$e->getMessage());
			}
			try
			{
				$accessTokenUpdated = $client->getAccessToken();
				$accessTokenUpdated['refresh_token'] = $refreshTokenSaved;
				file_put_contents(CREDENTIALS_PATH, json_encode($accessTokenUpdated));
			}
			catch(Exception $e)
			{
				die('Refresh token3 : '.$e->getMessage());
			}

		}
		
		$this->service = new Google_Service_Calendar($client);
		$this->client = $client;
	}

	function ajouterRDV($data, $user, $calendarId, $creneau)
	{
		var_dump($data);

		list($jour, $mois, $annee) = explode('/', $data['date']);

		$data['heure']--;

		$debut = new DateTime("$annee-$mois-$jour ".$data['heure'].':'.$data['minute'].":00");
		$fin = new DateTime("$annee-$mois-$jour ".($data['heure'] + ceil($creneau/60)).':'.($data['minute'] + $creneau%60).":00");

		$event = new Google_Service_Calendar_Event(array(
		  'summary' => 'RDV avec '.$user['nom'].' '.$user['prenom'],
		  'description' => 'RDV avec '.$user['nom'].' '.$user['prenom'],
		  'start' => array(
		    'dateTime' => $debut->format(DateTime::RFC3339)
		  ),
		  'end' => array(
		    'dateTime' => $fin->format(DateTime::RFC3339)
		  )
		));
		
		$this->service->events->insert($calendarId, $event);
	}

	function getCalendar($calendarId)
	{
		$optParams = array(
		  'maxResults'      => 150,
		  'orderBy'         => 'startTime',
		  'singleEvents'    => TRUE,
		  'timeMin'         => date('c')
		);

		$calendar = $this->service->events->listEvents($calendarId, $optParams);
		$result = $calendar->getItems();

		$str = '';
		foreach($result as $item) :
		    $str .= "{\n";
		    $str .= '"title": "'.$item->summary.'",'."\n";
		    $str .= '"allday":"false",'."\n";
		    $str .= '"description":"'.$item->summary.'",'."\n";
		    $str .= '"start":"'.$item->start->dateTime.'",'."\n";
		    $str .= '"end":"'.$item->end->dateTime.'",'."\n";
		    $str .= '"url":""'."\n";
		    $str .= "},\n";
		endforeach;

		return $str;
	}

	function dispoAujourdhui($calendarId, $creneau)
	{
		$optParams = array(
		  'maxResults'      => 150,
		  'orderBy'         => 'startTime',
		  'singleEvents'    => TRUE,
		  'timeMin'         => date('c')
		);

		$calendar = $this->service->events->listEvents($calendarId, $optParams);
		$result = $calendar->getItems();

		$isDispo = true;
		$today = new DateTime();

		$nb = $creneau;

		foreach($result as $item)
		{
			$date = new DateTime($item->start->dateTime);
			if($date->format('dd/MM/YYYY') == $today->format('dd/MM/YYYY'))
			{
				$isDispo = false;
			}
		}

		return $isDispo;
	}

	function disponible($calendarId, $date, $creneau)
	{
		$optParams = array(
		  'maxResults'      => 150,
		  'orderBy'         => 'startTime',
		  'singleEvents'    => TRUE,
		  'timeMin'         => date('c')
		);

		$calendar = $this->service->events->listEvents($calendarId, $optParams);
		$result = $calendar->getItems();

		$isDispo = true;
		$today = new DateTime($date);

		foreach($result as $item)
		{
			$date = new DateTime($item->start->dateTime);
			if($date->format('dd/MM/YYYY HH:ii') == $today->format('dd/MM/YYYY HH:ii'))
			{
				$isDispo = false;
				break;
			}
		}

		return $isDispo;
	}
}

$planning = new Planning();
?>