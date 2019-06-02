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
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<title><?php wp_title() ?></title>
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <?php wp_head(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
</head>
<body <?php body_class(); ?>>

<header>
    <div class="container">
       
    </div>
</header>