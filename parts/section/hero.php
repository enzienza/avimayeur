<?php
/**
 * Name file:   hero
 * Description: display the template part for hero section
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<?php if(checked(1, get_option('add_image_hero'), false)): ?>
    <div class="hero" style="background-image: url(<?php echo get_option('image_hero') ?>)">
        <div class="filter">
            <?php if((checked(1, get_option('add_logo_hero'), false)) &&  (checked(1, get_option('add_message_hero'), false))): ?>
                <div class="row">
                    <div class="col-lg-3 col-12">
                        <img src="<?php echo get_template_directory_uri().'/assets/img/mini-logo.png' ?>"
                             class="miniature"
                             alt="<?php bloginfo('name') ?>"
                        />
                    </div>
                    <div class="col-lg-9 col-12">
                        <?php echo get_option('message_hero') ?>
                    </div>
                </div>
            <?php //endif; ?>
            <?php elseif(checked(1, get_option('add_message_hero'), false) ): ?>
                <div class="jumb-message container">
                    <?php echo get_option('message_hero') ?>
                </div>
            <?php elseif (checked(1, get_option('add_logo_hero'), false)): ?>
                <div class="jumb-hero">
                    <img src="<?php echo get_option('img_logo')?>"
                         class="logo"
                         alt="<?php bloginfo('title') ?>"
                    />
                </div>
            <?php //else: ?>
            <?php endif; ?>
        </div>
    </div>
<?php else: ?>
    <div class="hero">
        <div class="filter">
            <div class="jumb-hero">
                <img src="<?php echo get_option('img_logo')?>"
                     class="logo"
                     alt="<?php bloginfo('title') ?>"
                />
            </div>
        </div>
    </div>
<?php endif; ?>