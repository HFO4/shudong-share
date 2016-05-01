<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <title>音频播放器 </title> 
         <link rel="stylesheet" href="../includes/APlayer/APlayer.min.css">
      </head> 
 <body>

<script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>
<script src="../includes/APlayer/APlayer.min.js"></script>
  <style type="text/css">
 body {
 margin:0px 0px 0px 0px;
font-family: '微软雅黑';


}

</style> 
<div style="height:110px;"></div>
<div align="center">

  <div id="m_player">
  <div id="aplayer" class="aplayer"></div>
</div>
</div>
  <script language="JavaScript">  
var ap1 = new APlayer({
    element: document.getElementById('aplayer'),
    narrow: false,
    autoplay: true,
    showlrc: false,
    mutex: true,
    theme: '#b2dae6',
    music: {
        title: '<?php echo $ming ?>',
        author: '',
        url: '<?php echo $kjurl ;?>',
        
    }
});

ap1.init();


</script>  
 </body>
</html>