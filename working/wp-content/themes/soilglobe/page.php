<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SoilGlobe
 */

get_header();
?>
 <?php $bgImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
<div class="internal-banner" style="background: url('<?php echo $bgImg[0]; ?>') no-repeat bottom; background-size: cover;">
    <h1><?php the_title(''); ?></h1>
	<div class="brd">
	<?php echo do_shortcode( '[flexy_breadcrumb]'); ?>
</div>
</div>


<div class="container-fluid">
	<div class="innerPage">
		 <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(''); ?>
        <?php endwhile; ?>
    <?php endif; ?>
	</div>
</div>





<?php
get_footer();
