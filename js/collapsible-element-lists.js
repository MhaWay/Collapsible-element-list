jQuery(document).ready(function($) {
  $('.my-collapsible').click(function() {
    $(this).closest('.my-content').siblings('.my-content').find('.my-content.closed').slideUp();
    $(this).siblings('.my-content.closed').slideUp();
    /*$(this).next('.my-content.closed').slideToggle();*/
    $(this).nextAll('.my-content.closed').first().slideToggle();

  });
  $('.closed').hide();
});
