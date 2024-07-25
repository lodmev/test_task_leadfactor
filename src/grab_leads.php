<?php
include_once __DIR__ . "/../vendor/autoload.php" ;
include __DIR__. "/amocrm.php";

$spreadsheetId = '1YhWBaejCte28BeVoTbwB4b5bomKphrtrks9TWtlpwOs';
$gClient = new \Google_Client();
$gClient->setApplicationName('Grab the leads');
$gClient->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$gClient->setAccessType('offline');
$gClient->setAuthConfig(__DIR__ . '\..\credentials.json');
$service = new Google_Service_Sheets($gClient);

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

$body = new Google_Service_Sheets_ValueRange(['values' => $valuesToInsert ]);
$params = [
  'valueInputOption' => 'RAW'
];
$insert = [
  'insertDataOption' => 'INSERT_ROWS'
];
$result = $service->spreadsheets_values->append(
  $spreadsheetId,
  $range,
  $body,
  $params,
  $insert
);