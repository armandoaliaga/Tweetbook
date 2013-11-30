<?php
//CAMBIAR ENVIRONMENT SEGUN SE NECESITE
$environment = "development";
if($environment=="development")
{
    $GLOBALS['db_name'] = 'tweetbook';
    $GLOBALS['db_host'] = 'localhost';
    $GLOBALS['db_user'] = 'root';
    $GLOBALS['db_password'] = '';
}
else if ($environment=="production")
{
    $GLOBALS['db_name'] = 'tweetbook';
    $GLOBALS['db_host'] = '185.28.20.60';
    $GLOBALS['db_user'] = 'u827889968_tweet';
    $GLOBALS['db_password'] = 'tweetbook1234';
}
?>
