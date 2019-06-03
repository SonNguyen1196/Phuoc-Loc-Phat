<?php

/**** REMOVE EMOJI *****/
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_generator');
//remove_action('wp_head', 'print_emoji_detection_script',7);
//remove_action('wp_print_styles','print_emoji_styles');
remove_action('embed_head','wp_print_styles',20);

function pp_footer_jquery () {
    if(!is_admin()) {
        global $wp_scripts;
        $wp_scripts->registered['jquery']->extra['group'] = 1;
        $wp_scripts->registered['jquery-core']->extra['group'] = 1;
        $wp_scripts->registered['jquery-migrate']->extra['group'] = 1;
    }
}
add_action ( 'wp_head', 'pp_footer_jquery', 1, 0 );

if (!is_admin() && !is_user_logged_in()) {
    remove_action('wp_head', 'wp_print_styles', 8);
    add_action('wp_head', 'pp_print_styles_noscript', 8);
}

register_nav_menus( array(
    'social_menu' => 'Social Links Menu',
    'main_menu' => 'Menu Chính',
) );


function pp_print_styles_noscript()
{
    $handles = wp_styles()->queue;
    $expects = array();
    $style = WP_Styles();
    foreach ($handles as $handle) {
        $file = $style->registered[$handle];
        $this_handle = $file;
        $url = $file->src;
        $file = str_replace(get_bloginfo('url'), '', $url);
        $file = getcwd() . $file;
        if (file_exists($file)) {
            $css = minify_css($url);
            $maxlenght = 20000;
            $start = 0;
            while ($css){
                echo '<style>';
                if(strlen($css) < $maxlenght) {
                    echo $css;
                    echo "</style>";
                    $css = '';
                }
                else {
                    $check = true;
                    $end = $start + $maxlenght;
                    $temp = substr($css, $start, $end);
                    $pos = strrpos($temp,'@media');
                    if (!$pos) {
                        $pos = strrpos($temp,'}');
                        if ($pos) {
                            $pos++;
                        }
                    }
                    if (substr($css, $start, $pos)) {
                        echo substr($css, $start, $pos);
                    } else {
                        break;
                    }
                    echo "</style>";
                    $css = substr($css,$pos);
                    //var_dump($css);
                }
            }
        } else {
            echo '</style>';
            echo "<link rel='stylesheet' id='{$this_handle->handle}'  href='{$this_handle->src}' type='text/css' media='{$this_handle->args}'/>";
        }
        wp_dequeue_style($handle);
    }
}

