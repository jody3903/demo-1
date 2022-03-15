<?php get_header(); 
$postid = 780; // Add Page ID for Blog Page here
$sf_id = 795; // Add Search and Filter ID here
$cta = get_field('blog_cta','options'); 
$h_icon = get_field('h_icon', $postid);
$h1 = get_field('h1', $postid);
$h_bg = get_field('h_bg', $postid);
?>
<main id="top">
<style>
/* Phones */
@media only screen and (max-width: 600px) { 
	.searchandfilter ul {margin: 0;padding: 0;}	
}
	form#search-filter-form-<?php echo $sf_id; ?> input[type=checkbox], form#search-filter-form-<?php echo $sf_id; ?> input[type=checkbox] {visibility: hidden;width: 1px;height: 1px;}
	.sf-field-reset, .sf-level-0 {
		background: #E5EEF4;
		color: #005695;
		font-size: 0.9rem;
		border-radius: 5px;
		margin-right: 10px!important;
		padding: 10px 20px 10px 10px!important;
		font-weight: 600;
	}
	.sf-field-reset {margin: 10px 0!important;padding-left: 20px!important;}
	.sf-level-0.sf-option-active{background: #007B85;color: #fff;}
	.searchandfilter ul li {float: unset!important;display: inline-block;}
	form#search-filter-form-<?php echo $sf_id; ?> input[type=checkbox], form#search-filter-form-<?php echo $sf_id; ?> input[type=checkbox] {visibility: hidden;width: 1px;height: 1px;}
	li.sf-field-taxonomy-topic {padding-top: 0!important;}
	.sf-field-taxonomy-topic > ul {padding-left: 10px!important;}
	.sf-field-reset, .sf-level-0 {
		background: #E5EEF4;
		color: #005695;
		font-size: 0.9rem;
		border-radius: 5px;
		margin-right: 10px!important;
		padding: 0!important;
		font-weight: 600;
		margin-bottom: 10px!important;
		cursor: pointer;
	}
	.sf-field-reset {
		margin: 0 0 10px 10px!important;
		background: #007B85;
		padding: 10px 0!important;
	}
	.sf-field-reset a {color: #fff;}
	.sf-field-reset.inactive {background: #E5EEF4;}
	.sf-field-reset.inactive a {color: #005695;}
	.sf-level-0:hover, .sf-field-reset:hover {
		color: #fff;
		background: #007B85;
		cursor: pointer;
	}
	.sf-field-reset a, .sf-level-0 label {
		padding: 10px 20px!important;
	}
	    
	.sf-field-reset:hover a, .sf-level-0:hover label {
		color: #fff;
		text-decoration: underline;
	}
	.sf-level-0.sf-option-active{
		background: #007B85;
		color: #fff;
	}
	
</style>
<div id="heading" style="padding: 4rem 0;<?php if($h_bg) { ?>background: url(<?php echo $h_bg; ?>) center no-repeat; background-size:cover;"<?php } else { ?>" class="color-bg" <?php } ?>>
<!-- " Fixes formatting in editor -->
    <div class="fw-wrapper" style="text-align:center;">
    <?php if($h_icon) { ?>
        <div class="flex-row-center flex-center">
            <div style="padding-right:15px;">
                <img src="<?php echo $h_icon['url']; ?>" alt="<?php echo $h_icon['alt']; ?>" width="<?php echo $h_icon['width']; ?>" height="<?php echo $h_icon['heigt']; ?>">
            </div>
            <div>
    <?php } ?>
        <h1><?php if($h1){ echo $h1; } else { the_title(); } ?></h1>
    <?php if($h_icon) { ?>
            </div>
        </div>
    <?php } ?>
<!-- Buttons -->
    <?php if( have_rows('buttons') ): ?>
		<div class="flex-row flex-wrap" style="justify-content:center;">
        <?php while( have_rows('buttons') ) : the_row();
           $button = get_sub_field('button'); ?>
                <div class="twenty-five" style="margin-bottom:10px;"><a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a></div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>

    </div>
</div>

	
<section id="featured">
	<div class="wrapper" style="padding: 3% 0;">
		
<?php
$post = get_field('featured_article', $postid);
		if( $post ): 
		setup_postdata($post); 
		$content = get_the_content();
		?>
			<div class="flex-row-center phone-wrap grey-bg" style="margin: 10px;">
					<div class="fifty">
						<div style="padding:8%;">
							<p class="accent-color" style="font-weight: 600;">Featured</p>
							<a href="<?php the_permalink(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
							<div><?php echo wp_trim_words( $content, 60, '...'); ?>
							</div>
						</div>
					</div>
					<div class="fifty">
						<div style="padding:25px;">
						<?php the_post_thumbnail('landscape-600'); ?>
						</div>
					</div>
			</div>

<?php endif; ?>
	</div>
</section>

	
<section id="categories">
	<div class="wrapper" style="padding-bottom: 0;">
		<div style="text-align: center;">
			<fieldset style="border: 0;padding: 0;">
				<legend class="sr-only">Categories to Show</legend>
				<?php echo do_shortcode('[searchandfilter id="' . $sf_id . '"]'); ?>
			</fieldset>
		</div>
	</div>
</section>
	
<section id="archive">
	<?php echo do_shortcode('[searchandfilter id="' . $sf_id . '" show="results"]'); ?>
</section>
<?php 
if($cta) { ?>
<section id="cta" aria-label="Call to Action" style="padding: 5% 0;" class="dark-bg light">
   <div class="wrapper">
	   <div style="max-width:800px;margin:0 auto;">
	   <?php echo $cta; ?>
	   </div>
	</div>
</section>
<?php } ?>
</main>
<?php get_footer(); ?>