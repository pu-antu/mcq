<?php
namespace Sagar\Mcq\Admin;
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 *
 */
class CustomPost {

    /**
     *
     */
    public function __construct()
    {
        add_action( 'init', array($this,'custom_post_type'));
    }

    /**
     * @return void
     */
    public function custom_post_type() {

        $labels = array(
            'name'                  => _x( 'Questions', 'Post Type General Name', 'ps-mcq' ),
            'singular_name'         => _x( 'Question', 'Post Type Singular Name', 'ps-mcq' ),
            'menu_name'             => __( 'Mcq', 'ps-mcq' ),
            'name_admin_bar'        => __( 'Mcq', 'ps-mcq' ),
            'archives'              => __( 'Item Archives', 'ps-mcq' ),
            'attributes'            => __( 'Item Attributes', 'ps-mcq' ),
            'parent_item_colon'     => __( 'Parent Item:', 'ps-mcq' ),
            'all_items'             => __( 'All Question', 'ps-mcq' ),
        );
        $args = array(
            'label'                 => __( 'Question', 'ps-mcq' ),
            'description'           => __( 'Post Type Description', 'ps-mcq' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        );
        register_post_type( 'ps-mcq', $args );

    }

}

// Register Custom Post Type
