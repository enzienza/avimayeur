<?php
/**
 * Name file:   homepage
 *
 * Description: This file used to manage the display
 *               all sections of the homepage
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
    // page info - level 2
    const SUB1_TITLE   = 'Homepage';
    const SUB1_MENU    = 'Homepage';
    const PERMITION    = 'manage_options';
    const SUB1_GROUP   = 'custom_homepage';
    const NONCE        = '_custom_homepage';

    // definir les section
    const SECTION_HERO        = 'section_hero';
    const SECTION_SUGGESTION  = 'section_suggestion';
    const SECTION_RESERVATION = 'section_reservation';
    const SECTION_CARTE       = 'section_carte';

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
            avimayeur_customtheme::GROUP,        // slug parent
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
            <h1 class="wp-heagin-inline">
                Gestion de la page d'accueil
            </h1>
            <p class="description">
                Sur cette page vous pouvez gérer l'affichage toutes les sections de la page d'accueil
            </p>
        </div>

        <form class="form-customtheme" action="options.php" method="post" enctype="multipart/form-data">
            <?php
                wp_nonce_field(self::NONCE, self::NONCE);
                settings_fields(self::SUB1_GROUP);
                do_settings_sections(self::SUB1_GROUP);
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
         * SECTION 1 : SECTION_HERO ==================================
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
            self::SUB1_GROUP                         // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'image_hero',                           // SLUG_FIELD
            'Image d\'arrière plan',                // LABEL
            [self::class,'field_image_hero'],       // CALLBACK
            self::SUB1_GROUP,                       // SLUG_PAGE
            self::SECTION_HERO                      // SLUG_SECTION
        );
        add_settings_field(
            'element_hero',                         // SLUG_FIELD
            'Ce qui doit être présent',             // LABEL
            [self::class,'field_element_hero'],     // CALLBACK
            self::SUB1_GROUP,                       // SLUG_PAGE
            self::SECTION_HERO                      // SLUG_SECTION
        );
        add_settings_field(
            'message_hero',                         // SLUG_FIELD
            'Gestion d\'un message',                // LABEL
            [self::class,'field_message_hero'],     // CALLBACK
            self::SUB1_GROUP,                       // SLUG_PAGE
            self::SECTION_HERO                      // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'add_image_hero');
        register_setting(self::SUB1_GROUP, 
            'image_hero', 
            [self::class, 'handle_file_image_hero']
        );
        register_setting(self::SUB1_GROUP, 'add_logo_hero');
        register_setting(self::SUB1_GROUP, 'add_message_hero');
        register_setting(self::SUB1_GROUP, 'message_hero');


        /**
         * SECTION 2 : SECTION_SUGGESTION =============================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_SUGGESTION,                     // SLUG_SECTION
            'Section suggestion',                         // TITLE
            [self::class, 'display_section_suggestion'],  // CALLBACK
            self::SUB1_GROUP                              // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'title_suggestion',                           // SLUG_FIELD
            'Ajouter un titre',                           // LABEL
            [self::class,'field_title_suggestion'],       // CALLBACK
            self::SUB1_GROUP,                             // SLUG_PAGE
            self::SECTION_SUGGESTION                      // SLUG_SECTION
        );
        add_settings_field(
            'message_suggestion',                         // SLUG_FIELD
            'Gestion d\'un message d\'introduction',      // LABEL
            [self::class,'field_message_suggestion'],     // CALLBACK
            self::SUB1_GROUP,                             // SLUG_PAGE
            self::SECTION_SUGGESTION                      // SLUG_SECTION
        );
        add_settings_field(
            'ifnot_suggestion',                         // SLUG_FIELD
            'Gestion d\'un message',                    // LABEL
            [self::class,'field_ifnot_suggestion'],     // CALLBACK
            self::SUB1_GROUP,                           // SLUG_PAGE
            self::SECTION_SUGGESTION                    // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'title_suggestion');
        register_setting(self::SUB1_GROUP, 'add_message_suggestion');
        register_setting(self::SUB1_GROUP, 'message_suggestion');
        register_setting(self::SUB1_GROUP, 'ifnot_suggestion');

        /**
         * SECTION 3 : SECTION_RESERVATION ============================
         *             -> Créer la section
         *             -> Ajouter les éléments du formulaire
         *             -> Sauvegarder les champs
         *
         */
        // -> créer la section
        add_settings_section(
            self::SECTION_RESERVATION,                      // SLUG_SECTION
            'Section revervation',                          // TITLE
            [self::class, 'display_section_revervation'],   // CALLBACK
            self::SUB1_GROUP                                // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'hidden_reservation',                         // SLUG_FIELD
            'Cacher la section',                          // LABEL
            [self::class,'field_hidden_reservation'],     // CALLBACK
            self::SUB1_GROUP,                             // SLUG_PAGE
            self::SECTION_RESERVATION                     // SLUG_SECTION
        );
        add_settings_field(
            'element_reservation',                        // SLUG_FIELD
            'Ce qui doit être présent',                   // LABEL
            [self::class,'field_element_reservation'],    // CALLBACK
            self::SUB1_GROUP,                             // SLUG_PAGE
            self::SECTION_RESERVATION                     // SLUG_SECTION
        );
        add_settings_field(
            'message_reservation',                        // SLUG_FIELD
            'Gestion d\'un message',                      // LABEL
            [self::class,'field_message_reservation'],    // CALLBACK
            self::SUB1_GROUP,                             // SLUG_PAGE
            self::SECTION_RESERVATION                     // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'hidden_reservation');
        register_setting(self::SUB1_GROUP, 'add_logo_reservation');
        register_setting(self::SUB1_GROUP, 'add_phone_reservation');
        //register_setting(self::SUB1_GROUP, 'add_message_reservation');
        register_setting(self::SUB1_GROUP, 'message_reservation');


        /**
         * SECTION 4 : SECTION_CARTE ==================================
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
            self::SUB1_GROUP                          // SLUG_PAGE
        );

        // -> Ajouter les éléments du formulaire
        add_settings_field(
            'titre_carte',                       // SLUG_FIELD
            'Ajouter un titre',                  // LABEL
            [self::class,'field_titre_carte'],   // CALLBACK
            self::SUB1_GROUP,                    // SLUG_PAGE
            self::SECTION_CARTE                  // SLUG_SECTION
        );
        add_settings_field(
            'message_carte',                         // SLUG_FIELD
            'Gestion d\'un message d\'introduction', // LABEL
            [self::class,'field_message_carte'],     // CALLBACK
            self::SUB1_GROUP,                        // SLUG_PAGE
            self::SECTION_CARTE                      // SLUG_SECTION
        );
        add_settings_field(
            'maintext_carte',                     // SLUG_FIELD
            'Texte principal',                    // LABEL
            [self::class,'field_maintext_carte'], // CALLBACK
            self::SUB1_GROUP,                     // SLUG_PAGE
            self::SECTION_CARTE                   // SLUG_SECTION
        );

        // -> Sauvegarder les champs
        register_setting(self::SUB1_GROUP, 'title_carte');
        register_setting(self::SUB1_GROUP, 'add_message_carte');
        register_setting(self::SUB1_GROUP, 'message_carte');
        register_setting(self::SUB1_GROUP, 'maintext_carte');

    }

    /**
     * 6 - DEFINIR LES SECTIONS DE LA PAGE
     */
    // DISPLAY SECTION 1 : SECTION_HERO ==================================
    public static function display_section_hero(){
        ?>
            <p class="section-description">
                Cetter partie est dédié à la gestion de la bannière
            </p>
        <?php
    }
    // DISPLAY SECTION 2 : SECTION_SUGGESTION =============================
    public static function display_section_suggestion(){
        ?>
            <p class="section-description">
                Cetter partie est dédié à la gestion de la section suggestion
            </p>
        <?php
    }
    // DISPLAY SECTION 3 : SECTION_RESERVATION ============================
    public static function display_section_revervation(){
        ?>
        <p class="section-description">
            Cetter partie est dédié à la gestion de la section réservation
        </p>
        <?php
    }
    // DISPLAY SECTION 4 : SECTION_CARTE ==================================
    public static function display_section_carte(){
        ?>
            <p class="section-description">
                Cetter partie est dédié à la gestion de la section carte
            </p>
        <?php
    }

    /**
     * 7 - DEFINIR LE TELECHARGEMENT DES FICHIER
     *     le fichier sera stocké dans le dossier upload
     */
    public static function handle_file_image_hero(){
        if(!empty($_FILES['image_hero']['tmp_name'])){
            $urls = wp_handle_upload($_FILES['image_hero'], array('test_form' => FALSE));
            $temp = $urls['url'];
            return $temp;
        } // end -> if(!empty($_FILES['image_hero']['tmp_name']))

        //no upload. old file url is the new value.
        return get_option('image_hero');
    }


    /**
     * 8 - DEFINIR LES CHAMPS POUR RECUPERER LES INFOS
     */
    // FIELD SECTION 1 : SECTION_HERO ===================================
    public static function field_image_hero(){
        $add_image_hero = esc_attr(get_option('add_image_hero'));
        ?>
        <div>
            <input type="checkbox"
                   id="add_image_hero"
                   name="add_image_hero"
                   value="1"
                   <?php checked(1, $add_image_hero, true); ?>
            />
            <label class="info" for="">Ajouter l'image comme arrière plan</label>
        </div>
        <div class="height-space">
            <input type="file"
                   id="image_hero"
                   name="image_hero"
                   value="<?php echo get_option('image_hero'); ?>"
            />
        </div>
        <div>
            <img src="<?php echo get_option('image_hero'); ?>"
                 class="img-hero"
                 alt=""
            />
        </div>
        <?php
    }
    public static function field_element_hero(){
        $add_logo_hero = esc_attr(get_option('add_logo_hero'))
        ?>
        <p class="description">
            Cocher ce qui doit être présent sur l'image (par-dessus)
        </p>
        <p>
            <input type="checkbox"
                   id="add_logo_hero"
                   name="add_logo_hero"
                   value="1"
                   <?php checked(1, $add_logo_hero, true); ?>
            />
            <label for="">Ajouter le logo</label>
        </p>
        <?php
    }
    public static function field_message_hero(){
        $add_message_hero = esc_attr(get_option('add_message_hero'));
        $message_hero = esc_attr(get_option('message_hero'));
        ?>
        <p class="description">
            Ajouter un message par-dessus l'image d'arrière plan
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_message_hero"
                   name="add_message_hero"
                   value="1"
                <?php checked(1, $add_message_hero, true); ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="message_hero" id="message_hero" class="large-text code"><?php echo $message_hero ?></textarea>
        </div>
        <?php
    }

    // FIELD SECTION 2 : SECTION_SUGGESTION =============================
   public static function field_title_suggestion(){
        $title_suggestion = esc_attr(get_option('title_suggestion'));
        ?>
            <input type="text"
                   id="title_suggestion"
                   name="title_suggestion"
                   value="<?php echo $title_suggestion ?>"
                   class="large-text"
            />
       <?php
   }
   public static function field_message_suggestion(){
        $add_message_suggestion = esc_attr(get_option('add_message_suggestion'));
        $message_suggestion = esc_attr(get_option('message_suggestion'));
        ?>
       <p class="description">
           Ajouter un description à la section
       </p>
       <div class="height-space">
           <input type="checkbox"
                  id="add_message_suggestion"
                  name="add_message_suggestion"
                  value="1"
                  <?php checked(1, $add_message_suggestion, true); ?>
           />
           <label for="">Ajouter le texte souhaiter</label>
           <textarea name="message_suggestion" id="message_suggestion" class="large-text code"><?php echo $message_suggestion ?></textarea>
       </div>
       <?php
   }

   public static function field_ifnot_suggestion(){
       $ifnot_suggestion = esc_attr(get_option('ifnot_suggestion'));
        ?>
            <p class="description">
                Ajouter un message s'il n'y a pas de suggestion à proposer
            </p>
           <input type="text"
                  id="ifnot_suggestion"
                  name="ifnot_suggestion"
                  value="<?php echo $ifnot_suggestion ?>"
                  class="large-text"
           />
       <?php
   }

    // FIELD SECTION 3 : SECTION_RESERVATION ============================
    public static function field_hidden_reservation(){
        $hidden_reservation = esc_attr(get_option('hidden_reservation'));
        ?>
        <input type="checkbox"
               id="hidden_reservation"
               name="hidden_reservation"
               value="1"
               <?php checked(1, $hidden_reservation, true); ?>
        />
        <label for="">Masquer cette section de la page dédier aux cartes</label>
        <?php
    }
    public static function field_element_reservation(){
        $add_logo_reservation = esc_attr(get_option('add_logo_reservation'));
        $add_phone_reservation = esc_attr(get_option('add_phone_reservation'));
        ?>
            <p class="description">
                Cocher ce qui doit être présent dans la section
            </p>
            <p class="height-space">
                <input type="checkbox"
                       id="add_logo_reservation"
                       name="add_logo_reservation"
                       value="1"
                       <?php checked(1, $add_logo_reservation, true); ?>
                />
                <label for="">Ajouter le logo abrégé</label>
            </p>
            <p>
                <input type="checkbox"
                       id="add_phone_reservation"
                       name="add_phone_reservation"
                       value="1"
                    <?php checked(1, $add_phone_reservation, true); ?>
                />
                <label for="">Ajouter le numéro de téléphone</label>
            </p>
        <?php
    }
    public static function field_message_reservation(){
        $message_reservation = esc_attr(get_option('message_reservation'));
        ?>
            <p>Ajouter le texte souhaiter</p>
            <p class="height-space">
                <input type="text"
                       id="message_reservation"
                       name="message_reservation"
                       value="<?php echo $message_reservation ?>"
                       class="large-text"
                />
            </p>
        <?php
    }

    // FIELD SECTION 4 : SECTION_CARTE ==================================
    public static function field_titre_carte(){
        $title_carte = esc_attr(get_option('title_carte'));
        ?>
            <input type="text"
                   id="title_carte"
                   name="title_carte"
                   value="<?php echo $title_carte ?>"
                   class="large-text"
            />
        <?php
    }
    public static function field_message_carte(){
        $add_message_carte = esc_attr(get_option('add_message_carte'));
        $message_carte = esc_attr(get_option('message_carte'));
        ?>
        <p class="description">
            Ajouter un description à la section
        </p>
        <div class="height-space">
            <input type="checkbox"
                   id="add_message_carte"
                   name="add_message_carte"
                   value="1"
                   <?php checked(1, $add_message_carte, true); ?>
            />
            <label for="">Ajouter le texte souhaiter</label>
            <textarea name="message_carte" id="message_carte" class="large-text code"><?php echo $message_carte ?></textarea>
        </div>
        <?php
    }

    public static function field_maintext_carte(){
        $maintext_carte = esc_attr(get_option('maintext_carte'));
        ?>
            <p class="description">
                Ajouter un message pour inciter la clientèle cliquer sur le menu
            </p>
            <input type="text"
                   id="maintext_carte"
                   name="maintext_carte"
                   value="<?php echo $maintext_carte ?>"
                   class="large-text"
            />
        <?php
    }


    /**
     * 9 - AJOUT STYLE ET SCRIPT
     */

}

if (class_exists('avimayeur_homepage')) {
    avimayeur_homepage::register();
}