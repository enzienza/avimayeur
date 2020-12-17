<?php
/**
 * Name file :   section-deco
 * Description : This file is displaying template part for
 *               the "title-deco" theme
 *               ==> Les empreintes de pas de l'oie
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */
?>

<section class="hero">
    <?php get_template_part('parts/section/hero'); ?>
</section><!--//hero-->

<section id="suggestion" class="suggestion deco-section print-right">
    <div class="container header-suggestion">
        <?php get_template_part('parts/section/header-suggestion'); ?>
    </div><!--//header-suggestion-->
    <div class="container main-suggestion">
        <?php get_template_part('parts/posts/cards') ?>
    </div><!--//main-suggestion-->
</section><!--suggestion-->

<?php if(checked(1, get_option('hidden_reservation'), false)): else: ?>
    <section class="reservation">
        <?php get_template_part('parts/section/reservation'); ?>
    </section><!--//revercation-->
<?php endif; ?>

<section id="carte" class="carte deco-section print-left">
    <div class="container header-carte">
        <?php get_template_part('parts/section/header-carte'); ?>
    </div><!--//header-carte-->
    <div class="container maint-cart">
        <!-- START FILTER -->
        <?php get_template_part('parts/posts/nav-tabs') ?>
        <!-- END FILTER -->
        <!-- START TAB-CONTENT -->
        <?php get_template_part('parts/posts/tab-content') ?>
        <!-- END TAB-CONTENT -->
    </div><!--//tab-content-->
</section><!--//carte-->

<?php if(checked(1, get_option('hidden_evenement'), false)): else: ?>
    <section id="evenement" class="evenement deco-section print-right">
        <div class="container header-event">
            <?php get_template_part('parts/section/header-event') ?>
        </div><!--//header-event-->
        <div class="container main-event">
            <?php get_template_part('parts/posts/content') ?>
        </div><!--//main-event-->
    </section><!--//evenement-->
<?php endif; ?>