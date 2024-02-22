

;(function($){
  $(document).ready(function(){
    $(window).on("scroll",function() {
      var windowHeight = $(window).height() - 200;
      if ($(this).scrollTop() > 100 ) {
        $('.pagetop').fadeIn();
      } else {
        $('.pagetop').fadeOut();
      }
      if ($(this).scrollTop() > windowHeight ) {
        $('#header-sroll.home').addClass('active');
      } else {
        $('#header-sroll.home').removeClass('active');
      }
    });
  });
  // ContactForm7の二重送信を抑制
  $(function () {
    var $submit = $('input[type="submit"].wpcf7-submit');
    if (!$submit[0]) $submit = $('.wpcf7 *[type="submit"]');
    
    $submit.click(function () {
      $(this).addClass('sending').css({'pointer-events':'none', 'opacity':'0.5'});
    });

    // 入力項目にエラーがあったらボタン復活
    document.addEventListener('wpcf7invalid', function () {
      $submit.removeClass('sending').css({'pointer-events':'auto', 'opacity':'1'});
    }, false);
  });
})(jQuery);