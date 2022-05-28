<?php
/**
 * The template for displaying archive blog pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SoilGlobe
 */

get_header();
?>
 
<div class="internal-banner" style="background: url('https://soilglobe.com/working/wp-content/uploads/2022/04/soilGlobe-website-blog.webp') no-repeat bottom; background-size: cover;">
    <h1>Blogs............</h1>
	<div class="brd">
	<?php echo do_shortcode( '[flexy_breadcrumb]'); ?>
	</div>
</div>


<div class="container">
<div class="row">
<?php
// Custom WP query query
$args_query = array(
	'post_type' => array('blog'),
	'order' => 'ASC',
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>

   <div class="gl-md-4">
     <div class="cardblog">
            <div class="backgroundEffect"></div>
            <div class="pic"> 
            <?php $bgImg1 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                <img class="" src="<?php echo $bgImg1[0]; ?>" alt="<?php the_title('');?>">
                <div class="date"> 
                    <span class="day"><?php the_time('F jS, Y') ?></span>
                </div>
            </div>
            <div class="content">
                <p class="h-1 mt-4"><?php the_title('');?></p>
                <p class="text-muted mt-3"><?php the_excerpt(''); ?></p>
                <div class="d-flex align-items-center justify-content-between mt-3 pb-3">
                <a href="<?php the_permalink(''); ?>" class="btn btn-primary btn-rounded">Know more <i
                    class="fa fa-arrow-circle-right"></i></a>
                    <!-- <div class="d-flex align-items-center justify-content-center foot">
                        <p class="admin">Admin</p>
                        <p class="ps-3 icon text-muted"><span class="fas fa-comment-alt pe-1"></span>3</p>
                    </div> -->
                </div>
            </div>
        </div>
     </div>
<?php
	}
} else {
    echo '<h2>No Blog</h2>';

}

wp_reset_postdata();
?>




</div>
</div>




<?php
get_footer();
