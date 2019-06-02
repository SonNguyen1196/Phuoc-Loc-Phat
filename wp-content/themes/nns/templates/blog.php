<?php
/** Template Name: Blog Page */
get_header();
?>
<?php
$args = array(
    "post_type" => 'post',
    "post_status" => 'publish',
    "order"  => 'DESC',
    "orderby" => 'date',
    "posts_per_page" => 8 ,
);
$arrs = get_posts($args);
?>
<main class="template-blog">
    <section class="list-post">
        <div class="container">
            <?php $num = 0 ;if($arrs): ?>
            <div class="row" id="list_post">
            <?php
                foreach($arrs as $arr) {
                    $col_class = ($num == 0 || $num == 4)? 'full-width flex-box' : '';
                    $author_name = get_the_author_meta('display_name',$arr->post_author);
                    $categories = wp_get_object_terms($arr->ID,'category');
                    $html_cat = '';
                    foreach ($categories as $key=>$categorie){
                        if($key){
                            $html_cat.= '<span class="cat_post"></span> ';
                        }
                        $html_cat .= "<span class='entry-category'><a href='".get_category_link($categorie->term_id)."'>$categorie->name</a></span>";
                    }
                    $num++;
                    $arg = array(
                        'loop'=>'item_post',
                        'class'=>$col_class,
                        'link'=>get_permalink($arr->ID),
                        'image'=> has_post_thumbnail($arr->ID) ? get_the_post_thumbnail_url($arr->ID) : get_field('image_thumnail', 'options')['url'] ,
                        'title'=>$arr->post_title,
                        'html_cat'=> $html_cat,
                        'author'=>$author_name,
                        'content'=> get_post_excerpt($arr->ID,20),
                    );
                    do_action('template_loop',(object)$arg);
                ?>
                <?php } ?>
            </div>
            <?php endif;?>
            <?php
                $args['posts_per_page']=-1;
                $total = count(get_posts($args));
                $num_page=get_num_page($total,8);
                if($num_page>1){
			?>
            <div class="button btn-load load-more text-center">
                <a href="javascript:void(0)" class="button-style button-load-more load_more_post" data-page="2" data-max="<?php echo $num_page; ?>" title="Load more">xem thêm tin</a>
            </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php get_footer();?>
