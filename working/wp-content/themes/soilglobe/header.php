<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoilGlobe
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soil Globe</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="" type="image/x-icon" />
    <!-- Libraries -->
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/globe/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/globe/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/globe/owl-carousel/owl.theme.css" rel="stylesheet">
    <link type="text/css" href="<?php bloginfo('template_directory'); ?>/globe/owl-carousel/owl.transitions.css" rel="stylesheet">
     <!-- Custom CSS -->
<!--      <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet"> -->
<?php wp_head();?>
</head>

<body>

    <div class="logodiv">
        <a href=""></a>
    </div>

    <!-- menuBtn -->
    <div class="menuBtn">
        <div class="menuBtnInner">
            <div class="menuBtnBar menuBtnBar1"></div>
            <div class="menuBtnBar menuBtnBar2"></div>
            <div class="menuBtnBar menuBtnBar3"></div>
        </div>
    </div>

    <!-- navigationBlock -->
    <div class="navigationBlock">
        <div class="navigationBlockLayer navigationBlockLayer1"></div>
        <div class="navigationBlockLayer navigationBlockLayer2"></div>
        <div class="navigationBlockLayer navigationBlockLayer3"></div>
        <div class="navigationBlockCloseBtn">
            <div class="navigationBlockCloseBtnLine"></div>
            <div class="navigationBlockCloseBtnLine"></div>
        </div>
        <div class="navigationBlockInner">
			<?php
                            $argsNav = array(
                                'menu_class' => '',
                                'menu' => '(Main-menu)',
                                'container' => false,
                                'theme_location' => 'Main-menu'
                            );
                            wp_nav_menu($argsNav);
                            ?>

        </div>
    </div>


