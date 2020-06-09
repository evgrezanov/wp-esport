<?php
namespace SB;

defined( 'ABSPATH' ) || exit;

/**
 * Subjects - taxonomy
 */
class SubjectsTaxonomy {

  public static $taxonomy = 'subjects';

  public static function init() {
    
    add_action( 'init', [ __CLASS__, 'tax' ] );
    add_action('save_post_team', [__CLASS__, 'update_term_name_for_team']);
    add_action('save_post_bookmakers', [__CLASS__, 'update_term_name_for_bookmakers'], 111);
    add_action( 'after_delete_post', [ __CLASS__, 'delete_term' ] );
    add_action('save_post_post', [__CLASS__, 'add_subjects_to_post_from_event'], 200);
    add_action('save_post_post', [__CLASS__, 'set_teams_as_tags'], 300);
    add_action('save_post_post', [__CLASS__, 'set_bookie_as_tags'], 300);
    add_filter('pre_insert_term', [__CLASS__, 'disallow_add_term'], 10, 2);

  }

  /**
   * check is rest
   *
   * @link https://stackoverflow.com/questions/41785658/detect-wordpress-rest-api-response
   */
  public static function is_rest(){
    return ( defined( 'REST_REQUEST' ) && REST_REQUEST );
  }

  /**
   * update_term_name_for_bookmakers
   */
  public static function update_term_name_for_bookmakers($post_id) {

    $post = get_post($post_id);

    if('publish' != $post->post_status){
      return;
    }

    $term_slug = 'bookie-' . $post_id;

    $dop_info = ['букмекер'];

    $title = $post->post_title;

    if ( ! empty($dop_info)) {
      $dop_info = implode(", ", $dop_info);
      $title    = sprintf('%s (%s)', $post->post_title, $dop_info);
    }

    if ( ! $term = get_term_by('slug', $term_slug, self::$taxonomy)) {
      wp_insert_term(
        $name = $title,
        'subjects',
        [
          'slug' => $term_slug
        ]
      );
    }

    wp_update_term($term->term_id, self::$taxonomy, [
      'name' => $title,
    ]);

  }

  /**
   * delete term
   */
  public static function delete_term($post_id) {
    $post = get_post( $post_id );
    if ( empty( $post ) ) {
      if ( $term = get_term_by( 'slug', 'team-' . $post_id, 'subjects' ) ) {
        wp_delete_term( $term->term_id, 'subjects' );
      }
    }
  }

  /**
   * Disallow add term
   */
  public static function disallow_add_term($term, $taxonomy)
  {
    if ( self::is_rest() && $taxonomy === self::$taxonomy ) {
      return new \WP_Error(
        'disallow_insert_term',
        __('Your role does not have permission to add terms to this taxonomy')
      );
    }

    return $term;
  }

  /**
   * Change term name if changed team name
   *
   * @param $post_id
   *
   * @return void
   */
  public static function update_term_name_for_team($post_id) {

    $post = get_post( $post_id );

    $term_slug = 'team-' . $post_id;

    if ( ! ($team = sb_get_team($post_id))) {
      return;
    }

    $dop_info = [];

    $title = $post->post_title;

    $type = $team->get_event_type();

    if ( ! empty($type)) {
      $dop_info[] = $type[0]->name;
    }

    if ( $country = $team->get_country() ) {
      $dop_info[] = $country;
    }

    if ( $city = $team->get_city() ) {
      $dop_info[] = $city;
    }

    if( !empty($dop_info) ){
      $dop_info = implode(", ", $dop_info);
      $title = sprintf( '%s (%s)', $post->post_title, $dop_info );
    }

    if ( ! $term = get_term_by('slug', $term_slug, self::$taxonomy)) {
      wp_insert_term(
        $name = $title,
        'subjects',
        array(
          'slug' => $term_slug
        )
      );

      return;
    }

    wp_update_term($term->term_id, self::$taxonomy, array(
      'name' => $title,
    ) );
  }

