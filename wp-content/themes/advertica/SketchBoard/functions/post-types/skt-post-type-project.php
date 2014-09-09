<?php
/******* CUSTOM POST TYPE FOR LATEST PROJECTS *******/
add_action( 'init', 'skt_project_post_type' );

function skt_project_post_type() {
global $advertica_shortname;
	register_post_type( 'project',
		array(
			'labels' => array(
			'name' =>  ucwords($advertica_shortname).__(' Projects', 'advertica' ),
			'singular_name' => __( 'project', 'advertica' ),
			'add_new' => __('Add Project', 'advertica'),
			'add_new_item' => __('Add New Project', 'advertica'),
			'edit_item' => __('Edit Project', 'advertica'),
			'new_item' => __('New Project', 'advertica'),
			'all_items' => __('All Projects', 'advertica'),
			'view_item' => __('View Project', 'advertica')
			),
	'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
	'menu_icon' => get_template_directory_uri().'/images/icn_portfolio.png',
    'rewrite' => array('slug' => 'project'),
    'supports' => array('title','thumbnail','editor'),
	'taxonomies'=>array('project_category','project_tag')
	));
}

function advertica_project_category_init() {
	// create a new taxonomy
	register_taxonomy(
		'project_category',
		'project',
		array(
			'hierarchical' => true,
			'label' => __( 'Project Categories', 'advertica' ),
			'singular_label' => __( 'Project Category', 'advertica' ),
			'rewrite' => array( 'slug' => 'project_category')
		)
	);
}
add_action( 'init', 'advertica_project_category_init' );

function advertica_project_tag_init() {
	// create a new taxonomy
	register_taxonomy(
		'project_tag',
		'project',
		array(
			'label' => __( 'Project Tags', 'advertica' ),
			'singular_label' => __( 'Project Tag', 'advertica' ),
			'rewrite' => array( 'slug' => 'project_tag')
		)
	);
}

add_action( 'init', 'advertica_project_tag_init' );

function skt_wp_default_terms(){
	$parent_term = term_exists( 'uncategorized', 'project_category' ); // array is returned if taxonomy is given
	$parent_term_id = $parent_term['term_id']; // get numeric term id
	if ($parent_term == 0 && $parent_term == null) {
		wp_insert_term(
			'uncategorized', // the term 
			'project_category', // the taxonomy
			array(
			'description'=> 'Uncategorized.',
			'slug' => 'uncategorized',
			'parent'=> $parent_term_id
			)
		);
	}
}
add_action( 'init', 'skt_wp_default_terms' );

function skt_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'project_category' => array( 'uncategorized' ),
        );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'skt_set_default_object_terms', 100, 2 );