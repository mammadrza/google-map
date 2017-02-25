$(document).ready(function(){
    $('.thumb').click(function(){
          $('.main_image img').attr('src',$(this).children('img').attr('src')).fadeIn(400);;
          $('.thumb').children('img').removeClass('opacity-active-class');
          $(this).children('img').addClass('opacity-active-class');

    })

$('.moreshow').click(function(){
    var $this = 	$('.single-page-home-more-info');
   	$('.single-page-home-more-info').toggleClass('sigle-page-home-more-info-activen');
   	 $('.moreshow').text('Ətraflı');
    if($this.hasClass('sigle-page-home-more-info-activen')){
       $('.moreshow').text('Gizlet');
    } else {
       $('.moreshow').text('Ətraflı məlumat');
    }
});

})


