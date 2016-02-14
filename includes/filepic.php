<?php

$t="";
$t=strtolower($_GET['t']);
if($t=="jpg" || $t=="jpge" || $t=="gif" || $t=="png" || $t=="bmp"){ 
$url="../content/images/pic.png";
}else if($t=="zip"){ 
$url="../content/images/zip.png";
}else if($t=="rar"){ 
$url="../content/images/rar.png";
}else if($t=="apk"){ 
$url="../content/images/apk.png";
}else if($t=="doc" || $t=="docx" || $t=="dot" || $t=="wps" || $t=="wpt"){ 
$url="../content/images/doc.png";
}else if($t=="mov" || $t=="mp4" || $t=="flv" || $t=="rmvb" || $t=="avi" || $t=="mkv" || $t=="f4v" || $t=="mpeg" || $t=="wmv" || $t=="m3u8" || $t=="webm" || $t=="ogg"){ 
$url="../content/images/mov.png";

}else if($t=="mp3" || $t=="flac" || $t=="oga" || $t=="m4a" || $t=="mid"){ 
$url="../content/images/mp3.png";
}else if($t=="pdf"){ 
$url="../content/images/pdf.png";
}else if($t=="ppt" || $t=="pptx" || $t=="pps" || $t=="dps" || $t=="pot"){ 
$url="../content/images/ppt.png";
}else{ 

$url="../content/images/else.png";
}




header("Location: ".$url); 
?>