<?php
/**
 * Template Name: Home Globe
 */
get_header();
?>

    <!-- bannerSection -->
    <div class="bannerSection">
        <div class="sliderCarouselwithArrowNlist">
            <div class="owl-carousel sliderCarouselSet1">
				<?php
				// Custom WP query query
                 $args_query = array('post_type' => array('fieldtest'),'order' => 'DESC',);
                 $query = new WP_Query( $args_query );
                 if ( $query->have_posts() ) 
				 {
	               while ( $query->have_posts() ) {
		           $query->the_post();?>
                <div class="item">
                    <div class="bannerImgSlide">
                        <div class="bannerImgSlideCircle"></div>
                        <div class="container">
                            <div class="row">
                                <div class="gl-md-6">
                                    <div class="bannerImgSlideDesc">
                                        <h4>Welcome to</h4>
                                        <h1>SoilGlobe</h1>
                                        <h4>-Consulatncy Services</h4>
                                        <div class="bannerIconCol">
                              <a href="<?php echo get_home_url();?>/field-test/" class="bannerIconBlock">
                                                <span><i class="fa fa-industry"></i></span>
                                                <p>Soil Testing</p>
                                            </a>
                                <a href="<?php echo get_home_url();?>/laboratory-test/" class="bannerIconBlock">
                                                <span><i class="fa fa-flask"></i></span>
                                                <p>Laboratary Testing</p>
                                            </a>
                               <a href="<?php echo get_home_url();?>/contact-us/" class="bannerIconBlock">
                                                <span><i class="fa fa-phone-square"></i></span>
                                                <p>Get Contact</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php } } else { echo 'NO POST';} wp_reset_postdata(); ?>
            </div>
        </div>
        <video  muted="muted" autoplay="autoplay" loop="loop">
            <source src="<?php bloginfo('template_directory'); ?>/globe/video/video-new.webm" type="video/mp4">
        </video>
        <div class="scrollDownBtn">
            <div class="scrollDownBtnBlock">
                <a href="#overviewSection"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>

    

    <!-- servicesOverview -->
    <div class="section servicesOverview" id="servicesOverview">
        <div class="servicesTitle">
            <h1>SoilGlob</h1>
        </div><br>
        <div class="owl-carousel carouselTheme1" id="servicesSlider">
			<?php
				// Custom WP query query
                 $args_query = array('post_type' => array('fieldtest'),'order' => 'ASC',);
                 $query = new WP_Query( $args_query );
                 if ( $query->have_posts() ) 
				 {
	               while ( $query->have_posts() ) {
		           $query->the_post();?>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="gl-md-4">
                            <div class="servicesOverviewDesc">
                                <h2 class="heading"><?php the_title(''); ?></h2>
                                <p>  <?php the_excerpt(''); ?></p>
       <a href="<?php the_permalink(''); ?>" class="btn btn-primary btn-rounded">Know more <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="gl-md-7">
                            <div class="servicesOverviewImgCol">
		<?php $fld = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
         <img src="<?php echo $fld[0]; ?>" class="servicesOverviewImg servicesOverviewImg1" />
		<?php  $image11=get_field('image_1'); ?>
         <img src="<?php echo esc_url($image11['url']); ?>" class="servicesOverviewImg servicesOverviewImg2" />
		<?php  $image22=get_field('image_2'); ?>
        <img src="<?php echo esc_url($image22['url']); ?>" class="servicesOverviewImg servicesOverviewImg3" />
		    <?php  $image33=get_field('image_3'); ?>
        <img src="<?php echo esc_url($image33['url']); ?>" class="servicesOverviewImg servicesOverviewImg4" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- 		loop			 -->
			<?php } } else { echo 'NO POST';} wp_reset_postdata(); ?>
        </div>
    </div>


 <!-- recentWorksSection -->
    <div class="section recentWorksSection">
        <div class="recentWorksTitle">
            <h2>Laboratory Teting</h2>
        </div>
        <div class="owl-carousel carouselTheme1" id="recentWorksSlider">
			<?php
				// Custom WP query query
                 $args_query = array('post_type' => array('laboratorytest'),'order' => 'DESC',);
                 $query = new WP_Query( $args_query );
                 if ( $query->have_posts() ) 
				 {
	               while ( $query->have_posts() ) {
		           $query->the_post();?>
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="gl-md-4">
                            <div class="recentWorksDesc">
                                <h2 class="heading"><?php the_title('');?></h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                <a href="<?php the_permalink(''); ?>" class="btn btn-primary btn-rounded">Know more <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="gl-md-8">
                            <div class="recentWorksImgCol">
								
                                <img src="<?php bloginfo('template_directory'); ?>/globe/images/img1.jpg" class="recentWorksImg recentWorksImg1" />
                                <img src="<?php bloginfo('template_directory'); ?>/globe/images/img2.jpg" class="recentWorksImg recentWorksImg2" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- 			loop -->
			<?php } } else { echo 'NO POST';} wp_reset_postdata(); ?>
        </div>
    </div>


    <!-- aboutOverviewSection -->
    <div class="section section-padding aboutOverviewSection white">
        <div class="aboutOverviewSectionShapes aboutOverviewSectionShapes1"></div>
        <div class="aboutOverviewSectionShapes aboutOverviewSectionShapes2"></div>
        <div class="container">
            <h2 class="heading-center"><span>SGC</span> - Soil Globe <br /> Consulting Services
            </h2>
            <div class="row">
                <div class="gl-md-12">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry'sLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    </p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    </p>
                    <div class="space10"></div>
                    <div class="text-center">
                        <a class="btn btn-transparent btn-rounded" href="#"><span><i
                                    class="fa fa-group"></i></span> About Us</a>
                        <a class="btn btn-transparent btn-rounded" href="#"><span><i
                                    class="fa fa-briefcase"></i></span> Careers</a>
                        <a class="btn btn-transparent btn-rounded" href="#"><span><i
                                    class="fa fa-envelope"></i></span> Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

 

    <!-- keyIndicatorSection -->
    <div class="section section-padding keyIndicatorSection">
        <div class="container">
            <h2 class="heading-center">Key Indicators</h2>
            <div class="keyindirow">
                <div class="keyindirowCol">
                    <div class="project-fig">
                        <div>
                            <i class="fa fa-line-chart"></i>
                            <h2><span>2</span>+</h2>
                            <h4>Years of Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="keyindirowCol">
                    <div class="project-fig">
                        <div>
                            <i class="fa fa-map-marker"></i>
                            <h2><span>4</span>+</h2>
                            <h4>State</h4>
                        </div>
                    </div>
                </div>
                <div class="keyindirowCol">
                    <div class="project-fig">
                        <div>
                            <i class="fa fa-group"></i>
                            <h2><span>40</span>+</h2>
                            <h4>Clients</h4>
                        </div>
                    </div>
                </div>
                <div class="keyindirowCol">
                    <div class="project-fig">
                        <div>
                            <i class="fa fa-image"></i>
                            <h2><span>90</span>+</h2>
                            <h4>Projects Completed</h4>
                        </div>
                    </div>
                </div>
                <div class="keyindirowCol">
                    <div class="project-fig">
                        <div>
                            <i class="fa fa-trophy"></i>
                            <h2><span>90</span>%</h2>
                            <h4>Returning Customer</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

  






<?php
get_footer();