function minify_css($url)
{
    $file = str_replace(get_bloginfo('url'), '', $url);
    $file = getcwd() . $file;
    if (file_exists($file)) {
        $content = stream_get_contents(fopen($file, "rb"));
        $folder = str_replace('/' . substr(strrchr($url, '/'), 1), '', $url);
        while (strpos($content, '/*') !== false) {
            $url_pos = strpos($content, '/*');
            $string = substr($content, $url_pos);
            $length = strpos($string, '*/');
            $string = substr($string, 0, $length + 2);
            $content = str_replace($string, '', $content);
        }
        $temp = $content;
        while (strpos($temp, 'url(') !== false) {
            $url_pos = strpos($temp, 'url(') ? strpos($temp, 'url(') : '';
            $string = substr($temp, $url_pos);
            $length = strpos($string, ')');
            $mainlink = substr($string, 4, $length - 4);
            $link = str_replace('"', '', $mainlink);
            $link = str_replace("'", '', $link);
            $count = 0;
            $checkurl = false;
            foreach (explode('/', $link) as $i) {
                if ($i == '..') {
                    $link = substr($link, '3');
                    $count++;
                    $checkurl = true;
                } else {
                    if ($i == '.') {
                        $link = substr($link, '2');
                        $checkurl = true;
                    } elseif ($i == '') {
                        $link = substr($link, '1');
                        $checkurl = true;
                    } elseif (substr($i, 0, 4) != 'http') {
                        $checkurl = true;
                    }
                    break;
                }
            }
            $tempFolder = $folder;
            while ($count) {
                $tempFolder = str_replace('/' . substr(strrchr($folder, '/'), 1), '', $folder);
                $count--;
            }
            if ($checkurl) {
                $link = $tempFolder . '/' . $link;
            }
            $content = str_replace($mainlink, $link, $content);
            $temp = substr($temp, ($url_pos + 5 + $length));
        }
        while (strpos($content, '@import') !== false) {
            $pos = strpos($content, '@import');
            $temp = substr($content, $pos);
            $string = substr($temp, 0, strpos($temp, ';'));
            $url_pos = strpos($string, 'url(') ? strpos($string, 'url(') : '';
            $length = (strpos($string, ')') - $url_pos) - 4;
            $link = substr($string, ($url_pos + 4), $length);
            $link = str_replace('"', '', $link);
            $link = str_replace("'", '', $link);
            $count = 0;
            $checkurl = false;
            foreach (explode('/', $link) as $i) {
                if ($i == '..') {
                    $link = substr($link, '3');
                    $count++;
                    $checkurl = true;
                } else {
                    if ($i == '.') {
                        $link = substr($link, '2');
                        $checkurl = true;
                    } elseif ($i == '') {
                        $link = substr($link, '1');
                        $checkurl = true;
                    } elseif (substr($i, 0, 4) != 'http') {
                        $checkurl = true;
                    }
                    break;
                }
            }
            $tempFolder = $folder;
            while ($count) {
                $tempFolder = str_replace('/' . substr(strrchr($folder, '/'), 1), '', $folder);
                $count--;
            }
            if ($checkurl) {
                $link = $tempFolder . '/' . $link;
            }
            $temp = '';
            $temp .= minify_css($link);
            $content = str_replace($string . ';', $temp, $content);
        }
        $content = str_replace("\t", ' ', trim($content));
        $content = str_replace("\n", '', trim($content));
        $content = str_replace("\r", '', trim($content));
        while (stristr($content, '  ')) {
            $content = str_replace('  ', ' ', $content);
        }
        return $content;
    }
    return '';
}

/**** REMOVE CORE UPDATE *****/
add_action('after_setup_theme','hr_remove_core_updates');
function hr_remove_core_updates(){
    if(! current_user_can('update_core')){return;}
    add_action('init', remove_update_core_wp(),2);
    add_filter('pre_option_update_core','__return_null');
    add_filter('pre_site_transient_update_core','__return_null');
}
function remove_update_core_wp(){
    remove_action( 'init', 'wp_version_check' );
}



/**** REMOVE ADMIN BAR *****/
add_action('after_setup_theme', 'hr_remove_admin_bar');
function hr_remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

/**** BLOCK USER ACESS ADMIN  *****/
add_action( 'init', 'hr_blockusers_init' );
function hr_blockusers_init() {
    if ( is_admin() && ! current_user_can( 'administrator' ) &&
        ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) && is_user_logged_in() ) {
        wp_redirect( home_url() );
        exit;
    }
}

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
/***** ADD SCRIPT BACKEND ******/
add_action('admin_enqueue_scripts', 'hr_admin_script');
function hr_admin_script() {
    wp_enqueue_style('backendcss', THEME_URI.'/css/backend.css');
    wp_enqueue_script('frontendjs', THEME_URI.'/js/frontend.js',array(),'', true);
    wp_localize_script('backendjs', 'hr', array('p_url' => THEME_URI,'a_url'=>AJAX_URI));
}

add_action('template_loop','template_loop_f');
function template_loop_f($arg){
    require get_template_directory() . '/loop/'.$arg->loop.'.php';
}

add_action('wp_footer','add_hide_me');
function add_hide_me(){?>
    <div style="display:none"><div id="hide_me"></div></div>
<?php } ?>
<?php
add_action('wp_head','update_count_view');
function update_count_view(){
    if(is_single() or is_page()){
        global $post;
        $view=(get_post_meta($post->ID,'views_meta',true)<>"")?get_post_meta($post->ID,'views_meta',true):0;
        update_post_meta($post->ID,'views_meta',($view+1));
    }
    if(isset($_GET['dev'])){
        if(is_single() or is_page()){
            global $post;
            $view=get_post_meta($post->ID,'views_meta',true);
            ?>
            <span style="font-size: 100px; position: fixed; top: 50%; right: 50%; z-index: 9999; color: red; font-weight: bold;"><?php echo $view; ?></span>
            <?php
        }
    }
}

function acf_render($before,$after,$content=''){
    return ($content)?$before.$content.$after:'';
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