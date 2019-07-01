<?php
define('THEME_URI', get_template_directory_uri());
/***** ADD SCRIPT FRONTEND ******/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	
}
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
		'name'               => _x( 'Dự Án', 'nnstheme' ),
		'singular_name'      => _x( 'Dự Án', 'nnstheme' ),
		'menu_name'          => _x( 'Dự Án', 'nnstheme' ),
		'name_admin_bar'     => _x( 'Dự Án', 'nnstheme' ),
		'add_new'            => _x( 'Thêm Dự Án', 'nnstheme' ),
		'add_new_item'       => __( 'Thêm Dự Án', 'nnstheme' ),
		'new_item'           => __( 'Thêm Dự Án', 'nnstheme' ),
		'edit_item'          => __( 'Sửa Dự Án', 'nnstheme' ),
		'view_item'          => __( 'Xem Dự Án', 'nnstheme' ),
		'all_items'          => __( 'Tất Cả Dự Án', 'nnstheme' ),
		'search_items'       => __( 'Tìm Kiếm Dự Án', 'nnstheme' ),
		'parent_item_colon'  => __( 'Dự Án', 'nnstheme' ),
		'not_found'          => __( 'Không tìm thấy Dự Án.', 'nnstheme' ),
		'not_found_in_trash' => __( 'Không có Dự Án trong thùng rác.', 'nnstheme' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'nnstheme' ),
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
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'publicize' )
	);

    register_post_type( 'du-an', $args );
    
    // Add new taxonomy, NOT hierarchical (like tags)
	$labels_txn = array(
		'name'                       => _x( 'Danh Mục', 'nnstheme' ),
		'singular_name'              => _x( 'Danh Mục', 'nnstheme' ),
		'search_items'               => __( 'Tìm Kiếm Danh Mục', 'nnstheme' ),
		'all_items'                  => __( 'Tất Cả Danh Mục', 'nnstheme' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Sửa Danh Mục', 'nnstheme' ),
		'update_item'                => __( 'Cập Nhật Danh Mục', 'nnstheme' ),
		'add_new_item'               => __( 'Thêm Danh Mục', 'nnstheme' ),
		'new_item_name'              => __( 'Danh Mục Dự Án', 'nnstheme' ),
		'not_found'                  => __( 'Không có danh mục.', 'nnstheme' ),
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

			$query = new WP_Query( array( 
		        'post_type' =>'du-an' ,
		        'posts_per_page' => $instance['number_p'],

		    )  );

			 ?>

			 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

			 	<div class="media">
					<div class="media-left">
					<a href="<?php the_permalink() ?>">
						<img class="media-object img-responsive" src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
					</a>
					</div>
					<div class="media-body">
						<h3 class="media-heading">
							<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h3>
					</div>
				</div>


			 <?php endwhile; 
			 wp_reset_postdata();
			 else : ?>
			 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			 <?php endif; ?>

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

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Trang Chủ';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {              
                // Get last category post is in
                $last_category = $category[0];
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

add_action('wp_footer', 'disable_right_click_copy');
function disable_right_click_copy(){
    $user = wp_get_current_user();
    $allowed_roles = array('administrator');
    if(array_intersect($allowed_roles, $user->roles) == false){
        ?>
            <script type ="text/javascript">
                jQuery(document).ready(function($){
                    $('body').bind('cut copy paste', function (e) {
                        e.preventDefault();
                    });
                
                    //Disable mouse right click
                    $("body").on("contextmenu",function(e){
                        return false;
                    });
                });       
            </script>
        <?php
    }
}

  
function custom_posts_per_page( $query ) {

    if ( $query->is_archive('du-an') ) {
        set_query_var('posts_per_page', 1);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );
?>