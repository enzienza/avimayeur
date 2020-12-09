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
<main>
    <section class="hero">
        <?php get_template_part('parts/hero'); ?>
    </section>
    <section class="suggestion">
        <div class="container" style="height: 500px">
            <h1>Section dédier au suggestion</h1>
        </div>
    </section>
    <section class="carte">
        <div class="container" style="height: 500px">
            <h1>Section dédier à la carte</h1>
        </div>
    </section>
</main>
<?php get_footer() ?>

