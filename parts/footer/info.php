<?php
/**
 * Name file:   info
 * Description: display the template part for information in footer
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-12 block-contact">
            <div>
               <div class="contacting">
                   <p class="title"><?php bloginfo('title') ?></p>
                   <p class="location"><?php echo get_option('location'); ?></p>
                   <p class="phone"><?php echo get_option('phone'); ?></p>
               </div>
                <ul class="social-list">
                    <?php if(checked(1, get_option('add_facebook'), false)): ?>
                        <li class="social-item">
                            <a href="<?php echo (esc_attr(get_option('url_facebook'))) ?>" target="_blank">
                                <span class="icons flaticon-facebook"></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if(checked(1, get_option('add_instagram'), false)): ?>
                        <li class="social-item">
                            <a href="<?php echo (esc_attr(get_option('url_instagram'))) ?>" target="_blank">
                                <span class="icons flaticon-instagram"></span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if(checked(1, get_option('add_twitter'), false)): ?>
                        <li class="social-item">
                            <a href="<?php echo (esc_attr(get_option('url_twitter'))) ?>" target="_blank">
                                <span class="icons flaticon-twitter"></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>


        </div><!--//block-contact-->
        <div class="col-md-4 col-12 block-logo">
            <img src="<?php echo get_option('img_logo')?>"
                 class="logo"
                 alt="<?php bloginfo('title') ?>"
            />
        </div>
        <div class="col-md-4 col-12 block-horaire">
            <?php get_template_part('parts/footer/horaire') ?>
        </div>
    </div>
</div>
