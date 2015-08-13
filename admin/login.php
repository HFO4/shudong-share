
﻿<!DOCTYPE html>
<html lang="en">
 <head> 
  <meta charset="UTF-8" /> 
  <title>登陆管理中心 - 树洞外链</title> 
  <meta name="renderer" content="webkit" /> 
  <link href="favicon.ico" rel="shortcut icon" /> 
  <link rel="stylesheet" href="../content/themes/default/bootstrap/css/bootstrap.css" /> 
  <link rel="stylesheet" href="css/login.css" />
 </head>
        <script type="text/javascript" src="../includes/js/jquery-1.9.1.min.js"></script>
          <script type="text/javascript" src="../content/themes/default/bootstrap/js/bootstrap.min.js"></script> 



<body>
<div align="center">
	<div class="headd">
		<div class="logo"></div>
		<div class="logo-text">
			<div class="text-up"><strong>树洞外链</strong></div>
			<div class="text-down" align="right">管理中心</div>
		</div>
	</div>

	<div class="bd">
		<form id="login"class="dd">
		  <div class="form-group" >
		    <label class="sr-only" for="exampleInputAmount">username</label>
		    <div class="input-group">
		      <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
		      <input style="width:245px;"type="text" class="form-control" name="username" placeholder="用户名">
		    </div>
		  </div>
		    <div class="form-group">
		    <label class="sr-only" for="exampleInputAmount">username</label>
		    <div class="input-group">
		      <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
		      <input type="password" style="width:245px;"class="form-control" name="password" placeholder="密码">
		    </div>
		  </div>
		  <button style="width:285px;"id="login-button"class="btn btn-primary" onclick="login();">登陆</button>
		</form>
	</div>
</div>


</body>

<script>
	

 function login(){
 	$("#login-button").attr("disabled","true");
$.post("../includes/login.php", $("#login").serialize(), function(data) {
	var ge=data.split(".");
if(ge[1]=='1'){
	
$("#login-button").removeAttr("disabled");
	alert(ge[2]);
	
}else if(ge[1]=='999'){

}else if(ge[1]=='2'){
	
		$("#login-button").html('即将跳转...');
            location.href="index.php";  
	}
});}

   $(document).keypress(function(e) {  
    // 回车键事件  
       if(e.which == 13) {  
login();
       }  
   }); 

</script>