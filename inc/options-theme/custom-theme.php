<?php
/**
 * Name file:   custom-theme
 *
 * Description: This file regroup a link table that allows to manage
 *              the display of all pages of theme
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
class avimayeur_customtheme{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // page info - level 1
    const INFO_TITLE = 'Custom Theme';
    const INFO_MENU  = 'Custom Theme';
    const PERMITION  = 'manage_options';
    const DASHICON   = 'dashicons-admin-multisite';
    const GROUP      = 'avimayeur-options';
    const NONCE      = '_avimayeur-options';

    // definir les section
    const SECTION_THEME       = 'section_theme';

    /**
     * 2 - DEFINIR LES HOOKS ACTIONS
     */
    public static function register(){
        add_action('admin_menu', [self::class, 'addMenu']);
        add_action('admin_init', [self::class, 'registerSettings']);
        //add_action('admin_enqueue_scripts', [self::class, 'registerScripts']);
    }

    /**
     * 3 - CONSTRUCTION DE LA PAGE
     */
    public static function addMenu(){
        add_menu_page(
            self::INFO_TITLE,                   // TITLE_PAGE
            self::INFO_MENU,                    // TITLE_MENU
            self::PERMITION,                    // CAPABILITY
            self::GROUP,                        // SLUG_PAGE
            [self::class, 'render'],            // CALLBACK
            self::DASHICON,                     // icon
            3                                   // POSITION
        );
    }

    /**
     * 4 - TEMPLATE DES PAGES
     */
    public static function render(){
        ?>
            <div class="wrap">
                <h1 class="wp-heagin-inline">Personnaliser le theme</h1>
                <p class="description">
                    Sur cette page vous pouvez gérer l'affiche du theme
                </p><!--./description-->
            </div><!--./wrap-->

            <table class="widefat importers striped">
                <tr class="importer-item">
                    <td class="import-system">
                        <span class="importer-title">
                          Page d'accueil
                        </span>
                        <span class="importer-action">
                          <a href="?page=custom_homepage" class="install-now">
                            Gérer la page
                          </a>
                        </span>
                    </td>
                    <td class="desc">
                        <span class="importer-desc">
                          Lien pour gérer l'affichage de la page d'accueil (Page principal)
                        </span>
                    </td>
                </tr>

                <tr class="importer-item">
                    <td class="import-system">
                        <span class="importer-title">
                          Page des événements
                        </span>
                        <span class="importer-action">
                          <a href="?page=custom_eventpage" class="install-now">
                            Gérer la page
                          </a>
                        </span>
                    </td>
                    <td class="desc">
                        <span class="importer-desc">
                          Lien pour gérer l'affichage de la page des événements
                        </span>
                    </td>
                </tr>

                <tr class="importer-item">
                    <td class="import-system">
                        <span class="importer-title">
                          Page d'erreur
                        </span>
                        <span class="importer-action">
                          <a href="?page=custom_errorpage" class="install-now">
                            Gérer la page
                          </a>
                        </span>
                    </td>
                    <td class="desc">
                        <span class="importer-desc">
                          Lien pour gérer l'affichage de la page d'erreur
                        </span>
                    </td>
                </tr>

            </table>
    
            <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
                <?php
                    wp_nonce_field(self::NONCE, self::NONCE);
                    settings_fields(self::GROUP);
                    do_settings_sections(self::GROUP);
                ?>
                <?php submit_button(); ?>
            </form>
        <?php
    }

    /**
     * 5 - ENREGISTRER LES PARAMETTRES D'OPTIONS
     */
    public static function registerSettings(){
        /**
         * SECTION 1 : SECTION_THEME ==================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_THEME,                     // SLUG_SECTION
            'Theme',                                 // TITLE
            [self::class, 'display_section_theme'],  // CALLBACK
            self::GROUP                         // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'color_theme',                           // SLUG_FIELD
            'Choisir la couleur',                    // LABEL
            [self::class,'field_color_theme'],       // CALLBACK
            self::GROUP,                        // SLUG_PAGE
            self::SECTION_THEME                      // SLUG_SECTION
        );

        add_settings_field(
            'deco_theme',                            // SLUG_FIELD
            'Choisir la décotation',                 // LABEL
            [self::class,'field_deco_theme'],        // CALLBACK
            self::GROUP,                        // SLUG_PAGE
            self::SECTION_THEME                      // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::GROUP, 'color_theme');
        register_setting(self::GROUP, 'deco_theme');
    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    // DISPLAY SECTION 1 : SECTION_THEME ==================================
    public static function display_section_theme(){
        ?>
        <p class="section-description">
            Cetter partie est dédié à la gestion de theme
        </p>
        <?php
    }


    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    // FIELD SECTION 1 : SECTION_THEME ==================================
    public static function field_color_theme(){
        $color_theme = esc_attr(get_option('color_theme'));
        ?>
        <p class="description">Cocher la couleur du thème souhaiter</p>
        <p>
            <input type="radio"
                   id="theme_clair"
                   name="color_theme"
                   value="1"
                <?php checked(1, $color_theme, true); ?>
            />
            <label for="">Thème claire</label>
        </p>
        <p>
            <input type="radio"
                   id="theme_foncer"
                   name="color_theme"
                   value="2"
                <?php checked(2, $color_theme, true); ?>
            />
            <label for="">Thème foncer</label>
        </p>
        <?php
    }
    public static function field_deco_theme(){
        $deco_theme = esc_attr(get_option('deco_theme'));
        ?>
        <p class="description">Cocher l'élement design souhaiter</p>
        <p>
            <input type="radio"
                   id="title_deco"
                   name="deco_theme"
                   value="1"
                <?php checked(1, $deco_theme, true); ?>
            />
            <label for="">
                Ajouter la déco au titre
                <span class="desc">(Le vol des oies)</span>
            </label>
        </p>
        <p>
            <input type="radio"
                   id="section_deco"
                   name="deco_theme"
                   value="2"
                <?php checked(2, $deco_theme, true); ?>
            />
            <label for="">
                Ajouter la déco à la section
                <span class="desc">(Les empreintes de pas d'oie)</span>
            </label>
        </p>
        <p>
            <input type="radio"
                   id="no_deco"
                   name="deco_theme"
                   value="3"
                <?php checked(3, $deco_theme, true);?>
            />
            <label for="">Pas de décoration</label>
        </p>
        <?php
    }

    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('avimayeur_customtheme')) {
    avimayeur_customtheme::register();
}