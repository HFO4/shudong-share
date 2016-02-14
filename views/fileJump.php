<?php
$key = $_GET['key'];
$ming = $_GET['ming'];
$fileExplode = explode(".", $ming);
$fileType=end($fileExplode);
if ($fileType == "png" || $fileType == "jpg" || $fileType == "gif" || $fileType == "jpeg" || $fileType == "bmp" || $fileType == "PNG" || $fileType == "JPG" || $fileType == "GIF" || $fileType == "JPEG" || $fileType == "BMP") {
     header("location: pic.php?key=".$key);
} else if ($fileType == "swf" || $fileType == "SWF") {
    header("location: else.php?key=".$key);
} else if ($fileType == "mp3" || $fileType == "wav" || $fileType == "MP3" || $fileType == "WAV" || $fileType == "oga" || $fileType == "OGA" || $fileType == "m4a" || $fileType == "M4A") {
    header("location: mp3.php?key=".$key);
} else if ($fileType == "flv" || $fileType == "FLV" || $fileType == "mp4" || $fileType == "MP4" || $fileType == "m3u8" || $fileType == "M3U8" || $fileType == "webm" || $fileType == "WEBM" || $fileType == "ogg" || $fileType == "OGG") {
    header("location: video.php?key=".$key);
} else {
   header("location: else.php?key=".$key);
}
?>