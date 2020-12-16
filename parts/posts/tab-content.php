<?php
/**
 * Name file :   tab-content
 * Description : Load the 'tab-content' part of the template on the pages
 *               ==> this content is linked a 'nav-tabs'
 *               ==> each tab-content for a carte
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active">
        <p class="else-display">
            <?php echo get_option('maintext_carte') ?>
        </p>
    </div>
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
        <div
            class="tab-pane fade container"
            id="<?php $title = sanitize_title(get_the_title()); echo $title;?>"
            role="tabpanel"
            aria-labelledby="tab-<?php $title = sanitize_title(get_the_title()); echo $title;?>"
        >
            <div class="">
                <?php the_content(); ?>
            </div>
        </div>
    <?php endwhile; endif;  wp_reset_postdata(); ?>

</div><!--//tab-content-->
