<?php get_header(); ?>
<main id="top">
<style>
.grad-left-white:before {
    background: rgb(255,255,255);
    background: linear-gradient(90deg, white 20%, rgba(255, 255, 255, 0.8) 40%, rgba(255, 255, 255, 0.5) 55%, rgba(255, 255, 255, 0) 70%, rgba(255, 255, 255, 0) 100%);
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    content: "";
    z-index: -1;
}

/*Phones*/
@media only screen and (max-width: 600px) {	
	.h-add-link {margin: 10px auto;}
	#heading .fw-wrapper {min-height: 150px;}
	.check-trigger {padding-left: 30px!important;}
	.check-trigger span {left: -20px!important;}
	.grad-left-light:before {background: #e5eef4;opacity: 0.8;}
	.grad-left-white:before {background: #ffffff;opacity: 0.8;}
	
}	
/*All Mobile*/
@media only screen and (max-width: 1149px) {
	.mobile-overlay:before {background: #ffffff;opacity: 0.8;position: absolute;top: 0;bottom: 0;left: 0;right: 0;content: "";z-index: -1;}
}

/*iPad */
@media only screen and (min-width: 601px) and (max-width: 949px) {	
	#heading .fw-wrapper {min-height: 300px;}
}
/*iPad pro and Desktop*/
@media only screen and (min-width: 950px) {	
	#heading .fw-wrapper {min-height: 400px;}
}
	
</style>
<?php 
$blog_id = get_current_blog_id();
if($blog_id == 1){
$page_id = 121;
} elseif($blog_id == 4){
$page_id = 14;
}
$h_content = get_field('h_content', $page_id);  
$h_image = get_field('h_image', $page_id);  
$gradient_color = get_field('gradient_color', $page_id); 
?>

<div id="heading" class="light-color-bg">
		<div class="fw-wrapper <?php if($gradient_color == 'light-blue') { ?>grad-left-light<?php } else if($gradient_color == 'white') { ?>grad-left-white<?php } else { ?>mobile-overlay<?php } ?>" style="background:url(<?php echo $h_image; ?>) right no-repeat; background-size:cover;width: 100%;margin:0;padding:0;justify-content: center;display: flex;flex-direction: column;">
			<div>
				<div class="left-pad animated fadeInLeft slow">
					<div class="h-content-holder phones-center simple" style="max-width: 600px;padding: 5% 0;">
						<div class="lg-type" style="max-width: 400px;"><?php echo $h_content; ?></div>
					</div>
				</div>
			</div>
		</div>
</div>

<?php if( have_rows('content_block', $page_id) ): ?>
<?php
$s = 1;
    while( have_rows('content_block', $page_id) ) : the_row();
        $section_options = get_sub_field('section_options'); 
		$bg = get_sub_field('background'); 
        $content = get_sub_field('content'); 
        $content_width = get_sub_field('content_width');
		$padding = get_sub_field('padding');
        $image_orientation = get_sub_field('image_orientation'); 
        $image = get_sub_field('image'); 
?>

<section id="section<?php echo $s; ?>" style="padding: 5% 0;<?php if($padding != 'default') {echo $padding . ":0;";} ?>" class="flexible <?php echo $bg; ?>">
   <div class="wrapper" style="overflow:visible;">
		<div class="<?php if( ($section_options) && (in_array('add-image', $section_options))  ) { ?>flex-row-center<?php } ?> sm-mobile-wrap<?php if( $image_orientation == 'left') { ?> row-reverse<?php }  ?>">
            <!-- Content Section ------------------------------------------------------------------------>
			<div <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>class="fifty" <?php } else if ($content_width == 'narrow') { ?>style="max-width:800px;margin:0 auto;" <?php } ?>>
                <div <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>class="right-pad"<?php } ?>>
                    <!-- Text -->
                    <div class="double-space<?php if($s > 1) {echo ' wow';} ?> animated fadeInUp"><?php echo $content; ?></div>

                    <!-- Buttons -->
                    <?php if( ($section_options) && (in_array('add-button', $section_options)) ) { ?>
                        <?php if( have_rows('buttons') ): ?>
							<div class="flex-row flex-wrap">
								<?php while( have_rows('buttons') ) : the_row();
									$button = get_sub_field('button'); 
								?>
										<div class="<?php if($s > 1) {echo ' wow';} ?> animated fadeInUp" style="margin-right: 20px;"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a></div>
							<?php endwhile; ?>
							</div>	
						<?php endif; ?>
                    <?php } ?>
                </div>
            </div>
            <!-- Image Section ------------------------------------------------------------------------>
            <?php if( ($section_options) && (in_array('add-image', $section_options)) ) { ?>
            <div class="fifty<?php if($s > 2) {echo ' wow';} ?> animated fadeIn">
                <div class="image" style="position: relative;width: 100%;">
						<?php
						// Cropped Image size attributes.
						$size = 'large';
						$cropped_img = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];
						?>
						<!-- Cropped Image -->
              	    	<img loading="lazy" src="<?php echo $cropped_img; ?>" alt="<?php echo $image['alt']; ?>" style="max-width:100%;display: block;height: auto;" width="<?php echo $width; ?>"  height="<?php echo $height; ?>">
                    
                </div> <!-- END standard image -->
				
			</div>	
            <?php } // End Image Section ?>
			
        </div>
   </div>
</section>



<?php $s++; endwhile; endif; ?>

 
<?php $practice_areas = get_field('practice_areas', $page_id);
if( $practice_areas ): 
$count = count($practice_areas); 
?>
<style>
@media only screen and (max-width: 600px) { 
	.grid {border-bottom:2px solid #F1F1F0;}
	.grid:last-child{border-bottom: none;}
}
@media only screen and (min-width: 601px)  {
	.grid {border-right:2px solid #F1F1F0;border-bottom:2px solid #F1F1F0;}
	.grid:nth-child(3n){border-right: none;}
	<?php if ($count % 3 == 0) { ?>
	.grid:nth-last-child(-n+3){border-bottom: none;}
	<?php } else if (($count - 2) % 3 == 0) { ?>
	.grid:nth-last-child(-n+2){border-bottom: none;}
	.grid:nth-last-of-type(2){border-left:2px solid #F1F1F0;}
	<?php } else if (($count - 1) % 3 == 0) { ?>
	.grid:last-child{border-bottom: none;border-left:2px solid #F1F1F0;}
	<?php } ?>
	.grid:hover > div {background: #334F55; color: #fff;border-radius: 5px;border-color: #97B863!important;}
	.grid:hover h3 {color: #fff;}
}

</style>
<section id="practice-areas" style="padding: 5% 0;">
	<div class="wrapper">
		<h2 style="text-align: center;"><?php the_field('pa_title', $page_id); ?></h2>
		<div class="flex-row-stretch flex-wrap" style="justify-content: center;">
			
				<?php foreach( $practice_areas as $post ): 
					setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="thirty-three grid" style="box-sizing: border-box;text-decoration: none;flex-grow: 0;position: relative;">
						<div style="padding: 20px 20px 40px;border-top: 20px solid #fff;height: calc(100% - 80px);">
							<h3 style="font-size: 1.3rem;text-align: center;text-decoration: none;padding-bottom: 20px;"><?php the_title(); ?></h3>
							<div style="text-align: center;text-decoration: none;"><?php the_excerpt(); ?></div>
						</div>
					</a>
				<?php endforeach; ?>
				
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

