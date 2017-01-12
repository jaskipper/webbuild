<?php
/*
Plugin Name:  Skipper Bottom-link-modals MU-Plugin
Plugin URI:   https://skipperinnovations.com
Description:  Custom Plugin from the man himself... Jason Skipper
Version:      1.0.0
Author:       Jason Skipper
Author URI:   https://skipperinnovations.com
License:      MIT License
*/

/**
 * Link Modals
 */

function modals() {
  $pages = array ('Have a Question?', 'Privacy Policy', 'Terms and Conditions', 'Disclaimer');
  for ($i = 0; $i <= 3; $i++) {
    $supportData = get_page_by_title( $pages[$i] );
    if ($supportData->post_title == "Have a Question?") {
     $content = do_shortcode('[ninja_form id=1]');
    } else {
     $content = $supportData->post_content;
    }
    echo '
     <div class="modal fade" id="modal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel'.$i.'" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
             <h4 class="modal-title" id="myModalLabel">'.$supportData->post_title.'</h4>
           </div>
           <div class="modal-body">'.
               $content
           .'</div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>';
  }
} // Modals
