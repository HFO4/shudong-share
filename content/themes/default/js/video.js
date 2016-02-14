 var load="0";

function fzcg(){
	iosOverlay({
		text: "复制成功",
		duration: 2e3,
		icon: "./../content/themes/default/images/check.png"
	});
}
$(function () {
  $('[data-toggle="popover"]').popover({html :true})
   $('[data-toggle="tooltip"]').tooltip({container :'body'})

})
function show_fileurl(){ 
	 $("#guanli").hide();
	    $("#filecode").hide();
	    	    $("#xiangqing").hide();
    $("#fileurl").show();
$("#yuantu").focus();

}
function creatopen(){ 
	    $("#creat").hide();
    $("#enter").show();
    $("#ftype").val('open');
}
function creatlock(){ 
	    $("#creat").hide();
    $("#enter").show();
    $("#ftype").val('lock');
}
function getback(){ 
	  
    $("#enter").hide();  
    $("#creat").show();

}
function show_filecode(){ 
	 $("#guanli").hide();
    $("#fileurl").hide();
    $("#filecode").show();
    	    $("#xiangqing").hide();
}

function showshare(){ 
$('#share').modal('toggle')

}
function guanli(){ 
	 $("#guanli").show();
    $("#fileurl").hide();
      $("#filecode").hide();
          	    $("#xiangqing").hide();
}

