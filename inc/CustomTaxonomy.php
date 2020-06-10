<?php
defined( 'ABSPATH' ) || exit;

/**
 * Register custom taxonomies
 */
class CustomTaxonomy {

  public static function init() {   
    add_action('init', [ __CLASS__, 'register_custom_taxonomies' ]);
  }

  // Register Custom Taxonomy Subjects
  public static function register_custom_taxonomies() {
    // Bonus type
    $promo_type_labels = array(
      'name'                       => __( 'promo-types', 'wp-esport' ),
      'singular_name'              => __( 'Promo type', 'wp-esport' ),
      'menu_name'                  => __( 'Types', 'wp-esport' ),
      'all_items'                  => __( 'All types', 'wp-esport' ),
      'parent_item'                => __( 'Parent type', 'wp-esport' ),
      'parent_item_colon'          => __( 'Parent type:', 'wp-esport' ),
      'new_item_name'              => __( 'New type', 'wp-esport' ),
      'add_new_item'               => __( 'Add New type', 'wp-esport' ),
      'edit_item'                  => __( 'Edit promo type', 'wp-esport' ),
      'update_item'                => __( 'Update promo type', 'wp-esport' ),
      'view_item'                  => __( 'View promo type', 'wp-esport' ),
      'separate_items_with_commas' => __( 'Separate types with commas', 'wp-esport' ),
      'add_or_remove_items'        => __( 'Add or remove type', 'wp-esport' ),
      'choose_from_most_used'      => __( 'Choose from the most used types', 'wp-esport' ),
      'popular_items'              => __( 'Popular types', 'wp-esport' ),
      'search_items'               => __( 'Search promo types', 'wp-esport' ),
      'not_found'                  => __( 'Promo types not Found', 'wp-esport' ),
      'no_terms'                   => __( 'No types', 'wp-esport' ),
      'items_list'                 => __( 'Types list', 'wp-esport' ),
      'items_list_navigation'      => __( 'Types list navigation', 'wp-esport' ),
    );
    $args_promo_types = array(
      'labels'                     => $promo_type_labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => false,
      'show_in_rest'               => true
    );
    register_taxonomy( 'promo-types', array( 'promo' ), $args_promo_types );

    // League
    /*$leagues_labels = array(
      'name'                       => __( 'leagues', 'wp-esport' ),
      'singular_name'              => __( 'League', 'wp-esport' ),
      'menu_name'                  => __( 'Leagues', 'wp-esport' ),
      'all_items'                  => __( 'All leagues', 'wp-esport' ),
      'parent_item'                => __( 'Parent leagues', 'wp-esport' ),
      'parent_item_colon'          => __( 'Parent league:', 'wp-esport' ),
      'new_item_name'              => __( 'New league', 'wp-esport' ),
      'add_new_item'               => __( 'Add New league', 'wp-esport' ),
      'edit_item'                  => __( 'Edit league', 'wp-esport' ),
      'update_item'                => __( 'Update league', 'wp-esport' ),
      'view_item'                  => __( 'View league', 'wp-esport' ),
      'separate_items_with_commas' => __( 'Separate league with commas', 'wp-esport' ),
      'add_or_remove_items'        => __( 'Add or remove league', 'wp-esport' ),
      'choose_from_most_used'      => __( 'Choose from the most used leagues', 'wp-esport' ),
      'popular_items'              => __( 'Popular leagues', 'wp-esport' ),
      'search_items'               => __( 'Search league', 'wp-esport' ),
      'not_found'                  => __( 'League not Found', 'wp-esport' ),
      'no_terms'                   => __( 'No league', 'wp-esport' ),
      'items_list'                 => __( 'Leagues list', 'wp-esport' ),
      'items_list_navigation'      => __( 'Leagues list navigation', 'wp-esport' ),
    );
    $args_leagues = array(
      'labels'                     => $leagues_labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => false,
      'show_in_rest'               => true
    );
    register_taxonomy( 'leagues', array( 'esport' ), $args_leagues );
    */

    // eSports
    $esports_labels = array(
      'name'                       => __( 'esports', 'wp-esport' ),
      'singular_name'              => __( 'eSport', 'wp-esport' ),
      'menu_name'                  => __( 'eSports', 'wp-esport' ),
      'all_items'                  => __( 'All eSports', 'wp-esport' ),
      'parent_item'                => __( 'Parent eSport', 'wp-esport' ),
      'parent_item_colon'          => __( 'Parent eSport:', 'wp-esport' ),
      'new_item_name'              => __( 'New eSport', 'wp-esport' ),
      'add_new_item'               => __( 'Add New eSport', 'wp-esport' ),
      'edit_item'                  => __( 'Edit eSport', 'wp-esport' ),
      'update_item'                => __( 'Update eSport', 'wp-esport' ),
      'view_item'                  => __( 'View eSport', 'wp-esport' ),
      'separate_items_with_commas' => __( 'Separate eSport with commas', 'wp-esport' ),
      'add_or_remove_items'        => __( 'Add or remove eSport', 'wp-esport' ),
      'choose_from_most_used'      => __( 'Choose from the most used eSports', 'wp-esport' ),
      'popular_items'              => __( 'Popular eSports', 'wp-esport' ),
      'search_items'               => __( 'Search leeSportsague', 'wp-esport' ),
      'not_found'                  => __( 'eSports not Found', 'wp-esport' ),
      'no_terms'                   => __( 'No eSport', 'wp-esport' ),
      'items_list'                 => __( 'eSports list', 'wp-esport' ),
      'items_list_navigation'      => __( 'eSports list navigation', 'wp-esport' ),
    );
    $args_esports = array(
      'labels'                     => $esports_labels,
      'hierarchical'               => false,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => true,
      'rewrite'                    => false,
      'show_in_rest'               => true
    );
    register_taxonomy( 'esports', array( 'post', 'promo', 'betting-site', 'tip' ), $args_esports );
    

    // Deposit
    $deposit_labels = array(
        'name'                       => __( 'deposit-methods', 'wp-esport' ),
        'singular_name'              => __( 'Deposit method', 'wp-esport' ),
        'menu_name'                  => __( 'Deposit', 'wp-esport' ),
        'all_items'                  => __( 'All deposit methods', 'wp-esport' ),
        'parent_item'                => __( 'Parent deposit method', 'wp-esport' ),
        'parent_item_colon'          => __( 'Parent deposit method:', 'wp-esport' ),
        'new_item_name'              => __( 'New deposit method', 'wp-esport' ),
        'add_new_item'               => __( 'Add New deposit method', 'wp-esport' ),
        'edit_item'                  => __( 'Edit deposit method', 'wp-esport' ),
        'update_item'                => __( 'Update deposit method', 'wp-esport' ),
        'view_item'                  => __( 'View deposit method', 'wp-esport' ),
        'separate_items_with_commas' => __( 'Separate deposit method with commas', 'wp-esport' ),
        'add_or_remove_items'        => __( 'Add or remove deposit method', 'wp-esport' ),
        'choose_from_most_used'      => __( 'Choose from the most used deposit methods', 'wp-esport' ),
        'popular_items'              => __( 'Popular deposit methods', 'wp-esport' ),
        'search_items'               => __( 'Search deposit methods', 'wp-esport' ),
        'not_found'                  => __( 'Deposit methods not Found', 'wp-esport' ),
        'no_terms'                   => __( 'No deposit methods', 'wp-esport' ),
        'items_list'                 => __( 'Deposit methods list', 'wp-esport' ),
        'items_list_navigation'      => __( 'Deposit methods list navigation', 'wp-esport' ),
      );
    $args_deposit_metods = array(
        'labels'                     => $deposit_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
        'show_in_rest'               => true
      );
    register_taxonomy( 'deposit', array( 'betting-site' ), $args_deposit_metods );
      
    // WITHDRAWAL
    $withdrawal_labels = array(
        'name'                       => __( 'withdrawal-methods', 'wp-esport' ),
        'singular_name'              => __( 'Withdrawal method', 'wp-esport' ),
        'menu_name'                  => __( 'Withdrawal', 'wp-esport' ),
        'all_items'                  => __( 'All withdrawal methods', 'wp-esport' ),
        'parent_item'                => __( 'Parent withdrawal method', 'wp-esport' ),
        'parent_item_colon'          => __( 'Parent withdrawal method:', 'wp-esport' ),
        'new_item_name'              => __( 'New withdrawal method', 'wp-esport' ),
        'add_new_item'               => __( 'Add New withdrawal method', 'wp-esport' ),
        'edit_item'                  => __( 'Edit withdrawal method', 'wp-esport' ),
        'update_item'                => __( 'Update withdrawal method', 'wp-esport' ),
        'view_item'                  => __( 'View withdrawal method', 'wp-esport' ),
        'separate_items_with_commas' => __( 'Separate withdrawal method with commas', 'wp-esport' ),
        'add_or_remove_items'        => __( 'Add or remove withdrawal method', 'wp-esport' ),
        'choose_from_most_used'      => __( 'Choose from the most used withdrawal methods', 'wp-esport' ),
        'popular_items'              => __( 'Popular withdrawal methods', 'wp-esport' ),
        'search_items'               => __( 'Search withdrawal methods', 'wp-esport' ),
        'not_found'                  => __( 'Withdrawal methods not Found', 'wp-esport' ),
        'no_terms'                   => __( 'No withdrawal methods', 'wp-esport' ),
        'items_list'                 => __( 'Withdrawal methods list', 'wp-esport' ),
        'items_list_navigation'      => __( 'Withdrawal methods list navigation', 'wp-esport' ),
      );
    $args_withdrawal_metods = array(
        'labels'                     => $withdrawal_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
        'show_in_rest'               => true
      );
    register_taxonomy( 'withdrawal', array( 'betting-site' ), $args_withdrawal_metods );

    // Mobile applications
    $mobile_apps_labels = array(
        'name'                       => __( 'mobile-apps', 'wp-esport' ),
        'singular_name'              => __( 'Mobile apps', 'wp-esport' ),
        'menu_name'                  => __( 'Mobile Apps', 'wp-esport' ),
        'all_items'                  => __( 'All mobile apps', 'wp-esport' ),
        'parent_item'                => __( 'Parent mobile app', 'wp-esport' ),
        'parent_item_colon'          => __( 'Parent mobile app:', 'wp-esport' ),
        'new_item_name'              => __( 'New mobile app', 'wp-esport' ),
        'add_new_item'               => __( 'Add New mobile app', 'wp-esport' ),
        'edit_item'                  => __( 'Edit mobile app', 'wp-esport' ),
        'update_item'                => __( 'Update mobile app', 'wp-esport' ),
        'view_item'                  => __( 'View mobile app', 'wp-esport' ),
        'separate_items_with_commas' => __( 'Separate mobile app with commas', 'wp-esport' ),
        'add_or_remove_items'        => __( 'Add or remove mobile app', 'wp-esport' ),
        'choose_from_most_used'      => __( 'Choose from the most used mobile apps', 'wp-esport' ),
        'popular_items'              => __( 'Popular mobile apps', 'wp-esport' ),
        'search_items'               => __( 'Search mobile apps', 'wp-esport' ),
        'not_found'                  => __( 'Mobile apps not Found', 'wp-esport' ),
        'no_terms'                   => __( 'No mobile apps', 'wp-esport' ),
        'items_list'                 => __( 'Mobile apps list', 'wp-esport' ),
        'items_list_navigation'      => __( 'Mobile apps list navigation', 'wp-esport' ),
      );
    $args_mobile_apps = array(
        'labels'                     => $mobile_apps_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
        'show_in_rest'               => true
      );
    register_taxonomy( 'mobile-app', array( 'betting-site' ), $args_mobile_apps );
    

    // Languages
    $languages_labels = array(
        'name'                       => __( 'languages', 'wp-esport' ),
        'singular_name'              => __( 'Language', 'wp-esport' ),
        'menu_name'                  => __( 'Languages', 'wp-esport' ),
        'all_items'                  => __( 'All languages', 'wp-esport' ),
        'parent_item'                => __( 'Parent language', 'wp-esport' ),
        'parent_item_colon'          => __( 'Parent language:', 'wp-esport' ),
        'new_item_name'              => __( 'New language', 'wp-esport' ),
        'add_new_item'               => __( 'Add New language', 'wp-esport' ),
        'edit_item'                  => __( 'Edit language', 'wp-esport' ),
        'update_item'                => __( 'Update language', 'wp-esport' ),
        'view_item'                  => __( 'View language', 'wp-esport' ),
        'separate_items_with_commas' => __( 'Separate language with commas', 'wp-esport' ),
        'add_or_remove_items'        => __( 'Add or remove language', 'wp-esport' ),
        'choose_from_most_used'      => __( 'Choose from the most used languages', 'wp-esport' ),
        'popular_items'              => __( 'Popular languages', 'wp-esport' ),
        'search_items'               => __( 'Search languages', 'wp-esport' ),
        'not_found'                  => __( 'Language not Found', 'wp-esport' ),
        'no_terms'                   => __( 'No languages', 'wp-esport' ),
        'items_list'                 => __( 'Languages list', 'wp-esport' ),
        'items_list_navigation'      => __( 'Languages list navigation', 'wp-esport' ),
    );
    $args_languages = array(
        'labels'                     => $languages_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
        'show_in_rest'               => true
    );
    register_taxonomy( 'languages', array( 'betting-site' ), $args_languages );
    
    // Other gambling_options
    $gambling_options_labels = array(
        'name'                       => __( 'gambling-options', 'wp-esport' ),
        'singular_name'              => __( 'Gambling options', 'wp-esport' ),
        'menu_name'                  => __( 'Other options', 'wp-esport' ),
        'all_items'                  => __( 'All gambling options', 'wp-esport' ),
        'parent_item'                => __( 'Parent gambling option', 'wp-esport' ),
        'parent_item_colon'          => __( 'Parent gambling option:', 'wp-esport' ),
        'new_item_name'              => __( 'New gambling option', 'wp-esport' ),
        'add_new_item'               => __( 'Add New gambling option', 'wp-esport' ),
        'edit_item'                  => __( 'Edit gambling option', 'wp-esport' ),
        'update_item'                => __( 'Update gambling option', 'wp-esport' ),
        'view_item'                  => __( 'View gambling option', 'wp-esport' ),
        'separate_items_with_commas' => __( 'Separate gambling option with commas', 'wp-esport' ),
        'add_or_remove_items'        => __( 'Add or remove gambling option', 'wp-esport' ),
        'choose_from_most_used'      => __( 'Choose from the most used gambling option', 'wp-esport' ),
        'popular_items'              => __( 'Popular gambling options', 'wp-esport' ),
        'search_items'               => __( 'Search gambling options', 'wp-esport' ),
        'not_found'                  => __( 'Gambling options not Found', 'wp-esport' ),
        'no_terms'                   => __( 'No gambling options', 'wp-esport' ),
        'items_list'                 => __( 'Gambling options list', 'wp-esport' ),
        'items_list_navigation'      => __( 'Gambling options list navigation', 'wp-esport' ),
    );
    $args_gambling_options = array(
        'labels'                     => $gambling_options_labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => false,
        'show_in_rest'               => true
    );
    register_taxonomy( 'gambling-options', array( 'betting-site' ), $args_gambling_options );
}

} 
CustomTaxonomy::init();