<?php
/**
 * Name file :   title-deco
 * Description : deco au titre ==> Le vol des oie
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>


<section class="hero">
    <?php get_template_part('parts/section/hero'); ?>
</section><!--//hero-->

<section id="suggestion" class="suggestion deco-title flying-left">
    <div class="container header-suggestion">
        <?php get_template_part('parts/section/header-suggestion'); ?>
    </div><!--//header-suggestion-->
    <div class="container main-suggestion">
        <?php get_template_part('parts/posts/cards') ?>
    </div><!--//main-suggestion-->
</section><!--//suggestion-->

<?php if(checked(1, get_option('hidden_reservation'), false)): else: ?>
    <section class="reservation">
        <?php get_template_part('parts/section/reservation'); ?>
    </section><!--//reservation-->
<?php endif; ?>

<section id="carte" class="carte deco-title flying-right">
    <div class="container heaser-carte">
        <?php get_template_part('parts/section/carte'); ?>
    </div><!--//header-carte-->
    <div class="container maint-cart">
        <!-- START FILTER -->
        <?php get_template_part('parts/posts/nav-tabs') ?>
        <!-- END FILTER -->
        <!-- START TAB-CONTENT -->
        <?php get_template_part('parts/posts/tab-content') ?>
        <!-- END TAB-CONTENT -->
    </div><!--//tab-content-->
</section><!--carte-->
