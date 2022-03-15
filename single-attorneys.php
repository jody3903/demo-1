<?php get_header(); 
$a_address = get_field('a_address');
$address = str_replace("<br />","+",$a_address);
$map_address = str_replace(" ","+",$address);
$a_phone = get_field('a_phone');
$a_email = get_field('a_email');
?>
<main id="top">
<style>
	.partner-img > img {border-radius: 250px;width: 250px;height: 250px;margin: 0 auto;}	
</style>
	<section class="grey-bg" style="padding: 5% 0;">
		<div class="wrapper">
			<div class="flex-row sm-mobile-wrap">
				<!-- Right Column for Mobile -->
				<div class="fourty no-lg" style="min-width: 300px;padding: 20px 0;">
					<div style="padding: 0 10px;text-align: center;">
						<h1 style="font-size: 2rem;color:#334F55;"><?php the_title(); ?></h1>
						<p style="font-size:1.4rem;"><?php the_field('a_title'); ?></p>
					</div>
					<div style="padding: 0 10%;text-align: center;">
						<div class="partner-img">
									<?php if ( has_post_thumbnail() ) {
										echo the_post_thumbnail( 'team' ); 
									} else { ?>
										<img width="500" height="500" src="/wp-content/themes/demo/images/coming-soon.jpg" alt="Image coming soon" loading="lazy">
									<?php } ?>
						</div>
						<?php if( $a_address || $a_phone || $a_email ): ?>
						<div style="max-width: 230px; margin: 0 auto;line-height:1.7rem;">
							<h2 style="font-size: 1.5rem;padding-bottom: 10px;">Contact Information</h2>
							<?php if($a_address){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;font-size: 16px;">
								<img src="/wp-content/themes/demo/images/pin.svg" alt="address" loading="lazy" width="12" height="12" style="max-height: 26px" />
								<div style="padding-left: 20px;">
									<a href="https://www.google.com/maps/place/<?php echo $map_address; ?>/" style="text-decoration: underline;">
										<?php echo $a_address; ?>
									</a>
								</div>
							</div>
							<?php } ?>
							<?php if($a_phone){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;">
								<img src="/wp-content/themes/demo/images/phone.svg" alt="phone" loading="lazy" width="14" height="14" />
								<div style="padding-left: 20px;">
									<a href="tel:<?php echo $a_phone; ?>" style="text-decoration: underline;">
										<?php echo $a_phone; ?>
									</a>
								</div>
							</div>
							<?php } ?>
							<?php if($a_email){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;">
								<img src="/wp-content/themes/demo/images/email.svg" alt="email" loading="lazy" width="14" height="14" />
								<div style="padding-left: 20px;">
									<a href="mailto:<?php echo $a_email; ?>" style="text-decoration: underline;">
										<?php echo $a_email; ?>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="sixty">
					<div class="no-sm-mobile" style="padding: 0 10px;">
						<h1 style="font-size: 2rem;color:#334F55;"><?php the_title(); ?></h1>
						<p style="font-size:1.4rem;"><?php the_field('a_title'); ?></p>
					</div>
					<div class="no-sm-mobile" style="height: 2px; width: 100%;background: #fff;"></div>
					<div style="padding: 10px;">
						<?php the_content(); ?>
					</div>
					<?php if( have_rows('accordion') ):
						$acc = 1;
						while( have_rows('accordion') ) : the_row();
						$title = get_sub_field('title');
						$results = get_sub_field('results');
						?>
						<div id="acc-<?php echo $acc; ?>" class="acc" style="max-width:800px;margin:-100px auto 0;padding-top: 100px;">
                            <div class="question" style="transition: all 0.4s;background: transparent;" aria-label="<?php echo $title; ?>" aria-expanded="false" tabindex="0">
                                <div style="padding: 10px;font-weight:600;border-bottom: 2px solid #fff;">
                                    <div class="flex-row-center">
                                        <h2 style="flex-basis: 94%;margin-right: 1%;font-size: 1.5rem;"><?php echo $title; ?></h2> 
                                        <div class="arrow" style="flex-basis: 5%;text-align:center;padding-top: 10px;"><img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/down-arrow.svg" alt=" " width="15px" style="transition: all 0.2s;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="answer" aria-hidden="true">
                                <div style="padding: 16px 16px 0;">
                                    <div><?php echo $results; ?></div>
									<!-- Icons -->
									<?php if( have_rows('icons') ): ?>
									<div class="flex-row-stretch flex-wrap" style="justify-content: center;">
									<?php while( have_rows('icons') ) : the_row();
										$image = get_sub_field('icon');
										$link = get_sub_field('link');
										$size = 'logos';
											$thumb = $image['sizes'][ $size ];
											$width = $image['sizes'][ $size . '-width' ];
											$height = $image['sizes'][ $size . '-height' ];
										?>
										<div style="flex-basis: 38%;background: #fff;border-radius: 8px;display: flex;justify-content: center;align-items: center;padding: 2% 5%;margin: 1%;min-height: 150px;">
											<?php if($link){ ?>
											<a href="<?php echo $link; ?>" target="_blank">
											<?php } ?>
											<img src="<?php echo esc_url($thumb); ?>" alt="<?php echo $image['alt']; ?>" loading="lazy" height="<?php echo $height; ?>" width="<?php echo $width; ?>" />
											<?php if($link){ ?>
											</a>
											<?php } ?>
										</div>
										<?php endwhile; ?>
									</div>
									<?php endif; ?>
									<!-- END Icons -->
                                </div>
                            </div>
						</div>
						<?php $acc++; ?>
       	 				<?php endwhile; ?>
						<script defer>
               				// For Accordion
                            var question = document.getElementsByClassName("question");
                            var answer = document.getElementsByClassName("answer");
                            var j;

                            for (var j = 0; j < question.length; j++) {
                                question[j].onclick = function() {
									
                                    var setClasses = !this.classList.contains('active');
                                    setClass(question, 'active', 'remove');
                                    setClass(answer, 'show', 'remove');
									setExp(question, "aria-expanded", "false");
									setExp(answer, "aria-hidden", "true");

                                    if (setClasses) {
                                        this.classList.toggle("active");
                                        this.nextElementSibling.classList.toggle("show");
										
										var expanded = this.getAttribute("aria-expanded")
										if (expanded == "true") {
											  expanded = "false"
											  } else {
											  expanded = "true"
											  }
										this.setAttribute("aria-expanded", expanded);
										
										var hidden = this.nextElementSibling.getAttribute("aria-hidden")
										if (hidden == "true") {
											  hidden = "false"
											  } else {
											  hidden = "true"
											  }
										this.nextElementSibling.setAttribute("aria-hidden", hidden);
                                    }
                                }
								// For Keyboard
								// Execute a function when the user releases a key on the keyboard
								question[j].addEventListener("keyup", function(event) {

								  // Number 13 is the "Enter" key on the keyboard
								  if (event.keyCode === 13) {
									// Cancel the default action, if needed
									event.preventDefault();
									// Trigger the button element with a click
									this.click();
									 // parent[j].getElementByClassName('sub-menu').children[1].focus();
								  }
								});

                            }

                            function setClass(els, className, fnName) {
                                for (var j = 0; j < els.length; j++) {
                                    els[j].classList[fnName](className);
                                }
                            }
			 
			 				function setExp(theClass, aria, tf) {
                                for (var j = 0; j < theClass.length; j++) {
									theClass[j].setAttribute(aria, tf);
                                }
                            }
           </script>
					<?php endif; ?>
				</div>
				<!-- Right Column -->
				<div class="fourty no-sm-mobile" style="min-width: 300px;padding: 20px 0;">
					<div style="padding: 0 10%;text-align: center;">
						<div class="partner-img">
									<?php if ( has_post_thumbnail() ) {
										echo the_post_thumbnail( 'team' ); 
									} else { ?>
										<img width="500" height="500" src="/wp-content/themes/demo/images/coming-soon.jpg" alt="Image coming soon" loading="lazy">
									<?php } ?>
						</div>
						<?php if( $a_address || $a_phone || $a_email ): ?>
						<div style="max-width: 230px; margin: 0 auto;line-height:1.7rem;">
							<h2 style="font-size: 1.5rem;padding-bottom: 10px;">Contact Information</h2>
							<?php if($a_address){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;font-size: 16px;">
								<img src="/wp-content/themes/demo/images/pin.svg" alt="address" loading="lazy" width="12" height="12" style="max-height: 26px" />
								<div style="padding-left: 20px;">
									<a href="https://www.google.com/maps/place/<?php echo $map_address; ?>/" style="text-decoration: underline;">
										<?php echo $a_address; ?>
									</a>
								</div>
							</div>
							<?php } ?>
							<?php if($a_phone){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;">
								<img src="/wp-content/themes/demo/images/phone.svg" alt="phone" loading="lazy" width="14" height="14" />
								<div style="padding-left: 20px;">
									<a href="tel:<?php echo $a_phone; ?>" style="text-decoration: underline;">
										<?php echo $a_phone; ?>
									</a>
								</div>
							</div>
							<?php } ?>
							<?php if($a_email){ ?>
							<div class="flex-row" style="text-align: left;padding-bottom: 10px;">
								<img src="/wp-content/themes/demo/images/email.svg" alt="email" loading="lazy" width="14" height="14" />
								<div style="padding-left: 20px;">
									<a href="mailto:<?php echo $a_email; ?>" style="text-decoration: underline;">
										<?php echo $a_email; ?>
									</a>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('parts/carousel-testimonials-cpt'); ?>
</main>
<?php get_footer(); ?>