<?php
/***
 * Funciones JS
 */

function jAlert(){
	echo '<script src="js/plugins/jquery.alerts-1.1/jquery.alerts.js" type="text/javascript"></script>'."\n";
	echo '<link href="js/plugins/jquery.alerts-1.1/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />'."\n";	
}

function jOsiris() {
	jAlert();
	echo '<script type="text/javascript" src="js/plugins/josiris.js"></script>'."\n";
}

function jQuery() {
	echo '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>'."\n";
}



/***
 * Funciones generales
 */

function curPage(){
	$archivos = explode("/", $_SERVER["PHP_SELF"]);
	$curPage = $archivos[count($archivos) -1];
	
	return $curPage;
}



/***
 * Funciones generales numericas
 */

function rango($x,$y){
	$arr = array();
	
	if($y > $x){
		while($x <= $y){
			$arr[] = $x;
			$x++;	
		}		
	} else {
		while($x >= $y){
			$arr[] = $x;
			$x--;	
		}		
	}
	
	return $arr;
}



/***
 * Funciones generales cadena
 */

function splitstring($str, $len = 145, $chr = " "){
	$arrayTexto = explode($chr,$str);
	$str = ''; 

	for($x = 0; $x < count($arrayTexto); $x++){
		if((strlen($str) + strlen($arrayTexto[$x])) > $len)
			break;
		if($x==0)
			$str .= $arrayTexto[$x];
		else
			$str .= $chr.$arrayTexto[$x];
	}
	return $str;
}

function gen_password($silabas= 3, $use_prefix = false)
{
	
	// Definimos la función a menos de que esta exista
	if (!function_exists('ae_arr'))
	{
	// Esta función devuleve un elemento aleatorio
	function ae_arr(&$arr)
	{
	return $arr[rand(0, sizeof($arr)-1)];
	}
	}
	
	// Prefijos
	$prefix = array('aero', 'anti', 'auto', 'bi', 'bio',
	'cine', 'deca', 'demo', 'contra', 'eco',
	'ergo', 'geo', 'hipo', 'cent', 'kilo',
	'mega', 'tera', 'mini', 'nano', 'duo');
	
	// Sufijos
	$suffix = array('on', 'ion', 'ancia', 'sion', 'ia',
	'dor', 'tor', 'sor', 'cion', 'acia');
	
	// Sonidos
	$vowels = array('a', 'o', 'e', 'i', 'u', 'ia', 'eo');
	
	// Consonantes
	$consonants = array('r', 't', 'p', 's', 'd', 'f', 'g', 'h', 'j',
	'k', 'l', 'z', 'c', 'v', 'b', 'n', 'm', 'qu');
	
	$password = $use_prefix?ae_arr($prefix):'';
	$password_suffix = ae_arr($suffix);
	
	for($i=0; $i<$silabas; $i++)
	{
	// Selecciona una consonante al azar
	$doubles = array('c', 'l', 'r');
	$c = ae_arr($consonants);
	if (in_array($c, $doubles)&&($i!=0)) {
	if (rand(0, 4) == 1) // 20% de probabiidad
	$c .= $c;
	}
	$password .= $c;
	//
	
	// Seleccionamos un sonido al azar
	$password .= ae_arr($vowels);
	
	if ($i == $silabas - 1) // Si el sufijo empieza con vocal
	if (in_array($password_suffix[0], $vowels)) // Añadimos una consonante
	$password .= ae_arr($consonants);
	
	}
	
	// Seleccionamos un sufijo aleatorio
	$password .= $password_suffix;
	
	return $password;
}

function get_folio(){
	$result = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
	return $result;
}

//concatena un zero a la izquierda del valor proporcionado
function zeroLeft($valor){
	if(strlen($valor) < 2){
		return "0" . $valor;
	}
	
	return $valor;
}

function toPermalink($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}
	$str = str_replace("ñ","n",$str);
	$str = str_replace("í","i",$str);
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	if(substr($clean, strlen($clean) - 1) == "-")
		return substr($clean, 0, strlen($clean) - 1);
		
	return $clean;
}



/***
 * Form helpers
 */

function selected($id_selected, $id_tocheck, $type = "selected"){
	if($id_selected == $id_tocheck){
		echo $type;
	}
	else {
		return;
	}
}



/***
 * Funciones Email
 */

function sendEmail($asunto, $email, $body, $from){
	$cabeceras = "From: {$from}\r\nContent-type: text/html\r\n";	
	mail($email,$asunto,$body,$cabeceras);	
}

function extract_emails($text) {
	$res = preg_match_all("/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i", $text, $matches);

	if ($res) {
		foreach(array_unique($matches[0]) as $email) {
			$emails[] = $email;
		}
	}
	else
		return null;
		
	return $emails;
}



/***
 * Funciones files
 */

function DownloadFile($file) { // $file = include path
    if(file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);
        exit;
    }
}

function enviar_mail($asunto, $body, $from, $to){	
	$mail = new PHPMailerLite(); // defaults to using php "Sendmail" (or Qmail, depending on availability)
	$mail->SetFrom($from[0], $from[1]);

	$address = $to;
	$mail->AddAddress($address, "");

	$mail->Subject    = $asunto;
	$mail->MsgHTML($body);

	if(!$mail->Send()) {
  		//echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  //echo "Mesage Enviado!";
	}
}

function getArrayColumns($arr, $cols = 2){
	$total = count($arr);

	$res = array();
	for($x = 0; $x < ($total + 1); $x += $cols){
		for($y = 0; $y < $cols; $y++){
			if(!empty($arr[$x + $y])){
				$res[$y][] = $arr[$x + $y];
			}
		}

	}
	
	return $res;
}

function cleanGigya($value){
	$value = str_replace("\"","'",$value);
	$value = str_replace(array("\r\n", "\n", "\r"), ' ', $value);
	
	return $value;
}