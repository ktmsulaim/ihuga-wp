<?php
get_header();

pageHeader([
    'title' => 'Circulars',
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => 'Circulars',
            'url' => get_post_type_archive_link(get_post_type())
        ]
    ]
])
?>

<section class="section">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <div class="col-7 m-auto">
                    <?php while (have_posts()) :
                        the_post();
                    ?>
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <h4 class="card-title mb-1 text-4 font-weight-bold d-flex justify-content-between">
                                    <?php if (get_field('file')) : ?>
                                        <a href="<?php echo get_field('file'); ?>"><?php echo get_the_title(); ?></a>
                                    <?php else: ?>
                                        <span><?php echo get_the_title(); ?></span>
                                    <?php endif; ?>
                                    <span class="text-1 font-weight-normal"><?php echo formatDate(get_the_date()); ?></span>
                                </h4>
                                <p class="card-text"><?php echo short_content(); ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="col">No Circulars!</div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if ($GLOBALS['wp_query']->found_posts > get_option('posts_per_page')) : ?>
    <section class="section bg-color-light">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php echo bootstrap_pagination(); ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
get_footer();
?>