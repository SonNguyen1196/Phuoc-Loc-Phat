<?php get_header();
$queried_object = get_queried_object();
?>
<?php
$args = array(
    "post_type" => 'post',
    "post_status" => 'publish',
    "order"  => 'DESC',
    "orderby" => 'date',
    "posts_per_page" => 10 ,
    'tax_query' => array(
        array(
            'taxonomy' =>'category',
            'field' => 'id',
            'terms' => $queried_object->term_id,
        )
    )
);
$arrs = get_posts($args);
?>
<main class="template-blog">
    <?php if($arrs):?>
        <section class="list-post">
            <div class="container">
                <div class="row" id="list_post">
                    <?php
                    $img_defaul = get_field('image_thumnail', 'options');
                    $num = 0 ;
                    foreach($arrs as $arr) {
                        $col_class = ($num == 0)? 'full-width flex-box' : '';
                        $num++;
                        $author = get_the_author_meta('display_name',$arr->post_author);
                        ?>
                        <div class="col-sm-4 <?php echo $col_class; ?>">
                            <div class="item">
                                <div class="feature-image">
                                    <?php $img = has_post_thumbnail($arr->ID)? get_the_post_thumbnail_url($arr->ID) : $img_defaul['url'] ; ?>
                                    <a href="<?php echo get_permalink($arr->ID) ;?>">
                                        <img src="<?php echo $img ;?>" alt="<?php echo $img_defaul['alt']?>">
                                        <div class="hover-image">
                                            <img src="<?php echo THEME_URI ?>/images/eye-3.svg" alt="eye-3">
                                        </div>
                                    </a>
                                </div>
                                <div class="content-item">
                                    <div class="entry-title"><h3><a href="<?php echo get_permalink($arr->ID) ;?>" style="display: inline; transition: transform 0.1s; transform: translateX(-155.703px);"><?php echo $arr->post_title;?></a></h3></div>
                                    <div class="wrapper">
                                        <?php
                                        $categories = wp_get_object_terms($arr->ID,'category');
                                        $html_cat = '';
                                        foreach ($categories as $key=>$categorie){
                                            if($key){
                                                $html_cat.= '<span class="cat_post"></span> ';
                                            }
                                            $html_cat .= "<span class='entry-category'><a href='".get_category_link($categorie->term_id)."'>$categorie->name</a></span>";
                                        }
                                        ?>
                                        <?php echo $html_cat; ?>
                                        <div class="author"><h4>Đăng bởi : <span><?php echo $author; ?></span></h4></div>
                                    </div>
                                    <?php if(get_post_excerpt($arr->ID,20)):?>
                                        <div class="entry-content">
                                            <?php the_post_excerpt($arr->ID,20); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="read-more">
                                        <a href="<?php echo get_permalink($arr->ID) ;?>" class="link-read-more">đọc thêm
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="btn-load text-center">
                    <a href="#">xem thêm tin</a>
                </div>
            </div>
        </section>
    <?php endif;?>
</main>
<?php get_footer();?>
