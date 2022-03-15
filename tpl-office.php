<?php get_header(); /* Template Name: Office */ 
$blog_id = get_current_blog_id();
?>
<main id="top">
	<style>
		#practice-areas {background: #F1F1F0;}
		.grid > div {border-color: #F1F1F0!important;}
		.grid {border-color: #fff!important;}
	</style>
<?php get_template_part('parts/heading-split-grad'); ?>
<?php get_template_part('parts/office'); ?>
<?php get_template_part('parts/my-map'); ?>
<?php get_template_part('parts/book'); ?>
<?php get_template_part('parts/other-offices'); ?>
<?php get_template_part('parts/flex-simple'); ?>
<?php get_template_part('parts/faq-sections'); ?>
<?php 
	if($blog_id == 1) {
		get_template_part('parts/team-map'); 
	}
?>
<?php get_template_part('parts/practice-areas'); ?>
<?php 
	if($blog_id == 1) {
		get_template_part('parts/carousel-testimonials-auto-cpt'); 
	}
?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

