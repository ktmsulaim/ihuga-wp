<?php
get_header();

$title = 'Untitled';
$type = 'Null';

if (is_category()) {
    $title = single_cat_title("", false);
    $type = 'Category';
} else if (is_author()) {
    $title = get_the_author();
    $type = 'Author';
} else {
    $title = get_the_archive_title();
    $type = 'Archive';
}

pageHeader([
    'title' => $title,
    'breadcrumb' => [
        0 => [
            'label' => $type,
            'url' => 'javascript:void(0)',
        ],
    ],
    'page_banner' => null,
]);
?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>


<?php
get_footer();
?>