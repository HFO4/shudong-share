 var p = "login";
 function login(){
	$("#login-button").attr("disabled","true");
	$.post("../includes/userAction.php", $("#login").serialize(), function(data) {
		var ge=eval('(' + data + ')'); 
		if(ge.code=="bad"){
			$.snackbar({
                            content: "登陆失败",
                            timeout: 2000
                        });
			$("#login-button").removeAttr("disabled");

		}else if (ge.code=="ok") {
			$("#login-button").html('即将跳转...');
            window.history.go(-1);

		}
	});
}
$(document).keypress(function(e) {   
	if(e.which == 13) {  
		if(p=="login"){
		login();
	}else{
		reg();
	}
	}; 
}); 
function showreg(){ 
	$("#loginform").hide();
	$("#regform").show();
	p="reg";
}
function showlogin(){ 
	$("#regform").hide();
	$("#loginform").show();
	p="login";
}
 function reg(){
	$("#reg-button").attr("disabled","true");
	var re =  /^([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|_|.]?)*[a-zA-Z0-9]+.[a-zA-Z]{2,3}$/;
	var um=$("input[name='username-reg']").val();
	var pw=$("input[name='password-reg']").val();
	var pw1=$("input[name='password-check']").val();
	if(um.match(re) == null){
		$.snackbar({
                            content: "电子邮箱格式不正确！",
                            timeout: 2000
                        });
	
		$("#reg-button").removeAttr("disabled");
	}else if(pw!=pw1){
			$.snackbar({
                            content: "两次密码输入不一致！",
                            timeout: 2000
                        });
	

		$("#reg-button").removeAttr("disabled");
	}else{
		$.post("../includes/userAction.php", $("#reg").serialize(), function(data) {
			var ge=eval('(' + data + ')'); 
			if(ge.code=="bad"){
				
						$.snackbar({
                            content: ge.message,
                            timeout: 2000
                        });
				$("#reg-button").removeAttr("disabled");

			}else if (ge.code=="ok") {
			$.snackbar({
                            content: "注册成功",
                            timeout: 2000
                        });
				$("#regform").fadeOut();
	$("#loginform").fadeIn();
			}
		});
	}
}