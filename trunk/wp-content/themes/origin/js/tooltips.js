$(document).ready(function() {
    $('.links li a').hover(function(){
        var str = $(this).attr('data-tooltip');
        $('<p class="tooltip"></p>').text(str).appendTo('body').fadeIn(600);
    }, function(){
        $('.tooltip').remove();
    }).mousemove(function(e){
        var mousex = e.pageX +20;
        var mousey = e.pageY;
        $('.tooltip').css({top: mousey, left: mousex});
    });
});