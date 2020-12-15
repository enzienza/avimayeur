<?php
/**
 * Template Name: evenements
 *
 *
 *
 * Description:
 *
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<?php get_header(); ?>

<section class="hero">
    <?php get_template_part('parts/section/hero'); ?>
</section>

<section class="container main-event">
    <?php
        wp_reset_postdata();

        $args = array(
            'post_type'      => 'evenements',
            'posts_per_page' => -1,
            'orderby'        => 'id',
            'order'          => 'ASC',
            'meta_key'       => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
            'meta_value'     => '1'
        );
        $my_query = new WP_query($args);
        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
    ?>
        <div class="row">
            <h1><?php the_title() ?></h1>
            <div class="col-12">
                <?php the_content() ?>
            </div>
        </div>

    <?php endwhile; else: ?>
        <div class="else-display">
            Il n'y a pas d'événement
        </div>
    <?php endif;  wp_reset_postdata(); ?>
</section>

<?php get_footer(); ?>
