<?php
get_header();

pageHeader([
    'title' => get_the_title(),
    'page_banner' => null,
    'breadcrumb' => [
        0 => [
            'label' => 'Events',
            'url' => 'javascript:void(0)'
        ]
    ]
]);

$gallery = get_field('photos');

$has_gallery = false;
$images = [];

try {
    $has_gallery = count($gallery) > 0;
    $images = array_values($gallery);
} catch (\Throwable $th) {
    $has_gallery = false;
}
?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col-md-7 m-auto text-justify">
                <?php if (has_post_thumbnail()) : ?>
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

        <hr class="gradient">
        
        <?php if ($has_gallery) : ?>
            <div class="row">
                <div class="col-12 col-md-7 mx-auto">
                    <div class="thumb-gallery-wrapper">
                        <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                            <?php foreach ($images as $image) : ?>
                                <div>
                                    <img src="<?php echo $image; ?>" class="img-fluid" alt="Event photo">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                        <?php foreach ($images as $image) : ?>
                                <div>
                                    <span class="d-block cur-pointer">
                                        <img  src="<?php echo $image; ?>" class="img-fluid">
                                    </span>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php
get_footer();
?>