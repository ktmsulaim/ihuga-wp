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

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

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
                        <?php echo get_template_part('template-parts/single', 'event', ['size' => 300]); ?>
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