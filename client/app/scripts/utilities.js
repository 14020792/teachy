$('.navbar-collapse .navbar-nav li a').click(function() {
  $('.navbar-collapse .navbar-nav li').removeClass();
  $(this).parent().addClass('active');
});
