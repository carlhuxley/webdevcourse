<?php

    session_start();

    require_once ("src/TwitterOAuth.php");
    $apikey="";
    $apikey="";
    $accesstoken="";
    $accesssecret="";

    $connection= new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesssecret);

    print_r($connection);

 ?>
