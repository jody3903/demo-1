<?php get_header(); ?>
<main id="top">

<div id="heading" style="padding: 4rem 0;" class="color-bg">
    <div class="fw-wrapper" style="text-align:center;">
        <h1><?php echo the_archive_title(); ?></h1>
    </div>
</div>

	
<section id="archive" style="padding: 3% 0;">
	<div class="wrapper">
		<div class="flex-row flex-wrap">
		<?php while(have_posts()) {
		the_post(); ?>
			<div class="blog-tile thirty-three" style="flex-grow: 0;">
				<a href="<?php the_permalink(); ?>">
					<div style="padding: 10px;">
						<div class="image center" style="text-align: center;">
							<?php the_post_thumbnail('landscape-600'); ?>
						</div>
						<div style="margin: 20px 0;">
							<h3 class="accent-color" style="font-size: 1rem;text-decoration: none;text-align: center;"><?php the_title(); ?></h3>
							<div class="font-color" style="text-align: center;font-weight: 600;padding-top: 10px;font-size: 1.1rem;line-height: 1.5rem;"><?php echo wp_trim_words( get_the_content(), 11, '...'); ?></div>
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
		</div>
		<div class="pagination" style="margin-bottom: 3%;text-align: center;font-weight: 600;">
			<?php echo paginate_links(); ?>
		</div>
	</div>
</section>
</main>
<?php get_footer(); ?>