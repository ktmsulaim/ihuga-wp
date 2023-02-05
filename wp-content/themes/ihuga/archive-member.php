<?php
get_header();

pageHeader([
    'title' => 'Members',
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => 'Members',
            'url' => get_post_type_archive_link(get_post_type())
        ]
    ]
]);

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$category_id = get_query_var('category');
$posts_per_page = get_query_var('per_page', 10);

$args = [
    'post_type' => 'member',
    'meta_key' => 'order',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'paged' => $paged,
    'posts_per_page' => $posts_per_page
];

if($category_id) {
    $args['cat'] = $category_id;
}

$members = new WP_Query($args);

$categories = get_categories([
    'taxonomy' => 'category',
    'orderby' => 'name',
    'order'   => 'ASC'
]);
?>

<section class="section">
    <div class="container">
        <?php
        if ($members->have_posts()) :
        ?>
            <div id="membersAccordion">
                <div class="row">
                    <div class="col-12 col-md-6 mb-xs-4">
                        <ul class="nav nav-pills sort-source sort-source-style-3">
                            <li class="nav-item <?php echo !$category_id ? 'active' : '' ?>"><a class="nav-link text-2-5 text-uppercase <?php echo $category_id == '' ? 'active' : '' ?>" href="<?php echo get_post_type_archive_link(get_post_type()); ?>">All</a></li>
                            <?php if(is_array($categories) && count($categories)): ?>
                                <?php 
                                    foreach($categories as $category): 
                                    if($category->name == 'Uncategorized'):
                                        continue;
                                    endif;
                                ?>
                                    <li class="nav-item <?php echo $category_id && $category_id == $category->term_id ? 'active' : '' ?>"><a class="nav-link text-2-5 text-uppercase <?php echo $category_id && $category_id == $category->term_id ? 'active' : '' ?>" href="<?php echo esc_url(add_query_arg('category', $category->term_id)); ?>"><?php echo $category->name; ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-12 col-md-2 offset-md-4 custom-select">
                        <form action="" method="get">
                            <div class="form-group">
                                <select class="form-select form-control" name="per_page" id="perPage">
                                    <option <?php echo $posts_per_page == 5 ? 'selected' : null; ?> value="5">5</option>
                                    <option <?php echo $posts_per_page == 10 ? 'selected' : null; ?> value="10">10</option>
                                    <option <?php echo $posts_per_page == 20 ? 'selected' : null; ?> value="20">20</option>
                                    <option <?php echo $posts_per_page == 50 ? 'selected' : null; ?> value="50">50</option>
                                    <option <?php echo $posts_per_page == 100 ? 'selected' : null; ?> value="100">100</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-5">
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

<?php 
if ($members->found_posts > ($posts_per_page ?? get_option('posts_per_page'))) : ?>
    <section class="section bg-color-light">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-12">
                    <?php echo bootstrap_pagination($members); ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;

get_footer();
?>