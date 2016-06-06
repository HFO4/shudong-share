 <?php
 
 
 error_reporting(0);//设置错误级别0

require_once("../config.php");//引入配置文件
require_once('../includes/function.php');//引入函数库
require_once("../includes/connect.php");
require_once("../includes/usercheck.php");

$result = mysqli_query($con,"SELECT * FROM sd_setting");//获取数据
while($row = mysqli_fetch_assoc($result))
  { 
$kjurl= $row['kjurl'];

}

 
 
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>分享列表</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

 



    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">



    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
        <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
          <script type="text/javascript" src="js/bootstrap.min.js"></script> 


    <!-- Morris Charts JavaScript -->


      <link rel="stylesheet" href="css/iosOverlay.css" /> 
    <script type="text/javascript" src="js/iosOverlay.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <style>

	body {
	background-color: #FFFFFF;
}
    </style>
</head>
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">分享管理</h1>
     
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="share_ss.php" >公开分享</a>
                                </li>
                                <li class="active"><a href="#" >私密分享</a>
                                </li>
                              
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                     <div class="table-responsive">
                                     <br>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                                                
                                                                                 <th>分享文件名</th>
                                            <th>源文件名</th>
                                            <th>密码</th>
                                            <th width="12%">分享日期</th>
                                            <th>下载次数</th>
                                             <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
   <?php
  
$url=$_SERVER["REQUEST_URI"];
$url=parse_url($url);
$url=$url[path];
$pagesize=10; 
   
$numq=mysqli_query($con,"SELECT * FROM `sd_sskey`");
$num = mysqli_num_rows($numq);

if($_GET[page]){
$pageval=$_GET[page];
$page=($pageval-1)*$pagesize;
$page.=',';
}
if($num > $pagesize){
 if($pageval<=1)$pageval=1;
}


$line="SELECT * FROM `sd_sskey` ORDER BY `id` DESC limit $page $pagesize";
$pagenum=ceil($num/$pagesize);

 $query=mysqli_query($con,$line);
      while($row=mysqli_fetch_assoc($query)){
		  $kk=$row["filekey"];
		  $juju="SELECT * FROM `sd_file` where key1 = '$kk'";
		
 $query1=mysqli_query($con,$juju);
    while($row1=mysqli_fetch_assoc($query1)){  
		  $ming=htmlspecialchars($row1['ming'],ENT_QUOTES,'utf-8');
	  }
   echo '
 <tr>
 	<td>'.$row["id"].'</td>
		<td>'.htmlspecialchars($row["fname"],ENT_QUOTES,utf-8).'</td>
	
	<td><a href="../views/fileJump.php?ming='.$ming.'&key='.$kk.'" target="new" >'.$ming.'</a></td>
		<td>'.$row["passwd"].'</td>
	<td>'.$row["sstime"].'</td>
	<td>'.$row["downloadnum"].'</td>
	<td><div class="btn-group">
                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                        操作
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="../includes/admin_del_share.php?key='.$row["sskey"].'&type=sskey">删除分享</a>
                                        </li>
                                        <li><a target="new" href="../s.php?k='.$row["sskey"].'">查看分享</a>
                                        </li>
                                       
                                       
                                    </ul>
                                </div></td>
 
 </tr>  
   
   
   
   
   ';
   
	 }
   
   
   ?>
                                </tbody>
                                </table>
                                 <div style="float:left;position:relative; top:20px;"><h5>共有<?php echo $num ?>条记录&nbsp;&nbsp;当前第<?php echo $pageval ; ?>页，共<?php echo $pagenum ?>页</h5> </div>
                            <nav>
  <ul style="float:right;"class="pagination">
    <li>
      <a href="<?php
      if($pageval=="1"){
		  echo "#";
		  
		  }else{
			  echo $url."?page=".($pageval-1);
			  }
	  ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    
    <?php
    $p = new PageTool($num,$pageval,$pagesize);
	echo $p->show();
    
    ?>
    
 
    <li>
      <a href="<?php
       if ($pageval==$pagenum){echo "#";}else{
			  echo $url."?page=".($pageval+1);
	   }
	  
	  
	  
	  ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav><br>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
              
                                </div>
                               
                            </div>
                     
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
<!-- /#page-wrapper -->