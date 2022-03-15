<?php get_header(); /* Template Name: State */ ?>
<main id="top">
	<style>
		.grad-left-white:before {
			opacity: 0.95;
			background: linear-gradient(90deg, white 20%, rgba(255, 255, 255, 0.8) 40%, rgba(255, 255, 255, 0.5) 55%, rgba(255, 255, 255, 0) 70%, rgba(255, 255, 255, 0) 100%)!important;
		}
		section#contact {background: #fff!important;}
	</style>
<?php get_template_part('parts/heading-split-grad-slider'); ?>
<?php get_template_part('parts/state'); ?>
<?php get_template_part('parts/my-map'); ?>
<?php get_template_part('parts/attorneys'); ?>
<?php get_template_part('parts/faq-sections'); ?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

