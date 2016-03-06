<?php		
header("Content-type: image/png");			
	session_start();
	$codigoCaptcha = substr(md5( time() ) ,0,9);
	$_SESSION['captcha'] = $codigoCaptcha;
	$image_captcha_directory = "http://act.betel-bauru.com.br/wp-content/themes/twentytwelve-chield/images/fundocaptch.png";
	//echo "<img src=\"http://act.betel-bauru.com.br/wp-content/themes/twentytwelve-chield/images/fundocaptch.png\" >";
	$imagemCaptcha = imagecreatefrompng("$image_captcha_directory");
	$fonteCaptcha = imageloadfont("anonymous.gdf");
	$corCaptcha = imagecolorallocate($imagemCaptcha,255,0,0);
	imagestring($imagemCaptcha,$fonteCaptcha,15,5,$codigoCaptcha,$corCaptcha);
	imagepng($imagemCaptcha);
	imagedestroy($imagemCaptcha);
?>