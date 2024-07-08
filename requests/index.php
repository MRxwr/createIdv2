<?php 
header("Content-Type: application/json; charset=UTF-8");
require_once("../admin/includes/config.php");
require_once("../admin/includes/functions.php");

if ( isset(getallheaders()["createidheader"]) ){
	$headerAPI =  getallheaders()["createidheader"];
}else{
	$error = array("msg"=>"Please set headres");
	echo outputError($error);die();
}

if ( $headerAPI != "createIdCreate" ){
	$error = array("msg"=>"headers value is wrong");
	echo outputError($error);die();
}

// get viewed page from pages folder \\
if( isset($_GET["a"]) && searchFile("views","blade{$_GET["a"]}.php") ){
	require_once("views/".searchFile("views","blade{$_GET["a"]}.php"));
}else{
	echo outputError(array("msg" => "404 api Not Found"));
}
?>