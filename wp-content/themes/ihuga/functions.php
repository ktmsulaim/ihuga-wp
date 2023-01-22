<?php

add_action('wp_enqueue_scripts', 'scripts');

function scripts()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/vendor/bootstrap/css/bootstrap.min.css'));
    wp_enqueue_style('fontawesome', get_theme_file_uri('/vendor/fontawesome-free/css/all.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/vendor/animate/animate.compat.css'));
    wp_enqueue_style('simpleLineIcons', get_theme_file_uri('/vendor/simple-line-icons/css/simple-line-icons.min.css'));
    wp_enqueue_style('owlCarousel', get_theme_file_uri('/vendor/owl.carousel/assets/owl.carousel.min.css'));
    wp_enqueue_style('owlCarouselDefaultTheme', get_theme_file_uri('/vendor/owl.carousel/assets/owl.theme.default.min.css'));
    wp_enqueue_style('magnificPopup', get_theme_file_uri('/vendor/magnific-popup/magnific-popup.min.css'));
    wp_enqueue_style('themeMain', get_theme_file_uri('/css/theme.css'));
    wp_enqueue_style('themeElements', get_theme_file_uri('/css/theme-elements.css'));
    wp_enqueue_style('themeBlog', get_theme_file_uri('/css/theme-blog.css'));
    wp_enqueue_style('themeShop', get_theme_file_uri('/css/theme-shop.css'));
    wp_enqueue_style('circleFlipSlideshow', get_theme_file_uri('/vendor/circle-flip-slideshow/css/component.css'));
    wp_enqueue_style('skinDefault', get_theme_file_uri('/css/skins/default.css'));
    wp_enqueue_style('customCSS', get_theme_file_uri('/css/custom.css'));

    wp_enqueue_script('modernizr', get_theme_file_uri('/vendor/modernizr/modernizr.min.js'), NULL, '1.0.0', false);
    wp_enqueue_script('plugins', get_theme_file_uri('/vendor/plugins/js/plugins.min.js'), NULL, '1.0.0', true);
    wp_enqueue_script('themeSpecific', get_theme_file_uri('/js/theme.js'), NULL, '1.0.0', true);
    wp_enqueue_script('flipSlideshow', get_theme_file_uri('/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js'), NULL, '1.0.0', true);
    wp_enqueue_script('customJS', get_theme_file_uri('/js/custom.js'), NULL, '1.0.0', true);
    wp_enqueue_script('initThemes', get_theme_file_uri('/js/theme.init.js'), NULL, '1.0.0', true);

}

add_action('after_setup_theme', 'website_features');

function website_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_image_size('landscapeThumbnail', 400, 260, true);
    add_image_size('portraitThumbnail', 480, 650, true);
    add_image_size('pageBanner', 1920, 500, true);
    add_image_size('imageSlider', 1922, 700, true);
}

function short_content($words = 10)
{
    if (has_excerpt()) {
        return get_the_excerpt();
    } else {
        wp_trim_words(wp_strip_all_tags(get_the_content()), $words);
    }
}

function post_image($size = 'landscapeThumbnail')
{
    if (has_post_thumbnail()) {
        return the_post_thumbnail_url($size);
    } else {
        return get_theme_file_uri('img/placeholder.jpg');
    }
}

function no_data($type, $size = 150)
{
?>
    <div class="text-center">
        <img src="<?php echo get_theme_file_uri('/img/empty-box.png'); ?>" width="<?php echo $size; ?>" alt="No <?php echo $type; ?>">
        <div class="mt-2">
            <p class="text-center">No <?php echo $type; ?> found!</p>
        </div>
    </div>
<?php
}


function is_current_uri($uri)
{
    return $_SERVER['REQUEST_URI'] == $uri;
}

function is_active($uri)
{
    echo is_current_uri($uri) ? 'active' : '';
}

function pageHeader(array $attributes = ['title' => null, 'page_banner' => null, 'breadcrumb' => null])
{
    if (!$attributes['title']) {
        $attributes['title'] = get_the_title();
    }

    if (!$attributes['page_banner']) {
        $attributes['pageBanner'] = get_field('page_banner');
    }

    if (!$attributes['breadcrumb']) {
        $attributes['breadcrumb'] = [];
    }


?>

    <div class="header" id="secondary" style="background-image: url(<?php echo $attributes['page_banner'] ?? get_theme_file_uri('/img/banner.jpg'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-box">
                        <div class="title"><?php echo $attributes['title']; ?></div>
                        <div class="breadcrumb-wrapper">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo esc_url(site_url('/')); ?>">Home</a></li>
                                <?php
                                if ($attributes && $attributes['breadcrumb'] && count($attributes['breadcrumb'])) :
                                    foreach ($attributes['breadcrumb'] as $bc) :
                                ?>
                                        <li><a href="<?php echo $bc['url']; ?>"><?php echo $bc['label']; ?></a></li>
                                <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
}

function has_children()
{
    global $post;

    $children = get_pages(array('child_of' => $post->ID));
    if (count($children) == 0) {
        return false;
    } else {
        return true;
    }
}

function get_child_pages()
{

    global $post;

    if (is_page() && $post->post_parent)

        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
    else
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');

    if ($childpages) {

        $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
    }

    return $string;
}

if (!function_exists('has_sibling')) {
    function has_sibling($parent)
    {
        if (!$parent) :
            return;
        endif;

        $pages = wp_list_pages(array(
            'child_of' => $parent->ID,
            'exclude' => get_the_ID(),
            'echo' => false,
        ));

        return $pages;
    }
}

if (!function_exists('get_sibling')) {
    function get_sibling($parent)
    {
        if (!$parent) :
            return;
        endif;

        return wp_list_pages(array(
            'child_of' => $parent->ID,
            'exclude' => get_the_ID(),
            'title_li' => '',
        ));
    }
}

if (!function_exists('has_page_parent')) {
    function has_page_parent()
    {
        global $post;

        if ($post->post_parent) {
            return get_post($post->post_parent);
        }

        return false;
    }
}

if (!function_exists('get_page_parent')) {
    function get_page_parent()
    {
        return has_page_parent();
    }
}

function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = [])
{
    if (null === $wp_query) {
        global $wp_query;
    }

    $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links(
        array_merge([
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '?paged=%#%',
            'current'      => max(1, get_query_var('paged')),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __('« Prev'),
            'next_text'    => __('Next »'),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params)
    );

    if (is_array($pages)) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination-wrapper"><ul class="pagination justify-content-center">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item ' . (strpos($page, 'current') !== false ? 'active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

function get_subcategory_ids($category)
{
    if (!$category) :
        return;
    endif;

    $sub_categories = get_categories(['child_of' => $category]);

    $data = [];

    if ($sub_categories) {
        foreach ($sub_categories as $scat) {
            array_push($data, $scat->term_id);
        }
    }

    return $data;
}

add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query)
{
    if (!is_admin() && $query->is_main_query()) {
        $culture = get_cat_ID('culture');
        $article = get_cat_ID('article');

        if ($query->is_category($culture) || $query->is_category($article) || $query->is_category(get_subcategory_ids($culture))) {
            $query->set('post_type', 'artwork');

            return $query;
        }
    }
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}