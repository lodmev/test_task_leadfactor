<?php 
use AmoCRM\Client\AmoCRMApiClient;
use AmoCRM\Client\LongLivedAccessToken;
use AmoCRM\Exceptions\InvalidArgumentException; 
$token = file_get_contents("token.txt");
$amoClient = new AmoCRMApiClient();
try {
  $longLivedToken = new LongLivedAccessToken($token);
} catch (InvalidArgumentException $e) {
  printError($e);
  die;
}
$amoClient->setAccessToken($longLivedToken)->setAccountBaseDomain("diman141185.amocrm.ru");
function getLeads() {
  global $amoClient;
  return $amoClient->leads()->get();
}
function getUser($userId) {
  global $amoClient;
  return $amoClient->users()->getOne($userId); 
}