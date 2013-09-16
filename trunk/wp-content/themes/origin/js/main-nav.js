$(document).ready(function() {
    $('#menu-page-menu li').hover(function() {
        //khi chuot di qua doi tuong
        $(this).find('ul:first').css({visibility: 'visible', display: 'none'}).show(400);
    }, function(){ //khi chuot di ra khoi doi tuong
        $(this).find('ul:first').css({visibility: 'hidden'});
    });
})