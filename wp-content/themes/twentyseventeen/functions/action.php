<?php
define('THEME_URI', get_template_directory_uri());
/***** ADD SCRIPT FRONTEND ******/
add_action('wp_enqueue_scripts', 'hr_frontend_script');
function hr_frontend_script(){
    //wp_deregister_script('jquery');
    //wp_enqueue_script('jquery-core');

    wp_enqueue_script('underscore');
    wp_enqueue_script('jquery-2.2.0-js', THEME_URI.'/asset/js/jquery-2.2.0.min.js',array('jquery'),'', true);
    wp_enqueue_script('bootstrap-js', THEME_URI.'/asset/js/bootstrap.min.js',array('jquery'),'',true);
    wp_enqueue_script('bootstrap-submenu', THEME_URI.'/asset/js/bootstrap-submenu.js',array('jquery'),'', true);
    wp_enqueue_script('rangeslider', THEME_URI.'/asset/js/rangeslider.js',array('jquery'),'', true);
    wp_enqueue_script('jquery-mb-YTPlayer', THEME_URI.'/asset/js/jquery.mb.YTPlayer.js',array('jquery'),'', true);
    wp_enqueue_script('wow.min.js', THEME_URI.'/asset/js/wow.min.js',array('jquery'),'', true);
    wp_enqueue_script('bootstrap-select', THEME_URI.'/asset/js/bootstrap-select.min.js',array('jquery'),'', true);
    wp_enqueue_script('jquery.easing.1.3', THEME_URI.'/asset/js/jquery.easing.1.3.js',array('jquery'),'', true);
    wp_enqueue_script('jquery.scrollUp', THEME_URI.'/asset/js/jquery.scrollUp.js',array('jquery'),'', true);
    wp_enqueue_script('leaflet-js', THEME_URI.'/asset/js/leaflet.js',array('jquery'),'', true);
    wp_enqueue_script('leaflet-providers', THEME_URI.'/asset/js/leaflet-providers.js',array('jquery'),'', true);
    wp_enqueue_script('markercluster', THEME_URI.'/asset/js/leaflet.markercluster.js',array('jquery'),'', true);
    wp_enqueue_script('dropzone', THEME_URI.'/asset/js/dropzone.js',array('jquery'),'', true);
    wp_enqueue_script('filterizr', THEME_URI.'/asset/js/jquery.filterizr.js',array('jquery'),'', true);
    wp_enqueue_script('magnific-popup.min.js', THEME_URI.'/asset/js/jquery.magnific-popup.min.js',array('jquery'),'', true);
    wp_enqueue_script('bug-workaround', THEME_URI.'/asset/js/ie10-viewport-bug-workaround.js',array('jquery'),'', true);
    wp_enqueue_script('ie-emulation-modes-warning', THEME_URI.'/asset/js/ie-emulation-modes-warning.js',array('jquery'),'', true);

   /* wp_enqueue_style('css-font', THEME_URI.'/css/font-awesome.min.css');*/
    wp_enqueue_style('bootstrap', THEME_URI.'/asset/css/bootstrap.min.css');
    wp_enqueue_style('css-animate', THEME_URI.'/asset/css/animate.min.css');
    wp_enqueue_style('css-submenu', THEME_URI.'/asset/css/bootstrap-submenu.css');
    wp_enqueue_style('css-select', THEME_URI.'/asset/css/bootstrap-select.min.css');
    wp_enqueue_style('css-leaflet', THEME_URI.'/asset/css/leaflet.css');
    wp_enqueue_style('css-map', THEME_URI.'/asset/css/map.css');
    wp_enqueue_style('css-font-awesome', THEME_URI.'/asset/fonts/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style('css-flaticon', THEME_URI.'/asset/fonts/flaticon/font/flaticon.css');
    wp_enqueue_style('css-style', THEME_URI.'/asset/fonts/linearicons/style.css');
    wp_enqueue_style('css-mCustomScrollbar', THEME_URI.'/asset/css/jquery.mCustomScrollbar.css');
    wp_enqueue_style('css-dropzone', THEME_URI.'/asset/css/dropzone.css');
    wp_enqueue_style('css-magnific', THEME_URI.'/asset/css/magnific-popup.css');
    wp_enqueue_style('css-special-style', THEME_URI.'/asset/css/style.css');
    wp_enqueue_style('css-overide', THEME_URI.'/asset/css/overide.css');
    wp_enqueue_style('css-default', THEME_URI.'/asset/css/skins/default.css');
    wp_enqueue_style('css-default', THEME_URI.'/asset/css/skins/default.css');
    wp_enqueue_style('ie10-viewport-bug-workaround', THEME_URI.'/asset/css/ie10-viewport-bug-workaround.css');

}

add_action( 'init', 'codex_duan_init' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_duan_init() {
	$labels = array(
		'name'               => _x( 'Dự Án', 'plp-prj' ),
		'singular_name'      => _x( 'Dự Án', 'plp-prj' ),
		'menu_name'          => _x( 'Dự Án', 'plp-prj' ),
		'name_admin_bar'     => _x( 'Dự Án', 'plp-prj' ),
		'add_new'            => _x( 'Thêm Dự Án', 'plp-prj' ),
		'add_new_item'       => __( 'Thêm Dự Án', 'plp-prj' ),
		'new_item'           => __( 'Thêm Dự Án', 'plp-prj' ),
		'edit_item'          => __( 'Sửa Dự Án', 'plp-prj' ),
		'view_item'          => __( 'Xem Dự Án', 'plp-prj' ),
		'all_items'          => __( 'Tất Cả Dự Án', 'plp-prj' ),
		'search_items'       => __( 'Tìm Kiếm Dự Án', 'plp-prj' ),
		'parent_item_colon'  => __( 'Dự Án', 'plp-prj' ),
		'not_found'          => __( 'Không tìm thấy Dự Án.', 'plp-prj' ),
		'not_found_in_trash' => __( 'Không có Dự Án trong thùng rác.', 'plp-prj' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'plp-prj' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'du-an' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

    register_post_type( 'du-an', $args );
    
    // Add new taxonomy, NOT hierarchical (like tags)
	$labels_txn = array(
		'name'                       => _x( 'Danh Mục', 'plp-prj' ),
		'singular_name'              => _x( 'Danh Mục', 'plp-prj' ),
		'search_items'               => __( 'Tìm Kiếm Danh Mục', 'plp-prj' ),
		'all_items'                  => __( 'Tất Cả Danh Mục', 'plp-prj' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Sửa Danh Mục', 'plp-prj' ),
		'update_item'                => __( 'Cập Nhật Danh Mục', 'plp-prj' ),
		'add_new_item'               => __( 'Thêm Danh Mục', 'plp-prj' ),
		'new_item_name'              => __( 'Danh Mục Dự Án', 'plp-prj' ),
		'not_found'                  => __( 'Không có danh mục.', 'plp-prj' ),
	);

	$args_txn = array(
		'hierarchical'          => true,
		'labels'                => $labels_txn,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'chuyen-muc-du-an' ),
	);

	register_taxonomy( 'chuyen-muc-du-an', 'du-an', $args_txn );
}

function change_submenu_class($menu) {  
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);  
    return $menu;  
  }  
  add_filter('wp_nav_menu','change_submenu_class');  

?>