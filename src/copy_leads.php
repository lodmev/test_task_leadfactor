<?php
require __DIR__ . "/../vendor/autoload.php" ;
require "amocrm.php";

// $spreadsheetId = '1YhWBaejCte28BeVoTbwB4b5bomKphrtrks9TWtlpwOs';
// $client = new \Google_Client();
// $client->setApplicationName('Grab the leads');
// $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
// $client->setAccessType('offline');
// $client->setAuthConfig(__DIR__ . '\..\credentials.json');
// $service = new Google_Service_Sheets($client);

$range = 'one';
// $values = [["ONe", "two", "three", "four"]];
$values = getLeads();
echo $values;

// $body = new Google_Service_Sheets_ValueRange(['values' => $values ]);
// $params = [
//   'valueInputOption' => 'RAW'
// ];
// $insert = [
//   'insertDataOption' => 'INSERT_ROWS'
// ];
// $result = $service->spreadsheets_values->append(
//   $spreadsheetId,
//   $range,
//   $body,
//   $params,
//   $insert
// );