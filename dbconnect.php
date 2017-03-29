<?php
$myServer = "75.148.178.12";
$myUser = "amsdbusr";
$myPass = "@M$dbu$6@2016";
$myDB = "AMS"; 

//connection to the database
$dbhandle = mssql_connect($myServer, $myUser, $myPass)
  or die("Couldn't connect to SQL Server on $myServer"); 


$selected = mssql_select_db($myDB, $dbhandle)
  or die("Couldn't open database $myDB"); 

?>
