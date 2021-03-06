<?php
/**
 * Name file:   functions
 * Description: file contains all the functions of the theme
 *
 * @package WordPress
 * @subpackage avimayeur
 * @version 1.0
 */

/**
 * INDEX
 *
 * 1 - Customize
 * 2 - Metaboxes
 * 3 - Options-Theme
 * 4 - Post-Type
 * 5 - Taxonomies
 */

/** =====================================================
 *  1 - CUSTOMIZE
 */
/* customize theme */
require_once ('inc/customize/config.php');

/* customize back-end */
require_once ('inc/customize/config-admin.php');
require_once ('inc/customize/custom-dashboard.php');

/* customize columns */
require_once ('inc/customize/custom-column/column-suggestion.php');


/* customize front-end */


/** =====================================================
 *  2 - METABOXES
 */
require_once ('inc/metaboxes/suggestion-item.php');
require_once ('inc/metaboxes/sticky.php');

/** =====================================================
 *  3 - OPTIONS-THEME
 */
require_once ('inc/options-theme/generality.php');
require_once ('inc/options-theme/horaire.php');
require_once ('inc/options-theme/custom-theme.php');
require_once ('inc/options-theme/custom-theme/homepage.php');
//require_once ('inc/options-theme/custom-theme/eventpage.php');
require_once ('inc/options-theme/custom-theme/errorpage.php');


/** =====================================================
 *  4 - POST-TYPE
 */
require_once ('inc/post-type/suggestion.php');
require_once ('inc/post-type/cartes.php');
require_once ('inc/post-type/evenements.php');


/** =====================================================
 *  5 - TAXONOMIES
 */
