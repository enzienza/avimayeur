<?php
/**
 * Name file:   column-suggestion
 *
 * Description: file that customizes the theme
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

/**
 *  Step 1
 *  [Ajouter les columns]
 */
add_filter(
    'manage_suggestion_posts_columns',
    function($columns){
        return[
            'cb'                => '<input type="checkbox" />',
            'thumbnail'         => 'Miniature',
            'title'             => $columns['title'],
            'date'              => $columns['date']
        ];
    }
);


/**
 *  Step 2
 *  [Afficher le contenu souhaiter]
 */
add_filter(
    'manage_suggestion_posts_custom_column',
    function($column, $postId){
        if($column === 'thumbnail'){
            the_post_thumbnail('thumbnail', $postId);
        }
    },
    10,       // priority
    2        // nombre de parametre
);


