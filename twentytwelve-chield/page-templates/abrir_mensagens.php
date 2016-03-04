<?php
/**
 * Template Name: Abrir Mensagens
 *
 * @package WordPress
 * @subpackage 
 * @since 
 */
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>

	<?php

		$id_post = $_GET["id_post"];
		/*echo $id_post."<br>";
		echo "id_post = ".$id_post;*/
		
		$content = sh_the_content_by_id($id_post);

		$rest = explode(" ", $content);
		//$rest = substr($content, 38, 41);
		//echo $rest[3];
		$resultado = $rest[3];
		$array_replace = array('src="', '"', "https://www.youtube.com/embed/");
		$replace = str_replace($array_replace, "", $resultado);

		$dispositivo = verificaDispositivo();
		
		console.log($dispositivo);
		
		if ($dispositivo) {
			$width = 360;
			$height = 240;
		}else{
			$width = 640;
			$height = 360;
		} ?>
			
		<script>
			setTimeout(function(){ 
			
			console.log(window.innerHeight);
			console.log(window.innerWidth);	

			}, 3000);
			

			  // 2. This code loads the IFrame Player API code asynchronously.
			  var tag = document.createElement('script');

			  tag.src = "https://www.youtube.com/iframe_api";
			  var firstScriptTag = document.getElementsByTagName('script')[0];
			  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			  // 3. This function creates an <iframe> (and YouTube player)
			  //    after the API code downloads.
			  var player;
			  function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {
				  height: <?php echo $height ?>,
				  width: '<?php echo $width ?>',
				  videoId: '<?php echo $replace ?>',
				  events: {
					'onReady': onPlayerReady,
					'onStateChange': onPlayerStateChange
				  }
				});
			  }

			  // 4. The API will call this function when the video player is ready.
			  function onPlayerReady(event) {
				//event.target.playVideo();
			  }

			  // 5. The API calls this function when the player's state changes.
			  //    The function indicates that when playing a video (state=1),
			  //    the player should play for six seconds and then stop.
			  var done = false;
			  function onPlayerStateChange(event) {
				if (event.data == YT.PlayerState.PLAYING && !done) {
				  setTimeout(stopVideo, 6000);
				  done = true;
				}
			  }
			  function stopVideo() {
				player.stopVideo();
			  }
		</script>	
	</head>	
	</body>	
			<div id="player"></div>
	</body>
</html>