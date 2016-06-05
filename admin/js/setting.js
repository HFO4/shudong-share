function save(){

$.post("../includes/adminAction.php", $("#setting").serialize()+"&action=savesetting",
   function(data){
	var ge=data.split("|");
	if(ge[0]=="bad"){ 
	alert("保存失败，错误信息："+ge[1]);
	}else if (ge[0]=="ok"){ 
iosOverlay({
		text: "保存成功",
		duration: 2e3,
		icon: "images/check.png"
	});
	
	}
   });
}
