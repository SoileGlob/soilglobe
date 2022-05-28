<?php
/**
 * The template for displaying archive field test pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SoilGlobe
 */

get_header();
?>

 <?php $bgImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
<div class="internal-banner" style="background: url('<?php echo $bgImg[0]; ?>') no-repeat bottom; background-size: cover;">
    <h1>Field Test</h1>
	<div class="brd">
	<?php echo do_shortcode( '[flexy_breadcrumb]'); ?>
</div>
</div>

   
<div class="container">
<div class="row">
<?php
// Custom WP query query
$args_query = array(
	'post_type' => array('fieldtest'),
	'order' => 'DESC',
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
?>

<div class="gl-md-4">
  <div class="card11">
        <div class='imgContainer'>
        <?php $fld = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
             <img src='<?php echo $fld[0]; ?>' alt="<?php the_title('');?>"> 
             <a href="<?php the_permalink(''); ?>">
             <h4><?php the_title('');?></h4>
                </a>
            </div>
        <div class="content">
            <p><?php the_excerpt(''); ?></p>
        </div>
   </div>
</div>
<?php
	$query->the_post();
}
} else {
    echo '<h3>No Field Test Data</h3>';

}

wp_reset_postdata();
?>



</div>
</div>
   <hr>
<br>   





<?php
get_footer();
