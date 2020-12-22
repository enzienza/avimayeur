<?php
/**
 * Name file:   archive
 * Description: The page template to display all archives
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<?php get_header(); ?>

<?php if(checked(1, get_option('color_theme'), false)): ?>
    <section class="theme-clair">
        <div class="container">
            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                <div class="row">
                    <div class="col-12"><?php the_content(); ?></div>
                </div><!--//row-->
            <?php endwhile; else: ?>
                <div class="row">
                    <div class="col-12">
                        Désolé, il n'y a pas d'articles
                    </div>
                </div><!--//row-->
            <?php endif; ?>
        </div><!--//container-->
    </section>
<?php elseif (checked(2, get_option('color_theme'), false)): ?>
    <section class="theme-foncer">
        <div class="container">
            <?php if(have_posts()) : while(have_posts()) : the_post();?>
                <div class="row">
                    <div class="col-12"><?php the_content(); ?></div>
                </div><!--//row-->
            <?php endwhile; else: ?>
                <div class="row">
                    <div class="col-12">
                        Désolé, il n'y a pas d'articles
                    </div>
                </div><!--//row-->
            <?php endif; ?>
        </div><!--//container-->
    </section>
<?php endif; ?>


<?php get_footer(); ?>