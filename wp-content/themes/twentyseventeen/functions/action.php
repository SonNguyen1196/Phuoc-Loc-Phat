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
    wp_enqueue_script('js-match-height', THEME_URI.'/asset/js/jquery.matchHeight-min.js',array('jquery'),'', true);
    wp_enqueue_script('ie-emulation-modes-warning', THEME_URI.'/asset/js/ie-emulation-modes-warning.js',array('jquery'),'', true);
    wp_enqueue_script('ie-front-end', THEME_URI.'/asset/js/front-end.js',array('jquery'),'', true);

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

  class New_Post_Blog extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'recent_blog_widget', // Base ID
			esc_html__( 'Bài Viết Mới Đăng', 'nns-theme' ), // Name
			array( 'description' => esc_html__( 'Hiển thị nhưng bài viết mới đăng', 'nns-theme' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			?>
			<div class="main-title-2 ">
                    <h2 class="title-widget"><?php echo $instance['title'] ?></h2>
                </div>
			<?php
		}

		if ( ! empty( $instance['number_p'] ) ) {
			$arg_loop = array(
				'post_type' => 'du-an',
				'posts_per_page ' => $instance['number_p'],
				'post_status ' => 'publish'
			);

			$get_post_sb = get_posts($arg_loop);
			foreach($get_post_sb as $post_it){
				?>
					<div class="media">
						<div class="media-left">
						<a href="<?php echo get_permalink($post_it->ID)?>">
							<img class="media-object img-responsive" src="<?php echo get_the_post_thumbnail_url($post_it->ID) ?>" alt="<?php echo $post_it->post_title ?>">
						</a>
						</div>
						<div class="media-body">
							<h3 class="media-heading">
								<a href="<?php echo get_permalink($post_it->ID)?>"><?php echo $post_it->post_title ; ?></a>
							</h3>
						</div>
					</div>
				<?php
			}
			 ?>
			<?php wp_reset_postdata(); ?>
			<?php
		}
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Tiêu đề', 'nns-theme' );
		$number_p = ! empty( $instance['number_p'] ) ? $instance['number_p'] : esc_html__( 'Số bài viết', 'nns-theme' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Tiêu đề:', 'nns-theme' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number_p' ) ); ?>"><?php esc_attr_e( 'Số bài viết:', 'nns-theme' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_p' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_p' ) ); ?>" type="text" value="<?php echo esc_attr( $number_p ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['number_p'] = ( ! empty( $new_instance['number_p'] ) ) ? sanitize_text_field( $new_instance['number_p'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_recent_blog_widget() {
    register_widget( 'New_Post_Blog' );
}
add_action( 'widgets_init', 'register_recent_blog_widget' );

?>