<?php
/* Template Name: Home */
get_header();
?>
<?php 
$the_query = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page ' => -1,
) );


while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<?php the_title(); echo '<br/>'?>
    <?php wp_reset_postdata(); ?>
<?php endwhile; ?>
<?php get_footer();?>
