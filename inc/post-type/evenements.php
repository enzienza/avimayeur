<?php
/**
 * Name file: evenements
 *
 * Description: This file create a custom post type for manage of "evenements"
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

function CPT_evenements(){
    /**
     * définir les options du label
     * @var array
     */
    $labels = array(
        'name'               => __('Événements', 'evenements'),
        'singular_name'      => __('Événement', 'evenements'),
        'menu_name'          => __('Événements', 'evenements'),
        'name_admin_bar'     => __('Événement', 'evenements'),
        'add_new'            => __('Ajouter', 'evenements'),
        'add_new_item'       => __('Ajouter un événement', 'evenements'),
        'new_item'           => __('Nouvelle événement', 'evenements'),
        'edit_item'          => __('Éditer un événement', 'evenements'),
        'view_item'          => __('Voir l\'événement', 'evenements'),
        'all_items'          => __('Toutes les événements', 'evenements'),
        'search_items'       => __('Rechercher parmi les événements', 'evenements'),
        'not_found'          => __('Pas d\'événement trouvées', 'evenements'),
        'not_fount_in_trash' => __('Pas d\'événement dans la corbeille', 'evenements'),
    );

    /**
     * définir les option de rewrite
     * @var array
     */
    $rewrite = array(
        'slug'         => 'evenements',
        //'with_front'   => true,
        //'hierarchical' => false,
    );

    /**
     * définir les option de supports
     * @var array
     */
    $supports = array(
        'title',           // titre
        'editor',          // editeur
        //'thumbnail',       // image à la une
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
        'show_in_rest'      => true,              // oui => / editeur Gutemberg
        //'show_in_rest'      => false,             // non => / editeur Gutemberg
        'show_in_menu'      => true,
        'query_var'         => true,
        'show_in_nav_menus' => false,
        'capability_type'   => 'post',
        'menu_position'     => 7,
        'menu_icon'         => 'dashicons-megaphone',
        //'menu_icon'         => $iconSVG,
    );


    register_post_type('evenements', $args);

}

add_action('init', 'CPT_evenements');