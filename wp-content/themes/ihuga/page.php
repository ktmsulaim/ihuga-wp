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
])
?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 m-auto">
                <?php echo get_the_content(); ?>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>