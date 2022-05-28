<?php
/**
 * The template for displaying archive our-project test pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SoilGlobe
 */

get_header();
?>

<div class="internal-banner" style="background: url('https://soilglobe.com/working/wp-content/uploads/2022/05/our-project-india-soilglobe.jpg') no-repeat bottom; background-size: cover;">
    <h1>Our Project in India</h1>
	<div class="brd">
	<?php echo do_shortcode( '[flexy_breadcrumb]'); ?>
</div>
</div>



<div class="container">
<div class="row">
<?php
// Custom WP query query
$args_query = array(
	'post_type' => array('ourprojects'),
	'order' => 'DESC',
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();

?>
<div class="gl-md-4">
  <div class="cardsd">
    <div class="img-container">
    <?php $fldl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
      <img src="<?php echo $fldl[0]; ?>" alt="<?php the_title('');?>"/>
    </div>
    <div class="card-details">
      <h2><?php the_title(''); ?></h2>
      <p><?php the_excerpt(''); ?></p>
	  <br><a href="<?php the_permalink(''); ?>" class="btn btn-primary btn-rounded">Know more <i class="fa fa-arrow-circle-right"></i></a>
	</div>
  </div>
  </div>
<?php
	}
} else {
  echo '<h3>No POST</h3>';

}

wp_reset_postdata();

?>


</div>
</div>   





<?php
get_footer();
