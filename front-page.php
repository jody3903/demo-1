<?php get_header(); 
$blog_id = get_current_blog_id();
?>
<main id="top">
<?php get_template_part('parts/heading-split-grad-slider'); ?>
<?php get_template_part('parts/stats'); ?>
<?php 
	if($blog_id == 1) {
		get_template_part('parts/content-map-select'); 
	}
?>
<?php get_template_part('parts/carousel-numbered-h'); ?>
<?php get_template_part('parts/content-simple'); ?>
<?php get_template_part('parts/bar-logos'); ?>
<style>
	#cff .cff-author .cff-date, #cff-lightbox-wrapper .cff-author .cff-date {
		color: #000;
	}
	a#cff-load-more {
		background: #fff!important;
	}
</style>
<?php get_template_part('parts/featured-resources'); ?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

