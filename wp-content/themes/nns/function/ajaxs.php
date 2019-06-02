<?php
add_action('wp_ajax_load_project_detail','load_project_detail_callback');
add_action('wp_ajax_nopriv_load_project_detail','load_project_detail_callback');
function load_project_detail_callback() {
    $pid = $_POST['pid'];
    $project = get_field('project_details',$pid)[0];
	$sliders = array();
	$image_project = get_field('image_project',$pid)['url'];
	/*if(!empty($arrs)){
		foreach($arrs as $arr){
			$sliders[]=$arr['image_slider']['url'];
		}
	}*/
    $json = array(
        'title'=>get_the_title($pid),
        'content'=>apply_filters('the_content', get_post_field('post_content', $pid)),
        'location' => $project['locations'],
        'client' => $project['client'],
        'type' => implode(', ', $project['type']),
        'technology' => implode(', ',$project['technology']),
        'color_scheme' => $project['color_scheme'],
        'website' => $project['website'],
        'overview' => $project['description'],
        'challenge' => $project['challenge'],
		'image_project'=>$image_project,
    );
    echo json_encode($json);
    die();	
}
add_action('wp_ajax_load_projects','load_projects_callback');
add_action('wp_ajax_nopriv_load_projects','load_projects_callback');
function load_projects_callback() {
    $json =  array('projects'=>array());
    $catid = $_POST['catid'];
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'orderby' => 'date',
        'posts_per_page' => -1,
    );
    if($catid) {
        $args['cat'] = $catid;
    }
    $total = pp_posts_count($args);
    $args['posts_per_page'] = $_POST['number'];
    $json['lazyload'] = false;
    if(isset($_POST['time']) && $_POST['time']) {
        $args['offset'] = $_POST['time']*$args['posts_per_page'];
        $json['time'] = $_POST['time'] + 1;
    }
    else {
        $args['offset'] = 0;
        $json['time'] = 1;
    }
    $the_query = new WP_Query($args);
    foreach($the_query->posts as $p) {
        $pid = $p->ID;
        $project = get_field('project_details',$pid)[0];
        $json['projects'][] = array(
            'id'=>$pid,
            'title'=>get_the_title($pid),
            'image'=>get_post_thumbnail_id($pid)?pp_get_image(get_post_thumbnail_id($pid)):'',
            'categories' => pp_category_text($pid),
            'short_description' => $project['short_description'],
            'link' => get_permalink($pid),
        );
    }
    if($total > $args['offset']+$args['posts_per_page']) {
        $json['lazyload'] = true;
    }
    echo json_encode($json);
    die();
}
add_action('wp_ajax_load_more_post','load_more_post');
add_action('wp_ajax_nopriv_load_more_post','load_more_post');
function load_more_post(){
    ob_start();
    $num=8;
    $args=array('post_type'=>array('post'),'posts_per_page'=>$num,'paged'=>$_POST['page']);
    if($_POST['cat']){
        $args['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => $_POST['cat']));
    }
    $arrs = get_posts($args);
    $number=0;
    foreach($arrs as $post){
        setup_postdata($post);
        $categories = wp_get_object_terms($post->ID,'category');
        $author_name = get_the_author_meta('display_name',$post->post_author);
        $html_cat = '';
        foreach ($categories as $key=>$categorie){
            if($key){
                $html_cat.= '<span class="cat_post"></span> ';
            }
            $html_cat .= "<span class='entry-category'><a href='".get_category_link($categorie->term_id)."'>$categorie->name</a></span>";
        }
        $col_class = ($number == 0 || $number == 4)? 'full-width flex-box' : '';
        $number++;
        $arg = array(
            'loop'=>'item_post',
            'class'=>$col_class,
            'link'=>get_permalink($post->ID),
            'image'=> has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID) : get_field('image_thumnail', 'options')['url'],
            'title'=>$post->post_title,
            'html_cat'=> $html_cat,
            'author'=>$author_name,
            'date'=>get_the_date('d F Y',$post->ID),
            'content'=>get_post_excerpt($post->ID,20),
        );
        do_action('template_loop',(object)$arg);
    }
    $str = ob_get_clean();
    ?>
    <textarea class="load_content"><?php echo htmlspecialchars($str, ENT_QUOTES); ?></textarea>
    <script>
        jQuery("#list_post").append(jQuery(".load_content").val());
        var page=jQuery(".load_more_post").attr('data-page');
        var maxdata=jQuery(".load_more_post").attr('data-max');
        if(page>=maxdata){
            jQuery(".load_more_post").remove();
        }
        else{
            jQuery(".load_more_post").attr('data-page','<?php echo ($_POST['page']+1); ?>');
            unloading('.load_more_post');
        }
    </script>
    <?php
    exit;
}
?>