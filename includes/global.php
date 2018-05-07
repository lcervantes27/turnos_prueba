<?php
@session_start();
header ('Content-type: text/html; charset=utf-8');
setlocale(LC_ALL, 'en_US.UTF8');
$page = curPage(); 
$obj = new db();
//$id_cam = $obj->get_var("select id_campana from campana where borrado = 0 order by id_campana desc limit 1");

if($show_error)
	error_reporting(E_ALL);
else 
	error_reporting(0);

	
	
//usuario



//mobile devices detect	

$detect = new Mobile_Detect();
if(!$_SESSION["isMobile"]){
	$_SESSION["isMobile"] = $detect->isMobile();	
}
if(!$_SESSION["isTablet"]){
	$_SESSION["isTablet"] = $detect->isTablet();
}
if(!$_SESSION["isIphone"]){
	$_SESSION["isPhone"] = $detect->isiPhone();
}

if(empty($_COOKIE["pid"])){
	$fecha=mktime(0,0,0,1,1,2020);
	setcookie("pid", uniqid (rand(), true), $expire);
}
