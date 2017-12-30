(()=>{
$("#header").load("data/header.php");
$("#footer").load("data/footer.php");
 var kw=decodeURIComponent(location.search.split("=")[1]);
 function loadProductsPage(pno){
 console.log(kw);
 $.ajax({
   type:"GET",
   url:"data/products_page.php",
   data:{kw:kw,pno:pno},
   success:function(data){
    pageCount=data.pageCount;
	console.log(data);
    var html="";
	for(var obj of data.data){
	 html+=`<div class="col-md-4 product_show">
				    <a href="${obj.href}"><img src="${obj.img}" /></a>
						<p class="product_price">¥${obj.price}</p>
						<p><a href="${obj.href}">${obj.title}
            </a></p>
						<p>总销量:<span class="sale_count">${obj.sold_count}</span> <a href="" class="comment">评价:${obj.comment_count}</a></p>
				 </div>`;
	}
	$("#p-list").html(html);
//	动态加载页码
   var html="";
   html+=`<li><a href="" class="site">上一页</a></li>`;
   if(data.pno-2>0){html += `<li><a href="${data.pno-2}">${data.pno-2}</a></li>`;}
   if(data.pno-1>0){html += `<li><a href="${data.pno-1}">${data.pno-1}</a></li>`;}
   html+=`<li><a href="${data.pno}" class="active">${data.pno}</a></li>`;
   if(data.pno+1<=data.pageCount){html += `<li><a href="${data.pno+1}">${data.pno+1}</a></li>`;}
   if(data.pno+2<=data.pageCount){html += `<li><a href="${data.pno+2}">${data.pno+2}</a></li>`;}
   html+=`<li><a href="" class="site">下一页</a></li>`;
   $("#yema").html(html);
   },
   error:function(a,b,c){
//    alert("网络出现错误,请检查");
		console.log(a,b,c);
   }
  });
 }
 loadProductsPage(1);
//为页码绑定单击事件
  $("#yema").on("click","li a:not(.site)",function(e){
     e.preventDefault();
	 var pno=$(this).attr("href");
	 console.log(pno);
	 loadProductsPage(pno);
 }).on("click","li a:first",function(e){
	 //实现上一页的功能
	  e.preventDefault();
    var pno=$("#yema .active").attr("href");
	loadProductsPage(pno-1);
  }).on("click","li a:last",function(e){
    //实现下一页
     e.preventDefault();
     var pno=parseInt($("#yema .active").attr("href"));
	 console.log(pageCount);
	 if(pno+1>=pageCount){
	  loadProductsPage(pageCount);
	 }else if(pno+1<=pageCount){
	   loadProductsPage(pno+1);
	 }
 });
 if(kw=="woju")
  $("#title").html("宠物窝具").css("color","#FF9501");
 else if(kw=="cloth")
  $("#title").html("宠物服饰").css("color","#FF9501");
 else if(kw=="clean")
  $("#title").html("美容清洁").css("color","#FF9501");
 else if(kw=="food")
  $("#title").html("美味零食").css("color","#FF9501");
 else
  $("#title").html("宠物玩具").css("color","#FF9501");
})();

 

