<?php
 
 error_reporting(0);//设置错误级别0
$sqlip=$_POST['sqlip'];
$sqlid=$_POST['sqlid'];
$sqlpass=$_POST['sqlpass'];
$sqlname=$_POST['sqlname'];
$zzurl=$_POST['zzurl'];
$yhm=$_POST['yhm'];
$mm=$_POST['mm'];
if($sqlip==""||$sqlid==""||$sqlname==""||$zzurl==""||$yhm==""||$mm==""){ 
echo "bad|信息填写不完整"; 
exit();
}
if (file_exists("../config.php")){
			echo"bad|config.php文件已存在，有可能为老版本残留，请您备份后手动删除";
			exit();
			}
@$con = mysql_connect($sqlip,$sqlid,$sqlpass);
if (!$con)
  {
  die('bad|无法连接数据库，错误信息：' . mysql_error()."请检查数据库信息是否正确<br>");
  }
 mysql_select_db($sqlname, $con);
 mysql_query("set names utf8");//设置编码
 $ju="

CREATE TABLE IF NOT EXISTS `sd_file` (
`id` int(11) NOT NULL,
  `ming` text NOT NULL,
  `key1` text NOT NULL,
  `uploadip` text,
  `uploadtime` text,
  `cishuo` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sd_setting` (
  `id` int(1) NOT NULL,
  `main_tit` text COLLATE utf8_bin NOT NULL,
  `tit_2` text COLLATE utf8_bin NOT NULL,
  `keyword` text COLLATE utf8_bin NOT NULL,
  `desword` text COLLATE utf8_bin NOT NULL,
  `kjming` text COLLATE utf8_bin NOT NULL,
  `ak` text COLLATE utf8_bin NOT NULL,
  `sk` text COLLATE utf8_bin NOT NULL,
  `kjurl` text COLLATE utf8_bin NOT NULL,
  `zzurl` text COLLATE utf8_bin NOT NULL,
  `admin_name` text COLLATE utf8_bin NOT NULL,
  `admin_password` text COLLATE utf8_bin NOT NULL,
  `theme` text COLLATE utf8_bin NOT NULL,
  `upload_minetype` text COLLATE utf8_bin NOT NULL,
  `upload_size` text COLLATE utf8_bin NOT NULL,
  `upload_fpsize` text COLLATE utf8_bin NOT NULL,
  `autoname` text COLLATE utf8_bin NOT NULL,
  `tjcode` text COLLATE utf8_bin NOT NULL,
  `morelimt` text COLLATE utf8_bin NOT NULL,
  `leixing` text COLLATE utf8_bin NOT NULL,
  `daxiao` text COLLATE utf8_bin NOT NULL,
  `share` text COLLATE utf8_bin NOT NULL,
  `version` text COLLATE utf8_bin NOT NULL,
  `notice` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `sd_setting` (`id`, `main_tit`, `tit_2`, `keyword`, `desword`, `kjming`, `ak`, `sk`, `kjurl`, `zzurl`, `admin_name`, `admin_password`, `theme`, `upload_minetype`, `upload_size`, `upload_fpsize`, `autoname`, `tjcode`, `morelimt`, `leixing`, `daxiao`, `share`, `version`, `notice`) VALUES
(0, '树洞外链', '免费高速外链平台', '树洞, 树洞外链, 免费外链, 免费图床, QQ空间背景音乐, QQ空间背景音乐外链, 图片外链', '树洞外链允许你将图片、音乐、flash上传到服务器并免费高速的在站外调用，你可以用它免费设置自己喜欢的QQ空间音乐', '', '', '', '', '".$zzurl."', 'admin', '', 'default', 'jpg,gif,png,bmp,jpge,zip,mp3,swf,wav,rar,dll,mp4,flv', '40', '4', 'true', '', 'false', 'image/*', '2', 'true', '2.0|3|3', '');

CREATE TABLE IF NOT EXISTS `sd_ss` (
`id` int(11) NOT NULL,
  `sskey` text NOT NULL,
  `fname` text NOT NULL,
  `filekey` text NOT NULL,
  `sstime` text NOT NULL,
  `downloadnum` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sd_sskey` (
`id` int(11) NOT NULL,
  `sskey` text NOT NULL,
  `filekey` text NOT NULL,
  `passwd` text NOT NULL,
  `sstime` text NOT NULL,
  `downloadnum` text NOT NULL,
  `fname` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `sd_user` (
`id` int(11) NOT NULL,
  `username` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sd_user` (`id`, `username`, `pwd`) VALUES ('1', '".$yhm."', '".md5($mm."sdshare")."');
ALTER TABLE `sd_file`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`);

ALTER TABLE `sd_setting`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `sd_ss`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `sd_sskey`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `sd_user`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `sd_file`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
ALTER TABLE `sd_ss`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
ALTER TABLE `sd_sskey`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
ALTER TABLE `sd_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT
 ";
 $juju=explode(";",$ju);
 $num=count($juju);
 $x=1;

 while($x<=$num){ 
 $t=$x-1;

 
 if(!mysql_query($juju[$t],$con)){
	 
	 die("bad|无法创建数据表：".mysql_error());
	 }
	 
$x++;
 }
@$fopen  =   fopen("../config.php",   'wb ');//新建文件命令 
if (!$fopen){
	echo "bad|无法创建config.php，请检查你的权限";
	}
	
	
	$val='<?php
$sqlid="'.$sqlid.'";//数据库用户名
$sqlpass="'.$sqlpass.'";//数据库密码
$sqlname="'.$sqlname.'";//数据库名
$sqlip="'.$sqlip.'";//数据库服务器

?>';
fputs($fopen,$val);//向文件中写入内容; 
fclose($fopen); 
unlink("../index.php");

rename('../index_s.php','../index.php');

function delDirAndFile( $dirName )  
{  
if ( @$handle = opendir( "$dirName" ) ) {  
   while ( false !== ( $item = readdir( $handle ) ) ) {  
   if ( $item != "." && $item != ".." ) {  
   if ( is_dir( "$dirName/$item" ) ) {  
   delDirAndFile( "$dirName/$item" );  
   } else {  
   if( unlink( "$dirName/$item" )){} ;  
   }  
   }  
   }  
   closedir( $handle );  
   if( @rmdir( $dirName )){} ;  
}  
}  
	delDirAndFile( '../install');  
echo "ok|ok";
	
?>