//Get discount code from url parameter
function urlParam(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else {
       return results[1] || 0;
    }
}
// Remove the parameter from the URL
function removeUrlParam(parameter) {
    var url=document.location.href;
    var urlparts= url.split('?');

    if (urlparts.length>=2) {
        var urlBase=urlparts.shift();
        var queryString=urlparts.join("?");

        var prefix = encodeURIComponent(parameter)+'=';
        var pars = queryString.split(/[&;]/g);
        for (var i= pars.length; i-->0;)
            if (pars[i].lastIndexOf(prefix, 0)!==-1)
                pars.splice(i, 1);
        url = urlBase+'?'+pars.join('&');
        window.history.pushState('',document.title,url); // added this line to push the new url directly to url bar .
    }
    return url;
}
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}
function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }
  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
jQuery('.cleardiscount').click(function() {
    delete_cookie('discount');
    delete_cookie('discountexpires');
    location.reload();
});

function showDiscountCodeItems() {
  if (jQuery('body').is('.membership-checkout, .pmpro-level')) {

    if ( Cookies.get('discount') ) {
      // If this was successful, let's add our own message to #pmpro_message
      jQuery('#pmpro_message').removeClass('pmpro_success');
      jQuery('#pmpro_message').addClass('replace-pmpro-message');

      // Replacing the default message with one explaining how long we have left
      jQuery('head').append("<style>.replace-pmpro-message:after{ content:'Your discount has been applied! - NOTE: This Offer Expires In...' }</style>");

      // Clearing and Hiding the Discount Code Fields
      jQuery('#pmpro_level_cost p:first-of-type, #other_discount_code_p, .pmpro_payment-discount-code').hide();

      // Add a clear button after
      jQuery("#pmpro_level_cost").after('<button type="button" class="btn btn-primary cleardiscount">Clear Discount</button>');

      jQuery('.cleardiscount').click(function() {
          Cookies.remove('discount');
          Cookies.remove('discountexpires');
          location.reload();
      });
      jQuery("#clockdiv").show();

      //var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
      var deadline = new Date( Date.parse( Cookies.get( 'discountexpires' ) ) );
      initializeClock('clockdiv', deadline);

    }

  }
}

function showDiscountCodeFailed() {
  jQuery('#pmpro_message').removeClass('replace-pmpro-message');
  console.log('Discount Code Check Failed');
  Cookies.remove('discount');
  Cookies.remove('discountexpires');
  jQuery("#clockdiv").hide();
}

jQuery(function($) {

  $(document).ready(function(){

    if ($('body').is('.membership-checkout, .pmpro-level')) {
      if ( urlParam('disc') ) {
        // Get the URL Parameter disc
        var disc = urlParam('disc');
        removeUrlParam('disc');
        var inFourHours = new Date(Date.now() + 60 * 60 * 1000 * 4);
        var inTwoDays = new Date(Date.now() + 60 * 60 * 1000 * 24 * 2);
        if ( disc === "7EE5764A5E" ) {
          // Requires the js-cookie plugin
          Cookies.set('discount', disc, { expires: inTwoDays });
          Cookies.set('discountexpires', inTwoDays, { expires: inTwoDays });
        } else {
          Cookies.set('discount', disc, { expires: inFourHours });
          Cookies.set('discountexpires', inFourHours, { expires: inFourHours });
        }
      }
      if ( Cookies.get('discount') ) {
          var discount = Cookies.get('discount');
          $('#other_discount_code').val( discount );
          $('#other_discount_code_button').click();
      }
    }

  });

});
