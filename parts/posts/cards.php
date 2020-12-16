<?php
/**
 * Name file :   cards
 * Description : display template part "cards" for suggestion section
 *               ==> Each card is a suggestion
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
            'post_type'      => 'suggestion',
            'posts_per_page' => 4,
            'orderby'        => 'id',
            'order'          => 'ASC',
            'meta_key'       => 'sticky',     // uniquement ceux qui on la mise en avant en 'oui'
            'meta_value'     => '1'
        );
        $my_query = new WP_query($args);
        if($my_query->have_posts()) : while($my_query->have_posts()) : $my_query->the_post();
    ?>
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-img">
                    <img src="<?php the_post_thumbnail_url() ?>"
                         alt="<?php the_title() ?>"
                         class="thumbnail"
                    />
                </div>
                <div class="card-body">
                    <h2 class="card-title"><?php the_title() ?></h2>
                    <p class="card-text">
                        <?php
                        $desc_suggestion = get_post_meta(get_the_ID(), 'desc_suggestion', true);

                        //echo get_post_meta(get_the_ID(), 'desc_suggestion', true)

                        echo mb_strimwidth($desc_suggestion, 0, 150, '');
                        ?>
                    </p>
                    <p class="card-price"><?php echo get_post_meta(get_the_ID(), 'price_suggestion', true) ?> €</p>
                </div>
            </div><!--//card-->
        </div>
    <?php endwhile; else: ?>
        <div class="col-12 else-display">
            <?php echo get_option('ifnot_suggestion'); ?>
        </div>
    <?php endif;  wp_reset_postdata(); ?>
</div>
