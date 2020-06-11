photogallerry = []
set_year = null
set_month = null
all_month = [[1, 'Январь', 'January', ''], [2, 'Февраль', 'February'], [3, 'Март', 'March', ''], [4, 'Апрель', '', ''], [5, 'Май', '', ''], [6, 'Июнь', '', ''], [7, 'Июль', '', ''], [8, 'Август', '', ''], [9, 'Сентябрь', '', ''], [10, 'Октябрь', '', ''], [11, 'Ноябрь', '', ''], [12, 'Декабрь', '', '']];
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
};

async function fetchGallery()
{
  var page = getUrlParameter('page');
  await $.ajax({
    type: 'GET',
    url: `/site1/photo-gallery?page=${page}`,
    success: data => { photogallerry = data; }
  })
}

function generateMonth(item, index, data)
{
  return `<div class="dateNavWrap_months_item">    
    <a href="#" class="month_click" data-id="${item[0]}" >
      <div class="dateNavWrap_months_item_month">
        <span>${item[index]}</span>
      </div>
      <div class="dateNavWrap_months_item_amount">
        <span>(${data})</span>
      </div>
    </a>
  </div>`;
  
}

function generateMonthM(item, index, data)
{
  return `<option value="${item[0]}" class="short">${item[index]} (${data})</option>`
  
}

function renderMonth(set_year)
{
  $('.dateNavWrap_months').empty();
  all_month.forEach(item => {
    data = photogallerry.reduce((acc, item_arr) => { if (item_arr.month == item[0] && item_arr.year == set_year) { acc += 1 } return acc }, 0)
    $('.dateNavWrap_months').append(generateMonth(item, 1, data))
  })    
}

function renderMonthM(set_year)
{
  $("#monthSliderMob").empty();
  $("#monthSliderMob").append(`<option value="none" class="short" selected>Не выбрано</option>`)
  all_month.forEach(item => {
    data = photogallerry.reduce((acc, item_arr) => { if (item_arr.month == item[0] && item_arr.year == set_year) { acc += 1 } return acc }, 0)
    $("#monthSliderMob").append(generateMonthM(item, 1, data));
  })    
}

function generateSlider(slider_start) {
  var slideCounter = $("#slider_counter").data("id");
  // slideCounter.each(element => {  
  for (let i = slider_start; i < slideCounter; i++) {
    $("#photoGallery_photoSlider" + i).owlCarousel({
      items: 4,
      margin: 17,
      loop: true,
      pagination: false,
      navigation: false,
      dots: false,
    });
    $('.photoGallery_photoSlider_owl_control.next.sl' + i).click(function (e) {
      e.preventDefault();
      console.log('prev')
      $("#photoGallery_photoSlider" + i).trigger('prev.owl.carousel', [300]);
    });

    $('.photoGallery_photoSlider_owl_control.prev.sl' + i).click(function (e) {
      e.preventDefault();
      console.log('next')
      $("#photoGallery_photoSlider" + i).trigger('next.owl.carousel');
    });
  }
}

function generateSliderM(slider_start) {
  var slideCounter = $("#slider_counterM").data("id");
  for (let i = slider_start; i < slideCounter; i++) {  
    $("#photoGallery_Slider_mob_0" + i).owlCarousel({
      items: 1,
      margin: 17,
      loop: true,
      pagination: false,
      navigation: false,
      dots: false,
      // autoplay: true,
      // autoplayTimeout: 3000,
      // autoplayHoverPause: true,
    });
    $('.photoGallery_Slider_mob_0_owl_control.next.sl_mob'+(1+i)).click(function (e) {
      e.preventDefault();      
      $("#photoGallery_Slider_mob_0"+i).trigger('prev.owl.carousel', [300]);
    });

    $('.photoGallery_Slider_mob_0_owl_control.prev.sl_mob'+(1+i)).click(function (e) {
      e.preventDefault();
      $("#photoGallery_Slider_mob_0"+i).trigger('next.owl.carousel');
    });
  }
}

function createItemM(item) {
  let lang = $('html').attr('lang');
  var slideCounter = $("#slider_counterM").data("id");
  var images = JSON.parse(item['photo'])
  let element = `<div class="photoGallery_photoSlider_title_date">                      
                    </div>
                    <div class="photoGallery_photoSlider_line"></div>
                    <div class="photoGallery_photoSlider_title_text">
                        <span>                            
                            ${lang == 'ru-RU' ? item['title'] : lang == 'kk-KZ' ? item['title_kaz'] : item['title_eng']}
                        </span>
                    </div>
                    <div class="photoGallery_photoSlider_line"></div>
                    <div class="photoGallery_photoSlider_about">
                        <p>
                            ${lang == 'ru-RU' ? item['description_rus'] : lang == 'kk-KZ' ? item['description_kaz'] : item['description_eng']}
                        </p>
                    </div>`;
                    if (images.length > 1) { 
                      element += `
                        <div id="photoGallery_Slider_mob_0${slideCounter}" class="photoGallery_Slider_mob_0 owl-carousel">
                        ${slideCounter++}`;
                        for (let i = 0; i < images.length; i++) { 
                          element += `
                            <div class="photoGallery_Slider_item_mob">
                              <div>
                                  <img src="/${images[i]}" alt="img">
                              </div> `;
                          if (images.length > i+1) {
                            element += `
                              <div>
                                <img src="/${images[i+1]}" alt="img">
                              </div>`
                          }
                            element += `
                            </div>`
                        }

                        element += `</div>            
                          <div class="licenseSliderNav_mob">
                              <button class="photoGallery_Slider_mob_0_owl_control prev sl_mob${slideCounter}"><img class="slider_nav slider_nav_left_main" src="/img1/slider_nav_left_main.png" alt="img"></button>
                              <button class="photoGallery_Slider_mob_0_owl_control next sl_mob${slideCounter}"><img class="slider_nav slider_nav_right_main" src="/img1/slider_nav_right_main.png" alt="img"></button>
                          </div>`                                                                                                                   
                    }
                    $("#slider_counterM").data("id", slideCounter);
                    return element;
}

