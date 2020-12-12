<?php
/**
 * Name file:   homepage
 *
 * Description:
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

class avimayeur_homepage{
    /**
     * 1 - DEFINIR LES ELEMENTS (repeter)
     *     afin d'evite les fautes de frappe
     */
    // Page info - level 2
    const SUB1_TITLE   = 'Homepage';
    const SUB1_MENU    = 'Homepage';
    const PERMITION    = 'manage_options';
    const SUB1_GROUP   = 'options_homepage';
    const NONCE        = '_options_homepage';

    // definit les sections
    const SECTION_GENERAL    = 'section_general';
    const SECTION_HERO       = 'section_hero';
    const SECTION_SUGGESTION = 'section_suggestion';
    const SECTION_CARTE      = 'section_carte';
    const SECTION_RESERVE    = 'section_reserve';

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
        add_submenu_page(
            avimayeur_customtheme::GROUP,     // slug parent
            self::SUB1_TITLE,                    // page_title
            self::SUB1_MENU,                     // menu_title
            self::PERMITION,                     // capability
            self::SUB1_GROUP,                    // slug_menu
            [self::class, 'render']              // CALLBACK
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

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
            wp_nonce_field(self::NONCE, self::NONCE);
            settings_fields(SUB1_GROUP);
            do_settings_sections(SUB1_GROUP);
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
         * SECTION 1 : SECTION_GENERAL ===============================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_GENERAL,                     // SLUG_SECTION
            'Général',                            // TITLE
            [self::class, 'display_section_general'],  // CALLBACK
            SUB1_GROUP                                 // SLUG_PAGE
        ); // Section 2

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'color_theme',                           // SLUG_FIELD
            'Choisir la couleur',                    // LABEL
            [self::class,'field_color_general'],       // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_GENERAL                    // SLUG_SECTION
        );
        add_settings_field(
            'deco_theme',                            // SLUG_FIELD
            'Choisir la décoration de section',      // LABEL
            [self::class,'field_deco_general'],        // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_GENERAL                    // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        //register_setting(self::SUB1_GROUP, 'color_theme');
        //register_setting(self::SUB1_GROUP, 'deco_theme');


        /**
         * SECTION 2 : SECTION_HERO ==================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_HERO,                      // SLUG_SECTION
            'Section hero',                          // TITLE
            [self::class, 'display_section_hero'],   // CALLBACK
            SUB1_GROUP                               // SLUG_PAGE
        ); // Section 2

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'image_hero',                            // SLUG_FIELD
            'Image d\'arrière plan',                 // LABEL
            [self::class,'field_image_hero'],        // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_HERO                       // SLUG_SECTION
        );
        add_settings_field(
            'element_hero',                          // SLUG_FIELD
            'Ce qui doit être présent',              // LABEL
            [self::class,'field_element_hero'],      // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_HERO                       // SLUG_SECTION
        );
        add_settings_field(
            'message_hero',                          // SLUG_FIELD
            'Gestion d\'un message',                 // LABEL
            [self::class,'field_message_hero'],      // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_HERO                       // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'add_image_hero');


        /**
         * SECTION 3 : SECTION_SUGGESTION ============================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_SUGGESTION,                      // SLUG_SECTION
            'Section suggestion',                          // TITLE
            [self::class, 'display_section_suggestion'],   // CALLBACK
            SUB1_GROUP                                     // SLUG_PAGE
        ); // Section 3

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'title_suggestion',                      // SLUG_FIELD
            'Ajouter un titre',                      // LABEL
            [self::class,'field_title_suggestion'],  // CALLBACK
            SUB1_GROUP,                              // SLUG_PAGE
            self::SECTION_SUGGESTION                 // SLUG_SECTION
        );
        add_settings_field(
            'message_suggestion',                     // SLUG_FIELD
            'Gestion d\'un message',                   // LABEL
            [self::class,'field_message_suggestion'], // CALLBACK
            SUB1_GROUP,                               // SLUG_PAGE
            self::SECTION_SUGGESTION                  // SLUG_SECTION
        );

        // -> Sauvegarder les champs



        /**
         * SECTION 4 : SECTION_CARTE =================================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_CARTE,                      // SLUG_SECTION
            'Section carte',                          // TITLE
            [self::class, 'display_section_carte'],   // CALLBACK
            SUB1_GROUP                                // SLUG_PAGE
        ); // Section 4

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'title_carte',                      // SLUG_FIELD
            'Ajouter un titre',                 // LABEL
            [self::class,'field_title_carte'],  // CALLBACK
            SUB1_GROUP,                         // SLUG_PAGE
            self::SECTION_CARTE                 // SLUG_SECTION
        );
        add_settings_field(
            'message_carte',                     // SLUG_FIELD
            'Gestion d\'un message',             // LABEL
            [self::class,'field_message_carte'], // CALLBACK
            SUB1_GROUP,                          // SLUG_PAGE
            self::SECTION_CARTE                  // SLUG_SECTION
        );

        // -> Sauvegarder les champs




        /**
         * SECTION 5 : SECTION_RESERVE ===============================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_RESERVE,                    // SLUG_SECTION
            'Section réservation',                    // TITLE
            [self::class, 'display_section_reserve'], // CALLBACK
            SUB1_GROUP                                // SLUG_PAGE
        ); // Section 5

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'hidden_reserve',                           // SLUG_FIELD
            'Cacher la section',                        // LABEL
            [self::class,'field_hidden_reserve'],       // CALLBACK
            SUB1_GROUP,                                 // SLUG_PAGE
            self::SECTION_RESERVE                       // SLUG_SECTION
        );
        add_settings_field(
            'element_reserve',                          // SLUG_FIELD
            'Ce qui doit être présent',                 // LABEL
            [self::class,'field_element_reserve'],      // CALLBACK
            SUB1_GROUP,                                 // SLUG_PAGE
            self::SECTION_RESERVE                       // SLUG_SECTION
        );
        add_settings_field(
            'message_reserve',                          // SLUG_FIELD
            'Gestion d\'un message',                    // LABEL
            [self::class,'field_message_reserve'],      // CALLBACK
            SUB1_GROUP,                                 // SLUG_PAGE
            self::SECTION_RESERVE                       // SLUG_SECTION
        );

        // -> Sauvegarder les champs

    }


    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */

    // DISPLAY SECTION 1 : SECTION_GENERAL ==================================
    public static function display_section_general(){
        ?>
        <p class="section-description">
            Cette partie est dédié à la gestion des couleurs du theme
        <?php
    }

    // DISPLAY SECTION 2 : SECTION_HERO ==================================
    public static function display_section_hero(){
        ?>
        <p class="section-description">
            Cette partie est dédié à la gestion de la bannière à afficher
        </p>
        <?php
    }
    // DISPLAY SECTION 3 : SECTION_SUGGESTION ============================
    public static function display_section_suggestion(){
        ?>
        <p class="section-description">
            Cette partie est dédié à la gestion de la section suggestion.
        </p>
        <?php
    }
    // DISPLAY SECTION 4 : SECTION_CARTE =================================
    public static function display_section_carte(){
        ?>
        <p class="section-description">
            Cette partie est dédié à la gestion de la section de la carte
        </p>
        <?php
    }
    // DISPLAY SECTION 5 : SECTION_RESERVE ===============================
    public static function display_section_reserve(){
        ?>
        <p class="section-description">
            Cette partie est dédié à la gestion de la section de réservation
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

    // FIELD SECTION 1 : SECTION_GENERAL ===============================
    public static function field_color_general(){
        ?>
        <span>
                <input type="radio"
                       name="color_theme"
                       value="theme_clair"
                       <?php //echo checked($color_theme, 'theme_claire'); ?>
                />
                <label for="">Thème clair</label>
            </span>
        <span>
                <input type="radio"
                       name="color_theme"
                       value="theme_foncer"
                       <?php //echo checked($color_theme, 'theme_foncer'); ?>
                />
                <label for="">Thème foncer</label>
            </span>
        <?php
    }
    public static function field_deco_general(){
        ?>
        <p class="description">
            Cocher l'élément de design qui doit être présent
        </p>
        <div>
            <p>
                <input type="radio"
                       id=""
                       name=""
                       value="1"
                    <?php //checked(1, $, true); ?>
                />
                <label for="">
                    Ajouter la déco au titre
                    <span class="description">(Le vol des oies)</span>
                </label>
            </p>
            <p>
                <input type="radio"
                       id=""
                       name=""
                       value="1"
                    <?php //checked(1, $, true); ?>
                />
                <label for="">
                    Ajouter la déco à la section
                    <span class="description">(Les empreintes d'oie)</span>
                </label>
            </p>
        </div>
        <?php
    }

    // FIELD SECTION 2 : SECTION_HERO ==================================
    public static function field_image_hero(){
        ?>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label class="info">Ajouter l'image comme arrère plan</label>
        </p>
        <p class="height-space">
            <input type="file"
                   id=""
                   name=""
                   value="<?php //echo get_option(''); ?>"
            />
        </p>
        <p>
            <img src="<?php //echo get_option(''); ?>"
                 class=""
                 alt=""
            />
        </p>
        <?php
    }
    public static function field_element_hero(){
        ?>
        <p class="description">
            Cocher ce qui doit être présent sur l'image (par-dessus)
        </p>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label for="">Ajouter le logo</label>
        </p>
        <?php
    }
    public static function field_message_hero(){
        ?>
        <p class="description">
            Ajouter un message par-dessus l'image d'arrière plan
        </p>
        <div class="height-space">
            <p>
                <input type="checkbox"
                       id=""
                       name=""
                       value="1"
                    <?php //checked(1, $, true); ?>
                />
                <label for="">Ajouter le texte souhaiter</label>
                <textarea name="" id="" class="large-text code"><?php //echo $ ?></textarea>

            </p>
        </div>
        <?php
    }

    // FIELD SECTION 3 : SECTION_SUGGESTION ============================
    public static function field_title_suggestion(){
        ?>
        <input type="text"
               id=""
               name=""
               value="<?php //echo $ ?>"
               class="large-text"
        />
        <?php
    }
    public static function field_message_suggestion(){
        ?>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label for="">Ajouter une description à la section</label>
        </p>
        <textarea name="" id="" class="large-text code"><?php //echo $ ?></textarea>
        <?php
    }

    // FIELD SECTION 4 : SECTION_CARTE =================================
    public static function field_title_carte(){
        ?>
        <input type="text"
               id=""
               name=""
               value="<?php //echo $ ?>"
               class="large-text"
        />
        <?php
    }
    public static function field_message_carte(){
        ?>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label for="">Ajouter une description à la section</label>
        </p>
        <textarea name="" id="" class="large-text code"><?php //echo $ ?></textarea>
        <?php
    }

    // FIELD SECTION 5 : SECTION_RESERVE ===============================
    public static function field_hidden_reserve(){
        ?>
        <input type="checkbox"
               id=""
               name=""
               value="1"
            <?php //checked(1, $, true); ?>
        />
        <label for="">Masquer cette section de la page dédier aux cartes</label>
        <?php
    }
    public static function field_element_reserve(){
        ?>
        <p class="description">
            Cocher ce qui doit être présent dans la section
        </p>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label for="">Ajouter le logo</label>
        </p>
        <?php
    }
    public static function field_message_reserve(){
        ?>
        <p>
            <input type="checkbox"
                   id=""
                   name=""
                   value="1"
                <?php //checked(1, $, true); ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
        </p>
        <textarea name="" id="" class="large-text code"><?php //echo $ ?></textarea>
        <?php
    }


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */
}

if(class_exists('avimayeur_homepage')){
    avimayeur_homepage::register();
}