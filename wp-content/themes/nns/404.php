<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
get_header();
?>
<div class="container">
    <div class="pageError">
        <div class="allError">
            <img class="img-responsive" src="<?php echo get_theme_file_uri( '/images/404.png');?>" alt="404">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
            <a class="buttonStyle width127" href="<?php echo home_url(); ?>">BACK</a>
        </div>
    </div>
</div>
<style>
    .pageError p {
        color: #1d2840;
        font-family: "ProximaNovaCond-Regular",sans-serif;
        font-weight: normal;
        line-height: 24px;
        letter-spacing: 1.17px;
        max-width: 480px;
        margin: 30px auto 30px auto;
        font-size: 14px;
    }
    .pageError .allError {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
    .allError img{
        margin: auto;
    }
    a.buttonStyle.width127 {
        padding: 10px 40px;
        font-size: 16px;
        box-shadow: 0 2px 50px rgba(63, 63, 63, 0.14);
        border-radius: 100px;
        background-color: #ea1f26;
        display: inline-block;
        color: #ffffff;
        font-family: "ProximaNovaCond-Semibold",sans-serif;
        font-weight: normal;
        line-height: 16px;
        border: solid 1px #ea1f26;
        transition: 0.6s;
        -webkit-transition: 0.6s;
        -o-transition: 0.6s;
        -moz-transition: 0.6s;
        text-decoration: none;
    }
    a.buttonStyle:hover{
        background: #ffffff;
        color:#ea1f26;
    }
    .error404 #header {
        display: none;
    }
    header {
        display: none;
    }
</style>