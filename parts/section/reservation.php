<?php
/**
 * Name file :   reservation
 * Description : display template part for reservation section
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<div class="container content">

    <ul class="group-list">
        <?php if(checked(1, get_option('add_logo_reservation'), false)): ?>
            <li class="group-item reserve-image">
                <img class="miniature"
                     src="<?php echo get_template_directory_uri().'/assets/img/mini-logo.png' ?>"
                     alt="<?php bloginfo('name') ?>"
                />
            </li>
        <?php endif; ?>
        <li class="group-item reserve-info">
            <p class="reserve-message"><?php echo get_option('message_reservation');?></p>
            <?php if(checked(1, get_option('add_phone_reservation'), false)): ?>
                <p class="reserve-phone"><?php echo get_option('phone') ?></p>
            <?php endif; ?>
        </li>
    </ul>

</div>
