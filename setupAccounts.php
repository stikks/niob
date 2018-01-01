<?php
/**
 * Created by PhpStorm.
 * User: stikks
 * Date: 12/11/17
 * Time: 2:36 PM
 */
$APIToken = "4b9RH5185b37e27314d6585aa0bc10f2d9518"; // PHPHive Truecaller API Token, Obtain it from https://tcapi.phphive.info/console/
$no = "07055784399"; // Any Number You want to Search// echo Details like Name, Internet Address ( including Profile Picutre, Email, Facebook & Twitter ), Spam Score, Spammer Type etc.
$uri = 'https://tcapi.phphive.info/'.$APIToken.'/search/'.$no;
$ch = curl_init($uri);
curl_setopt_array($ch, array(
    CURLOPT_HTTPHEADER  => array('X-User: PHPHive'),
    CURLOPT_RETURNTRANSFER  =>true,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_VERBOSE     => 1
));
$response = curl_exec($ch);
curl_close($ch);
var_dump($response);
exit();
?>