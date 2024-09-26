$(document).ready(function () {
    navActive()
});


function navActive(){
    var current = '/';
    current += window.location.pathname.split("/").pop();   
    $('.navbar-nav .nav-link').each(function () {        
      if ($(this).attr('href') === current) {                
        $(this).addClass('active');
      }
    });
}