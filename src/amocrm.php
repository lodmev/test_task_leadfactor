<?php 
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Client\LongLivedAccessToken;
include_once __DIR__ . '/../vendor/autoload.php';
$token = file_get_contents("token.txt");
$client = new AmoCRMApiClient();
try {
  $longLivedToken = new LongLivedAccessToken($token);
} catch (\AmoCRM\Exceptions\InvalidArgumentException $e) {
  printError($e);
  die;
}
$client->setAccessToken($longLivedToken)->setAccountBaseDomain("diman141185.amocrm.ru");
function getLeads() {
  global $client;
  return $client->leads()->get();
}
function getUser($userId) {
  global $client;
  return $client->users()->getOne($userId); 
}