<?php
/**
 * Name file:   eventpage
 *
 * Description: This file used to manage the display
 *               all sections of the eventpage
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

/**
 * --- INDEX ---
 *
 * 1 - DEFINIR LES ELEMENTS (repeter)
 * 2 - DEFINIR LES HOOKS ACTIONS
 * 3 - CONSTRUCTION DE LA PAGE
 * 4 - TEMPLATE DES PAGES
 * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
 * 6 - DEFINIR LES SECTIONS DE LA PAGE
 * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
 * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
 * 9 - AJOUT STYLE & SCRIPT
 */

class avimayeur_eventpage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 2
    const SUB2_TITLE   = 'Eventpage';
    const SUB2_MENU    = 'Eventpage';
    const PERMITION    = 'manage_options';
    const SUB2_GROUP   = 'custom_eventpage';
    const NONCE        = '_custom_eventpage';

    // definir les section



    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        //add_action('admin_init', [self::class, 'registerSettings']);
        //add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    /**
     * 3 - CONSTRUCTION DE LA PAGE
     */
    public static function addMenu(){
        add_submenu_page(
            avimayeur_customtheme::GROUP,        // slug parent
            self::SUB2_TITLE,                    // page_title
            self::SUB2_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB2_GROUP,                    // slug_menu
            [self::class, 'render']              // CALLBACK
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
        <div class="wrap">
            <h1 class="wp-heagin-inline">
                Gestion de la page des événements
            </h1>
            <p class="description">
                Sur cette page vous pouvez gérer l'affichage toutes de la page des événements
            </p>
        </div>

<!--        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">-->
<!--            --><?php
//                wp_nonce_field(self::NONCE, self::NONCE);
//                settings_fields(self::SUB2_GROUP);
//                do_settings_sections(self::SUB2_GROUP);
//            ?>
<!--            --><?php //submit_button(); ?>
<!--        </form>-->
        <?php
    }

    /**
     * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
     */
//    public static function registerSettings(){
//        /**
//         * SECTION 1 : SECTION_HERO ==================================
//         *             -> Créer la section
//         *             -> Ajouter les éléments du formulaire
//         *             -> Sauvegarder les champs
//         *
//         */
//        // -> créer la section
//        // -> Ajouter les éléments du formulaire
//        // -> Sauvegarder les champs
//    }


    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */


    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('avimayeur_eventpage')) {
    avimayeur_eventpage::register();
}