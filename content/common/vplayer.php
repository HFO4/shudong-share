<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>视频播放器</title> 

 </head> 
 <body>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="ckplayer/ckplayer.js"></script>
  <style type="text/css">
 body {
 margin:0px 0px 0px 0px;
font-family: '微软雅黑';
}

</style> 

 <div id="m_player"></div>
  <script language="JavaScript">  

 var flashvars={
        f:'<?php echo $kjurl ?>',
        c:0,
        loaded:'loadedHandler'
    };
    var video=['<?php echo $kjurl ?>->video/<?php echo $arr[1] ?>'];
    CKobject.embed('ckplayer/ckplayer.swf','m_player','ckplayer_a1','700','395',false,flashvars,video);



</script>  
 </body>
</html>