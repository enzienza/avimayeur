<?php
/**
 * Name file :   content
 * Description :
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>
<div class="row">
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
    
        <div class="col-12 event-content">
<!--            <h1>--><?php //the_title() ?><!--</h1>-->
            <?php the_content() ?>
        </div>

    <?php endwhile; else: ?>
        <div class="else-display">
            Il n'y a pas d'événement
        </div>
    <?php endif;  wp_reset_postdata(); ?>
</div><!--//rox-->