<?php 
    $phone_numbers = [];
    $mobile_numbers = [];

    for ($i=1; $i < 11; $i++) { 
        if(get_field('phone_phone_' . $i)) {
            array_push($phone_numbers, get_field('phone_phone_' . $i));
        }
        
        if(get_field('mobile_mobile_' . $i)) {
            array_push($mobile_numbers, get_field('mobile_mobile_' . $i));
        }
    }
?>

<div class="member-info">
    <ul class="list list-icons list-icons-style-2 list-icons-sm">
        <li data-bs-toggle="tooltip" data-bs-animation="false" title="Name">
            <i class="fa fa-user"></i> <?php echo get_field('name') ?? 'No name'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-animation="false" title="Address">
            <i class="fa fa-map-marker"></i> <?php echo get_field('address') ?? 'No address'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-animation="false" title="Phone">
            <i class="fa fa-phone"></i> <?php echo count($phone_numbers) ? join(", ", $phone_numbers) : 'No phone numbers'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-animation="false" title="Mobile">
            <i class="fa fa-mobile"></i> <?php echo count($mobile_numbers) ? join(", ", $mobile_numbers) : 'No mobile numbers'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-animation="false" title="Fax">
            <i class="fa fa-fax"></i> <?php echo get_field('fax') ?? 'No fax'; ?>
        </li>
    </ul>
</div>