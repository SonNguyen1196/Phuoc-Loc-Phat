<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php is_front_page() ? bloginfo( 'name' ) : wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Top header start -->
<div class="top-header hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>1-8X0-666-8X88</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top header end -->

<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="logo">
                    <img src="<?php echo get_template_directory_uri() ?>/asset/img/logos/logo-3.png" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Trang Chủ</a></li>
                    <li><a href="about.html" >Giới Thiệu</a></li>
                    <li >
                        <a href="properties-list-rightside.html" >Dự Án</a>
                        <!--                      <ul class="dropdown-menu">-->
                        <!--                          <li><a href="properties-details-3.html">Đất Nền</a></li>-->
                        <!--                          <li><a href="properties-details-3.html">Căn Hộ</a></li>-->
                        <!--                          <li><a href="properties-details-3.html">Biệt Thự</a></li>-->
                        <!--                      </ul>-->
                    </li>
                    <li><a href="properties-details-3.html" >Chi Tiết Dự Án</a></li>
                    <li><a href="blog-classic-sidebar-right.html" >Tin Tức</a></li>
                    <li><a href=blog-single-sidebar-right.html >Chi Tiết Tin Tức</a></li>
                    <li><a href="contact.html" >Liên Hệ</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->