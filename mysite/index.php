<?php
session_start(); 
require_once("./layout/header.php");
require_once("./layout/top_menu.php");
require_once("./views/connect.php");

$filename="";
$filename1="";
if(isset($_GET["action"]))
{
	$filename = "./views/".$_GET["action"].".php";
	$filename1 = "./layout/".$_GET["action"]."php";
}

if(isset($_GET["action"]) && file_exists($filename))
{
	require_once($filename);
}

else if(isset($_GET["action"]) && file_exists($filename1)){
	require_once($filename1);
}

else
{
	require_once("./views/main.php");
}

require_once("./layout/footer.php");
