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
$valuesToInsert = [];
$leads = getLeads();
if ($leads) {
  foreach($leads as $lead) {
    $row = [];
    if ($lead->getClosedAt()) {
      $userName = getUser($lead->getResponsibleUserId())->getName();
      array_push($row, $lead->getName(), $lead->getId(), $userName , $lead->getPrice());
      array_push($valuesToInsert, $row);
    }
    }
  print_r($valuesToInsert);
}

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