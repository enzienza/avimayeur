<?php
/**
 * Name file: suggestion
 *
 * Description: This file create a custom post type for manage of "chef's suggestions"
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

function CPT_suggestion(){
    /**
     * définir les options du label
     * @var array
     */
    $labels = array(
        'name'               => __('Suggestions', 'suggestion'),
        'singular_name'      => __('Suggestion', 'suggestion'),
        'menu_name'          => __('Suggestions', 'suggestion'),
        'name_admin_bar'     => __('Suggestion', 'suggestion'),
        'add_new'            => __('Ajouter', 'suggestion'),
        'add_new_item'       => __('Ajouter une suggestion', 'suggestion'),
        'new_item'           => __('Nouvelle suggestion', 'suggestion'),
        'edit_item'          => __('Éditer une suggestion', 'suggestion'),
        'view_item'          => __('Voir la suggestion', 'suggestion'),
        'all_items'          => __('Toutes les suggestions', 'suggestion'),
        'search_items'       => __('Rechercher parmi les suggestions', 'suggestion'),
        'not_found'          => __('Pas de suggestion trouvées', 'suggestion'),
        'not_fount_in_trash' => __('Pas de suggestion dans la corbeille', 'suggestion'),
    );

    /**
     * définir les option de rewrite
     * @var array
     */
    $rewrite = array(
        'slug'         => 'suggestion',
        //'with_front'   => true,
        //'hierarchical' => false,
    );

    /**
     * définir les option de supports
     * @var array
     */
    $supports = array(
        'title',           // titre
        //'editor',          // editeur
        'thumbnail',       // image à la une
        //'author',          // auteur du post
        //'excerpt',         // extrait
        //'comments'         // commentaires autorisé
    );

    /**
     * définir l'icon SVG
     * @var array
     */
    // $iconSVG = data:image/svg+xml;base64,' . base64_encode();


    /**
     * définir les arguments du custom post type
     * @var array
     */
    $args = array(
        'labels'            => $labels,
        'rewrite'           => $rewrite,
        'supports'          => $supports,
        'public'            => true,
        'hierarchical'      => false,
        //'hierarchical'      => true,              // parent / child
        'has_archive'       => true,
        //'show_in_rest'      => true,              // oui => / editeur Gutemberg
        'show_in_rest'      => false,               // non => / editeur Gutemberg
        'show_in_menu'      => true,
        'query_var'         => true,
        'show_in_nav_menus' => false,
        'capability_type'   => 'post',
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-tickets-alt',
        //'menu_icon'         => $iconSVG,
    );


    register_post_type('suggestion', $args);

}

add_action('init', 'CPT_suggestion');