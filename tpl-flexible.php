<?php get_header(); /* Template Name: Flexible */ ?>
<main id="top">
<style>
/*Phones*/
@media only screen and (max-width: 600px) {	
	#heading .fw-wrapper {background:#334F55!important;color: #fff;}
	#heading .fw-wrapper h1, #heading .fw-wrapper h2 {color: #fff;}
	.grad-left-white:before {background: none!important;}
	
	iframe#gnewtonIframe {height: 2900px!important;max-height: 2900px!important;}
}
	#contact {background: #fff!important;}
</style>
<?php get_template_part('parts/heading-split-grad'); ?>
<?php get_template_part('parts/flex-basic'); ?>
<?php get_template_part('parts/content-form'); ?>
</main>
<?php get_footer(); ?>

