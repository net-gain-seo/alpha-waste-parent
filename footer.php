</main>

<footer class="container-fluid site-footer">
    <div class="container flex-footer">
      <div class="f-item logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-footer.png" width="425px" alt=""></a></div>
        <div class="f-item phone-assoc">
          <div class="social">
              <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/linkedinicon.png" width="55px" alt=""></a>
              <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/facebookicon.png" width="55px" alt=""></a>
              <a href="#" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/twittericon.png" width="55px" alt=""></a>
          </div>
          <div class="phone">
              <a href="tel:18557924050">Call 1-888-222-3344</a>
          </div>
        </div>
        <div class="f-item copyright">Copyright &copy; <?php echo date("Y"); ?> Your Company. All rights reserved.</div>

        <div class="f-item netgain">Website Designed by <a href="http://www.netgainseo.com/" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/netgain.png" alt=""></a></div>
    </div>
</footer>
<div class="modal fade" id="popForm" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header popover-header">
                <h1 class="modal-title title">Get A Quote</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo do_shortcode( '[contact-form-7 id="254" title="Popover Form" html_class="popover-form"]' ); ?>
            </div>
            <div class="modal-footer hidden-sm-up">
                <button type="button" class="button" data-dismiss="modal" aria-label="Close"><span>Cancel</span> &times;</button>
            </div>
        </div>
    </div>
</div>
<a href="#" class="scrollToTop">&uarr;</a>
<div id="refContainer" class="container" style="visibility: hidden;"></div>
<div id="openNavOverlay"></div>
<div id="closeNav" class="close-nav">Close <i class="fa fa-times"></i></button></div>
<?php wp_footer(); ?>
</body>
</html>
