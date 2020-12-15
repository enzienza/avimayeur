<?php
/**
 * Name file :   navtabs-carte
 * Description :
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<ul class="nav nav-tabs">
    <?php
        wp_reset_postdata();

        $args = array(
            'post_type'      => 'cartes',
            'posts_per_page' => -1,
            'orderby'        => 'id',
            'order'          => 'ASC'
        );
        $my_query = new WP_query($args);
        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
    ?>

        <li class="nav-item">
            <a
                    class="nav-link"
                    id="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
                    data-toggle="tab"
                    href="#<?php $title = sanitize_title(get_the_title()); echo $title;?>"
                    role="tab"
                    aria-controls="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
                    aria-selected="true"
            >
                <p><?php the_title(); ?></p>
            </a>
        </li>

    <?php endwhile; endif;  wp_reset_postdata(); ?>
</ul><!--//nav nav-tabs-->

