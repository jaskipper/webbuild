<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '385436148474385',
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.AppEvents.logPageView();
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      //get_template_part('templates/header');

    ?>

        <div class="container">
      		<div class="row">
        		<div class="col-md-7 webinarinvite">
              <h3>FREE TRAINING SESSION:</h3>
          		<h4>The Ultimate Church Web Strategy Webinar. "How To Build an Effective Online Presence... Without Breaking The Budget!”</h4>
          		<h5>Next Class: <span style="color:#d31717">TODAY</span></h5>
          		<p>
                <link href="//app.webinarjam.net/assets/css/register_button.css" rel="stylesheet">
                <div style="margin:auto;width:300px;">
                  <div class="embedded-joinwebinar-button">
                    <button id="reserve" type="button" class="btn btn-danger btn-xlg" title="regpopbox_32182_6bdc640dbd">
                      <span>Claim Your Spot Now!</span>
                    </button>
                  </div>
                </div>
                <script src="//app.webinarjam.net/assets/js/porthole.min.js" language="javascript" type="text/javascript" async></script>
                <script src="//app.webinarjam.net/register.evergreen.extra.js" language="javascript" type="text/javascript" async></script>
              </p>

              <div class="fb-like" data-href="https://www.facebook.com/jasonaskipper1" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
          		<!--<div class="legal">
                <p>Your Information is 100% Secure and Will Never Be Shared With Anyone</p>
          		  <p><a href="#" data-toggle="modal" data-target="#modal0">Support</a> | <a href="#" data-toggle="modal" data-target="#modal1">Privacy</a> | <a href="#" data-toggle="modal" data-target="#modal2">Terms</a></p>
                -->
              </div>
        		</div>
          </div><!-- /.container -->
        </div>

        <div class="webinarback">
          <img src="<?php echo get_template_directory_uri() ?>/dist/images/JasonWhtPicSm.jpg">
        </div>

    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
