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
    <div class="container" style="background-image: url(<?php echo get_theme_file_uri('img/map-location-sc.png'); ?>);">
        <div class="row">
            <div class="col-5 offset-md-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h4>Location</h4>
                        <p>
                            1st Floor, Harsh Planet View Building <br> Opp. Kuniyil Kavu, Kalathilkunnu <br> Ashokapuram (P.O.), Pin: 673001 <br> Calicut, Kerala, India

                            <a href="https://goo.gl/maps/UrA36qmiZdc9HUdd9" target="_blank" class="text-decoration-none mt-1 d-block"><i class="fa fa-map-marker mr-2"></i> Locate on Google Maps</a>
                        </p>

                        <h4>Call Us</h4>
                        <p class="m-0">
                            <a href="tel:+914952772977" class="text-decoration-none">0495-2772977</a>
                        </p>
                        <p>
                            <a href="tel:+914952772877" class="text-decoration-none">0495-2772877</a>
                        </p>

                        <h4>Office Hours</h4>
                        <p class="m-0">10:00 AM to 05:00 AM</p>
                        <p>Monday to Saturday</p>
        
                        <h4>Write to Us</h4>
                        <p>
                            <a class="text-decoration-none" href="mailto:mail@example.com">ihuga1@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>