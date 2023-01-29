<?php
get_header();

pageHeader([
    'title' => get_the_title(),
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => get_the_title(),
            'url' => get_the_permalink()
        ]
    ]
]);

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$latest_events = new WP_Query([
    'post_type' => 'post',
    'meta_key' => 'event_date',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'paged' => $paged,
]);

?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <?php

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
            ?>
        </div>
    </div>
</section>

<?php if (wp_count_posts() > get_option('posts_per_page')) : ?>
    <section class="section bg-color-light">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php echo bootstrap_pagination($latest_events); ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;

get_footer();
?>