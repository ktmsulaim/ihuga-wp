<?php
get_header();

pageHeader([
    'title' => "Search",
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => get_query_var('s', "Search Keyword"),
            'url' => 'javascript:void(0)'
        ]
    ]
]);

$results = new WP_Query([
    's' => get_query_var('s')
]);
?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="font-weight-normal text-7 mb-0">Showing results for <strong class="font-weight-extra-bold"><?php echo get_query_var('s'); ?></strong></h2>
                <p class="lead mb-0"><?php echo $results->found_posts; ?> results found.</p>
            </div>
        </div>
        <div class="row">
            <div class="col pt-2 mt-1">
                <hr class="my-4">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <ul class="simple-post-list m-0">
                    <?php
                    while ($results->have_posts()) :
                        $results->the_post();
                    ?>
                        <li>
                            <div class="post-info">
                                <a><?php echo the_title(); ?></a>
                                <div class="post-meta">
                                    <span class="text-dark text-uppercase font-weight-semibold"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span> | <?php echo get_the_date(); ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <?php if ($results->found_posts > get_option('posts_per_page')) : ?>
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php echo bootstrap_pagination($results); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php
get_footer();
?>