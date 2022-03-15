<?php 
$myData = esc_attr( $_POST['authorTax'] );
if(!$myData) {
	$myData = 'TX';
}
?>
				<h3 style="margin-top: 0;font-size: 1.5rem;"><?php echo $myData; ?> Attorneys</h3>

					<?php 
if($myData == 'NV'){
						echo '<p style="color:#000;font-size: 0.9rem;line-height: 1.4rem;">TEXT</p>';
					} else {
$attorneyState = new WP_Query(array(
							'posts_per_page' => -1,
								'post_type' => 'attorneys',
								'meta_key'	=> 'lastname',
								'orderby'	=> 'meta_value',
								//'orderby' => 'title',
								'order'   => 'ASC',
								'tax_query' => array(
										array(
											'taxonomy' => 'state',
											'field' => 'slug',
											'terms' => $myData 
										)
									)
								));
							if($attorneyState->have_posts()) : ?>
					<?php
								while($attorneyState->have_posts()) :
								$attorneyState->the_post();
							?>
					<a href="<?php the_permalink(); ?>" style="text-decoration: none;">
						<div style="background: #fff; border-radius: 8px;border: 2px solid #D2D2CF;padding: 5px 15px;margin-bottom: 10px;">
							<div class="flex-row-center">
								<div class="partner-img-sm">
								<?php if ( has_post_thumbnail() ) {
									echo the_post_thumbnail( 'thumbnail' ); 
								} else { ?>
									<img width="60" height="60" src="/wp-content/uploads/2021/11/Attorney-Banner-1-400x400.jpg" class="attachment-square-400 size-square-400 wp-post-image" alt="" loading="lazy" srcset="/wp-content/uploads/2021/11/Attorney-Banner-1-400x400.jpg 400w, /wp-content/uploads/2021/11/Attorney-Banner-1-150x150.jpg 150w, /wp-content/uploads/2021/11/Attorney-Banner-1-300x300.jpg 300w" sizes="(max-width: 400px) 100vw, 400px" />
								<?php } ?>
								</div>
								<div style="padding-left: 10px;">
									<p style="padding:2px 0;text-decoration: underline;color:#000;"><strong><?php the_title(); ?></strong></p>
									<p style="padding:2px 0;font-size: 1rem;color:#43403D;line-height: 1.1rem;"><?php the_field('a_title'); ?></p>
								</div>
							</div>
						</div>
					</a>
					<?php endwhile; 
wp_reset_postdata();
endif; }
?>