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
<?php
    $_phone = (get_field('phone_option', 'option')) ? get_field('phone_option', 'option') : '';
    $_email = (get_field('email_option', 'option')) ? get_field('email_option', 'option') : '';
?>
<div class="top-header hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="list-inline">
                    <a href="tel:<?php echo (!empty($_phone) ? $_phone : '') ?>"><?php echo (!empty($_phone) ? '<i class="fa fa-phone"></i>'.$_phone : '') ?></a>
                    <a href="tel:<?php echo (!empty($_email) ? $_email : '') ?>"><?php echo (!empty($_email) ? '<i class="fa fa-envelope"></i>'.$_email : '') ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top header end -->

<!-- Main header start -->
<?php 
$_logo = (get_field('logo_option', 'option')) ? get_field('logo_option', 'option') : '';
?>
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
                <a href="<?php echo site_url() ?>">
                    <img src="<?php echo ($_logo) ? $_logo['url'] : '' ?>" alt="<?php echo ($_logo) ? $_logo['alt'] : '' ?>">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <?php
                    wp_nav_menu( array(
                        'menu_class' => 'nav navbar-nav',
                        'theme_location' => 'main_menu'
                    ) ); 
                ?>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->