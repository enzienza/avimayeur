<?php
/**
 * Name file: suggestion-item
 *
 * Description: This file will allow us to add
 *              the content of the CPT 'suggestion'
 *              => because we do not use the WP editor
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

class MB_suggestion_item{
    /**
     * 1 - DEFINIR LES VALEURS (repeter)
     */
    const META_KEY = 'suggestion_item';
    const NONCE    = '_suggestion_item';
    const TITLE_MB = 'Info suggestion';
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
                'normal',                     // CONTEXT [ normal | advanced | side ]
                'high'                      // PRIORITY [ high | default | low ]
            );
        }
    }

    /**
     * 4 - DEFENIR LA METABOX (template & champs)
     */
    public static function render($POST){
        wp_nonce_field(self::NONCE, self::NONCE);
        $desc_suggestion = get_post_meta($POST->ID, 'desc_suggestion', true);
        $price_suggestion = get_post_meta($POST->ID, 'price_suggestion', true);
        ?>
            <div class="height-space">
                <label for="">Ajouter la description</label>
                <textarea name="desc_suggestion" id="desc_suggestion" class="large-text code"><?php echo $desc_suggestion ?></textarea>

            </div>

            <div class="height-space">
                <label for="">Ajouter le prix</label>
                <input type="text"
                       id="price_suggestion"
                       name="price_suggestion"
                       value="<?php echo $price_suggestion ?>"
                       class="small-text"
                />
                <span> €</span>
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

            // SAVE $desc_suggestion
            if(isset($_POST['desc_suggestion'])) {
                if ($_POST['desc_suggestion'] === '') {
                    delete_post_meta(
                        $POST_ID, 'desc_suggestion', $_POST['desc_suggestion']
                    );
                } else {
                    update_post_meta(
                        $POST_ID, 'desc_suggestion', $_POST['desc_suggestion']
                    );
                }
            }

            // SAVE $price_suggestion
            if(isset($_POST['price_suggestion'])) {
                if ($_POST['price_suggestion'] === '') {
                    delete_post_meta(
                        $POST_ID, 'price_suggestion', $_POST['price_suggestion']
                    );
                } else {
                    update_post_meta(
                        $POST_ID, 'price_suggestion', $_POST['price_suggestion']
                    );
                }
            }
        }
    }


}
if (class_exists('MB_suggestion_item')) {
    MB_suggestion_item::register();
}