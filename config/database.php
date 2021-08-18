<?php
define('DB_SERVER','bythdxjdlahko2wjywgd-mysql.services.clever-cloud.com');
define('DB_USERNAME','u9gnmwsnscx7lky8');
define('DB_PASSWORD','Z4cZTVnKTL1Ep0zSdjdd');
define('DB_NAME','bythdxjdlahko2wjywgd');

try
{
  $pdo=new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
  die("ERROR:Could not connect".$e->getMessage());
}

?>