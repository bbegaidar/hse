$(document).ready(function(){
   

  $('.photoGallery_yearsDropDown_title').on('click', function () {
    $('.photoGallery_yearsDropDown_content').slideToggle(280);
    $('.photoGallery_yearsDropDown_title').addClass('photoGallery_dropDown_title_active');
  });

  jQuery(function ($) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
      var div = $(".photoGallery_yearsDropDown_content"); // тут указываем ID элемента
      if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        div.hide(); // скрываем его
        $('.photoGallery_yearsDropDown_title').removeClass('photoGallery_dropDown_title_active')
      }
    });
  });

  $('.photoGallery_monthsDropDown_title').on('click', function () {
    $('.photoGallery_monthsDropDown_content').slideToggle(280);
    $('.photoGallery_monthsDropDown_title').addClass('photoGallery_dropDown_title_active');
  });

  jQuery(function ($) {
    $(document).mouseup(function (e) { // событие клика по веб-документу
      var div = $(".photoGallery_monthsDropDown_content"); // тут указываем ID элемента
      if (!div.is(e.target) // если клик был не по нашему блоку
        && div.has(e.target).length === 0) { // и не по его дочерним элементам
        div.hide(); // скрываем его
        $('.photoGallery_monthsDropDown_title').removeClass('photoGallery_dropDown_title_active')
      }
    });
  });



  


})