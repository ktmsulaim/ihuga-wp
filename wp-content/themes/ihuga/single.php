<?php
get_header();

pageHeader([
    'title' => get_the_title(),
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => get_post_type_object(get_post_type())->labels->name,
            'url' => get_post_type_archive_link(get_post_type())
            ]
            ]
        ]);
?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 m-auto text-justify">
                <?php if(has_post_thumbnail()): ?>
                <div class="mb-3 thumb-info">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                </div>
                <div class="p-2 bg-color-light-scale-1 mb-3 border-rounded">
                    <div><i class="fa fa-calendar mr-2"></i> <?php echo formatDate(get_field('event_date')); ?></div>
                </div>
                <?php 
                    endif;
                    echo get_the_content(); 
                ?>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>