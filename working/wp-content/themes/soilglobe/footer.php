<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SoilGlobe
 */

?>

  
    <!-- footerSectionRow -->
    <div class="footerSectionRow">
        <div class="section-padding footerSection">
            <div class="container">
                <div class="row row-sm">
                    <div class="gl-md-6 gl-sm-6">
                        <div class="headingblock">
                            <h4 class="heading-center">Get in touch with Us</h4>
                        </div>
                       
                        
                            <div class="addressInfo">
                                <h5>Aurangabad - SoilGlobe</h5>
                                <h6><i class="fa fa-map-marker"></i> NA</h6>
                                <h6><i class="fa fa-phone"></i> +911111111111</h6>
                                <h6><i class="fa fa-envelope"></i> <a href="mailto:info.soilglobe@gmail.com">info.soilglobe@gmail.com</a>
                                </h6>
                                
                            </div>
                        

                    </div>
                    <div class="gl-md-6 gl-sm-6">
                        <div class="row row-sm">
                            <div class="gl-sm-6">
                                <div class="headingblock">
                                    <h4 class="heading">Navigation</h4>
                                </div>
                                <div class="quickNav">
								<?php
                            $argsNav = array(
                                'menu_class' => '',
                                'menu' => '(Nav-menu)',
                                'container' => false,
                                'theme_location' => 'Nav-menu'
                            );
                            wp_nav_menu($argsNav);
                            ?>
                                </div>
                            </div>
                            <div class="gl-sm-6">
                                <div class="headingblock">
                                    <h4 class="heading">Our Services</h4>
                                </div>
                                <div class="quickNav">
								<?php
                            $argsNav = array(
                                'menu_class' => '',
                                'menu' => '(Nav-menu)',
                                'container' => false,
                                'theme_location' => 'Nav-menu'
                            );
                            wp_nav_menu($argsNav);
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                
                
                
<div class="row">
<div class="gl-md-6 gl-sm-6">

                <div class="locationWeServe">
                    <h5 class="heading-center">Our Projects In India</h5>
                    <ul>
                        <?php
                        // Custom WP query query
$args_query = array(
	'post_type' => array('ourprojects'),
	'order' => 'DESC',
);

$query = new WP_Query( $args_query );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();?>
                        <li><a class="btn btn-primary btn-rounded btn-sm" href="<?php the_permalink(''); ?>"><?php the_title('');?></a></li>
                        <?php
                        	}
                        } else {
                        
                        }
                        
                        wp_reset_postdata();

                        ?>
                        
                    </ul>
                </div>
				
				</div>
				
				<div class="gl-md-6 gl-sm-6">
					 <div class="locationWeServe">
                    <h5 class="heading-center">CERTIFICATION</h5>
						 <ul> <li><i class="fa fa-certificate"></i> iso certified </li></ul>
					</div>
              </div>
		</div>
        </div>
    </div>
    <!-- <div class="footerStrip">
        Copyright &copy; 2021, NA- All Rights Reserved, Designed &amp; Developed by <a href="na" target="_blank">NA</a>
    </div> -->
    </div>

    <div class="footer-social">
		<a href="#" class="footerpinterestLink" target="_blank"><i class="fa fa-youtube"></i></a> 
        <a href="#" class="footerfacebookLink" target="_blank"><i class="fa fa-facebook-f"></i></a>
        <a href="#" class="footerpinterestLink" target="_blank"><i class="fa fa-instagram"></i></a>
        
    </div>

    <a href="#" class="scroll-to-top"><i class="fa fa-angle-up"></i></a>

    <!--JS libraries-->
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/globe/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/globe/owl-carousel/owl.carousel-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/globe/js/custom.js"></script>



<?php wp_footer(); ?>

</body>
</html>



