<a class="h-100" href="<?php echo get_the_permalink(); ?>">
    <article class="h-100">
        <div style="background-image: url(<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url() : get_theme_file_uri('img/placeholder.jpg'); ?>); " class="thumb-info thumb-info-no-borders thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom border-radius-0 bg-image min-height-<?php echo $args['size']; ?>px">
            <div class="thumb-info-wrapper thumb-info-wrapper-opacity-6 min-height-<?php echo $args['size']; ?>px">
                <div class="thumb-info-title bg-transparent p-4">
                    <div class="thumb-info-type bg-color-primary px-2 mb-1"><?php echo formatDate(get_field('event_date')); ?></div>
                    <div class="thumb-info-inner mt-1">
                        <h2 class="text-color-light line-height-2 text-4 font-weight-bold mb-0"><?php echo get_the_title(); ?></h2>
                    </div>
                    <div class="thumb-info-show-more-content">
                        <p class="mb-0 text-1 line-height-9 mb-1 mt-2 text-light opacity-5">
                            <?php if (has_excerpt()) :
                                echo get_the_excerpt();
                            else :
                                echo substr(strip_tags(get_the_content()), 0, 100);
                            endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>
</a>