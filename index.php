<?php
/**
 * Name file :   Index
 * Description : The main template file
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<?php get_header() ?>

<?php if(checked(1, get_option('color_theme'), false)): ?>
    <main class="theme-clair">
        <?php // START ==> deco_theme ?>
        <?php if(checked(1, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/title-deco') ?>

        <?php elseif (checked(2, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/section-deco') ?>

        <?php elseif (checked(3, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/no-deco') ?>

        <?php endif; // END ==> deco_theme)?>
    </main><!--//theme-clair-->

<?php elseif (checked(2, get_option('color_theme'), false)): ?>
    <main class="theme-foncer">
        <?php // START ==> deco_theme ?>
        <?php if(checked(1, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/title-deco') ?>

        <?php elseif (checked(2, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/section-deco') ?>

        <?php elseif (checked(3, get_option('deco_theme'), false)): ?>
            <?php get_template_part('template/deco-theme/no-deco') ?>

        <?php endif; // END ==> deco_theme)?>
    </main><!--//theme-foncer-->
<?php endif; ?>

<?php get_footer() ?>

