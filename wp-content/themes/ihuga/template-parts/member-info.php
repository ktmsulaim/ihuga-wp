<?php
$phone_numbers = [];
$mobile_numbers = [];

for ($i = 1; $i < 11; $i++) {
    if (get_field('phone_phone_' . $i)) {
        array_push($phone_numbers, get_field('phone_phone_' . $i));
    }

    if (get_field('mobile_mobile_' . $i)) {
        array_push($mobile_numbers, get_field('mobile_mobile_' . $i));
    }
}

$website = get_field('website');
?>

<div class="member-info">
    <ul class="list list-icons list-icons-style-2 list-icons-sm">
        <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Name">
            <i class="fa fa-user"></i> <?php echo get_field('name') ?? 'No name'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Address">
            <i class="fa fa-map-marker"></i> <?php echo get_field('address') ?? 'No address'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Phone">
            <i class="fa fa-phone"></i> <?php echo count($phone_numbers) ? join(", ", array_map(fn($phone_number) => '<a class="text-decoration-none" href="tel:'.$phone_number.'">'.$phone_number.'</a>', $phone_numbers)) : 'No phone numbers'; ?>
        </li>
        <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Mobile">
            <i class="fa fa-mobile"></i> <?php echo count($mobile_numbers) ? join(", ", array_map(fn($mobile_number) => '<a class="text-decoration-none" href="tel:'.$mobile_number.'">'.$mobile_number.'</a>', $mobile_numbers)) : 'No mobile numbers'; ?>
        </li>
        <?php if (get_field('fax')) : ?>
            <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Fax">
                <i class="fa fa-fax"></i> <?php echo get_field('fax') ?? 'No fax'; ?>
            </li>
        <?php endif; ?>
        <?php if ($website) : ?>
            <li data-bs-toggle="tooltip" data-bs-placement="left" data-bs-animation="false" title="Website">
                <i class="fa fa-globe"></i> <a href="<?php echo $website; ?>" target="_blank" rel="noopener noreferrer"><?php echo $website; ?></a>
            </li>
        <?php endif; ?>
    </ul>
</div>