  /**
   * Register Custom Taxonomy
   */
  public static function tax() {

    $labels = array(
      'name'                       => _x( 'Субъекты', 'Taxonomy General Name', 'sb' ),
      'singular_name'              => _x( 'Субъект', 'Taxonomy Singular Name', 'sb' ),
      'menu_name'                  => __( 'Субъекты', 'sb' ),
      'all_items'                  => __( 'All Items', 'sb' ),
      'parent_item'                => __( 'Parent Item', 'sb' ),
      'parent_item_colon'          => __( 'Parent Item:', 'sb' ),
      'new_item_name'              => __( 'New Item Name', 'sb' ),
      'add_new_item'               => __( 'Add New Item', 'sb' ),
      'edit_item'                  => __( 'Edit Item', 'sb' ),
      'update_item'                => __( 'Update Item', 'sb' ),
      'view_item'                  => __( 'View Item', 'sb' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'sb' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'sb' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'sb' ),
      'popular_items'              => __( 'Popular Items', 'sb' ),
      'search_items'               => __( 'Search Items', 'sb' ),
      'not_found'                  => __( 'Not Found', 'sb' ),
      'no_terms'                   => __( 'No items', 'sb' ),
      'items_list'                 => __( 'Items list', 'sb' ),
      'items_list_navigation'      => __( 'Items list navigation', 'sb' ),
    );
    $args   = array(
      'labels'            => $labels,
      'hierarchical'      => false,
      'public'            => false,
      'show_in_rest'      => true,
      'show_ui'           => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'show_tagcloud'     => true,
    );
    register_taxonomy(self::$taxonomy, array('post', 'promo'), $args);

  }

  /**
   * add tags by subjects
   */
  public static function set_teams_as_tags($post_id) {
    if ( ! $subjects = wp_get_object_terms($post_id, self::$taxonomy)) {
      return;
    }

    $term_ids = [];
    foreach ($subjects as $subject) {
      if (strpos($subject->slug, 'team-') === false) {
        continue;
      }

      if ( ! $team_id = intval(str_replace('team-', '', $subject->slug))) {
        continue;
      }

      if ( ! $team = sb_get_team($team_id)) {
        continue;
      }

      if ($term = get_term_by('name', $team->get_name(), 'post_tag')) {
        $term_ids[] = $term->term_id;
      } else {
        $term       = wp_insert_term($team->get_name(), 'post_tag', ['slug' => sanitize_title($team->get_name())]);
        $term_ids[] = $term['term_id'];
      }
    }

    wp_set_post_tags($post_id, $term_ids, $append = true);
  }

  /**
   * set_bookie_as_tags
   */
  public static function set_bookie_as_tags($post_id) {
    $prefix = 'bookie-';
    if ( ! $subjects = wp_get_object_terms($post_id, self::$taxonomy)) {
      return;
    }

    $term_ids = [];
    foreach ($subjects as $subject) {
      if (strpos($subject->slug, 'bookie-') === false) {
        continue;
      }

      if ( ! $bookie_id = intval(str_replace('bookie-', '', $subject->slug))) {
        continue;
      }

      if ( ! $bookie = get_post($bookie_id)) {
        continue;
      }

      if ($term = get_term_by('name', $bookie->post_title, 'post_tag')) {
        $term_ids[] = $term->term_id;
      } else {
        $term       = wp_insert_term($bookie->post_title, 'post_tag', ['slug' => sanitize_title($bookie->post_title)]);
        $term_ids[] = $term['term_id'];
      }
    }

    wp_set_post_tags($post_id, $term_ids, $append = true);
  }

  /**
   * При обновлении поста если нету субъекта у поста но есть связь с евентом то проставляются субъекты
   *
   * @param $post_id
   */
  public static function add_subjects_to_post_from_event($post_id) {
    if ( ! $event_id = (int) get_post_meta($post_id, 'event_id', true)) {
      return;
    }

    $event = sb_get_event( $event_id );

    // Получаем список слагов для субъектов
    $event_slugs = [
      'team-' . $event->get_first_team_data()->ID,
      'team-' . $event->get_second_team_data()->ID,
    ];

    // Добавим Термины
    wp_set_object_terms($post_id, $event_slugs, 'subjects', true);
  }

}

SubjectsTaxonomy::init();