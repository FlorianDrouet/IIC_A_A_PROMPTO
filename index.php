<?php 
require 'modules/google-api/vendor/autoload.php';

//  417827359513-2mqu98h3mrtod2gc7lu6rk3dvki8e1fa.apps.googleusercontent.com 
//  D8yypULE1z4U91z3suft-iqa 

define('APPLICATION_NAME', 'Calendar');
define('CREDENTIALS_PATH', '~/.credentials/calendar-php-quickstart.json');
define('CLIENT_SECRET_PATH', __DIR__ . '/modules/client_secret.json');
// If modifying these scopes, delete your previously saved credentials
// at ~/.credentials/calendar-php-quickstart.json
define('SCOPES', implode(' ', array(
  Google_Service_Calendar::CALENDAR_READONLY)
));

session_start();

/**
 * Returns an authorized API client.
 * @return Google_Client the authorized client object
 */
function getClient() {
	try
	{
		  $client = new Google_Client();
		  $client->setApplicationName(APPLICATION_NAME);
		  $client->setScopes(SCOPES);
		  $client->setAuthConfig(CLIENT_SECRET_PATH);
		  $client->setAccessType('offline');
	}
	catch(Exception $e)
	{
		die('client : '.$e->getMessage());
	}

    if (isset($_GET['code'])) {
        $client->authenticate($_GET['code']);
        $_SESSION['access_token'] = $client->getAccessToken();
        header('Location: index.php');
        exit;
    }

  // Load previously authorized credentials from a file.

    if(isset($_SESSION) && isset($_SESSION['access_token']))
        $client->setAccessToken($_SESSION['access_token']);
    else
    {
        // Request authorization from the user.
        try
        {
            $authUrl = $client->createAuthUrl();
            printf("Open the following link in your browser:\n<a href=\"%s\">%s</a>\n", $authUrl, $authUrl);
            print 'Enter verification code: ';
        }
        catch(Exception $e)
        {
            die('auth : ' .$e->getMessage());
        }        
    }    
 

  // Refresh the token if it's expired.
  if ($client->isAccessTokenExpired()) {
    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    $_SESSION['access_token'] = $client->getAccessToken();
  }
  return $client;
}
$client = getClient();
$service = new Google_Service_Calendar($client);


$calendarId = '0vbnir6qjaui60vhlbdpulrbbk@group.calendar.google.com';
$optParams = array(
  'maxResults'      => 10,
  'orderBy'         => 'startTime',
  'singleEvents'    => TRUE,
  'timeMin'         => date('c')
);

$calendar = $service->events->listEvents($calendarId, $optParams);
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

$_SESSION['calendar'] = $str;

$title = "M1-IIC - Groupe A Prompto";
require 'include/header.php'; 
?>
<div id="fh5co-car" class="fh5co-section-gray">
	<?php include 'pages/services.php'; ?>
	<?php include 'pages/bonsPlans.php'; ?>
	<?php include 'pages/clients.php'; ?>
	<?php include 'pages/contact.php'; ?>
<?php require 'include/footer.php'; ?>