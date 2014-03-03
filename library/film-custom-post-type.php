<?php
/* 
The custom post type for Films

*/


// let's create the function for the custom type
function rp_custom_post_films() { 
	// creating (registering) the custom type 
	register_post_type( 'rp_films', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Films', 'jointstheme'), /* This is the Title of the Group */
			'singular_name' => __('Film', 'jointstheme'), /* This is the individual type */
			'all_items' => __('All Films', 'jointstheme'), /* the all items menu item */
			'add_new' => __('Add New', 'jointstheme'), /* The add new menu item */
			'add_new_item' => __('Add New Film', 'jointstheme'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointstheme' ), /* Edit Dialog */
			'edit_item' => __('Edit Films', 'jointstheme'), /* Edit Display Title */
			'new_item' => __('New Film', 'jointstheme'), /* New Display Title */
			'view_item' => __('View Film', 'jointstheme'), /* View Display Title */
			'search_items' => __('Search Films', 'jointstheme'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointstheme'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointstheme'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'The film custom post type for Rotating Planet', 'jointstheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'films', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'films', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
	 	) /* end of options */
	); /* end of register post type */
	
	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type('category', 'custom_type');
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type('post_tag', 'custom_type');
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'rp_custom_post_films');
	
	/*
	for more information on taxonomies, go here:
	http://codex.wordpress.org/Function_Reference/register_taxonomy
	*/
	
	// now let's add Film Categories (these act like categories)
    register_taxonomy( 'film_cat', 
    	array('rp_films'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => true,     /* if this is true, it acts like categories */             
    		'labels' => array(
    			'name' => __( 'Film Categories', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Film Category', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Film Categories', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Film Categories', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Film Category', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Film Category:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Film Category', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Film Category', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Film Category', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Film Category Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true, 
    		'show_ui' => true,
    		'query_var' => true,
    		'rewrite' => array( 'slug' => 'film_cat' ),
    	)
    );   
    
	// now let's add Film Types (these act like categories)
    register_taxonomy( 'film_type', 
    	array('rp_films'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
    	array('hierarchical' => false,    /* if this is false, it acts like tags */                
    		'labels' => array(
    			'name' => __( 'Film Types', 'jointstheme' ), /* name of the custom taxonomy */
    			'singular_name' => __( 'Film Type', 'jointstheme' ), /* single taxonomy name */
    			'search_items' =>  __( 'Search Film Types', 'jointstheme' ), /* search title for taxomony */
    			'all_items' => __( 'All Film Types', 'jointstheme' ), /* all title for taxonomies */
    			'parent_item' => __( 'Parent Film Type', 'jointstheme' ), /* parent title for taxonomy */
    			'parent_item_colon' => __( 'Parent Film Type:', 'jointstheme' ), /* parent taxonomy title */
    			'edit_item' => __( 'Edit Film Type', 'jointstheme' ), /* edit custom taxonomy title */
    			'update_item' => __( 'Update Film Type', 'jointstheme' ), /* update title for taxonomy */
    			'add_new_item' => __( 'Add New Film Type', 'jointstheme' ), /* add new title for taxonomy */
    			'new_item_name' => __( 'New Film Type Name', 'jointstheme' ) /* name title for taxonomy */
    		),
    		'show_admin_column' => true,
    		'show_ui' => true,
    		'query_var' => true,
    	)
    ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
    */
	

?>