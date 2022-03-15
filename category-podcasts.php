<?php get_header(); ?>
<main id="top">
<style>
/*Phones*/
@media only screen and (max-width: 600px) { 
	.blog-tile {border-bottom: 2px solid #D2D2CF;margin-bottom: 8%;}
	.blog-tile:last-child {border-bottom: none;}
}		
</style>
<div id="heading" style="padding: 4rem 0;" class="color-bg">
    <div class="fw-wrapper" style="text-align:center;">
        <h1>Cordell &amp; Cordell<br />Men's Divorce Podcast</h1>
    </div>
</div>

	
<section id="archive" style="padding: 3% 0;">
	<div class="wrapper">
		<div class="flex-row flex-wrap">
		<?php while(have_posts()) {
		the_post(); 
		$excerpt = get_the_excerpt();
		?>
			<div class="blog-tile thirty-three" style="flex-grow: 0;">
				
					<div style="padding: 10px;">
						<div class="image center" style="text-align: center;">
							<a href="<?php the_permalink(); ?>" tabindex="-1">
							<?php
							if ( has_post_thumbnail()) {
							   the_post_thumbnail('youtube');
							} else { 
								echo '<img src="' . get_template_directory_uri() . '/images/podcast-featured.jpg" alt="Mens Divorce Podcast">';
							}
							?>
							</a>
						</div>
						<div style="margin: 20px 0;">
							<p style="text-transform: uppercase;font-size: 0.95rem;color: #6E6E63;font-weight: 600;padding-bottom: 0;"><?php echo get_the_date( 'M d, Y' ); ?></p>
							<h2 style="font-size: 1.2rem;font-weight: 600;line-height: 1.8rem;"><a style="color:#231F20;" href="<?php echo the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
							<div style="font-size: 0.95rem;margin: 4px 0;"><?php echo wp_trim_words( $excerpt, 16, '...'); ?></div>
							<div class="flex-row-center no-phones" style="font-size: 1rem;font-weight: 600;">
								<a href="<?php the_permalink(); ?>" tabindex="-1">Listen</a>
								<img style="padding-left: 8px;" width="16" height="6" src="/wp-content/themes/go-fish/images/right-arrow.svg" alt="" loading="lazy" />
							</div>
						</div>
					</div>
				
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