<?php
    /** Template Name: Giới Thiệu */   
    get_header();
    global $post;
    $banner = get_field('banner_header_tpl_about');
?>

<div class="sub-banner overview-bgi" style = "background: rgba(0, 0, 0, 0.04) url(<?php echo (!empty($banner['url'])) ? $banner['url'] : ''; ?>) top left repeat;">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1><?php echo get_the_title( $post->ID )?></h1>
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
</div>

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <div class="about-city-estate content-about-page">
    <div class="container">
        <div class="row">
           
            <div class="col-md-12">
                <div class="about-text ">
                    <div>
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <?php endif; ?>
 <?php get_footer() ?>