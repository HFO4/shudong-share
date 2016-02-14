<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>音频播放器 </title> 
      <link href="../includes/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
 </head> 
 <body>

<script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="../includes/js/jquery.jplayer.min.js"></script>
  <style type="text/css">
 body {
 margin:0px 0px 0px 0px;
font-family: '微软雅黑';


}

</style> 
<div style="height:110px;"></div>
<div align="center">

  <div id="jquery_jplayer_1" class="jp-jplayer"></div>
<div id="jp_container_1" style="width:405px;"class="jp-audio" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div class="jp-gui jp-interface">
			<div class="jp-controls">
				<button class="jp-play" role="button" tabindex="0">play</button>
				<button class="jp-stop" role="button" tabindex="0">stop</button>
			</div>
			<div class="jp-progress">
				<div class="jp-seek-bar">
					<div class="jp-play-bar"></div>
				</div>
			</div>
			<div class="jp-volume-controls">
				<button class="jp-mute" role="button" tabindex="0">mute</button>
				<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
				<div class="jp-volume-bar">
					<div class="jp-volume-bar-value"></div>
				</div>
			</div>
			<div class="jp-time-holder">
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-toggles">
					<button class="jp-repeat" role="button" tabindex="0">repeat</button>
				</div>
			</div>
		</div>
		<div class="jp-details">
			<div class="jp-title" aria-label="title">&nbsp;</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>
</div>
  <script language="JavaScript">  

$(document).ready(function(){

	$("#jquery_jplayer_1").jPlayer({
		ready: function (event) {
			$(this).jPlayer("setMedia", {
				title: "<?php echo $ming ?>",
				<?php echo $arr[1] ?>: "<?php echo $kjurl ;?>",

			}).jPlayer("play");
		},
		swfPath: "../../includes/js/jquery.jplayer.swf",
		supplied: "<?php echo $arr[1] ?>",
		wmode: "window",
		useStateClassSkin: true,
		autoBlur: false,

		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	});

});

</script>  
 </body>
</html>