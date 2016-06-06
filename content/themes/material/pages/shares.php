<?php
$pageval = '1';
if(isset($_GET['page'])){
	$pageval = $_GET['page'];
}
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=10; 
   
$numq=mysqli_query($con,"SELECT * FROM `sd_ss`");
$num = mysqli_num_rows($numq);


$page=($pageval-1)*$pagesize;
$page.=',';

if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}
$line="SELECT * FROM `sd_ss` ORDER BY `id` DESC limit $page $pagesize";
$pagenum=ceil($num/$pagesize);
$fileData = array();
$fileDataOne = array();
 $query=mysqli_query($con,$line);
      while($row=mysqli_fetch_assoc($query)){
		  $kk=$row["filekey"];
		  $juju="SELECT * FROM `sd_file` where key1 = '$kk'";
		
 $query1=mysqli_query($con,$juju);
    while($row1=mysqli_fetch_assoc($query1)){  
		  $ming=htmlspecialchars($row1['ming'],ENT_QUOTES,'utf-8');
		  $ftype = explode(".", $ming);
		$row['ftype'] = end($ftype);
	  }
$fileDataOne = $row;
	$fileData[] = $fileDataOne;
	}
$jilu ="共有 $num 条记录&nbsp;&nbsp;当前第 $pageval 页，共 $pagenum 页";
if($pageval=="1"){
    $pre =  "##";
}else{
	$pre =  $url."?id=explore&page=".($pageval-1);
}
if ($pageval==$pagenum){
	$ne =  "##";
}else{
    $ne =  $url."?id=explore&page=".($pageval+1);
}
$p = new PageTool($num,$pageval,$pagesize);

$smarty->template_dir = "./../content/themes/".$theme;
$head='<script type="text/javascript" src="./../includes/js/jquery-1.9.1.min.js"></script>';
$jscode=$tjcode;
$smarty->assign("tit", $tit);
$smarty->assign("zzurl", $url1); 
$smarty->assign("isVisitor", $isVisitor); 
$smarty->assign("userinfo", $userInfo); 
$smarty->assign("head", $head); 
$smarty->assign("fy", $p->show()); 
$smarty->assign("jilu", $jilu); 
$smarty->assign("pre", $pre); 
$smarty->assign("ne", $ne); 
$smarty->assign("filedata", $fileData); 
$smarty->assign("jscode", 'Powerd by <a target="_blank" href="http://yun.aoaoao.me">树洞外链</a> '.$jscode); 
$smarty->display("fileAll.html");
?>