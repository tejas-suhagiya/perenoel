<?php 

/*Logos*/
function photos_post_type() {

	$labels = array(
		'name'                  => _x( 'Photos', 'Photos General Name', 'text_domain' ),
		'singular_name'         => _x( 'Photos', 'Photos Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Photos', 'text_domain' ),
		'name_admin_bar'        => __( 'Photos ', 'text_domain' ),
		'archives'              => __( 'Photo Archives', 'text_domain' ),
		'attributes'            => __( 'Photo Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'text_domain' ),
		'all_items'             => __( 'All Photos', 'text_domain' ),
		'add_new_item'          => __( 'Add New Photo', 'text_domain' ),
		'add_new'               => __( 'Add New Photo', 'text_domain' ),
		'new_item'              => __( 'New Photo', 'text_domain' ),
		'edit_item'             => __( 'Edit Photo', 'text_domain' ),
		'update_item'           => __( 'Update Photo', 'text_domain' ),
		'view_item'             => __( 'View Photos', 'text_domain' ),
		'view_items'            => __( 'View Photos', 'text_domain' ),
		'search_items'          => __( 'Search Photos', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Photos', 'text_domain' ),
		'description'           => __( 'Photos', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array(  ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
        'menu_icon'           	=> 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'photos', $args );

}
add_action( 'init', 'photos_post_type', 0 );

// ajax call for practical filter
add_action("wp_ajax_nopriv_load_more_photos",'wp_ajax_load_more_photos');
add_action("wp_ajax_load_more_photos",'wp_ajax_load_more_photos');
function wp_ajax_load_more_photos(){ 
    ob_start();
    $paged      = isset($_POST['page'])?$_POST['page']:1;
	$limit      = 6;
    
    $args = array(
        'post_type' => 'photos',
        'orderby'=>'date',
        'order'=>'desc', 
        'posts_per_page'=>$limit,
        'paged'=>$paged,
    );

	$query = new WP_Query( $args );
	
	if($query->have_posts()) { $counter = 1;
      	while($query->have_posts()):
			loadGalleryImage($query, $counter);
			$counter++;
		endwhile;
	}


	$content = ob_get_clean();  
    $arrResponse=[];
    $arrResponse['status']=1;
    $arrResponse['html']=$content;
    $arrResponse['page']=$paged;
    $arrResponse['total_pages']=$query->max_num_pages;

    echo json_encode($arrResponse);

	wp_die();
}

function loadGalleryImage($query,$sequence=1) {
    $query->the_post();
	$ID = get_the_ID();
    $image = get_the_post_thumbnail_url(get_the_ID(),'full');
    ?>
    <figure><img class="img-full" src="<?php echo $image; ?>" alt=""></figure>
    <?php

}

?>