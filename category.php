<?php
    get_header();
?>
<div class="mast page-mast">
    <img src="<?php echo home_url(); ?>/wp-content/uploads/2017/08/mast-about-1.jpg" alt="">
<!--     <div class="container mast-overlay">
        <h1>Primary Title</h1>
        <h2>Secondary Title</h2>
    </div> -->
</div>

<?php echo do_shortcode( '[common_element id="391"]' ); ?>

<div class="container">
    <div class="row blog-content">
        <div class="col col-12 col-lg-9">

            <div class="blog-listing">
            <h1><?php echo single_cat_title(); ?> <small class="text-muted">News Posts</small></h1>

            <?php while ( have_posts() ) : the_post(); ?>
                <article>

                    <h2 class="post-title">
                        <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>

                    <?php the_excerpt(); ?>

                </article>
            <?php endwhile; // End of the loop. ?>
            </div>

            <div class="next-prev">
                <div class="prev"><?php next_posts_link( '<i class="fa fa-angle-double-left"></i> Older posts' ); ?></div>
                <div class="next"><?php previous_posts_link( 'Newer posts <i class="fa fa-angle-double-right"></i>' ); ?></div>
            </div>

        </div>

        <div class="col col-12 col-lg-3">

            <div class="blog-sidebar">
                <?php dynamic_sidebar( 'page_sidebar_1' ); ?>
            </div>

        </div>
    </div>
</div>

<?php
    get_footer();
