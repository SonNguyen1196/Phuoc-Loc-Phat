<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
global $post;
get_header(); ?>
<div class="blog-banner">
    <div class="container">
        <div class="breadcrumb-area">
            <h1><?php echo get_the_title( $post->ID ) ?></h1>
            <?php custom_breadcrumbs(); ?>
        </div>
    </div>
</div>

<div class="blog-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-xs-12">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>

			 <!-- Blog box start -->
			 <div class="thumbnail blog-box clearfix">
				<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full')?>" alt="<?php echo get_the_title( $post->ID ) ?>" class="img-responsive">
				<!-- detail -->
				<div class="caption detail">
					<!--Main title -->
					<h3 class="title">
						<a href="<?php echo get_permalink($post->ID) ?>"><?php echo get_the_title($post->ID) ?></a>
					</h3>
					
					<div class="main-content-post">
						<?php the_content( $post->ID ) ?>
					</div>
					
				</div>
			</div>
			<!-- Blog box end -->
			
			<?php endwhile; ?>

               
            </div>

            <div class="col-lg-3 col-md-3 col-xs-12">
               <?php get_sidebar( ) ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
