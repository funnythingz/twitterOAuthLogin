<?php
session_start();
require_once('./twitteroauth/twitteroauth.php');
require_once('./config.php');

if(isset($_GET['oauth_verifier']) && $_GET['oauth_verifier'] != ''){
  $sVerifier = $_GET['oauth_verifier'];
}else{
  header("Location: login.php");
  exit;
}

$oOauth = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET,$_SESSION['requestToken'],$_SESSION['requestTokenSecret']);

$oAccessToken = $oOauth->getAccessToken($sVerifier);

$_SESSION['oauthToken'] = $oAccessToken['oauth_token'];
$_SESSION['oauthTokenSecret'] = $oAccessToken['oauth_token_secret'];
$_SESSION['userId'] = $oAccessToken['user_id'];
$_SESSION['screenName'] = $oAccessToken['screen_name'];

header("Location: login.php");
?>
