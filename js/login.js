(()=>{
	$("#uname").blur(function(){
	if($("#uname").val()==""){
	  $("#uname").parent().parent().find("span").html("用户名不能为空").removeClass("msg-default").addClass("msg-err");
	}else{
	   $("#uname").parent().parent().find("span").html("").removeClass("msg-err").removeClass("msg-default");
	}
	});
    $("#upwd").blur(function(){
	if($("#upwd").val()==""){
	  $("#upwd").parent().parent().find("span").html("密码不能为空").removeClass("msg-default").addClass("msg-err");
	}else{
	  $("#upwd").parent().parent().find("span").html("").removeClass("msg-default").removeClass("msg-err"); 
	}
	});
   $("#btn_login").click((e)=>{
    e.preventDefault();
    $.ajax({
    type:"POST",
	data:{uname:$("#uname").val(),upwd:$("#upwd").val()},
	url:"data/login.php",
	success:function(data){
		console.log(data);
	  if(data.code==200){
		  //console.log(data.msg);
	   location.href="index.html";
	   sessionStorage.setItem("uname",$("#uname").val());
	  }else{
	   alert(data.msg);
	  }
	},
	error:function(){
	 alert("网络出现错误,请检查网络");
	}
   });
  });
})();
