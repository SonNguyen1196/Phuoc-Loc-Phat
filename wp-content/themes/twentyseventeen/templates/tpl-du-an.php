<?php
    /** Template Name: Dự Án */   
?>


<?php $query = new WP_Query( array( 
        'post_type' =>'du-an' ,
        'posts_per_page' => -1,

    )  ); ?>
 <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

 <div class="post">
 
 <!-- Display the Title as a link to the Post's permalink. -->
 <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

 </div> <!-- closes the first div box -->

 <?php endwhile; 
 wp_reset_postdata();
 else : ?>
 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
 <?php endif; ?>