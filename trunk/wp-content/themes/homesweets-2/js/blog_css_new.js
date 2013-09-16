$(".slideDownbox").click(function () {
   $(this).hide().slideDown('slow');
});
 
$(".slideUpbox").click(function () {
   $(this).slideUp(2000);
});
 
$("#slideToggle").click(function () {
	//alert('text');
   //$('.slideTogglebox').css("display":"block;");
   $('.slideTogglebox').slideToggle();
});
 
$("#reset").click(function(){
	location.reload();
});