function createItem(item) {
  let lang = $('html').attr('lang');
  var slideCounter = $("#slider_counter").data("id");  
  var images = JSON.parse(item['photo'])
  let element = `<div class="photoGallery_photoSliderWrap">
              <div class="photoGallery_photoSlider_title">
                  <div class="photoGallery_photoSlider_title_text">
                      <span>
                          ${lang == 'ru-RU' ? item['title'] : lang == 'kk-KZ' ? item['title_kaz'] : item['title_eng']}
                      </span>
                  </div>
                  <div class="photoGallery_photoSlider_title_date">
                  </div>
              </div>
              <div class="photoGallery_photoSlider_line"></div>
              <div class="photoGallery_photoSlider_about">
                  <p>
                      ${lang == 'ru-RU' ? item['description_rus'] : lang == 'kk-KZ' ? item['description_kaz'] : item['description_eng']}
                  </p>
              </div>
              <div class="photoGallery_photoSliderBox">`;
              if (images.length > 1) {
                element += `
                  <button class="photoGallery_photoSlider_owl_control prev sl${slideCounter}"><img class="slider_nav slider_nav_left_main" src="/img1/slider_nav_left_main.png" alt="img"></button>
                  <button class="photoGallery_photoSlider_owl_control next sl${slideCounter}"><img class="slider_nav slider_nav_right_main" src="/img1/slider_nav_right_main.png" alt="img"></button>
                  <div id="photoGallery_photoSlider${slideCounter}" class="photoGallery_photoSlider owl-carousel">`;
                    slideCounter++
                    for(let i=0; i < images.length; i++) {
                      element += `
                        <div class="photoGallery_photoSlider_item">
                            <div class="photoGallery_photoSlider_item_box">
                                <img src="/${images[i]}" alt="img" class="myImg">
                            </div>
                        </div>`
                    }                                            
                element += `</div>`;
              }                
            element += `</div>
          </div>`;
  $("#slider_counter").data("id", slideCounter);
  return element;
}

$('.schedulle_button').click(function(e){
  e.preventDefault();
  let pageCount = $('.center_button').data('id');
  let data = photogallerry.filter((_, index) => index >= pageCount  && index < (pageCount+3));  
  data.forEach(item => {
    $('#contentPhotoGallery').append(createItem(item))
  })
  generateSlider(pageCount)
  if (photogallerry.length > (pageCount+3)) {
    $('.center_button').data('id', (pageCount + 3));
  }
  else {
    $('.center_button').css('display', 'none')
  }  
})

$('body').on('click', '.photoGallery_yearsSlider_item' ,function() {    
  $('.photoGallery_yearsSlider_item').find('.yearsSlider_item_box').removeClass('yearsSlider_item_box_active')
  set_year = $(this).data('id');
  renderMonth(set_year)
  $('.dateNavWrap_months').css('display', 'flex');
  $(this).find('.yearsSlider_item_box').addClass('yearsSlider_item_box_active')  
  $(".month_click").click(function() {
    $(".month_click").removeClass("dateNavWrap_months_item_active");
    set_month = $(this).data("id");
    let data = photogallerry.filter(
      (item, index) => item.year == set_year && item.month == set_month
    );
    $("#contentPhotoGallery").empty();
    data.forEach(item => {
      $("#contentPhotoGallery").append(createItem(item));
    });
    generateSlider(0)
    $(".center_button").css("display", "none");
    $(this).addClass("dateNavWrap_months_item_active");
  });
})

$('body').on('click', '#yearSliderMob', function(){
  set_year = $(this).val();
  if (set_year != 'none') {
    renderMonthM(set_year)
  }  
  $("#monthSliderMob").click(function() {
    set_month = $(this).val();
    if (set_year == "none") {
      return false;
    }
    let data = photogallerry.filter(
      (item, index) => item.year == set_year && item.month == set_month
    );
    console.log(data);
    $("#contentPhotoGalleryM").empty();
    data.forEach(item => {
      $("#contentPhotoGalleryM").append(createItemM(item));
    });
    generateSliderM(0);
  });
})

$(document).ready(function() {
  fetchGallery();
  generateSlider(0);
  $('.dateNavWrap_months').css('display', 'none');
  generateSliderM(0)  
})

