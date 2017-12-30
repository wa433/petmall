//根据sessionStorage判断用户是否登录
(()=>{
  if(sessionStorage.getItem("uname")){
	var uname=sessionStorage.getItem("uname");
	console.log($(".denglu").children(":last"));
   $(".denglu").children(":nth-child(4)").html(`<a href="login.html">注销</a>`);
   $(".denglu").children(":last").html(`<a>欢迎您:`+uname+`</a>`);
  }
  $(".denglu").on("click","li:nth-child(4) a",function(){
    sessionStorage.removeItem("uname");
  })
})();
//页面头部搜索功能
(()=>{
  $("#search").click(function(){
    var kw=$(".sousuok").val();
	if(kw!=""){
	 location.href="products.html?kw="+kw;
	}
  });
})();