<?php
get_header();
?>

<div role="main" class="main">
    <section class="section border-0 video overlay overlay-show overlay-color-light overlay-op-8 m-0" data-video-path="<?php echo get_theme_file_uri('video/header'); ?>" data-plugin-video-background data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%'}" style="height: 100vh;">
        <div class="container position-relative z-index-3 h-100">
            <div class="row align-items-center h-100">
                <div class="col">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h1 class="text-color-dark font-weight-extra-bold text-12 line-height-1 mb-2 appear-animation" data-appear-animation="blurIn" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">IHUGA</h1>
                        <p class="text-4 text-color-dark font-weight-light opacity-7 mb-0" data-plugin-animated-letters data-plugin-options="{'startDelay': 2000, 'minWindowWidth': 0}">INDIAN HAJ UMRAH GROUP ASSOCIATION</p>
                    </div>
                </div>
            </div>
            <a href="#main" class="slider-scroll-button slider-scroll-button-dark position-absolute bottom-10 left-50pct transform3dx-n50" data-hash data-hash-offset="0" data-hash-offset-lg="80">Sroll To Bottom</a>
        </div>
    </section>
</div>

<div id="main">
    <section class="section section-default border-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h3 class="text-primary text-uppercase text-4 mb-3" style="font-weight:600;">Latest Events</h3>
                    <div class="">
                        <div class="row">
                            <?php
                            $latest_events = new WP_Query([
                                'posts_per_page' => 2,
                                'post_type' => 'post',
                                'meta_key' => 'event_date',
                                'orderby' => 'meta_value',
                                'order' => 'DESC',
                            ]);

                            $events_count = wp_count_posts('post')->publish;

                            if ($latest_events->have_posts()) :
                                while ($latest_events->have_posts()) :
                                    $latest_events->the_post();

                            ?>
                                    <div class="col-sm-6 col-lg-6 mb-4 pb-2">
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <article>
                                                <div class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0">
                                                    <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6">
                                                        <img class="img-fluid" src="<?php echo has_post_thumbnail() ? the_post_thumbnail_url() : get_theme_file_uri('img/placeholder.jpg'); ?>" alt="">
                                                        <div class="thumb-info-title bg-transparent p-4">
                                                            <div class="thumb-info-type bg-color-primary px-2 mb-1"><?php echo formatDate(get_field('event_date')); ?></div>
                                                            <div class="thumb-info-inner mt-1">
                                                                <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0"><?php echo get_the_title(); ?></h2>
                                                            </div>
                                                            <div class="thumb-info-show-more-content">
                                                                <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                                                                    <?php if (has_excerpt()) :
                                                                        echo get_the_excerpt();
                                                                    else :
                                                                        echo substr(strip_tags(get_the_content()), 0, 100);
                                                                    endif; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        </a>
                                    </div>
                                <?php
                                endwhile;
                            else :
                                ?>
                                <div class="col">No events!</div>
                            <?php
                            endif;
                            wp_reset_query();
                            ?>
                        </div>

                        <?php if ($events_count > 2) : ?>
                            <a href="<?php echo esc_url(site_url('/events')); ?>" class="btn btn-modern btn-primary btn-arrow-effect-1">View More <i class="fas fa-arrow-right ms-2"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="text-primary text-uppercase text-4 mb-3" style="font-weight:600;">Notifications</h3>
                    <div class="card">
                        <div class="card-body p-0" style="min-height: 270px;">
                            <?php
                            $notifications = new WP_Query([
                                'post_type' => 'notification',
                                'posts_per_page' => 3,
                            ]);

                            if ($notifications->have_posts()) :
                            ?>
                                <ul id="notifications">
                                    <?php
                                    while ($notifications->have_posts()) :
                                        $notifications->the_post();
                                    ?>
                                        <li><a class="text-decoration-none custom-link-effect-1" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a> <span class="date"><?php echo formatDate(get_the_date()); ?></span></li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>
                            <?php
                            else :
                            ?>
                                <p class="text-center mt-3">No notifications!</p>
                            <?php
                            endif;

                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="who-we-are" class="section section-height-3 bg-transparent border-0 m-0">
        <div class="container py-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 pe-lg-5 mb-5 mb-lg-0">
                    <div class="overflow-hidden">
                        <h2 class="text-color-primary font-weight-semibold text-3 line-height-7 positive-ls-2 mb-0 appear-animation" data-appear-animation="maskUp">WE ARE</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <h3 class="text-color-dark font-weight-bold text-transform-none line-height-1 text-10 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Indian Hajj Umrah Group Association</h3>
                    </div>
                    <p class="text-color-dark custom-font-secondary text-5-5 line-height-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">Indian Hajj Umrah Group Association, was established in the year 2007 under the provisions of Govt of India, Societies Act 21 of 1860 with the intention to coordinate and control the functioning of all such authorized groups and individuals who organize pilgrimage tours to the holy places in Saudi Arabia.</p>
                    <p class="text-3-5 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">The Association has 36 Private Tour Operators of Kerala, who conduct Haj, Umrah pilgrimage, as its members. All of these PTOs are registered by Ministry Of External Affairs, Govt of India. The Govt of India had been issuing license to all our members to conduct the Haj tour every year for the haj of that particular year.</p>
                    <a href="<?php echo esc_url(site_url('/about-us')); ?>" class="d-inline-flex align-items-center text-color-primary font-weight-bold text-4 text-decoration-none custom-link-effect-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
                        Read More
                    </a>
                </div>
                <div class="col-5 col-sm-7 col-md-12 col-lg-6 text-center">
                    <div class="position-relative z-index-2">
                        <img src="<?php echo get_theme_file_uri('img/haj-photo-1.jpeg'); ?>" class="appear-animation border-radius-2 box-shadow-3" width="500" alt="" data-appear-animation="expandIn" data-appear-animation-duration="600ms" />
                    </div>

                    <div class="patterns opacity-7 position-absolute z-index-1 d-none d-md-block" style="bottom: -8%; right: 9%;">
                        <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}" style="width: 310px; height: 170px;">
                            <svg width="100%" height="100%">
                                <defs>
                                    <pattern id="dots" x="0" y="0" width="18" height="18" patternUnits="userSpaceOnUse">
                                        <circle fill="#0088cc" cx="1.5" cy="1.5" r="1.5" />
                                    </pattern>
                                </defs>
                                <rect x="0" y="0" width="100%" height="100%" fill="url(#dots)" />
                            </svg>
                        </div>
                    </div>

                    <div class="patterns opacity-7 position-absolute z-index-1 d-none d-md-block" style="top: -10%; left: -36%;">
                        <div data-plugin-float-element data-plugin-options="{'startPos': 'top', 'speed': 0.1, 'transition': true, 'transitionDuration': 1000, 'isInsideSVG': true}" style="width: 310px; height: 170px;">
                            <svg width="100%" height="100%">
                                <defs>
                                    <pattern id="dots2" x="0" y="0" width="18" height="18" patternUnits="userSpaceOnUse">
                                        <circle fill="#CCC" cx="1.5" cy="1.5" r="1.5" />
                                    </pattern>
                                </defs>
                                <rect x="0" y="0" width="100%" height="100%" fill="url(#dots2)" />
                            </svg>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="section section-default border-0 m-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="text-primary text-uppercase text-4 mb-3" style="font-weight:600;">Our Members</h3>
                </div>
            </div>

            <?php
            $members = new WP_Query([
                'post_type' => 'member',
                'posts_per_page' => 7,
                'meta_key' => 'order',
                'orderby' => 'meta_value',
                'order' => 'ASC'
            ]);

            $total_members = wp_count_posts('member')->publish;

            if ($members->have_posts()) :
            ?>
                <div id="membersAccordion">
                    <div class="row">
                        <?php
                        while ($members->have_posts()) :
                            $members->the_post();
                        ?>
                            <div class="col-md-6 accordion accordion-modern-status accordion-modern-status-primary mb-3">
                                <div class="card card-default">
                                    <div class="card-header" id="member-<?php echo get_the_ID(); ?>-heading">
                                        <h4 class="card-title m-0">
                                            <a class="accordion-toggle bg-light text-color-dark font-weight-bold collapsed" data-bs-toggle="collapse" data-bs-target="#member-<?php echo get_the_ID(); ?>" aria-expanded="false" aria-controls="member-<?php echo get_the_ID(); ?>">
                                                <?php echo get_the_title(); ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="member-<?php echo get_the_ID(); ?>" class="collapse" aria-labelledby="member-<?php echo get_the_ID(); ?>-heading" data-bs-parent="#membersAccordion">
                                        <div class="card-body">
                                            <?php echo get_template_part('template-parts/member', 'info'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query();

                        if($total_members > 7):
                            ?>
                            <div class="col-md-6 accordion accordion-modern-status accordion-modern-status-primary">
                                <div class="card card-default">
                                    <div class="card-header bg-color-primary" id="viewMoreMembers">
                                        <h4 class="card-title m-0">
                                            <a href="<?php echo esc_url(site_url('/members')); ?>" class="text-color-light font-weight-bold">View More</a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
            <?php
            else :
            ?>
                <p>No members!</p>
            <?php
            endif;
            ?>
        </div>
    </section>
</div>
<?php
get_footer();
?>