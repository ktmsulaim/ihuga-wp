<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('img/logo.png') ?>" type="image/x-icon" />
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
    <?php wp_head(); ?>
</head>

<body data-plugin-page-transition <?php body_class(); ?>>
    <div class="body">
        <header id="header" class="<?php echo is_current_uri('/') ? 'header-transparent' : ''; ?> header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': false, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
            <div class="header-body border-top-0 header-body-bottom-border">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-logo">
                                    <a href="<?php echo esc_url(site_url('/')); ?>">
                                        IHUGA
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            <div class="header-row">
                                <div class="header-nav header-nav-links order-2 order-lg-1">
                                    <div class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                        <nav class="collapse">
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/'); ?>" href="<?php echo esc_url(site_url('/')); ?>">
                                                        Home
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/about-us/'); ?>" href="<?php echo esc_url(site_url('/about-us')); ?>">
                                                        About Us
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/vision-and-mission/'); ?>" href="<?php echo esc_url(site_url('/vision-and-mission')); ?>">
                                                        Vision & Mission
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/managing-committee/'); ?>" href="<?php echo esc_url(site_url('/managing-committee')); ?>">
                                                        Managing Committee
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/members/'); ?>" href="<?php echo esc_url(site_url('/members')); ?>">
                                                        Members
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/events/'); ?>" href="<?php echo esc_url(site_url('/events')); ?>">
                                                        Events
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/circulars/'); ?>" href="<?php echo esc_url(site_url('/circulars')); ?>">
                                                        Circulars
                                                    </a>
                                                </li>
                                                <li class="dropdown">
                                                    <a class="dropdown-item dropdown-toggle <?php is_active('/contact-us/'); ?>" href="<?php echo esc_url(site_url('/contact-us')); ?>">
                                                        Contact Us
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <button class="btn header-btn-collapse-nav" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                                <div class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                                    <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                        <a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
                                        <div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown">
                                            <form role="search" action="page-search-results.html" method="get">
                                                <div class="simple-search input-group">
                                                    <input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="Search...">
                                                    <button class="btn" type="submit">
                                                        <i class="fas fa-search header-nav-top-icon"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>