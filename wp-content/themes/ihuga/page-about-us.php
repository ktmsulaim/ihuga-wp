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
            <div class="col-md-5">
                <div class="cascading-images-wrapper">
                    <div class="cascading-images position-relative">
                        <img src="<?php echo get_theme_file_uri('img/haj/madina-2.jpeg'); ?>" class="appear-animation" width="500" alt="" data-appear-animation="fadeInUpShorter" data-appear-animation-duration="600ms" data-plugin-options="{'accY': -300}" />
                        <div class="position-absolute w-100" style="top: 41%; left: -30%;">
                            <img src="<?php echo get_theme_file_uri('img/haj/makkah-1.jpeg'); ?>" class="appear-animation" width="500" alt="" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="300" data-appear-animation-duration="600ms" data-plugin-options="{'accY': -300}" />
                        </div>
                        <div class="position-absolute w-100" style="top: 75%; left: 30%;">
                            <img src="<?php echo get_theme_file_uri('img/haj/madina-1.jpeg'); ?>" class="appear-animation" width="500" alt="" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600" data-appear-animation-duration="600ms" data-plugin-options="{'accY': -150}" />
                        </div>
                    </div>
                </div>
    
            </div>
            <div class="col-md-7 text-justify">
                <p>Indian Hajj Umrah Group Association, was established in the year 2007 under the provisions of Govt of India, Societies Act 21 of 1860 with the intention to coordinate and control the functioning of all such authorized groups and individuals who organize pilgrimage tours to the holy places in Saudi Arabia.</p>
                <p>The Association has 115 Private Tour Operators of Kerala, who conduct Haj, Umrah pilgrimage, as its members. All of these PTOs are registered by Haj Division, Ministry Of Minority Affairs, Govt of India. The Govt of India had been issuing license to all our members to conduct the Haj tour every year for the haj of that particular year.</p>
                <p>Registration by Haj Division, Ministry of Minority Affairs, Govt of India, is a prerequisite for enrolling as member of the Association. The Association verifies the validity of the license of each member and its record of conducting tours before admitting it to the membership of the Association.</p>
                <p>The Association has two constituent bodies, a general body which consists of all the PTOs and an elected executive body which consists not less than 7 members but not more than 31 members. The office bearers are elected from among the executive committee, whose tenure is determined as 3 years.</p>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>