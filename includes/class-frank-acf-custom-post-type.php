<?php

class Frank_Acf_Custom_Post_Type {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
     * Company custom post type
     * @since    0.1.0
     * @access   public
     */
	public function company_post_type() {

		$labels = array(
	        'name'                  => _x( 'Companies', 'companies', 'frank-acf' ),
            'singular_name'         => _x( 'Company', 'company', 'frank-acf' ),
            'menu_name'             => _x( 'Companies', 'companies', 'frank-acf' ),
            'name_admin_bar'        => _x( 'Company', 'company', 'frank-acf' ),
            'add_new'               => __( 'Add New', 'frank-acf' ),
            'add_new_item'          => __( 'Add New Company', 'frank-acf' ),
            'new_item'              => __( 'New Company', 'frank-acf' ),
            'edit_item'             => __( 'Edit Company', 'frank-acf' ),
            'view_item'             => __( 'View Company', 'frank-acf' ),
            'all_items'             => __( 'All Companies', 'frank-acf' ),
            'search_items'          => __( 'Search Companys', 'frank-acf' ),
            'parent_item_colon'     => __( 'Parent Companys:', 'frank-acf' ),
            'not_found'             => __( 'No companies found.', 'frank-acf' ),
            'not_found_in_trash'    => __( 'No companies found in Trash.', 'frank-acf' ),
            'featured_image'        => _x( 'Company Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'frank-acf' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'frank-acf' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'frank-acf' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'frank-acf' ),
            'archives'              => _x( 'Company archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'frank-acf' ),
            'insert_into_item'      => _x( 'Insert into company', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'frank-acf' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this company', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'frank-acf' ),
            'filter_items_list'     => _x( 'Filter companies list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'frank-acf' ),
            'items_list_navigation' => _x( 'Companies list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'frank-acf' ),
            'items_list'            => _x( 'Companies list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
	    );
	 
	    $args = array(
	        'labels'             => $labels,
            'taxonomies'         => array('company_category'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-building',
            'rewrite'            => array( 'slug' => 'company/%company_category%', 'with_front' => false ),
            'query_var'          => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'supports'           => array( 'title', 'author', 'custom-fields' )
	    );
	 
	    register_post_type( 'company', $args );
	    flush_rewrite_rules();
	}

	public function company_taxonomy() {

		$labels = array(
			 'name' => __('Company Categories', 'frank-acf'),
			 'singular_name' => __('Category', 'frank-acf'),
			 'search_items' => __('Search Categories', 'frank-acf'),
			 'all_items' => __('All Categories', 'frank-acf'),
			 'parent_item' => __('Parent', 'frank-acf'),
			 'parent_item_colon' => __('Parent:', 'frank-acf'),
			 'edit_item' => __('Edit Category', 'frank-acf'),
			 'update_item' => __('Update Category', 'frank-acf'),
			 'add_new_item' => __('Add New Category', 'frank-acf'),
			 'new_item_name' => __('New Category', 'frank-acf'),
			 'menu_name' => __('Categories', 'frank-acf'),
		);

		$args = array(
			 'hierarchical' => true,
			 'labels' => $labels,
			 'show_ui' => true,
			 'show_admin_column' => true,
			 'query_var' => true,
			 'rewrite' => array( 'slug' => 'company', 'with_front' => false ),
		);

		register_taxonomy( 'company_category', array( 'company_category' ), $args ); 
	}

	public function company_post_link( $post_link, $id = 0 ){
	    $post = get_post($id);  
	    if ( is_object( $post ) ){
	        $terms = wp_get_object_terms( $post->ID, 'company_category' );
	        if( $terms ){
	            return str_replace( '%company_category%' , $terms[0]->slug , $post_link );
	        }
	    }
	    return $post_link;  
	}

}

?>