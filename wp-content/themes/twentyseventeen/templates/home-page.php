<?php
    /** Template Name: Trang chủ */
    get_header();
?>
<div class="container">
    <div class="row">
        <div class="col-md-9 banner-slider-home">
            <!-- Banner start -->
            <div class="banner">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        
                    <?php 
                        $_slider_home = (get_field('banner_slider_home')) ? get_field('banner_slider_home') : '';
                        if(count($_slider_home) > 0){
                            foreach($_slider_home as $key => $item){
                                // print_r($item);
                                ?>
                                <div class="item banner-max-height <?php echo ($key === 0) ? 'active' : ''; ?>">
                                    <?php
                                        $_url_banner = (!empty($item['banner']['url'])) ? $item['banner']['url'] : '';
                                        $_alt_banner = (!empty($item['banner']['alt'])) ? $item['banner']['alt'] : '';
                                    ?>
                                    <?php echo (!empty($_url_banner)) ? '<img src="'.$_url_banner.'" alt="'.$_alt_banner.'">' : ''; ?>

                                    <div class="carousel-caption banner-slider-inner">
                                        <div class="banner-content">
                                        <?php if ($key === 0) {
                                            ?>
                                                <h1 class ="big-title-slider" data-animation="animated fadeInDown delay-05s">
                                                    <?php echo (!empty($item['tieu_de_banner_slider'])) ? $item['tieu_de_banner_slider'] : ''; ?>
                                                </h1>
                                            <?php
                                        } else {
                                            ?>
                                                <div class ="big-title-slider" data-animation="animated fadeInDown delay-05s">
                                                    <?php echo (!empty($item['tieu_de_banner_slider'])) ? $item['tieu_de_banner_slider'] : ''; ?>
                                                </div>
                                            <?php
                                        } ?>
                                            <p data-animation="animated fadeInUp delay-1s">
                                                <?php echo (!empty($item['caption'])) ? $item['caption'] : ''; ?>
                                            </p>
                                            <?php 
                                            if(count($item['link_target']) > 0){
                                                foreach($item['link_target'] as $links){
                                                    if(count($links['link']) > 0){
                                                       foreach($links as $link){
                                                        ?>
                                                        <a href="<?php echo ($link['url']) ? $link['url'] : '';?>" class="btn button-md border-button-theme-slider btn-slider-honme" data-animation="animated fadeInUp delay-15s"><?php echo ($link['title']) ? $link['title'] : '';?></a>
                                                        <?php
                                                       }
                                                    }                                                    
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>
                        
                    </div>
            
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="slider-mover-left" aria-hidden="true">
                            <i class="fa fa-angle-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="slider-mover-right" aria-hidden="true">
                            <i class="fa fa-angle-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- Banner end -->
            <!-- Search area start -->
            <div class="banner-ads-home">
                <?php
                $_botton_slider_home = (get_field('banner_bottom_slier')) ? get_field('banner_bottom_slier') : '';
                $_botton_slider_link_home = (get_field('banner_bottom_slier_link')) ? get_field('banner_bottom_slier_link') : '';
                if(is_array($_botton_slider_home)){
                    ?>
                        <a href="<?php echo ($_botton_slider_link_home) ?  $_botton_slider_link_home['url'] :  '#' ?>">
                            <img class="img-responsive" src="<?php echo $_botton_slider_home['url'] ?>" alt="<?php echo $_botton_slider_home['alt'] ?>">
                        </a>
                    <?php
                }
                ?>
            </div>
            <!-- Search area start -->

            <!-- Featured properties start -->
            <?php
                $_title_sale = (get_field('tieu_de_du_an_mo_ban')) ? get_field('tieu_de_du_an_mo_ban') : '';
                $_view_all_sale = (get_field('link_xem_them_du_an')) ? get_field('link_xem_them_du_an') : '';
            ?>
            <div class="featured-properties block-left-content block-sale-open">
                <div class="row wow fadeIn delay-04s">
                    <div class="col-md-12 title-block-product ">
                        <div class=" col-xs-9 nopadding">
                            <h2 class="h2-title text-left"><?php echo (!empty($_title_sale)) ? $_title_sale : '';?></h2>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 nopadding text-right">
                            <?php
                                if(is_array($_view_all_sale)){
                                    ?>
                                        <a class="view-all-link" href="<?php echo ($_view_all_sale) ?  $_view_all_sale['url'] :  '#' ?>"><?php echo ($_view_all_sale) ?  $_view_all_sale['title'] :  '#' ?> >></a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line-bottom"></div>
                    </div>
                    
                </div>

                <?php
                 $_open_sale_home = (get_field('du_an_mo_ban_01')) ? get_field('du_an_mo_ban_01') : '';                
                ?>

                <div class="row">

                    <?php
                    $i = 0;
                    if(count($_open_sale_home) > 0 ){
                        foreach($_open_sale_home as $key => $item){
                            $i++;
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="property">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                        <!-- Property img -->
                                        <div class="property-img">
                                            <img src="<?php echo get_the_post_thumbnail_url( $item->ID, 'full' ) ?>" alt="<?php echo $item->post_title ?>" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                        <!-- title -->
                                        <h3 class="title">
                                            <a href="<?php echo get_permalink( $item->ID ) ?>"><?php echo wp_trim_words($item->post_title, 10, '') ?></a>
                                        </h3>

                                        <ul class="facilities-list fl-2 clearfix">
                                            <?php
                                                $_price = (get_field('gia_du_an', $item->ID)) ? get_field('gia_du_an', $item->ID) : '';
                                                $_address = (get_field('dia_chi_du_an', $item->ID)) ? get_field('dia_chi_du_an', $item->ID) : '';
                                                $_size = (get_field('dien_tich_du_an', $item->ID)) ? get_field('dien_tich_du_an', $item->ID) : '';
                                            ?>
                                            <li>
                                                <span class="key-content">Giá:</span>
                                                <span><?php echo $_price ?></span>
                                            </li>
                                            <li>
                                                <span class="key-content">Địa Chỉ:</span>
                                                <span><?php echo $_address ?></span>
                                            </li>
                                            <li>
                                                <span class="key-content">Diện Tích:</span>
                                                <span><?php echo $_size ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if($i % 2 == 0){
                                echo '</div><div class="row">';
                            }
                        }
                    }
                    
                    ?>
                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
            <!-- Featured properties end -->


            <!-- Featured properties start -->
            <?php
                $_title_news = (get_field('tieu_de_tin_tuc_trang_chu')) ? get_field('tieu_de_tin_tuc_trang_chu') : '';
                $_view_all_news = (get_field('link_xem_them_tin_tuc')) ? get_field('link_xem_them_tin_tuc') : '';
            ?>
            <div class="featured-properties block-left-content new-post-home">
                <div class="row wow fadeIn delay-04s">
                    <div class="col-md-12 title-block-product ">
                        <div class="col-md-9 col-sm-9 col-xs-9 nopadding">
                            <h2 class="h2-title text-left"><?php echo (!empty($_title_news)) ? $_title_news : '';?></h2>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 nopadding text-right">
                        <?php
                            if(is_array($_view_all_sale)){
                                ?>
                                    <a class="view-all-link" href="<?php echo ($_view_all_news) ?  $_view_all_news['url'] :  '#' ?>"><?php echo ($_view_all_news) ?  $_view_all_news['title'] :  '#' ?> >></a>
                                <?php
                            }
                        ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="line-bottom"></div>
                    </div>
                    
                </div>
                <?php
                 $_blog_news_home = (get_field('tin_tuc_du_an_lan_2')) ? get_field('tin_tuc_du_an_lan_2') : '';                
                ?>

                <div class="row">

                    <?php
                    $i = 0;
                    if(count($_blog_news_home) > 0 ){
                        foreach($_blog_news_home as $key => $item){
                            $i++;
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 wow fadeInLeft delay-04s content-post-home" style="visibility: visible; animation-name: fadeInLeft;">
                                <div class="property">
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 col-pad">
                                        <!-- Property img -->
                                        <div class="property-img">
                                        <img src="<?php echo get_the_post_thumbnail_url( $item->ID, 'full' ) ?>" alt="<?php echo $item->post_title ?>" class="img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 property-content">
                                        <!-- title -->
                                        <h3 class="title">
                                            <a href="<?php echo get_permalink( $item->ID ) ?>"><?php echo wp_trim_words($item->post_title, 10, '') ?></a>
                                        </h1>

                                        <div class="facilities-list fl-2 clearfix">
                                            <p> 
                                                <?php echo wp_trim_words($item->post_content, 50, '') ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if($i % 2 == 0){
                                echo '</div><div class="row">';
                            }
                        }
                    }

                    ?>
                    <?php wp_reset_postdata(); ?>
                </div>

            </div>
            <!-- Featured properties end -->
        </div>
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>

<div class="intro-section subcribe-elm">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12 logo-responsive-img">
                <?php 
                $_logo = (get_field('logo_option', 'option')) ? get_field('logo_option', 'option') : '';
                $_form_sub = (get_field('get_email_form_subbcribe')) ? get_field('get_email_form_subbcribe') : '';
                ?>
                <img src="<?php echo ($_logo) ? $_logo['url'] : '' ?>" alt="<?php echo ($_logo) ? $_logo['alt'] : '' ?>">
            </div>
            <div class="col-md-9 col-sm-12 form-get-home">
                <?php
                
                echo (!empty($_form_sub)) ? do_shortcode( $_form_sub) : '';
                
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>