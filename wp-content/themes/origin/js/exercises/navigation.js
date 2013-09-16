$(document).ready(function() {
    $('.tab_content:not(:first)').hide();
    $('.tabs li a').click(function() {
        $('.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.tab_content').hide();
        var activeTab = $(this).attr('href');
        $(activeTab).fadeIn();
        return false;
    });
   
   $('#menu-page-menu li').hover(function() {
        $(this).find('ul:first').css({visibility: 'visible', display: 'none'}).show(400);
   }, function() {
    $(this).find('ul:first').css({visibility: 'hidden'});
   }); 


})

