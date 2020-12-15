<?php
/**
 * Name file :   carte
 * Description :
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<h1 class="title-section">
    <?php echo get_option('title_carte'); ?>
</h1>
<?php if(checked(3, get_option('deco_theme'), false)):?>
    <p class="flip flip-large">
        <span class="deg1"></span>
        <span class="deg2"></span>
        <span class="deg3"></span>
    </p>
<?php endif; ?>

<?php if(checked(1, get_option('add_message_carte'), false)): ?>
    <div class="description">
        <?php echo get_option('message_carte') ?>
    </div>
<?php endif; ?>