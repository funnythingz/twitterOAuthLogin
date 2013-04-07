<?php

session_start();
require_once('./twitteroauth/twitteroauth.php');
require_once('./config.php');

if((isset($_SESSION['oauthToken']) && $_SESSION['oauthToken'] !== NULL) && (isset($_SESSION['oauthTokenSecret']) && $_SESSION['oauthTokenSecret'] !== NULL)){

  $sUserId = $_SESSION['userId'];
  $sScreenName = $_SESSION['screenName'];

echo <<< EOF
<p>$sUserId / $sScreenName</p>
<p><a href="./logout.php">logout</a></p>
EOF;

}else{
  $oOauth = new TwitterOAuth(CONSUMER_KEY,CONSUMER_SECRET);
  $oOauthToken = $oOauth->getRequestToken(CALLBACK_URL);

  $_SESSION['requestToken'] = $sToken = $oOauthToken['oauth_token'];
  $_SESSION['requestTokenSecret'] = $oOauthToken['oauth_token_secret'];

  if(isset($_GET['authorizeBoolean']) && $_GET['authorizeBoolean'] != ''){
    $bAuthorizeBoolean = false;
  }else{
    $bAuthorizeBoolean = true;
  }
  $sUrl = $oOauth->getAuthorizeURL($sToken, $bAuthorizeBoolean);

echo <<< EOF
<p><a href="$sUrl">Login</a></p>
EOF;

}

?>
