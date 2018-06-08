<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.png" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="container-fluid site-header">
    <div class="container flex-header">
        <div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt=""></a></div>
        <div class="stickylogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/img/logo-sticky.png" alt=""></a></div>
        <div class="header-block">
            <div class="inner-block">
                <div class="phone"><a href="tel:18557924050">Call 888-222-3344</a></div>
            </div>
        </div>
        <div class="header-nav">
            <div class="container padding0">
                  <div class="mobile-icons">
                    <a href="javascript:void(0);" id="navToggle" class="nav-toggle">
                        <i class="fa fa-bars"></i>
                        <span>MENU</span>
                    </a>
                    <a href="tel:18557924050" class="nav-phone">
                        <i class="fa fa-phone"></i>
                        <span>CALL</span>
                    </a>

                    <a href="<?php echo home_url(); ?>/contact/" class="nav-contact">
                        <i class="fa fa-envelope"></i>
                        <span>CONTACT</span>
                    </a>
                </div>
                <nav id="mainNav" class="mobile-nav" role="navigation">
                  <a href="javascript:void(0);" class="get-quote" data-toggle="modal" data-target="#popForm">GET A QUOTE</a>
                   <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => '' ) ); ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<main>
