<?php
    // TESTIMONIALS
    get_header();
?>


    <div class="mast page-mast">
        <img src="<?php echo home_url(); ?>/wp-content/uploads/2018/01/Banner5.jpg" />
        <div class="container mast-overlay">
            <h1>Why Our Customers Love Us</h1>
            <p>We Love Our Customers And Our Customers Love Us.</p>
        </div>
    </div>

    <?php while ( have_posts() ) : the_post(); ?>
    <div class="container-fluid testimonials-listing">

        <div class="container">
            <article>
                <div class="the-testimonial">
                    <?php the_content(); ?>
                </div>
                <div class="txt-primary">
                    <?php the_title(); ?>
                </div>
            </article>
        </div>

    </div>
        <?php endwhile; // End of the loop. ?>
    <div class="container-fluid footer-contact-container dropshadow">
        <div class="container">
        <h3>DON’T WAIT. CONTACT US TODAY.</h3>
        <?php echo do_shortcode( '[contact-form-7 id="258" title="Footer Form" html_class="footer-form"]' ); ?>
        </div>
    </div>
<?php
    get_footer();
