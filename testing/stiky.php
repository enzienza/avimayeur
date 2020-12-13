<?php
/**
 * Name file: sticky
 *
 * Description: This file will allow us to define
 *              if an posts will be present on the homepage
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

/**
 * --- INDEX ---
 *
 * 1 - DEFINIR LES VALEURS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA METABOX
 * 4 - DEFENIR LA METABOX (template & champs)
 * 5 - SAUVEGARDER LES DONNEES DE LA METABOX
 */

class MB_sticky{
    /**
     * 1 - DEFINIR LES VALEURS (repeter)
     */
    const META_KEY = 'sticky';
    const NONCE    = '_sticky';
    const TITLE_MB = 'Mettre en avant';
    const SCREEN   = array('suggestion');

    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('add_meta_boxes', [self::class, 'add'], 10, 2);
        add_action('save_post', [self::class, 'save']);
    }

    /**
     * 3 - CONSTRUCTION DE LA METABOX
     */
    public static function add($postType, $POST){
        if (current_user_can('publish_posts', $POST)){
            add_meta_box(
                self::META_KEY,             // ID_META_BOX
                self::TITLE_MB,             // TITLE_META_BOX
                [self::class, 'render'],    // CALLBACK
                self::SCREEN,               // WP_SCREEN
                'side',                     // CONTEXT [ normal | advanced | side ]
                'high'                      // PRIORITY [ high | default | low ]
            );
        }
    }

    /**
     * 4 - DEFENIR LA METABOX (template & champs)
     */
    public static function render($POST){
        wp_nonce_field(self::NONCE, self::NONCE);
        $sticky = get_post_meta($POST->ID, 'sticky', true);
        ?>
        <div class="components-base-control__field">
            <p class="description">
                Coucher l'élément si vous souhaitez qu'il soit présent sur la page accueil
            </p>

                <label for="" class="components-checkbox-control__label">
                    Ajouter à la page d'accueil
                </label>
            </div>
        </div>
        <?php
    }

    /**
     * 5 - SAUVEGARDER LES DONNEES DE LA METABOX
     */
    public static function save($POST_ID){
        if(
            //array_key_exists(self::META_KEY, $_POST) &&
        current_user_can('publish_posts', $POST_ID)
            //&& wp_verify_nonce($_POST[self::NONCE], self::NONCE)
        ){

            // save $sticky
            if(isset($_POST['sticky'])) {
//                if ($_POST['sticky'] === '0') {
//                    delete_post_meta(
//                        $POST_ID,
//                        'sticky',
//                        $_POST['sticky']
//                    );
//                } else {
                    update_post_meta(
                        $POST_ID,
                        'sticky',
                        $_POST['sticky']
                    );
//                }
            }

        }
    }


}
if (class_exists('MB_sticky')) {
    MB_sticky::register();
}