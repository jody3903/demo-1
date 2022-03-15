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
.partner-img > img {border-radius: 200px;width: 200px;height: 200px;margin: 0 auto;}
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
@media only screen and (min-width: 601px) and (max-width: 800px) {	
	#heading .fw-wrapper {min-height: 300px;}
	#attorneys .twenty-five {flex-basis: 50%;}
}
@media only screen and (min-width: 801px) and (max-width:1050px) {	
	#attorneys .twenty-five {flex-basis: 33%;}
}
/*iPad pro and Desktop*/
@media only screen and (min-width: 801px) {	
	#heading .fw-wrapper {min-height: 400px;}
}
	
</style>
<?php 
$page_id = 120;
$h_content = get_field('h_content', $page_id);  
$h_image = get_field('h_image', $page_id);  
$gradient_color = get_field('gradient_color', $page_id); 
$partners = get_field('partners', $page_id);
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
<?php if( $partners ): ?>
<section id="attorneys" style="padding: 5% 0;background: #F1F1F0;">
	<div class="wrapper">
		<h2 style="text-align: center;"><?php the_field('partner_title', $page_id); ?></h2>
		<div class="flex-row-stretch flex-wrap">
			
				<?php foreach( $partners as $post ): 
					setup_postdata($post); ?>
					<a href="<?php the_permalink(); ?>" class="twenty-five" style="box-sizing: border-box;text-decoration: none;">
						<div style="padding: 20px;text-align: center;">
							<div class="partner-img">
								<?php if ( has_post_thumbnail() ) {
									echo the_post_thumbnail( 'team' ); 
								} else { ?>
									<img width="400" height="400" src="https://cordelll.wpengine.com/wp-content/uploads/2021/11/Attorney-Banner-1-400x400.jpg" class="attachment-square-400 size-square-400 wp-post-image" alt="" loading="lazy" srcset="https://cordelll.wpengine.com/wp-content/uploads/2021/11/Attorney-Banner-1-400x400.jpg 400w, https://cordelll.wpengine.com/wp-content/uploads/2021/11/Attorney-Banner-1-150x150.jpg 150w, https://cordelll.wpengine.com/wp-content/uploads/2021/11/Attorney-Banner-1-300x300.jpg 300w" sizes="(max-width: 400px) 100vw, 400px">
								<?php } ?>
							</div>
							<h3 style="font-size: 1.38rem;text-align: center;text-decoration: underline;color: #334F55;"><?php the_title(); ?></h3>
							<div style="text-align: center;text-decoration: none;color: #43403D;font-size: 18px;"><?php the_field('a_title'); ?></div>
						</div>
					</a>
				<?php endforeach; ?>
				<div class="fifty">
					<div style="margin: 20px;background: #fff;padding: 30px;border-radius: 8px;height: calc(100% - 100px);display: flex;flex-direction: column;justify-content: center;">
						<div>
						<?php $attorneyDrop = new WP_Query(array(
							'posts_per_page' => -1,
								'post_type' => 'attorneys',
								'meta_key'	=> 'lastname',
								'orderby'	=> 'meta_value',
								'order'   => 'ASC'
								));
							if($attorneyDrop->have_posts()) : ?>
							<form id="attorney-select">
								<label for="a-drop"><h3 style="text-align: center;">Search Cordell &amp; Cordell Attorneys</h3></label>
								<select name="a-drop" id="a-drop" tabindex="0" style="padding: 15px;width: calc(100% - 100px);border-width: 2px;background: url(/wp-content/themes/go-fish/images/down-arrow-sm.svg) no-repeat calc(100% - 10px) 50%;" onchange="gotoPage(this)">
									<option selected>Select Attorney</option>
							<?php
								while($attorneyDrop->have_posts()) :
								$attorneyDrop->the_post();
							?>
									<option value="<?php the_permalink(); ?>"><?php the_title(); ?></option>
							
							<?php endwhile; ?>
								</select>
								<a id="go-button" class="button" style="min-width: 50px;" href="">Go</a>
							</form>
							<script type="text/javascript">
							function gotoPage(select){
								document.getElementById('go-button').href = select.value;
							}
							</script>
						<?php endif; ?>
						</div>
					</div>
				</div>
		</div>
	</div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_template_part('parts/team-map'); ?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

