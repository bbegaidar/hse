jQuery(document).ready(function ($) {
  var lim;
  $(".hb-line").addClass("active");
  var checkText = !0,
    text_anim = "Ответьте на несколько вопросов по разработке уникального сайта именно для ВАС!";

  // function AnimText(index) {
  //   var c = document.getElementById("anim-text");
  //   lim = text_anim.length, index != lim && (c.innerHTML = c.innerHTML + text_anim[index], setTimeout(function () {
  //     AnimText(index + 1)
  //   }, 80))
  // }
  var hijacking = $("body").data("hijacking"),
    animationType = $("body").data("animation"),
    delta = 0,
    scrollThreshold = 1,
    actual = 1,
    animating = !1,
    sectionsAvailable = $(".cd-section"),
    verticalNav = $(".cd-vertical-nav"),
    downArrow = $(".downArrow"),
    prevArrow = verticalNav.find("a.cd-prev"),
    nextArrow = verticalNav.find("a.cd-next");
  nextArrow2 = downArrow.find("a.down-arrow");
  var MQ = deviceType(),
    bindToggle = !1;

  function bindEvents(MQ, bool) {
    "desktop" == MQ && bool ? ("on" == hijacking ? (initHijacking(), $(window).on("DOMMouseScroll mousewheel", scrollHijacking)) : (scrollAnimation(), $(window).on("scroll", scrollAnimation)), prevArrow.on("click", prevSection), nextArrow.on("click", nextSection), nextArrow2.on("click", nextSection), $("body").on("click", nextArrow2, function () {
      setTimeout(function () {
        var luch = 1;
        setInterval(function () {
          luch < 7 && ($("#lp-luch" + luch + " img").animate({
            opacity: 1
          }, 1e3, function () {}), luch++)
        }, 1e3), $("#lp-luch1 img").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate"), $(".l-text1, .l-text2, .l-text3, .l-text4").animate({
          opacity: 1
        }, 1e3), $(".r-text1, .r-text2, .r-text3, .r-text4, .r-text5 ").animate({
          opacity: 1
        }, 1e3), setTimeout(function () {
          $(".waitActive").addClass("activeDashed")
        }, 100)
      }, 650)
    }), $(document).on("keydown", function (event) {
      "40" != event.which || nextArrow.hasClass("inactive") ? "38" == event.which && (!prevArrow.hasClass("inactive") || prevArrow.hasClass("inactive") && $(window).scrollTop() != sectionsAvailable.eq(0).offset().top) && (event.preventDefault(), prevSection()) : (event.preventDefault(), nextSection())
    }), checkNavigation()) : "mobile" == MQ && (resetSectionStyle(), $(window).off("DOMMouseScroll mousewheel", scrollHijacking), $(window).off("scroll", scrollAnimation), prevArrow.off("click", prevSection), nextArrow.off("click", nextSection), $(document).off("keydown"))
  }

  function scrollAnimation() {
    window.requestAnimationFrame ? window.requestAnimationFrame(animateSection) : animateSection()
  }

  function animateSection() {
    var scrollTop = $(window).scrollTop(),
      windowHeight = $(window).height(),
      windowWidth = $(window).width();
    sectionsAvailable.each(function () {
      var actualBlock = $(this),
        offset = scrollTop - actualBlock.offset().top,
        animationValues = setSectionAnimation(offset, windowHeight, animationType);
      transformSection(actualBlock.children("div"), animationValues[0], animationValues[1], animationValues[2], animationValues[3], animationValues[4]), offset >= 0 && offset < windowHeight ? actualBlock.addClass("visible") : actualBlock.removeClass("visible")
    }), checkNavigation()
  }

  function transformSection(element, translateY, scaleValue, rotateXValue, opacityValue, boxShadow) {
    element.velocity({
      translateY: translateY + "vh",
      scale: scaleValue,
      rotateX: rotateXValue,
      opacity: opacityValue,
      boxShadowBlur: boxShadow + "px",
      translateZ: 0
    }, 0)
  }

  function initHijacking() {
    var visibleSection = sectionsAvailable.filter(".visible"),
      topSection = visibleSection.prevAll(".cd-section"),
      bottomSection = visibleSection.nextAll(".cd-section"),
      animationParams = selectAnimation(animationType, !1),
      animationVisible = animationParams[0],
      animationTop = animationParams[1],
      animationBottom = animationParams[2];
    visibleSection.children("div").velocity(animationVisible, 1, function () {
      visibleSection.css("opacity", 1), topSection.css("opacity", 1), bottomSection.css("opacity", 1)
    }), topSection.children("div").velocity(animationTop, 0), bottomSection.children("div").velocity(animationBottom, 0)
  }
  bindEvents(MQ, !0), $(window).on("resize", function () {
    bindEvents(MQ = deviceType(), bindToggle), "mobile" == MQ && (bindToggle = !0), "desktop" == MQ && (bindToggle = !1)
  });
  var animate_on = 0;

  function scrollHijacking(event) {
    return event.originalEvent.detail < 0 || event.originalEvent.wheelDelta > 0 ? (delta--, Math.abs(delta) >= scrollThreshold && prevSection()) : ++delta >= scrollThreshold && nextSection(), !1
  }

  function animateOn1() {
    var luch = 1,
      t2;
    if (setInterval(function () {
        luch < 6 && ($("#lp-luch" + luch + " img").animate({
          opacity: 1
        }, 1e3, function () {}), luch++)
      }, 1e3), $("#lp-luch1 img").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate"), $(".l-text1, .l-text2, .l-text3, .l-text4").animate({
        opacity: 1
      }, 1e3), $(".r-text1, .r-text2, .r-text3, .r-text4, .r-text5").animate({
        opacity: 1
      }, 1e3), setTimeout(function () {
        $(".waitActive").addClass("activeDashed")
      }, 100), !$(".kinds").hasClass("a-check")) {
      $(".kind-txt[data-id=1]").css({
        background: "#60ff00",
        border: "1px solid #60ff00",
        "border-left": "0"
      }), $(".kind-txt2[data-id=1], .go_to[data-id=1]").css("color", "#000"), $(".kind-number[data-id=1]").css("color", "#60ff00"), $(".kind-title[data-id=1]").css({
        color: "#000",
        "text-shadow": "0px 0px 0px rgba(103, 109, 83, 1), 0px 0px 0px rgba(103, 109, 83, 1)"
      }), $(".kinds-imgs").fadeOut(0).promise().done(function () {
        $(".kinds-imgs[data-id=1]").fadeIn(0)
      });
      var p_animate = 2;

      function timer2() {
        p_animate < 5 ? anim() : p_animate = 1
      }
      $(".kinds").addClass("a-check")
    }

    function timerOn() {
      t2 = setInterval(function () {
        timer2()
      }, 2e3)
    }

    function anim() {
      $(".kind-txt").css({
        background: "transparent",
        border: "1px solid #fff",
        "border-left": "0"
      }), $(".kind-txt2,  .kind-number").css("color", "#fff"), $(".kind-title").css({
        color: "#fff",
        "text-shadow": "-6px -5px 30px rgba(103, 109, 83, 1), 3px 7px 30px rgba(103, 109, 83, 1)"
      }), $(".kind-title, .go_to").css("color", "#60ff00"), $(".kind-txt-img").hide(), 2 == p_animate || 3 == p_animate ? ($(".kind-txt[data-id=" + p_animate + "]").css({
        border: "1px solid #60ff00",
        "border-left": "0"
      }), $(".kind-txt-img[data-id=" + p_animate + "]").show(), $(".kind-txt2[data-id=" + p_animate + "], .go_to[data-id=" + p_animate + "]").css("color", "#000"), $(".kind-number[data-id=" + p_animate + "]").css("color", "#60ff00"), $(".kind-title[data-id=" + p_animate + "]").css({
        color: "#000",
        "text-shadow": "0px 0px 0px rgba(103, 109, 83, 1), 0px 0px 0px rgba(103, 109, 83, 1)"
      }), $(".kinds-imgs").hide().promise().done(function () {
        $(".kinds-imgs[data-id=" + p_animate + "]").show(), p_animate++
      })) : ($(".kind-txt-img").hide(), $(".kind-txt[data-id=" + p_animate + "]").css({
        background: "#60ff00",
        border: "1px solid #60ff00",
        "border-left": "0"
      }), $(".kind-txt2[data-id=" + p_animate + "], .go_to[data-id=" + p_animate + "]").css("color", "#000"), $(".kind-number[data-id=" + p_animate + "]").css("color", "#60ff00"), $(".kind-title[data-id=" + p_animate + "]").css({
        color: "#000",
        "text-shadow": "0px 0px 0px rgba(103, 109, 83, 1), 0px 0px 0px rgba(103, 109, 83, 1)"
      }), $(".kinds-imgs").hide().promise().done(function () {
        $(".kinds-imgs[data-id=" + p_animate + "]").show(), p_animate++
      }))
    }
    timerOn(), $("body").on("mouseenter", ".kind-txt", function () {
      var id = $(this).data("id");
      $(".kind-txt").css({
        background: "transparent",
        border: "1px solid #fff",
        "border-left": "0"
      }), $(".kind-txt2,  .kind-number").css("color", "#fff"), $(".kind-title").css({
        color: "#fff",
        "text-shadow": "-6px -5px 30px rgba(103, 109, 83, 1), 3px 7px 30px rgba(103, 109, 83, 1)"
      }), $(".kind-title, .go_to").css("color", "#60ff00"), $(".kind-txt-img").hide(), 2 == id || 3 == id ? ($(".kind-txt[data-id=" + id + "]").css({
        border: "1px solid #60ff00",
        "border-left": "0"
      }), $(".kind-txt-img[data-id=" + id + "]").show(), $(".kind-txt2[data-id=" + id + "], .go_to[data-id=" + id + "]").css("color", "#000"), $(".kind-number[data-id=" + id + "]").css("color", "#60ff00"), $(".kind-title[data-id=" + id + "]").css({
        color: "#000",
        "text-shadow": "0px 0px 0px rgba(103, 109, 83, 1), 0px 0px 0px rgba(103, 109, 83, 1)"
      }), $(".kinds-imgs").hide().promise().done(function () {
        $(".kinds-imgs[data-id=" + id + "]").show(), id++
      })) : ($(".kind-txt-img").hide(), $(".kind-txt[data-id=" + id + "]").css({
        background: "#60ff00",
        border: "1px solid #60ff00",
        "border-left": "0"
      }), $(".kind-txt2[data-id=" + id + "], .go_to[data-id=" + id + "]").css("color", "#000"), $(".kind-number[data-id=" + id + "]").css("color", "#60ff00"), $(".kind-title[data-id=" + id + "]").css({
        color: "#000",
        "text-shadow": "0px 0px 0px rgba(103, 109, 83, 1), 0px 0px 0px rgba(103, 109, 83, 1)"
      }), $(".kinds-imgs").hide().promise().done(function () {
        $(".kinds-imgs[data-id=" + id + "]").show(), id++
      }));
      var id2 = ++id;
      5 == id2 && (id2 = 1), p_animate = id2, clearInterval(t2)
    }), $("body").on("mouseleave", ".kind-txt", function () {
      var id = $(this).data("id"),
        id2 = ++id;
      5 == id2 && (id2 = 1), p_animate = id2, clearInterval(t2), t2 = setInterval(function () {
        timer2()
      }, 2e3)
    })
  }
  var luch2 = 1;

  function animateOn2() {
    setInterval(function () {
      luch2 < 4 && ($("#fluch-" + luch2 + " img").animate({
        opacity: 1
      }, 1e3), luch2++)
    }, 1e3), $("#fluch-1").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate");
    var once2 = !1;

    function ggg() {
      $(".how").hasClass("a-check") || ($(".how").addClass("a-check"), animateOn(1), once2 = !0)
    }

    function animateOn(onActive) {
      1 == onActive && (onActive = 2), 6 == onActive && animateOn((onActive = 1) + 1), once2 && 1 == onActive || ($(".micon[data-id=" + onActive + "] img").addClass("animated bounce"), setTimeout(function () {
        $(".micon[data-id=" + onActive + "] img").removeClass("animated bounce"), (once2 || 1 != onActive) && animateOn(onActive + 1)
      }, 3e3))
    }
    ggg(), $(".stat").addClass("play");
    var left_luch1 = 1;
    setInterval(function () {
      left_luch1 < 3 && ($("#left-luch" + left_luch1 + " img").animate({
        opacity: 1
      }, 1e3), left_luch1++)
    }, 1e3), $("#left-luch1 img").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate")
  }

  function animateOn3() {
    var left_luch = 1;
    setInterval(function () {
      left_luch < 3 && ($("#leftluch" + left_luch + " img").animate({
        opacity: 1
      }, 1e3), left_luch++)
    }, 1e3), $("#leftluch1 img").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate")
  }
  var luch3 = 1,
    luch4 = 1;

  function animateOn4() {
    $(".partners-box.first").addClass("active").animate({
      opacity: 1
    }, 1500, function () {
      $(".partners-box.second").addClass("active").animate({
        opacity: 1
      }, 1500, function () {
        $(".partners-box.third").addClass("active").animate({
          opacity: 1
        }, 1500, function () {})
      })
    }), setInterval(function () {
      luch3 < 3 && ($("#comluch-" + luch3 + " img").animate({
        opacity: 1
      }, 1e3), luch3++)
    }, 1e3), $("#comluch-1").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate"), setInterval(function () {
      luch4 < 4 && ($("#bluch" + luch4 + " img").animate({
        opacity: 1
      }, 1e3), luch4++)
    }, 1e3), $("#bluch1 img").css("-webkit-animation", "leaves 2s ease-in-out infinite alternate", "animation", "leaves 2s ease-in-out infinite alternate"), $(".petr").hasClass("a-check") || ($(".petr").addClass("animated-team  petr-on a-check").animate({
      opacity: 1
    }, 2500, function () {
      $(".petr").removeClass("animated-team  petr-on"), $("#dos-rhand").addClass("animated-team  dos-on").animate({
        opacity: 1
      }, 2500, function () {
        $("#dos-rhand").removeClass("animated-team  dos-on"), $("#andriy-rhand").addClass("animated-team  andriy-on").animate({
          opacity: 1
        }, 2500, function () {
          $("#andriy-rhand").removeClass("animated-team  andriy-on"), $("#yuliya-rhand").addClass("animated-team  yuliya-on").animate({
            opacity: 1
          }, 2500, function () {
            $("#yuliya-rhand").removeClass("animated-team  yuliya-on"), $("#dmitrii-lhand").addClass("animated-team  dmitrii-on").animate({
              opacity: 1
            }, 2500, function () {
              $("#dmitrii-lhand").removeClass("animated-team  dmitrii-on")
            })
          })
        })
      })
    }), setInterval(function () {
      $(".petr").addClass("animated-team  petr-on").animate({
        opacity: 1
      }, 2500, function () {
        $(".petr").removeClass("animated-team  petr-on"), $("#dos-rhand").addClass("animated-team  dos-on").animate({
          opacity: 1
        }, 2500, function () {
          $("#dos-rhand").removeClass("animated-team  dos-on"), $("#andriy-rhand").addClass("animated-team  andriy-on").animate({
            opacity: 1
          }, 2500, function () {
            $("#andriy-rhand").removeClass("animated-team  andriy-on"), $("#yuliya-rhand").addClass("animated-team  yuliya-on").animate({
              opacity: 1
            }, 2500, function () {
              $("#yuliya-rhand").removeClass("animated-team  yuliya-on"), $("#dmitrii-lhand").addClass("animated-team  dmitrii-on").animate({
                opacity: 1
              }, 2500, function () {
                $("#dmitrii-lhand").removeClass("animated-team  dmitrii-on")
              })
            })
          })
        })
      })
    }, 15e3))
  }

  function prevSection(event) {
    void 0 !== event && event.preventDefault();
    var visibleSection = sectionsAvailable.filter(".visible"),
      middleScroll = "off" == hijacking && $(window).scrollTop() != visibleSection.offset().top;
    visibleSection = middleScroll ? visibleSection.next(".cd-section") : visibleSection;
    var animationParams = selectAnimation(animationType, middleScroll, "prev");
    unbindScroll(visibleSection.prev(".cd-section"), animationParams[3]), animating || visibleSection.is(":first-child") || (animating = !0, 0 != animate_on && animate_on--, visibleSection.removeClass("visible").children("div").velocity(animationParams[2], animationParams[3], animationParams[4]).end().prev(".cd-section").addClass("visible").children("div").velocity(animationParams[0], animationParams[3], animationParams[4], function () {
      animating = !1, "off" == hijacking && $(window).on("scroll", scrollAnimation)
    }), actual -= 1), 0 == animate_on && ($(".forma, .forma .form1, .forma .form2 ").removeClass("active"), $(".phone_form,.smile_form ").slideUp(), $(".form2").removeClass("moveTogether")), resetScroll()
  }
  $(".like_project").click(function () {
    $(this).children("i").toggleClass("active")
  }), $(window).width() < 1049 ? $("body").on("click", "#carousel-portfolio .item", function () {
    var id = $(this).data("id");
    $("body").addClass("body-fix"), $(".content-modal").empty(), $(".content-modal").append('<img src="assets/img/portfolio/modal/modal' + id + '.jpg">'), 1 != id && 3 != id && 5 != id && 7 != id && 9 != id && 14 != id && 20 != id && 21 != id || $(".content-modal img").addClass("help_img"), $(".portfolio-modal").fadeIn(), $(".main-modal-block").css("opacity", "1").addClass("animated zoomIn"), $(".customNavigation a").css("opacity", "0"), $(".pshadow" + id).css({
      opacity: 1
    }), $(window).width() > 1049 && $(window).off("DOMMouseScroll mousewheel", scrollHijacking)
  }) : $("body").on("click", "#carousel-portfolio .item", function (e) {
    e.preventDefault();
    var image_id = $(this).data("id"),
      href_project = $(this).data("href"),
      modal = $(".modal[data-id=modal-portfolio]"),
      image = $("<img>", {
        src: `assets/img/portfolio/modal/modal${image_id}.jpg`
      });
    $(modal).find(".image").empty(), $(modal).find(".image").append(image);
    var want_btn = $("<div>", {
        class: "btn modal_link",
        text: "ХОЧУ ПОДОБНЫЙ",
        "data-id": "zakaz"
      }),
      site_btn = $("<a>", {
        class: "btn",
        text: "ПЕРЕЙТИ НА САЙТ",
        target: "_blank",
        href: href_project
      });
    $(".line_btn").html(want_btn), href_project && $(".line_btn").append(site_btn), $(".like_project i").removeClass("active"), $(window).off("DOMMouseScroll mousewheel"), $(".modal-portfolio").scrollTop(0), $(modal).fadeIn()
  }), $("body").on("mouseenter", "#carousel-portfolio .item", function () {
    var id = $(this).data("id");
    $(".pshadow" + id).css({
      opacity: 1
    })
  }), $("body").on("mouseleave", "#carousel-portfolio .item", function () {
    var id = $(this).data("id");
    $(".pshadow" + id).css({
      opacity: 0
    })
  }), $("body").on("click", ".close-pop", function () {
    setTimeout(function () {
      $("body").removeClass("body-fix")
    }, 320), $(".customNavigation a").css("opacity", "1"), $(".modal, .modal2").fadeOut(), $(window).width() > 1049 && $(window).on("DOMMouseScroll mousewheel", scrollHijacking)
  }), $("body").on("click", ".close-modal, .close_modal", function () {
    setTimeout(function () {
      $("body").removeClass("body-fix")
    }, 320), $(".customNavigation a").css("opacity", "1"), $(".modal, .modal2").fadeOut(), $(window).width() > 1049 && $(window).on("DOMMouseScroll mousewheel", scrollHijacking)
  }), $("body").on("click", "#sendmButton", function () {
    var id = $(this).data("id");
    $("body").addClass("body-fix"), $(".modal2[data-id=" + id + "]").fadeIn(), $(".order-modal-block").css("opacity", "1").addClass("animated zoomIn")
  }), $("body").on("click", ".order-btn", function () {
    var id = $(this).data("id");
    $(".modal2[data-id=" + id + "]").fadeIn(), $(".zakaz-modal-block").css("opacity", "1").addClass("animated zoomIn"), $(window).width() > 1049 && $(window).off("DOMMouseScroll mousewheel", scrollHijacking)
  }), $("body").on("click", "#cbtn2", function () {
    var id = $(this).data("id");
    $("body").addClass("body-fix"), $(".modal2[data-id=" + id + "]").fadeIn(), $(".mail-modal-block").css("opacity", "1").addClass("animated zoomIn")
  });
  var ahref = 0,
    hash = window.location.hash,
    firstAnimate = !1;

  function nextSection(event) {
    void 0 !== event && event.preventDefault();
    var visibleSection = sectionsAvailable.filter(".visible"),
      middleScroll = "off" == hijacking && $(window).scrollTop() != visibleSection.offset().top,
      animationParams = selectAnimation(animationType, middleScroll, "next");
    unbindScroll(visibleSection.next(".cd-section"), animationParams[3]), animating || visibleSection.is(":last-of-type") || (animating = !0, visibleSection.removeClass("visible").children("div").velocity(animationParams[1], animationParams[3], animationParams[4]).end().next(".cd-section").addClass("visible").children("div").velocity(animationParams[0], animationParams[3], animationParams[4], function () {

      if (animate_on == 0) {
        $('#o2 .text-wrap').addClass('fadeInLeft').removeClass('opacity0');
        $('#o2 .left-content .item-wrap').addClass('zoomIn').removeClass('opacity0');

        
        $('#o2 main .item-wrap').find('.btn-wrap').addClass('ownSlideInUp2');
        $('#o2 footer .footer-wrap').find('.btn-wrap').addClass('ownSlideInUp3');
      }
      if (animate_on == 1) {
        $('#o3 .item-wrap').find('.item-icon').addClass('fadeIn');
        $('#o3 .item-wrap').find('.item-text, .step').addClass('fadeIn');
        $('#o3 .item-wrap').find('.item-text, .step').addClass('fadeIn');
        $('#o3 .item-wrap').find('.dotted-line').addClass('clipLeftToRight');


        // $('#sign-up .btn-wrap .point-wrap').addClass('bounceInRight').removeClass('opacity0');
        // $('#sign-up .btn-wrap .btn').addClass('ownSlideInUp').removeClass('opacity0');
      }
      if (animate_on == 2) {
        // Animation on b4
        $('#o4 main .item__dot').addClass('fadeIn').removeClass('opacity0');
        $('#o4 main .item__text').addClass('fadeIn').removeClass('opacity0');
        $('#o4 main .item__icon').addClass('fadeIn').removeClass('opacity0');
        $('#o4 .btn-wrap').addClass('ownSlideInUp4').removeClass('opacity0');
      }
      if (animate_on == 3) {
        // $('#docs .main-wrap .btn-wrap .point-wrap').addClass('slideInLeft').removeClass('opacity0');
        // $('#docs .main-wrap .btn-wrap .btn').addClass('ownSlideInUp').removeClass('opacity0');
        // setTimeout(function(){
        //   $('#docs .footer-wrap .btn-wrap .point-wrap').addClass('slideInLeft').removeClass('opacity0');
        //   $('#docs .footer-wrap .btn-wrap .btn').addClass('ownSlideInUp').removeClass('opacity0');
        // }, 2000);
        // startDocsAnimate();
      }
      if (animate_on == 5) {
        // $('#program .content-wrap .item').addClass('zoomIn').removeClass('opacity0');
        // startAnimationResults();
      }

      1 == ++animate_on && animateOn1(), 2 == animate_on && ($(".step-gif,.qitem-r").removeClass("opac"), $(".white").addClass("zoomIn2").removeClass("opac"), checkText && (setTimeout(function () {
        // AnimText(0)
      }, 1e3), checkText = !1)), 3 == animate_on ? (animateOn2(), $(".bl-item1").removeClass("opac").addClass("bounceInLeft"), $(".bl-item2").removeClass("opac").addClass("bounceInRight")) : 4 == animate_on ? (animateOn3(), animate_on = 4, $(".ctitle").removeClass("opac").addClass("bounceInDown"), $(".cform").removeClass("opac").addClass("bounceInUp")) : 5 == animate_on && (animateOn4(), animate_on = 5), animating = !1, "off" == hijacking && $(window).on("scroll", scrollAnimation)
    }), actual += 1), $(".forma").hasClass("active") || $(".forma").addClass("active"), resetScroll()
  }

  function unbindScroll(section, time) {
    "off" == hijacking && ($(window).off("scroll", scrollAnimation), "catch" == animationType ? $("body, html").scrollTop(section.offset().top) : section.velocity("scroll", {
      duration: time
    }))
  }

  function resetScroll() {
    delta = 0, checkNavigation()
  }

  function checkNavigation() {
    sectionsAvailable.filter(".visible").is(":first-of-type") ? prevArrow.addClass("inactive") : prevArrow.removeClass("inactive"), sectionsAvailable.filter(".visible").is(":last-of-type") ? nextArrow.addClass("inactive") : nextArrow.removeClass("inactive")
  }

  function resetSectionStyle() {
    sectionsAvailable.children("div").each(function () {
      $(this).attr("style", "")
    })
  }

  function deviceType() {
    return window.getComputedStyle(document.querySelector("body"), "::before").getPropertyValue("content").replace(/"/g, "").replace(/'/g, "")
  }

  function selectAnimation(animationName, middleScroll, direction) {
    var animationVisible = "translateNone",
      animationTop = "translateUp",
      animationBottom = "translateDown",
      easing = "ease",
      animDuration = 800;
    switch (animationName) {
      case "scaleDown":
        animationTop = "scaleDown", easing = "easeInCubic";
        break;
      case "rotate":
        "off" == hijacking ? (animationTop = "rotation.scroll", animationBottom = "translateNone") : (animationTop = "rotation", easing = "easeInCubic");
        break;
      case "gallery":
        animDuration = 1500, middleScroll ? (animationTop = "scaleDown.moveUp.scroll", animationVisible = "scaleUp.moveUp.scroll", animationBottom = "scaleDown.moveDown.scroll") : (animationVisible = "next" == direction ? "scaleUp.moveUp" : "scaleUp.moveDown", animationTop = "scaleDown.moveUp", animationBottom = "scaleDown.moveDown");
        break;
      case "catch":
        animationVisible = "translateUp.delay";
        break;
      case "opacity":
        animDuration = 700, animationTop = "hide.scaleUp", animationBottom = "hide.scaleDown";
        break;
      case "fixed":
        animationTop = "translateNone", easing = "easeInCubic";
        break;
      case "parallax":
        animationTop = "translateUp.half", easing = "easeInCubic"
    }
    return [animationVisible, animationTop, animationBottom, animDuration, easing]
  }

  function setSectionAnimation(sectionOffset, windowHeight, animationName) {
    var scale = 1,
      translateY = 100,
      rotateX = "0deg",
      opacity = 1,
      boxShadowBlur = 0;
    if (sectionOffset >= -windowHeight && sectionOffset <= 0) switch (translateY = 100 * -sectionOffset / windowHeight, animationName) {
      case "scaleDown":
        scale = 1, opacity = 1;
        break;
      case "rotate":
        translateY = 0;
        break;
      case "gallery":
        sectionOffset >= -windowHeight && sectionOffset < -.9 * windowHeight ? (scale = -sectionOffset / windowHeight, translateY = 100 * -sectionOffset / windowHeight, boxShadowBlur = 400 * (1 + sectionOffset / windowHeight)) : sectionOffset >= -.9 * windowHeight && sectionOffset < -.1 * windowHeight ? (scale = .9, translateY = -9 / 8 * (sectionOffset + .1 * windowHeight) * 100 / windowHeight, boxShadowBlur = 40) : (scale = 1 + sectionOffset / windowHeight, translateY = 0, boxShadowBlur = -400 * sectionOffset / windowHeight);
        break;
      case "catch":
        sectionOffset >= -windowHeight && sectionOffset < -.75 * windowHeight ? (translateY = 100, boxShadowBlur = 160 * (1 + sectionOffset / windowHeight)) : (translateY = -10 / 7.5 * sectionOffset * 100 / windowHeight, boxShadowBlur = -160 * sectionOffset / (3 * windowHeight));
        break;
      case "opacity":
        translateY = 0, scale = .2 * (sectionOffset + 5 * windowHeight) / windowHeight, opacity = (sectionOffset + windowHeight) / windowHeight
    } else if (sectionOffset > 0 && sectionOffset <= windowHeight) switch (translateY = 100 * -sectionOffset / windowHeight, animationName) {
      case "scaleDown":
        scale = (1 - .3 * sectionOffset / windowHeight).toFixed(5), opacity = (1 - sectionOffset / windowHeight).toFixed(5), translateY = 0, boxShadowBlur = sectionOffset / windowHeight * 40;
        break;
      case "rotate":
        opacity = (1 - sectionOffset / windowHeight).toFixed(5), rotateX = 90 * sectionOffset / windowHeight + "deg", translateY = 0;
        break;
      case "gallery":
        sectionOffset >= 0 && sectionOffset < .1 * windowHeight ? (scale = (windowHeight - sectionOffset) / windowHeight, translateY = -sectionOffset / windowHeight * 100, boxShadowBlur = 400 * sectionOffset / windowHeight) : sectionOffset >= .1 * windowHeight && sectionOffset < .9 * windowHeight ? (scale = .9, translateY = -9 / 8 * (sectionOffset - .1 * windowHeight / 9) * 100 / windowHeight, boxShadowBlur = 40) : (scale = sectionOffset / windowHeight, translateY = -100, boxShadowBlur = 400 * (1 - sectionOffset / windowHeight));
        break;
      case "catch":
        boxShadowBlur = sectionOffset >= 0 && sectionOffset < windowHeight / 2 ? 80 * sectionOffset / windowHeight : 80 * (1 - sectionOffset / windowHeight);
        break;
      case "opacity":
        translateY = 0, scale = .2 * (sectionOffset + 5 * windowHeight) / windowHeight, opacity = (windowHeight - sectionOffset) / windowHeight;
        break;
      case "fixed":
        translateY = 0;
        break;
      case "parallax":
        translateY = 50 * -sectionOffset / windowHeight
    } else if (sectionOffset < -windowHeight) switch (translateY = 100, animationName) {
      case "scaleDown":
        scale = 1, opacity = 1;
        break;
      case "gallery":
        scale = 1;
        break;
      case "opacity":
        translateY = 0, scale = .8, opacity = 0
    } else switch (translateY = -100, animationName) {
      case "scaleDown":
        scale = 0, opacity = .7, translateY = 0;
        break;
      case "rotate":
        translateY = 0, rotateX = "90deg";
        break;
      case "gallery":
        scale = 1;
        break;
      case "opacity":
        translateY = 0, scale = 1.2, opacity = 0;
        break;
      case "fixed":
        translateY = 0;
        break;
      case "parallax":
        translateY = -50
    }
    return [translateY, scale, rotateX, opacity, boxShadowBlur]
  }
  "#structure" == hash && nextSection(), "#portfolio" == hash && (nextSection(), setTimeout(function () {
    nextSection()
  }, 1e3)), "#site" == hash && (nextSection(), setTimeout(function () {
    nextSection()
  }, 1e3), setTimeout(function () {
    nextSection()
  }, 2e3)), "#company" == hash && (nextSection(), setTimeout(function () {
    nextSection()
  }, 1e3), setTimeout(function () {
    nextSection()
  }, 2e3), setTimeout(function () {
    nextSection()
  }, 3e3)), "#part" == hash && (nextSection(), setTimeout(function () {
    nextSection()
  }, 1e3), setTimeout(function () {
    nextSection()
  }, 2e3), setTimeout(function () {
    nextSection()
  }, 3e3), setTimeout(function () {
    nextSection()
  }, 4e3))
}), $.Velocity.RegisterEffect("translateUp", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "-100%"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("translateDown", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "100%"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("translateNone", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "0",
      opacity: "1",
      scale: "1",
      rotateX: "0",
      boxShadowBlur: "0"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("scaleDown", {
  defaultDuration: 1,
  calls: [
    [{
      opacity: "0",
      scale: "0.7",
      boxShadowBlur: "40px"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("rotation", {
  defaultDuration: 1,
  calls: [
    [{
      opacity: "0",
      rotateX: "90",
      translateY: "-100%"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("rotation.scroll", {
  defaultDuration: 1,
  calls: [
    [{
      opacity: "0",
      rotateX: "90",
      translateY: "0"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("scaleDown.moveUp", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "-10%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .2],
    [{
      translateY: "-100%"
    }, .6],
    [{
      translateY: "-100%",
      scale: "1",
      boxShadowBlur: "0"
    }, .2]
  ]
}), $.Velocity.RegisterEffect("scaleDown.moveUp.scroll", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "-100%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .6],
    [{
      translateY: "-100%",
      scale: "1",
      boxShadowBlur: "0"
    }, .4]
  ]
}), $.Velocity.RegisterEffect("scaleUp.moveUp", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "90%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .2],
    [{
      translateY: "0%"
    }, .6],
    [{
      translateY: "0%",
      scale: "1",
      boxShadowBlur: "0"
    }, .2]
  ]
}), $.Velocity.RegisterEffect("scaleUp.moveUp.scroll", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "0%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .6],
    [{
      translateY: "0%",
      scale: "1",
      boxShadowBlur: "0"
    }, .4]
  ]
}), $.Velocity.RegisterEffect("scaleDown.moveDown", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "10%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .2],
    [{
      translateY: "100%"
    }, .6],
    [{
      translateY: "100%",
      scale: "1",
      boxShadowBlur: "0"
    }, .2]
  ]
}), $.Velocity.RegisterEffect("scaleDown.moveDown.scroll", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "100%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .6],
    [{
      translateY: "100%",
      scale: "1",
      boxShadowBlur: "0"
    }, .4]
  ]
}), $.Velocity.RegisterEffect("scaleUp.moveDown", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "-90%",
      scale: "0.9",
      boxShadowBlur: "40px"
    }, .2],
    [{
      translateY: "0%"
    }, .6],
    [{
      translateY: "0%",
      scale: "1",
      boxShadowBlur: "0"
    }, .2]
  ]
}), $.Velocity.RegisterEffect("translateUp.delay", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "0%"
    }, .8, {
      delay: 100
    }]
  ]
}), $.Velocity.RegisterEffect("hide.scaleUp", {
  defaultDuration: 1,
  calls: [
    [{
      opacity: "0",
      scale: "1.2"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("hide.scaleDown", {
  defaultDuration: 1,
  calls: [
    [{
      opacity: "0",
      scale: "0.8"
    }, 1]
  ]
}), $.Velocity.RegisterEffect("translateUp.half", {
  defaultDuration: 1,
  calls: [
    [{
      translateY: "-50%"
    }, 1]
  ]
});