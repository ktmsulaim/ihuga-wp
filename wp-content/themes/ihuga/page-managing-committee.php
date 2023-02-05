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
]);




?>

<section class="section bg-color-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="heading heading-border heading-middle-border heading-middle-border-center">
                    <h4>Executive Committee <strong>2022-2025</strong></h4>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <?php
            $president = array_shift(get_posts([
                'post_type' => 'committee_member',
                'meta_key' => 'position',
                'meta_value' => 1
            ]));

            $generalSecretary = array_shift(get_posts([
                'post_type' => 'committee_member',
                'meta_key' => 'position',
                'meta_value' => 3
            ]));

            $treasurer = array_shift(get_posts([
                'post_type' => 'committee_member',
                'meta_key' => 'position',
                'meta_value' => 5
            ]));
            ?>
            <div class="col-md-4 mb-5 mb-md-0 appear-animation animated fadeInLeftShorter appear-animation-visible" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                <a class="d-block core-committee-photo hover-effect-2 mb-3" style="background-image: url(<?php echo has_post_thumbnail($president) ? get_the_post_thumbnail_url($president) : get_theme_file_uri('img/team/team-1.jpg'); ?>);"></a>
                <span class="text-color-primary text-2">President</span>
                <h4 class="font-weight-bold line-height-1 mb-1 mt-1"><?php echo $president ? $president->post_title : 'N/A' ?></h4>
                <p class="mb-1"><?php echo getWebsiteByCommitteeMember($president); ?></p>
                <?php
                if (getPhoneNumbers($president)) :
                ?>

                    <ul class="list list-icons list-icons-style-2 list-icons-sm">
                        <li>
                            <i class="fa fa-phone"></i> <?php echo getPhoneNumbers($president, true); ?>
                        </li>
                    </ul>
                <?php
                endif;
                ?>
            </div>
            <div class="col-md-4 mb-5 mb-md-0 appear-animation animated fadeIn appear-animation-visible" data-appear-animation="fadeIn" data-appear-animation-delay="600" style="animation-delay: 600ms;">
                <a class="d-block core-committee-photo hover-effect-2 mb-3" style="background-image: url(<?php echo has_post_thumbnail($generalSecretary) ? get_the_post_thumbnail_url($generalSecretary) : get_theme_file_uri('img/team/team-1.jpg'); ?>);"></a>
                <span class="text-color-primary text-2">General Secretary</span>
                <h4 class="font-weight-bold line-height-1 mb-1 mt-1"><?php echo $generalSecretary ? $generalSecretary->post_title : 'N/A' ?></h4>
                <p class="mb-1"><?php echo getWebsiteByCommitteeMember($generalSecretary); ?></p>
                <?php
                if (getPhoneNumbers($generalSecretary)) :
                ?>

                    <ul class="list list-icons list-icons-style-2 list-icons-sm">
                        <li>
                            <i class="fa fa-phone"></i> <?php echo getPhoneNumbers($generalSecretary, true); ?>
                        </li>
                    </ul>
                <?php
                endif;
                ?>
            </div>
            <div class="col-md-4 appear-animation animated fadeInRightShorter appear-animation-visible" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="900" style="animation-delay: 900ms;">
                <a class="d-block core-committee-photo hover-effect-2 mb-3" style="background-image: url(<?php echo has_post_thumbnail($treasurer) ? get_the_post_thumbnail_url($treasurer) : get_theme_file_uri('img/team/team-1.jpg'); ?>);"></a>
                <span class="text-color-primary text-2">Treasurer</span>
                <h4 class="font-weight-bold line-height-1 mb-1 mt-1"><?php echo $treasurer ? $treasurer->post_title : 'N/A'; ?></h4>
                <p class="mb-1"><?php echo getWebsiteByCommitteeMember($treasurer); ?></p>
                <?php
                if (getPhoneNumbers($treasurer)) :
                ?>
                    <ul class="list list-icons list-icons-style-2 list-icons-sm">
                        <li>
                            <i class="fa fa-phone"></i> <?php echo getPhoneNumbers($treasurer, true); ?>
                        </li>
                    </ul>
                <?php
                endif;
                ?>
            </div>
        </div>

        <?php
        $vicePresidentsAndSecretaries = get_posts([
            'post_type' => 'committee_member',
            'meta_key' => 'position',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => 'position',
                    'value' => [2, 4],
                    'compare' => 'IN'
                ]
            ]
        ]);

        if (count($vicePresidentsAndSecretaries)) :
        ?>
            <div class="row mt-5">
                <?php
                foreach ($vicePresidentsAndSecretaries as $key => $vpsc) :
                ?>
                    <div class="col-sm-9 col-md-6 mb-5-5">
                        <div class="row align-items-center appear-animation animated fadeInUpShorterPlus appear-animation-visible" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="200" style="animation-delay: 200ms;">
                            <div class="col-lg-5 col-xl-6 pe-lg-0 mb-0">
                                <a class="d-block core-committee-assistants-photo hover-effect-2 mb-3" style="background-image: url(<?php echo has_post_thumbnail($vpsc) ? get_the_post_thumbnail_url($vpsc) : get_theme_file_uri('img/demos/digital-agency/team/team-1.jpg'); ?>);"></a>
                            </div>
                            <div class="col-lg-7 col-xl-6 ps-lg-4">
                                <h3 class="d-block text-color-default font-weight-semibold line-height-1 positive-ls-2 text-2 mb-2"><?php echo getPositionByNumber(get_field('position', $vpsc->ID)); ?></h3>
                                <h4 class="text-color-dark font-weight-bold line-height-1 mt-3 mb-1"><?php echo $vpsc->post_title ?? 'N/A' ?></h4>
                                <p class="mb-1 text-2"><?php echo getWebsiteByCommitteeMember($vpsc); ?></p>
                                <ul class="list list-icons list-icons-style-2 list-icons-sm">
                                    <li>
                                        <i class="fa fa-phone"></i> <?php echo getPhoneNumbers($vpsc, true); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>

            </div>
        <?php
        endif;

        wp_reset_postdata();

        $members = get_posts([
            'post_type' => 'committee_member',
            'numberposts' => -1,
            'meta_key' => 'order',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'position',
                    'value' => 6
                ]
            ]
        ]);

        if (count($members)) :
        ?>
            <div class="row mt-5">
                <div class="col">
                    <div class="heading heading-border heading-middle-border heading-middle-border-center">
                        <h4>Executive Members <strong>2022-2025</strong></h4>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <?php
                foreach ($members as $member) :
                ?>
                    <div class="col-md-6 col-lg-3 mb-3 appear-animation animated fadeInUpShorter appear-animation-visible" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200" style="animation-delay: 200ms;">

                        <div class="featured-box featured-box-quaternary featured-box-effect-3">
                            <div class="box-content box-content-border-0">
                                <?php if (has_post_thumbnail($member)) : ?>
                                    <p class="m-0 d-flex justify-content-center">
                                        <span class="executive-committee-photo" style="background-image: url(<?php echo get_the_post_thumbnail_url($member); ?>)" alt="Executive Member Photo">
                                    </p>
                                <?php else : ?>
                                    <i class="icon-featured fa fa-user-circle"></i>
                                <?php endif; ?>
                                <h4 class="font-weight-bold text-4 mt-3"><?php echo $member->post_title; ?></h4>
                                <p class="mb-1 text-1"><?php echo getWebsiteByCommitteeMember($member); ?></p>
                                <ul class="list list-icons list-icons-style-2 list-icons-sm">
                                    <li style="text-align: left;">
                                        <i class="fa fa-phone"></i> <?php echo getPhoneNumbers($member, true); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        <?php

        endif;
        ?>

    </div>
</section>


<?php
get_footer();
?>