$('document').ready(function () {
  // Load header content to main page
  $('.cd-section header').load('/header.html');

  $('#showcase main').load('/html/main-page/showcase-main.html');
  $('#activity main').load('/html/main-page/activity-main.html');

  if ($(window).width() < 1050) {
    $('#activity').waypoint(function () {
      $('#sign-up main').load('/html/main-page/sign-up-main.html');
      $('#results main').load('/html/main-page/results-main.html');
      $('#docs main').load('/html/main-page/docs-main.html');
      $('#gallery main').load('/html/main-page/gallery-main.html');
      $('#program main').load('/html/main-page/program-main.html');
    }, {
      offset: '50%'
    });
    $('#activity , #sign-up , #results, #docs, #gallery, #program').find('header').css('display', 'none');
    $('#menu').find('header .logo-wrap img').attr('src',  '/assets/img/menu/mob/m-logo.png');
  }

  // OPEN MENU
  $('body').on('click', '#open-menu', function () {
    $('#menu').load('/html/menu.html');
    $('#menu').removeClass('slideOutUp opacity0').addClass('slideInDown');
    $('body').attr('data-animation', 'none');
  });

  // OPEN page 404 / News
  $('body').on('click', '#showcase .open-404', function () {
    $('#pageNews').load('/html/pageNews.html').removeClass('slideOutUp opacity0').addClass('slideInDown');
  });
});