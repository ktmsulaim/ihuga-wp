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
            <div class="col-md-7 m-auto text-justify">
                <div class="heading text-primary heading-border heading-bottom-border">
                    <h1>The <strong class="font-weight-extra-bold">Vision</strong></h1>
                </div>
                <p>We intend to provide the best facilities during travel and stay of the pilgrims during their pilgrimage to the holy cities Makkah and Madeena. We are pledged to try at all levels to get the subsidized rates to those who travel by private arrangements also, which is now available only to those who do Haj through Central Haj Committee of India. Contrary to the thinking of public and the administration alike, a considerable percentage of these pilgrims belong to the middle income groups.</p>
                <p>The airlines generally are charging abnormal rates during the haj season. We visualize talking national and international airline companies into keeping the rate normal and competitive for haj pilgrims also.</p>
                <p>Our vision also goes to make the public aware of the facts that the cost of the tour levied by our members is commensurate with the standard of convenient conveyance from/to India and the quality of food and accommodation.</p>

                <div class="heading text-primary heading-border heading-bottom-border mt-5">
                    <h1>The <strong class="font-weight-extra-bold">Mission</strong></h1>
                </div>
                <p>We help them to obtain license/registration of Govt of India as well as the approval of other friendly countries. We liaise with various ministries of Govt of India to get the rules and regulations on conduct of Haj Umrah tours simplified besides updating the members regarding such rules and regulations that affect conduct of pilgrimage.</p>
                <p>All the liaison work with Haj Division of Ministry of Minority Affairs, Central/State Haj Committees, Airport Authorities of India, Regional Passport Offices, Airline companies, IATA, Customs and Foreign Exchange Agencies, and Consulate of KSA and haj ministerial departments of KSA are initiated and pursued by this Association. The Association ensures that the members of the association adhere to the prevailing rules and regulations of both the governments of India and Kingdom of Saudi Arabia strictly and take appropriate action who err in this regard.</p>
                <p>The Association works for eradication of unscrupulous elements in the field of Haj Umrah tour operations, who exploit the ignorance of pilgrims who falls prey to them in their anxiety to have the first of visit of Holy Ka'aba in Makkah and Masjidunnabavi in Madeena.</p>
                <p>The Association works towards improving the facilities for travel and stay of the pilgrims during the pilgrimage. It also helps the pilgrims to get passports and tourist visas for pilgrimage and conducts lectures/classes and audio/visual and printed media to educate the pilgrims on Haj and Umrah rituals.</p>                
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>