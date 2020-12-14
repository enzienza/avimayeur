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

<div class="container" >
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
</div>


<div class=" container main-carts">
    <!-- START FILTER -->
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
    </ul>
    </ul><!--//nav nav-tabs-->
    <!-- END FILTER -->

    <!-- START TAB-CONTENT -->
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
    <!-- END TAB-CONTENT -->

</div>