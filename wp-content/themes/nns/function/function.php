<?php
$upload_folder= wp_upload_dir();
define('THEME_URI', get_template_directory_uri());
define('AJAX_URI', admin_url('admin-ajax.php'));
define('UPLOAD_URI', $upload_folder['baseurl']);
define('UPLOAD_DIR', $upload_folder['basedir']);
define('MYID',get_current_user_id());

add_theme_support( 'post-thumbnails' );

require get_template_directory() . '/function/filters.php';
require get_template_directory() . '/function/actions.php';
require get_template_directory() . '/function/ajaxs.php';
require get_template_directory() . '/function/shortcodes.php';
require get_template_directory() . '/function/cropt.php';
/*------------------all function here------------*/
function hr_cropt($media_id,$w,$h){
    if(is_numeric($w) and is_numeric($h)){
        $url = wp_get_attachment_url($media_id);
        $ext = substr(strrchr($url, '/'),1);
        $cropt=UPLOAD_URI.'/crop/';
        if($url=="") return $url;
        if(file_exists($cropt.$media_id."_".$w."x".$h."_".$ext)){
            $url=$cropt.$media_id."_".$w."x".$h."_".$ext;
        }
        else{
            $resizeObj = new resize($url);
            $resizeObj -> resizeImage($w,$h, "crop");
            $resizeObj -> saveImage(UPLOAD_DIR.'/crop/'.$media_id."_".$w."x".$h."_".$ext, 90);
            $url=$cropt.$media_id."_".$w."x".$h."_".$ext;
        }
        return $url;
    }
    return "";
}
/*--- Create Theme Options ---*/
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Theme Options');
}

/** unsing str **/
function hr_unsign($str){
   $arrs = array(
       'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
       'd'=>'đ',
       'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
       'i'=>'í|ì|ỉ|ĩ|ị',
       'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
       'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
       'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
       'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
       'D'=>'Đ',
       'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
       'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
       'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
       'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
       'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
   );
  foreach($arrs as $val=>$name){
       $str = preg_replace("/($name)/i", $val, $str);
  }
 return $str;
}
/*post content*/
function get_post_excerpt($post_id='',$limit = 20) {
    $limit = (is_numeric($limit) && $limit)?$limit:20;
    $post_id = $post_id?$post_id:get_the_ID();
    if(!get_post_field('post_content',$post_id))
        return '';
    $content = get_post_field('post_content',$post_id);
    $content = trim(preg_replace('/<[^>]*>/', ' ', $content));
    $content = explode(' ',$content);
    if($limit > count($content)){
        $count = count($content);
    }
    else {
        $count = $limit;
    }
    $new_content = '';
    for($i = 0; $i < $count; $i++) {
        $new_content .= ' '.$content[$i];
    }
    if($count == $limit){
        $new_content .= '...';
    }
    return trim($new_content);
}

function the_post_excerpt($post_id='',$limit = '') {
    echo get_post_excerpt($post_id,$limit);
}
/*------------mes--*/
function mes($text, $color){
    ob_start();
    $color=($color==1)?'green':'red';
    ?>
        <font color="<?php echo $color; ?>"><?php echo $text; ?></font>
    <?php
    return ob_get_clean();
}
/*------------notice--*/
function add_notice($text, $color){
    ob_start();
    $color=($color==1)?'green':'red';
    ?>
    <script>
        add_notice('<font color="<?php echo $color; ?>"><?php echo htmlspecialchars($text,ENT_QUOTES); ?></font>');
    </script>
    <?php
    echo ob_get_clean();
}

function pp_get_image($image_id, $size = 'full') {
    $image = array(
        'src' => '',
        'alt' => '',
    );
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true);
    $image_src = wp_get_attachment_image_src($image_id, $size);
    $image_src = $image_src?$image_src[0]:'';
    $image['src'] = $image_src;
    $image['alt'] = $image_alt;
    return $image;
}
function pp_category_text($post_id = '',$taxonomy='',$separator = '',$menu = false) {
    $post_id = $post_id?$post_id:get_the_ID();
    $taxonomy = $taxonomy?$taxonomy:'category';
    $categories = wp_get_post_terms($post_id,$taxonomy);
    $html = '';
    foreach ($categories as $key=>$category) {
        $temp = "<a data-cat='".$category->term_id."' href='".get_category_link($category->term_id)."'>{$category->name}</a>";
        if($menu) {
            $temp = "<li>{$temp}</li>";
        }
        else {
            if($key && $separator) {
                $temp = $separator.$temp;
            }
        }
        $html .= $temp;
        //$categoryText.= $categoryText?', '.$category->name:$category->name;
    }
    if($menu) {
        $html = "<ul>{$temp}</ul>";
    }
    return $html;
}

function pp_posts_count($args) {
    global $wpdb;
    $the_query = new WP_Query( $args );
    $sql = "SELECT count(*) as count from (".str_replace("ORDER BY","ORDER BY",str_replace("SQL_CALC_FOUND_ROWS ",'',$the_query->request)).") as sub";
    $row = $wpdb->get_row( $sql );
    if($row){
        return $row->count;
    }
    return 0;
}
?>


