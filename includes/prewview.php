<?php
$kjurl=$_GET['surl'];
$ming=$_GET['ming'];
require_once("../config.php");//引入配置文件
require_once('function.php');//引入函数库
require_once('connect.php');
    require_once("qiniu/rs.php");
date_default_timezone_set("Asia/Shanghai");//设置时区
error_reporting(0);//设置错误级别0

$arr=explode(".",$ming);
if ($arr[1] == "png" || $arr[1] == "jpg" || $arr[1] == "gif" || $arr[1] == "jpeg" || $arr[1] == "bmp" || $arr[1] == "PNG" || $arr[1] == "JPG" || $arr[1] == "GIF" || $arr[1] == "JPEG" || $arr[1] == "BMP"){
				include("../content/common/pic.php");

				
				}else if ($arr[1] == "swf" || $arr[1] == "SWF"){
				include("../content/common/else.php");
					}else if ($arr[1] == "mp3" || $arr[1] == "wav" || $arr[1] == "MP3" || $arr[1] == "WAV" || $arr[1] == "oga" || $arr[1] == "OGA" || $arr[1] == "m4a" || $arr[1] == "M4A"){
				include("../content/common/player.php");
			}else if ($arr[1] == "flv" || $arr[1] == "FLV" || $arr[1] == "mp4" || $arr[1] == "MP4" || $arr[1] == "m3u8" || $arr[1] == "M3U8" || $arr[1] == "webm" || $arr[1] == "WEBM" || $arr[1] == "ogg" || $arr[1] == "OGG"){
					include("../content/common/vplayer.php");
			}else{
								include("../content/common/else.php");			
			}
?>