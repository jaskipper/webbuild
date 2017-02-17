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
    <div id="webinarvideolanding" style="background: url('https://webbuild.io/app/uploads/2017/02/unsplash_52d5b2dfdf619_1.jpg'); background-size: cover;">
      <!--<video id="bgvid" autoplay loop class="fillWidth">
          <source src="https://webbuild.io/app/uploads/2017/02/Dots-5244.mp4" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
      </video>-->
    </div>

    <div id="mycontent" class="wrap-wrap">
      <div class="wrap container" role="document">
        <div class="content row flex-items-xs-center">
          <main class="main">
            <h1>FREE WEBINAR: <span>How To Build An Effective Online Presence For Your Ministry... Without Breaking The Budget!<span></h1>
              <div class="videoWrapper"><iframe src="https://player.vimeo.com/video/204556650?autoplay=1" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
                <div class="row text-center">
                  <div class="col-xs-12 mb-2">
                      <div class="embedded-joinwebinar-button">
                        <button id="reserve" type="button" class="btn btn-success btn-xlg hvr-grow" title="regpopbox_32182_51ad4507c4">
                          Save My Seat!
                        </button>
                      </div>
                    <script src="//app.webinarjam.net/assets/js/porthole.min.js" language="javascript" type="text/javascript" async></script>
                    <script src="//app.webinarjam.net/register.evergreen.extra.js" language="javascript" type="text/javascript" async></script>
                  </div>
                </div>
                <div class="row text-center">
                  <div class="col-xs-12">
                    <div class="fb-like mb-2" data-href="https://www.facebook.com/jasonaskipper1" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <h2>Latest Appreciation</h2>
                    <blockquote class="blockquote ml-2">
                      <p class="mb-0">Jason, the training was absolutely fantastic… Your ministry is extremely powerful and God ordained. I will be praying for you.</p>
                      <footer class="blockquote-footer">Pastor <cite title="Source Title">Victor Chabala</cite><img class="fbimg img-thumbnail" src="https://webbuild.io/app/uploads/2017/02/fbimg1.jpg" class="fbimg" /></footer>
                    </blockquote>
                    <blockquote class="blockquote ml-2">
                      <p class="mb-0">Hey Jason... I thoroughly enjoyed your webinar yesterday! I was able to take five pages of some really great notes that will help us in making some much-needed changes to our social media presence as well as our webpage.</p>
                      <footer class="blockquote-footer">Pastor <cite title="Source Title">Steve Kahn</cite><img class="fbimg img-thumbnail" src="https://webbuild.io/app/uploads/2017/02/Screen-Shot-2017-02-17-at-12.00.45-PM.jpg" class="fbimg" /></footer>
                    </blockquote>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                      <h2>About the Speaker: Jason Skipper</h2>
                      <div class="pl-2 pr-2">
                        <img id="skipperimg" src="https://s3.amazonaws.com/webinarjam/images-users/presenters/wYjcPGwiMm8RmyNX2QVG.jpg" alt="Jason Skipper" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Jason Skipper">

                        <p>Having been missionaries in Bolivia for 15 years and planted two tremendously successful churches there, Jason and his family now live in Nashville, Tennessee where they are in the process of planting another world changing church through the Association of Related Churches (ARC).</p>

                        <p>Jason has two passions in life outside of God and family:
                        <ol>
                          <li>Reaching the lost for Jesus Christ, and...</li>
                          <li>Technology.</li>
                        </ol></p>
                        <p>He is passionate about helping and teaching others to do #1 through #2, using technology as an amazing and powerful tool to reach and make an impact in the world for Jesus. Jason is also an "Apple" Certified Trainer &amp; Technician.</p>
                      </div>
                    <div class="text-center">
                      <div class="embedded-joinwebinar-button">
                        <button id="reserve" type="button" class="btn btn-success btn-xlg hvr-grow" title="regpopbox_32182_51ad4507c4">
                          Save My Seat!
                        </button>
                      </div>
                    </div>
                    <script src="//app.webinarjam.net/assets/js/porthole.min.js" language="javascript" type="text/javascript" async></script>
                    <script src="//app.webinarjam.net/register.evergreen.extra.js" language="javascript" type="text/javascript" async></script>
                  </div>
                </div>
            <div class="innerwrapper">
              <?php include Wrapper\template_path(); ?>
            </div>
          </main><!-- /.main -->
          <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
              <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
          <?php endif; ?>
        </div><!-- /.content -->
      </div><!-- /.wrap -->
    </div>
    <?php
      do_action('get_footer');
      //get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
