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

?>

<section class="section">
    <div class="container">
        <?php
        if (have_posts()) :
        ?>
            <div id="membersAccordion">
                <div class="row">
                    <?php
                    while (have_posts()) :
                        the_post();
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