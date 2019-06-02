<?php
/** Template Name: Thank You */
get_header();
?>
<?php
    $bg=get_field('background_image');
    $title=get_field('title');
    $description=get_field('description');
    $button_text=get_field('button_text');
    if($bg||$title||$description||$button_text):
?>
<section class="thank text-center" style="background-image: url('<?php echo $bg['url']; ?>'); background-size:cover; background-repeat: no-repeat; background-position: bottom">
       <div class="container">
        <div class="thank-you">
            <?php echo acf_render('<h1>','</h1>',$title); ?>
            <?php echo acf_render('<p>','</p>',$description); ?>
            <a class="btn-home" href="<?php echo get_home_url(); ?>"><?php echo $button_text; ?></a>
        </div>
       </div>
</section>
<?php endif;?>
<?php get_footer();?>
