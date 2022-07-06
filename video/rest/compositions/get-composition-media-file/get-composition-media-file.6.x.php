<?php
// Get the PHP helper library from https://twilio.com/docs/libraries/php
require_once '/path/to/vendor/autoload.php'; // Loads the library
use Twilio\Rest\Client;

// Find your credentials at twilio.com/console
// To set up environmental variables, see http://twil.io/secure
$apiKeySid = getenv('TWILIO_API_KEY');
$apiKeySecret = getenv('TWILIO_API_KEY_SECRET');
$client = new Client($apiKeySid, $apiKeySecret);

$compositionSid = "CJXXXX";
$uri = "https://video.twilio.com/v1/Compositions/$compositionSid/Media?Ttl=3600";
$response = $client->request("GET", $uri);
$mediaLocation = $response->getContent()["redirect_to"];

// For example, download media to a local file
file_put_contents("myFile.mp4", fopen($mediaLocation, 'r'));
