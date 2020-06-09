<?php
defined( 'ABSPATH' ) || exit;

/**
 * Add custom post types for promo, bookmakers, tips
 */
class CustomPostTypes {
  /**
   * Bookmakers init.
   */
  public static function init(){
    add_action('init', [ __CLASS__, 'register_bookmakers'], 30);
  }

  /**
   * Регистрирует custom post type
   *
   * @return void
   */
  public static function register_bookmakers() {
	register_post_type('betting-sites', array(
		'labels'             => array(
			'name'               => __( 'Betting sites', 'wp-esport' ), 
			'singular_name'      => __( 'Betting site', 'wp-esport' ),'Книга', // отдельное название записи типа Book
			'add_new'            => __( 'New betting site', 'wp-esport' ),'Добавить новую',
			'add_new_item'       => __( 'Add new betting site', 'wp-esport' ),'Добавить новую книгу',
			'edit_item'          => __( 'Edit betting site', 'wp-esport' ),'Редактировать книгу',
			'new_item'           => __( 'New betting site', 'wp-esport' ),'Новая книга',
			'view_item'          => __( 'View betting site', 'wp-esport' ),'Посмотреть книгу',
			'search_items'       => __( 'Search betting site', 'wp-esport' ),'Найти книгу',
			'not_found'          => __( 'Betting sites not found', 'wp-esport' ),'Книг не найдено',
			'not_found_in_trash' => __( 'Betting sites not found in trash', 'wp-esport' ),'В корзине книг не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => __( 'Betting sites', 'wp-esport' ),'Книги'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post, tips',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}`
    register_post_type( 'bookmakers', [
      'label'  => null,
      'labels' => [
        'name'               => 'Букмекеры',
        'singular_name'      => 'Букмекер',
        'add_new'            => 'Добавить букмекера',
        'add_new_item'       => 'Добавление букмекера',
        'edit_item'          => 'Редактирование букмекера',
        'new_item'           => 'Новый букмекер',
        'view_item'          => 'Смотреть букмекера',
        'search_items'       => 'Искать букмекера',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon'  => '',
        'menu_name'          => 'Букмекеры',
      ],
      'show_in_rest'        => true,
      'description'         => '',
      'public'              => true,
      'menu_icon'           => 'dashicons-groups',
      'hierarchical'        => false,
      'supports'            => array('title','editor','comments','author'),
      'has_archive'         => 'bookmakers',
      'rewrite'             => [
        'with_front' => false,
        'slug' => '/bookmakers'
      ],
      'query_var'           => true,
      'exclude_from_search' => false,
      'map_meta_cap'        => false,
      'capability_type' => array('bookmaker', 'bookmakers'),
      'capabilities'  => array(
        'edit_post'         =>  'edit_bookmaker',
        'read_post'         =>  'read_bookmaker',
        'delete_post'       =>  'delete_bookmaker',
        'edit_posts'        =>  'edit_bookmakers',
        'edit_others_posts' =>  'edit_others_bookmakers',
        'publish_posts'     =>  'publish_bookmakers',
        'read_private_posts'=>  'read_private_bookmakers',
        'create_posts'      =>  'edit_bookmakers'
      ),
    ] );

    register_post_type( 'promo', [
      'label'  => null,
      'labels' => [
        'name'               => 'Бонусы',
        'singular_name'      => 'Бонус',
        'add_new'            => 'Добавить бонус',
        'add_new_item'       => 'Добавление промо-материала',
        'edit_item'          => 'Редактирование промо-материала',
        'new_item'           => 'Новый промо-материал',
        'view_item'          => 'Смотреть промо-материал',
        'search_items'       => 'Искать промо-материал',
        'not_found'          => 'Не найдено',
        'not_found_in_trash' => 'Не найдено в корзине',
        'parent_item_colon'  => '',
        'menu_name'          => 'Промо букмекеров',
      ],
      'show_in_rest'        => true,
      'description'         => '',
      'public'              => true,
      'menu_icon'           => 'dashicons-tickets-alt',
      'hierarchical'        => false,
      'supports'            => array('title','editor','comments','author'),
      'has_archive'         => 'promo',
      'rewrite'             => [
        'with_front' => false,
        'slug' => '/promo'
      ],
      'query_var'           => true,
      'exclude_from_search' => false,
      'capability_type' => 'post',
    ] );
  }
    
}

CustomPostTypes::init();