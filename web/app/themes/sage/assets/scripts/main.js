/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        $(document).ready(function(){

          var topOfOthDiv = 0;

          if ($('.subnav').length) {
              topOfOthDiv = $(".subnav").offset().top;
          }

          $(window).scroll(function(){
            if ( $('#exCollapsingNavbar').hasClass('in')  || $('#exCollapsingNavbar').hasClass('collapsing') ) {
            } else {
              if ($(window).scrollTop() > topOfOthDiv-64) {
                  $('header .navbar').addClass('bg-inverse');
                  $('header .navbar').css('z-index','11');
              } else {
                $('header .navbar').removeClass('bg-inverse');
                $('header .navbar').css('z-index','1');
              }
            }
          });

          $('.navbar-toggler').click( function() {
              if ( !$('header nav').hasClass('bg-inverse') ) {
                $('header nav').addClass('bg-inverse');
                $('header .navbar').css('z-index','11');
              } else {
                $('header nav').removeClass('bg-inverse');
                $('header .navbar').css('z-index','1');
              }
          });
          //if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
          var MQL = 1170;

          //primary navigation slide-in effect
          if($(window).width() > MQL) {
            var headerHeight = $('.cd-header').height();
            $(window).on('scroll',
            {
                  previousTop: 0
              },
              function () {
                var currentTop = $(window).scrollTop();
                //check if user is scrolling up
                if (currentTop < this.previousTop ) {
                  //if scrolling up...
                  if (currentTop > 0 && $('.cd-header').hasClass('is-fixed')) {
                    $('.cd-header').addClass('is-visible');
                  } else {
                    $('.cd-header').removeClass('is-visible is-fixed');
                  }
                } else {
                  //if scrolling down...
                  $('.cd-header').removeClass('is-visible');
                  if ( currentTop > headerHeight && !$('.cd-header').hasClass('is-fixed') )  {
                      $('.cd-header').addClass('is-fixed');
                  }
                }
                this.previousTop = currentTop;
            });
          }

          //open/close primary navigation
          $('.cd-primary-nav-trigger').on('click', function(){
            $('.cd-menu-icon').toggleClass('is-clicked');
            $('.cd-header').toggleClass('menu-is-open');

            //in firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
            if( $('.cd-primary-nav').hasClass('is-visible') ) {
              $('.cd-primary-nav').removeClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
                $('body').removeClass('overflow-hidden');
              });
            } else {
              $('.cd-primary-nav').addClass('is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend',function(){
                $('body').addClass('overflow-hidden');
              });
            }
          });

          $('.fscf-button-submit').addClass('btn btn-success hvr-grow');


        });
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
