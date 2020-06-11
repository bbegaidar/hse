// AOS.init({
//   easing: 'ease-out-back',
//   duration: 800,
//   delay: 300,  
//   disable: 'mobile'
// });
// $(document).ready(function(){
  
  
// })
$(document).ready(function() {
 
  setTimeout(function(){
      $('.preloader').addClass('preloader-finish');
  }, 3000);

});
// $('#loader_img').loadgo('loop', 10);
// $('#loader_img').loadgo('stop');
//window.addEventListener('load',()=>{
  //  const preloader = document.querySelector('.preloader');
    //preloader.classList.add('preloader-finish');
//});
let isMenuOpen = false;

$('body').on('change', '#openSidebarMenu', function () {
    if (!isMenuOpen) {
      isMenuOpen = true;
      $('#sidebarMenu').addClass('MenuActive');
      $('#popupGuideBack').fadeIn();
      $('body').css('overflow', 'hidden');
      $('body').css('background-image','url(../img/fone_page1-1.png)');
      $('header').css('background', 'none');
      $('.numbers a').css('color', 'white');
      $('.lang_items').css('border', '1px solid white');
      $('.lang_items a').css('color', 'white');
      $('.word-close').css('display', 'block');
      $('.footer-sidebar').css('display', 'block');
    }    
    else {
      isMenuOpen = false;
      $('#sidebarMenu').removeClass('MenuActive');
      $('#popupGuideBack').fadeOut();
      $('body').css('overflow', 'auto');
      $('header').css('background', 'white');
      $('.numbers a').css('color', 'black');
      $('.lang_items').css('border', '1px solid #0082b1');
      $('.lang_items a').css('color', 'black');
      $('.word-close').css('display', 'none');
      $('.footer-sidebar').css('display', 'none');
    }
  }) 
// $(".menu-items-sidebar a").hover(function(){
//     $(".pop_content").css('display','block');
// },function(){
//   $(".pop_content").css('display','none');
// }
// );
$('.big_box').hover(function() {
  $(this).addClass('active');
}, function() {
  $(this).removeClass('active');
}
)
$('.little_box').hover(function() {
  $(this).addClass('active');
}, function() {
  $(this).removeClass('active');
})
$(document).ready(function(){
  function heightBlock(column){
    var myBlockHeight = 0;
    column.each(function(){
    let thishHeight = $(this).height();
      if(thishHeight > myBlockHeight){
        myBlockHeight = thishHeight;
      }
    });
    let em = parseFloat(myBlockHeight)
    em = em/parseFloat($('body').css('font-size'));
    column.css('height', (em+1)+'em');
  };
  heightBlock($(".img_and_position"));
  heightBlock($(".text_under_number"));
});


$('.video_click').click(function(){
  var vid = $("#hse_video");
  // vid.attr('controls', 'true');
  vid[0].play();
  $(this).hide();
  $('.video-block').hide();
})
$('.video_click_mob').click(function(){
  var vid = $("#hse_video_mob");
  // vid.attr('controls', 'true');
  vid[0].play();
  $(this).hide();
  $('.video-block').hide();
})

