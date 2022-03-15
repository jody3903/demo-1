<?php get_header(); ?>
<?php while(have_posts()) {
			the_post();  ?>
<main id="top">
<section class="center top-section" >
		<div class="wrapper">
			<h1><?php the_title(); ?></h1>
		</div>
</section>

<section class="content">
	<div class="wrapper">
		<?php the_content(); ?>
	</div>
</section>
</main>
<?php } ?>
<?php get_footer(); ?>