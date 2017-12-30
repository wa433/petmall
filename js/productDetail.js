(()=>{
$("#header").load("data/header.php");
$("#footer").load("data/footer.php");
var kw=location.search.slice(1);
 $.ajax({
  type:"GET",
  url:"data/productDetail.php?"+kw,
  success:function(data){
   console.log(data);
   var html=`<img src="${data.img}">`;
   $(".big-img.fang").html(html);
   var html=`¥${data.price}`;
   $("#price").html(html);
   $(".d-title").html(`${data.title}`);
   var html=`<img style="width:1505px;height:1505px;" src="${data.img}" alt="" />`;
   $("#big-show").html(html);
  },
  error:function(){
   alert("网络出现错误");
  }
 }).then(()=>{
$("#jia").click(function(){
  var n=parseInt($(".count").html());
  n++;
  $(".count").html(n);
});
$("#jian").click(function(){
  var n=parseInt($(".count").html());
  if(n>0){
    n--;
  }
   $(".count").html(n);
});
$(".spec ul li a").click(function(e){
	e.preventDefault();
  $(this).addClass("selected");
// console.log($(this).parent().siblings());
 $(this).parent().siblings().children().removeClass("selected");
});
$(".small-img img").click(function(){
	var src=$(this).attr("src");
	console.log(src);
   $("p.big-img img").attr("src",src);
   $("#big-show img").attr({src});
  })
});
////$(".coverDiv").hover(function(){
////	console.log("555");
//// $("#drag").toggle();
//});
$(".coverDiv").hover(function(){$("#drag").toggle();
$("#big-show").toggle();})
.mousemove(function(e){
  var mx=e.offsetX,my=e.offsetY,$drag=$("#drag");
  var MaxLeft=$(".coverDiv").width()-$drag.width(),MaxTop=$(".coverDiv").height()-$drag.height();
  console.log(MaxLeft,MaxTop);
  var left=mx-(0.5*$drag.width()),top=my-(0.5*$drag.height());
  if(left<13)
	  left=13
  else if(left>(MaxLeft+13))
	  left=MaxLeft+13;
  if(top<0)
	  top=0
  else if(top>MaxTop)
	  top=MaxTop;
  $drag.css({left,top});
  var rate=$("#big-show").width()/$drag.width(),BigLeft=-rate*left,BigTop=-rate*top;
  $("#big-show img").css({
	  left:BigLeft+32.5,
	  top:BigTop
  });


  
});
})();

