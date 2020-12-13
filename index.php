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
    <?php // DEBUT ==> Theme Clair ?>
    <main class="theme-clair">
        <?php // deco au titre ==> Le vol des oie ?>
        <?php if(checked(1, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion" class="suggestion deco-title flying-left">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco-title flying-right">
                <?php get_template_part('parts/section/carte'); ?>
            </section>

        <?php // deco à la section ==> Mes empreintes de pas de l'oie ?>
        <?php elseif (checked(2, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion"  class="suggestion deco-section print-right">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco-section print-left">
                <?php get_template_part('parts/section/carte'); ?>
            </section>

        <?php // PAS de deco ?>
        <?php elseif (checked(3, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion" class="suggestion deco">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco">
                <?php get_template_part('parts/section/carte'); ?>
            </section>
        <?php endif; ?>


    </main>
    <?php // FIN ==> Theme Clair ?>
<?php elseif (checked(2, get_option('color_theme'), false)): ?>
    <?php // DEBUT ==> Theme Foncer ?>
    <main class="theme-foncer">
        <?php // deco au titre ==> Le vol des oie ?>
        <?php if(checked(1, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion" class="suggestion deco-title flying-left">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco-title flying-right">
                <?php get_template_part('parts/section/carte'); ?>
            </section>

        <?php // deco à la section ==> Mes empreintes de pas de l'oie ?>
        <?php elseif (checked(2, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion" class="suggestion deco-section print-right">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco-section print-left">
                <?php get_template_part('parts/section/carte'); ?>
            </section>

        <?php // PAS de deco ?>
        <?php elseif (checked(3, get_option('deco_theme'), false)): ?>
            <section class="hero">
                <?php get_template_part('parts/section/hero'); ?>
            </section>
            <section id="suggestion" class="suggestion deco">
                <?php get_template_part('parts/section/suggestion'); ?>
            </section>

            <?php get_template_part('parts/section/reservation'); ?>

            <section id="carte" class="carte deco">
                <?php get_template_part('parts/section/carte'); ?>
            </section>
        <?php endif; ?>
    </main>
    <?php // FIN ==> Theme Foncer ?>
<?php endif; ?>


<?php get_footer() ?>

