<?php 

class Planning
{
	function __construct()
	{
		
	}

	function ajouterRDV($calendarID, $RDV)
	{
		$url = 'https://www.googleapis.com/calendar/v3/calendars/'.$calendarID.'/';
	}

	function getCalendar()
	{
		$guzzleClient = new \GuzzleHttp\Client(['verify' => false]);
		$client = new Google_Client();
		$client->setAuthConfig("modules/client_id.json");

		$client->setHttpClient($guzzleClient);
		$service = new Google_Service_Calendar($client);

		$events = $service->events->listEvents('primary');

		while(true) {
			foreach ($events->getItems() as $event)
				echo $event->getSummary();
			
			$pageToken = $events->getNextPageToken();
			if ($pageToken) {
				$optParams = array('pageToken' => $pageToken);
				$events = $service->events->listEvents('primary', $optParams);
			} 
			else 
				break;			
		}
	}
}


?>