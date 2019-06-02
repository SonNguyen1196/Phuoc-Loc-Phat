<?php
/***** ADD SESSION ******/
add_action('init', 'hr_start_session', 1);
function hr_start_session() {
    if(!session_id()) {
        session_start();
    }
}
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
    'main_menu' => 'Main Menu'
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
    add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
    add_filter('pre_option_update_core','__return_null');
    add_filter('pre_site_transient_update_core','__return_null');
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
    wp_enqueue_script('labory', THEME_URI.'/js/labory.js',array('jquery'),'', true);
    wp_localize_script('labory', 'hr', array('p_url' => THEME_URI,'a_url'=>AJAX_URI));
    wp_enqueue_script('frontend-js', THEME_URI.'/js/frontend.js',array('jquery'),'', true);
    wp_localize_script('frontend-js', 'hr', array('p_url' => THEME_URI,'a_url'=>AJAX_URI));
    wp_enqueue_script('notice-lib', THEME_URI.'/js/notice_lib.js',array('jquery'),'', true);
    wp_enqueue_script('notice', THEME_URI.'/js/notice.js',array('jquery'),'', true);
    wp_enqueue_script('bootstrap-js', THEME_URI.'/js/bootstrap.min.js',array('jquery'),'',true);
    wp_enqueue_style('bootstrap-css', THEME_URI.'/css/bootstrap.min.css');
    wp_enqueue_style('slick-theme', THEME_URI.'/css/slick-theme.css');
    wp_enqueue_style('slick', THEME_URI.'/css/slick.css');
   /* wp_enqueue_style('css-font', THEME_URI.'/css/font-awesome.min.css');*/
    wp_enqueue_style('css-font', THEME_URI.'/css/fontawesome-all.min.css');
    wp_enqueue_script( 'slick', THEME_URI. '/js/slick.min.js', '','' , true);
    wp_enqueue_style('frontend-css', THEME_URI.'/css/frontend.css');
    wp_enqueue_style('main-css', THEME_URI.'/css/main.css');
    wp_enqueue_style('custom-css', THEME_URI.'/css/custom.css');
    wp_enqueue_script('main-js', THEME_URI.'/js/main.js',array('jquery'),'', true);

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
?>