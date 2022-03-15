<?php get_header(); ?>
<main id="top">
<?php while(have_posts()) {
			the_post(); 
	$post_id = get_the_ID();
	$terms = get_the_terms( $post_id, 'category' );
	$categories = wp_list_pluck( $terms, 'name' );
	$cat_id = wp_list_pluck( $terms, 'term_id' );
	$author_id = get_the_author_meta( 'ID' ); 
	//$author = get_the_author_meta( 'display_name', $author_id );
	$bio = get_the_author_meta( 'description', $author_id );
	$replace = get_field('replace_featured_image');
	$custom_code = get_field('video_or_custom_code');
	$side_bar = get_field('news_side_bar');
	if(!$side_bar) {
		$side_bar = get_field('news_side_bar','options');
	}

		$author_image = '/wp-content/themes/demo/images/Demo-Fav.png';

	?>
<style>
	.avatar > img {border-radius: 100px; margin-right: 20px;}
	.b-left a.button {
		min-width: 100px!important;
		font-size: 0.9rem;
		padding: 10px;
		color: #334F55!important;
		border-color: #334F55!important;
		-webkit-box-shadow: none!important;
    	box-shadow: none!important;
		top:0!important;
		left:0!important;
	}
	.b-left a.button:hover {
		background: #334F55!important;
		color: #fff!important;
	}
/*Phones*/
@media only screen and (max-width: 600px) { 
	.left-box {display: block;max-width: unset!important;text-align: center;}
	.phone-center .avatar, .phone-center .avatar img {margin: 0 auto!important;}
	.blog-tile {border-bottom: 2px solid #D2D2CF;margin-bottom: 8%;}
	.blog-tile:last-child {border-bottom: none;}
}	
	
/*Not Phones*/
@media only screen and (min-width: 601px) { 
	.left-box.sticky {position: fixed;}
}
</style>
	
<article>
<div id="post-top" style="padding-top: 3%;">
	<div class="wrapper">
		<div class="flex-row-center phone-wrap" style="border-bottom: 2px solid #D2D2CF;padding-bottom: 5%;">
			<div class="fourty">
				<div class="cat" style="font-weight: 600;">
					<a style="text-transform: uppercase;font-size: 0.95rem;" href="<?php echo esc_url( get_term_link( $terms[0] ) ); ?>"><?php echo $categories[0]; ?></a>
					<h1 style="max-width: 90%;margin-top: 8px;"><?php the_title(); ?></h1>
					<div class="post-meta flex-row-center" style="padding: 15px 0;">
						<div class="avatar"><img src="<?php echo $author_image; ?>" alt="Cordell Logo" width="60" height="60" /></div>
						<div class="info" style="text-align: left;">
							<p style="padding-bottom: 0;margin: 0;font-weight: 600;color: #003B5C;font-size: 0.9rem;"><?php echo get_the_date( 'M d, Y' ); ?></p>
						</div>
					</div>
				</div>
			
			</div>
			<div class="sixty">
			<?php if($replace && $custom_code) {
				echo $custom_code;
			} elseif(has_post_thumbnail()){
				echo the_post_thumbnail('landscape-600');
			} elseif( in_category('podcasts') ) { ?>
				<img width="600" height="450" src="<?php  echo get_template_directory_uri(); ?>/images/podcast-featured.jpg" alt="Men's Divorce Podcast" loading="lazy">
			<?php } else { ?>
				<img width="600" height="450" src="<?php  echo get_template_directory_uri(); ?>/images/father-and-son.jpeg" alt="Father and Son" loading="lazy">
			<?php } ?>
				
			</div>
		</div>
	</div>
</div>

<div id="content" class="wrapper" style="padding-top: 3%;">
	<div class="flex-row phone-wrap">
		<div class="b-left no-phones" style="min-width: 200px;padding: 10px 20px;">
			<?php if( $side_bar ){ ?> 
			<div class="left-box" style="transition: opacity 0.6s;top:200px;max-width: 200px;">
				<?php echo $side_bar; ?>
			</div>
			<?php } ?>
		</div>
		<div class="b-middle" style="max-width: 800px;margin: 0 auto;">
		<div class="post-content">
			<?php the_content(); ?>
			<div class="social" style="padding: 1rem 0 2.7rem;">
				<h2 style="font-size: 1.3rem;">Share on Social</h2>
				<?php echo do_shortcode('[Sassy_Social_Share]'); ?>
			</div>
		</div>

	</div>
		<div class="b-right">
		
		</div>
	</div>
	<?php if( $side_bar ){ ?> 
		<div class="phone-only" style="text-align: center;">
			<?php echo $side_bar; ?>
		</div>
	<?php } ?>
</div>
</article>


	
<?php if( $side_bar ){ ?>
<script defer>
jQuery(function($){

document.addEventListener( 'scroll', event => {
	var scrollTop     = $(window).scrollTop(),
		elementOffset = $('.post-content').offset().top,
		distance      = (elementOffset - scrollTop),
		elementOffsetB = $('.social').offset().top,
		distanceB      = (elementOffsetB - scrollTop);
	var myElement = document.querySelector( '.left-box' );

	if ( distance < 200 ){
		myElement.className = 'left-box sticky';
	} else  {
		myElement.className = 'left-box';
	}
	if ( distanceB < 300 ){
		myElement.style.opacity = '0';
	} else  {
		myElement.style.opacity = '1';
	}
})
});
</script>
<?php } //END Side Bar script?>	


<?php } // END ALL ?>
<?php //wp_reset_postdata();
get_template_part('parts/post-recent'); ?>
</main>
<?php get_footer(); ?>