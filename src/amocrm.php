<?php 
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Client\LongLivedAccessToken;
include_once __DIR__ . '/../vendor/autoload.php';
function getLeads() {
  $token = file_get_contents("token.txt");
  $client = new AmoCRMApiClient();
  try {
    $longLivedToken = new LongLivedAccessToken($token);
  } catch (\AmoCRM\Exceptions\InvalidArgumentException $e) {
    printError($e);
    die;
}
  $client->setAccessToken($longLivedToken)->setAccountBaseDomain("diman141185.amocrm.ru");
  return $client->leads()->get();
}