// $('.video_click_mob').click(function(){
//   var vid = $("#hse_video_mob");
// vid.attr('controls', 'true');
//   vid[0].play();
//   $(this).hide();
//   $('.video-block').hide();
// })
//adding new class for displaying maps on contacts page##################
$('#aktobe-href').click(function(e){
  e.preventDefault();
  $('.aktobe-city').addClass('active-city');
  $(".almaty-city").removeClass('active-city')
}
);
$('#almaty-href').click(function(e){
  e.preventDefault();
  $('.almaty-city').addClass('active-city');
  $(".aktobe-city").removeClass("active-city");
}
);
//######################################
var modal = $("#myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
var modalImg = $('#img01');
$('body').on('click', '.myImg', function(){
  modal.css('display','block');
  modalImg.attr('src', $(this).attr('src'))
})
// img.onclick = function(){
//   modal.style.display = "block";
//   modalImg.src = this.src;
// }

// Get the <span> element that closes the modal
// When the user clicks on <span> (x), close the modal
$('body').on('click', '.close', function() {
  modal.css('display', 'none');
})
// document.getElementById('get-modal-click').addEventListener('click',
//       function(){
//         document.querySelector('.bg-modal').style.display = 'flex';
// });
// document.querySelector('.modal-get-close').addEventListener('click',
//         function(){
//           document.querySelector('.bg-modal').style.display = 'none';
// });
var modal_center = $(".bg-modal");

$('body').on('click','.get_btn',function(){
  var title = $(this).data('id');
  $("#get_consalt").text(title);
  modal_center.css('display','flex');
  // $('.bg-modal').css({ top: $(window).scrollTop() + 50})
  $('.bg-modal').css('top', '-50%')
  $('.bg-modal').animate({
    top: $(window).scrollTop(),    
  }, 600)
  $(window).scroll(function () {
    $('.bg-modal').css({ 'top': $(window).scrollTop() + 0 })
  }).scroll();
});
$('.bg-modal').on('click','.modal-get-close',function(){
  modal_center.css('display','none');
});



//PHOTO_GALLERY
$(document).ready(function () {
  
  $('.menu_HSE_mob').click(function(){
    $('.menuWrap__bg').fadeIn();
    $('.menuWrap_mob').addClass('menuWrap_mob_active');
  });
  $('.menuWrap__header__closeBtn_mob').click(function(){
    $('.menuWrap__bg').fadeOut();
    $('.menuWrap_mob').removeClass('menuWrap_mob_active');
  });
  $('.menuWrap__bg').click(function(){
    $('.menuWrap__bg').fadeOut();
    $('.menuWrap_mob').removeClass('menuWrap_mob_active');
  });


// MENU SERVICES LIST
  
  $('.hseMenu__servicesListBtn_mob').click(function(){
    if (!$('.hseMenu__servicesListBtn_mob').hasClass('menuWrap__item_active_mob')) {
      $('.hseMenu__servicesList_mob').slideToggle(300);
      $('.hseMenu__servicesListBtn_mob').addClass('menuWrap__item_active_mob');
      $('.hse__menuItemServices__row').addClass('hse__menuItemServices__row_active');     
    } else {
      $('.hseMenu__servicesList_mob').slideToggle(300);
      $('.hseMenu__servicesListBtn_mob').removeClass('menuWrap__item_active_mob');
      $('.hse__menuItemServices__row').removeClass('hse__menuItemServices__row_active');
    }
  });

  $('.hse__menuItemServices__row').click(function(){
    if (!$('.hseMenu__servicesListBtn_mob').hasClass('menuWrap__item_active_mob')) {
      $('.hseMenu__servicesList_mob').slideToggle(300);
      $('.hseMenu__servicesListBtn_mob').addClass('menuWrap__item_active_mob');
      $('.hse__menuItemServices__row').addClass('hse__menuItemServices__row_active');     
    } else {
      $('.hseMenu__servicesList_mob').slideToggle(300);
      $('.hseMenu__servicesListBtn_mob').removeClass('menuWrap__item_active_mob');
      $('.hse__menuItemServices__row').removeClass('hse__menuItemServices__row_active');
    }
  });
  
});

$('.submitForm').click(function (e) {
  e.preventDefault()
  var form = $(this).parents('form')
  var lang = $('html').attr('lang')
  var name = $(form).find('input[name=sender-name]').val()
  var phone = $(form).find('input[name=sender-phone]').val()
  var csrf = $(form).find('input[name=_csrf]').val()
  $.ajax({
    type: 'POST',
    url: lang == 'ru-RU' ? '/site1/form-callback' : '/' + lang + '/site1/form-callback',
    data: { 'sender-name': name, 'sender-phone': phone, '_csrf': csrf},    
    success: function (data) {
      console.log(data)
    }
  })

  $(modal_center).css('display', 'none');
})
