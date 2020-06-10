<?php
defined( 'ABSPATH' ) || exit;

/**
 * Add custom post types for promo, bookmakers, tips
 */
class CustomPostTypes {

  public static function init(){
    add_action('init', [ __CLASS__, 'register_bookmakers'], 30);
  }

  /**
   * Регистрирует custom post type
   *
   * @return void
   */
  public static function register_bookmakers() {
    register_post_type( 'betting-sites', [
      'label'  => null,
      'labels'             => [
        'name'               => __( 'Betting sites', 'wp-esport' ), 
        'singular_name'      => __( 'Betting site', 'wp-esport' ),
        'add_new'            => __( 'New betting site', 'wp-esport' ),
        'add_new_item'       => __( 'Add new betting site', 'wp-esport' ),
        'edit_item'          => __( 'Edit betting site', 'wp-esport' ),
        'new_item'           => __( 'New betting site', 'wp-esport' ),
        'view_item'          => __( 'View betting site', 'wp-esport' ),
        'search_items'       => __( 'Search betting site', 'wp-esport' ),
        'not_found'          => __( 'Betting sites not found', 'wp-esport' ),
        'not_found_in_trash' => __( 'Betting sites not found in trash', 'wp-esport' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Betting sites', 'wp-esport' ),

      ],
      'description'         => __('Custom post type for betting sites', 'wp-esport'),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      /*'menu_position'      => 1,*/
      'menu_icon'          => 'dashicons-awards',
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ] );

    register_post_type( 'promo', [
      'label'  => null,
      'labels' => [
        'name'               => __('Bonus', 'wp-esport'),
        'singular_name'      => __('Bonus', 'wp-esport'),
        'add_new'            => __('Add new bonus', 'wp-esport'),
        'add_new_item'       => __('Add new bonus', 'wp-esport'),
        'edit_item'          => __('Edit bonus', 'wp-esport'),
        'new_item'           => __('New bonus', 'wp-esport'),
        'view_item'          => __('View bonus', 'wp-esport'),
        'search_items'       => __('Search bonus', 'wp-esport'),
        'not_found'          => __('Bonuse not found', 'wp-esport'),
        'not_found_in_trash' => __('Not found in trash', 'wp-esport'),
        'parent_item_colon'  => '',
        'menu_name'          => __('Promo', 'wp-esport'),
      ],
      'show_in_rest'        => true,
      'description'         => '',
      'public'              => true,
      /*'menu_position'       => 2,*/
      'menu_icon'           => 'dashicons-awards',
      'hierarchical'        => false,
      'supports'            => array('title','editor','author','thumbnail','excerpt','comments'),
      'has_archive'         => 'promo',
      'rewrite'             => [
        'with_front' => false,
        'slug' => '/promo'
      ],
      'query_var'           => true,
      'exclude_from_search' => false,
      'capability_type' => 'post',
    ] );


    register_post_type( 'tips', [
      'label'  => null,
      'labels'             => array(
        'name'               => __( 'Tips', 'wp-esport' ), 
        'singular_name'      => __( 'Tip', 'wp-esport' ),
        'add_new'            => __( 'New tip', 'wp-esport' ),
        'add_new_item'       => __( 'Add new tip', 'wp-esport' ),
        'edit_item'          => __( 'Edit tip', 'wp-esport' ),
        'new_item'           => __( 'New tip', 'wp-esport' ),
        'view_item'          => __( 'View tip', 'wp-esport' ),
        'search_items'       => __( 'Search tip', 'wp-esport' ),
        'not_found'          => __( 'Tip not found', 'wp-esport' ),
        'not_found_in_trash' => __( 'Tip not found in trash', 'wp-esport' ),
        'parent_item_colon'  => '',
        'menu_name'          => __( 'Tips', 'wp-esport' ),

        ),
      'public'             => true,
      /*'menu_position'      => 3,*/
      'menu_icon'          => 'dashicons-awards',
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ] );
  }
}
CustomPostTypes::init();