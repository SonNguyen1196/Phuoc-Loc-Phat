<?php
    /** Template Name: Liên Hệ */   
    get_header(  );
    global $post;
    $banner = (get_field('banner_header_ct_page')) ? get_field('banner_header_ct_page') : '';
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
<div class="container">
    <div class="contact-1 content-area-7">
        <div class="container">
            <div class="main-title">
                <h1><?php echo get_the_title( $post->ID )?></h1>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <!-- Contact form start -->
                    <div class="contact-form">
                        <?php 
                            echo do_shortcode('[contact-form-7 id="168" title="Form Page Contact"]');
                        ?>  
                    </div>
                    <!-- Contact form end -->
                </div>
                <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-6 col-xs-12">
                    <!-- Contact details start -->
                    <div class="contact-details">
                        <div class="main-title-2">
                            <h3>Liên Hệ</h3>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="media-body">
                                <h4><?php echo (get_field('label_address_ct_page')) ? get_field('label_address_ct_page') : '' ;?></h4>
                                <p><?php echo (get_field('type_address_ct_page')) ? get_field('type_address_ct_page') : '' ;?></p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <h4><?php echo (get_field('phone_number_label')) ? get_field('phone_number_label') : '' ;?></h4>
                                <?php 
                                    $phone_contatcs = get_field('type_value_phone');
                                    if(count($phone_contatcs) > 0) {
                                        foreach($phone_contatcs as $item){
                                            ?>
                                            <p>
                                                <a href="tel:<?php echo $item['phone'] ?>"><?php echo $item['text'] ?>: <?php echo $item['phone'] ?></a>
                                            </p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="media mb-0">
                            <div class="media-left">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <h4><?php echo (get_field('email_adress_text')) ? get_field('email_adress_text') : '' ;?></h4>
                                <?php 
                                    $email_contatcs = get_field('email_address_value');
                                    if(count($email_contatcs) > 0) {
                                        foreach($email_contatcs as $item){
                                            ?>
                                            <p>
                                                <a href="mailto:<?php echo $item['email'] ?>"><?php echo $item['text'] ?>: <?php echo $item['email'] ?></a>
                                            </p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Contact details end -->
                </div>
            </div>
        </div>
    </div>
</div>

 <?php get_footer(); ?>