<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
    $title_post=get_the_title();
    $content_post=apply_filters('the_content',get_the_content());
endwhile;
endif;
?>
    <section class="content-post">
        <div class="container">
            <div class="post">
                <div class="row clearfix">
                    <?php $icons = get_field('icons_theme_option','options');
                    shuffle($icons);
                    $count = 0;
                    ?>
                    <?php
                    $args = array(
                        "post_type" => 'post',
                        "post_status" => 'publish',
                        "order" => 'DESC',
                        "posts_per_page" => count($icons) ,
                        'orderby' => 'rand',
                        'post__not_in'=>array($post->ID),
                    );
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) : ?>
                        <div class="width-100 pull-left">
                            <div class="list-icon-post">
                                <?php  while ( $the_query->have_posts() ) : $the_query->the_post();
                                    $post = get_post();
                                    $icon = $icons[$count];
                                    $count++;
                                    ?>
                                    <div class="icon">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                        </a>
                                        <span class="hover_icon_post"><?php echo $post->post_title; ?></span>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="pull-left post-content" style="">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="entry-content">
                                    <?php echo $content_post; ?>
                                </div>
                            </div>
                            <div class="col-sm-3 sidebar-right">
                                <div class="form-subscribe">
                                    <?php $headline_mailchimp = get_field('headline_mailchimp','options');if($headline_mailchimp):?>
                                        <div class="title-form text-center">
                                            <h4><?php echo $headline_mailchimp; ?></h4>
                                        </div>
                                    <?php endif; ?>
                                    <?php $content_mailchimp = get_field('content_mailchimp','options');if($content_mailchimp):?>
                                        <div class="description-form text-center">
                                            <p><?php echo $content_mailchimp; ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php $form_mailchimp = get_field('shortcode_mailchimp','options');
                                    if($form_mailchimp):
                                        echo do_shortcode($form_mailchimp);
                                    endif;
                                    ?>

                                </div>
                                <div class="feature-post">
                                    <div class="title-feature-post">
                                        <h3>Tin xem nhiều</h3>
                                    </div>
                                    <?php
                                    global $post;
                                    $args = array(
                                        "post_type" => 'post',
                                        "post_status" => 'publish',
                                        "posts_per_page" => 5 ,
                                        "order" => 'DESC',
                                        "orderby" => 'date',
                                    );
                                    $the_query = new WP_Query( $args );
                                    if ( $the_query->have_posts() ) : ?>
                                        <?php  while ( $the_query->have_posts() ) : $the_query->the_post();
                                            $post = get_post();
                                            $categories = wp_get_object_terms($post->ID,'category');
                                            $catlink = get_category_link($categories[0]->term_id);
                                            $img_defaul = get_field('image_thumnail', 'options');
                                            ?>
                                            <div class="feature-post-item">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <?php
                                                        $img = has_post_thumbnail($arr->ID)? get_the_post_thumbnail_url($arr->ID) : $img_defaul['url'];
                                                        ?>
                                                        <div class="feature-image pull-left">
                                                            <a href="<?php echo get_permalink($post->ID); ?>"><img src="<?php echo $img;?>" alt="<?php echo $img_defaul['alt']?>"></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="entry-title pull-left">
                                                            <h4><a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif;
                                    wp_reset_query();?>
                                </div>
                                <div class="category-post">
                                    <div class="title">
                                        <h3>danh mục bài viết</h3>
                                    </div>
                                    <ul>
                                        <?php
                                        $terms = get_terms( array(
                                            'taxonomy' => 'category',
                                            'hide_empty' => false,
                                            'orderby ' => 'id',
                                        ) );
                                        foreach( $terms as $category ) {
                                            if( $category->parent == 0 ) {
                                                $link_term = get_category_link($category->term_id);
                                                ?>
                                                <li><a href="<?php echo $link_term;?>"><?php echo $category->name;?></a></li>
                                            <?php }
                                        }
                                        ?>
                                    </ul>

                                </div>
                                <div class="popular-tag">
                                    <div class="title">
                                        <h3>tags</h3>
                                    </div>
                                    <?php
                                    $post = get_post();
                                    $html_tag= '';
                                    $tags = wp_get_object_terms($post->ID,'post_tag');
                                    foreach ($tags as $tag){
                                        $html_tag .= "<a href='".get_category_link($tag->term_id)."'>$tag->name</a>";
                                    }
                                    ?>
                                    <div class="list-tag">
                                        <?php echo $html_tag; ?>
                                    </div>
                                </div>
                                <?php $ads = get_field('ads_single','options');if($ads):?>
                                    <div class="ads_single">
                                        <?php echo $ads; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
