<?php 
	$logo = get_field('footer_logo', 'option'); //get_field('logo', 'option');
	$facebook = get_field('facebook', 'option');
	$twitter = get_field('twitter', 'option');
	$linkedin = get_field('linkedin', 'option');
	$instagram = get_field('instagram', 'option');
	$youtube = get_field('youtube', 'option');
	$footer_badge = get_field('footer_badge', 'option');
	$footer_badge_2 = get_field('footer_badge_2', 'option');
	$f_button = get_field('footer_button', 'option');
	$phone = get_field('phone', 'option');
	$footer_text = get_field('footer_text', 'option');
	$f_disclosures = get_field('disclosures', 'option');
	$blog_id = get_current_blog_id();

?>
    <p id="cookie-notice" style="font-size: 0.75rem; line-height: 1rem; font-weight:500;">Our website uses "cookies" (small text files stored by your web browser) to track visits and may use this information to retarget and remarket visitors with advertisements across the Internet.<br/>By visiting this website, you acknowledge there is no legal advice being provided and no attorney-client relationship is formed.<br><button style="font-weight: 400; font-size: 1em;color:#000;" onclick="acceptCookie();" tabindex="0">Accept</button></p>

<style>#cookie-notice{color:#fff;font-family:inherit;background:#365668;padding:20px;position:fixed;bottom:10px;left:10px;width:100%;max-width:300px;box-shadow:0 10px 20px rgba(0,0,0,.2);border-radius:5px;margin:0px;visibility:hidden;z-index:1000000;box-sizing:border-box}#cookie-notice button{color:inherit;background:#90ad4d;border:0;padding:5px;margin-top:10px;width:100%;cursor:pointer}@media only screen and (max-width:600px){#cookie-notice{max-width:100%;bottom:0;left:0;border-radius:0}}</style>

<script>function acceptCookie(){document.cookie="cookieaccepted=1; expires=Thu, 18 Dec 2030 12:00:00 UTC; path=/",document.getElementById("cookie-notice").style.visibility="hidden"}document.cookie.indexOf("cookieaccepted")<0&&(document.getElementById("cookie-notice").style.visibility="visible");</script>

	<footer class="light" style="background: #334F55;color: #fff;">
		<div id="full-overlay" class="no-print" style="display: none; content:' ';position: absolute;top: 0;left: 0;right: 0;bottom: 0;background: rgba(0,0,0,0.5);z-index: 1000;"></div>
		<div class="wrapper">
			<div class="flex-row flex-wrap top-footer" style="padding: 5% 0 2%;">
				<div class="twenty col1 phones-center">
					<div class="padding-right:5%;">
					<?php if( !empty( $logo ) ): ?>
						<div>
						<a href="<?php echo site_url(); ?>">
							<img loading="lazy" style="position: relative;left: -5px;max-width: 200px;height: auto;" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="<?php echo $logo['width']; ?>"  height="<?php echo $logo['height']; ?>" />
						</a>
						</div>
					<?php endif; ?>
						<?php if($phone){ ?>
						<div style="padding-top:20px;">
							<a href="tel:<?php echo $phone; ?>"> <strong><?php echo $phone; ?></strong></a>
						</div>
						<?php } ?>
						<div>
						<?php echo $footer_text; ?>
						<?php if($f_button['url']){ ?>
							<div><a class="button" href="<?php echo $f_button['url']; ?>" target="<?php echo $f_button['target']; ?>"><?php echo $f_button['title']; ?></a></div>
						<?php } ?>
						</div>
                	</div>       
				</div>
				<div class="twenty col2 no-print phones-center">
					<div class="content">
						<h2 style="text-transform: capitalize;font-size: 1rem;"><strong>
						<?php 
						if($blog_id == 1) {
						$menu_ID = 3;
						}
						if($blog_id == 4) {
						$menu_ID = 9;
						}
						$nav_menu = wp_get_nav_menu_object( $menu_ID );
						echo $nav_menu->name; ?>
						</strong></h2>
						<?php
						wp_nav_menu(array(
						'theme_location' => 'footerMenu1'
						))
						?>
					</div>
				</div>
				<div class="twenty col3 no-print phones-center">
					<div class="content">
						<h2 style="text-transform: capitalize;font-size: 1rem;"><strong>
						<?php
						if($blog_id == 1) {
						$menu_ID = 4;
						}
						if($blog_id == 4) {
						$menu_ID = 10;
						}
						$nav_menu = wp_get_nav_menu_object( $menu_ID );
						echo $nav_menu->name; ?>
						</strong></h2>
						<?php
						wp_nav_menu(array(
						'theme_location' => 'footerMenu2'
						))
						?>
					</div>
				</div>
				<div class="twenty col4 no-print phones-center">
					<div class="content">
						<h2 style="text-transform: capitalize;font-size: 1rem;"><strong>
						<?php
						if($blog_id == 1) {
						$menu_ID = 5;
						}
						if($blog_id == 4) {
						$menu_ID = 11;
						}
						$nav_menu = wp_get_nav_menu_object( $menu_ID );
						echo $nav_menu->name; ?>
						</strong></h2>
						<?php
						wp_nav_menu(array(
						'theme_location' => 'footerMenu3'
						))
						?>
					</div>
				</div>
				<div class="fifteen col5 no-print">
					<div class="social" style="max-width: 500px;margin: 0 auto;">
						<div class="flex-row-center">
							<?php if($facebook) { ?>
							<div style="margin: 10px;">
								<a href="<?php echo $facebook; ?>" target="_blank">
									<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/facebook.svg" alt="Facebook" width="12" height="23">
								</a>
							</div>
							<?php }
							if($twitter) { ?>
							<div style="margin: 10px;">
								<a href="<?php echo $twitter; ?>" target="_blank">
									<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/twitter.svg" alt="twitter" width="27" height="23">
								</a>
							</div>
							<?php }
							if($linkedin) { ?>
							<div style="margin: 10px;">
								<a href="<?php echo $linkedin; ?>" target="_blank">
									<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt="linkedin" width="23" height="23">
								</a>
							</div>
							<?php }
							if($youtube) { ?>
							<div style="margin: 10px;">
								<a href="<?php echo $youtube; ?>" target="_blank">
									<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/youtube.svg" alt="youtube" width="33" height="23">
								</a>
							</div>
							<?php }
							if($instagram) { ?>
							<div style="margin: 10px;">
								<a href="<?php echo $instagram; ?>" target="_blank">
									<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/instagram.svg" alt="instagram" width="23" height="23">
								</a>
							</div>
							<?php } ?>
						</div>
					</div>
					<?php if($footer_badge['url']) { ?>
					<div class="center">
						<img loading="lazy" src="<?php echo $footer_badge['url']; ?>" alt="<?php echo $footer_badge['alt']; ?>" width="<?php echo $footer_badge['width']; ?>"  height="<?php echo $footer_badge['height']; ?>">
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="bottom-footer" id="f-disclosures">
			<div style="padding: 2% 5% 1%;font-size: 0.9rem;">
				<?php echo $f_disclosures; ?>
				<div class="copyright"><p style="font-size:smaller;">©<?php echo do_shortcode('[year]'); ?> <?php bloginfo( 'name' ); ?>, All Rights Reserved.</p></div>
			</div>
		</div>
		<button class="chat-badge" style="position: sticky; float: right;min-width: 180px;max-width: 300px;height: 30px !important;color: #000000;font-size: .85em;border-radius: 10px 10px 0px 0px;background: #97b863;position: fixed;bottom: 0 !important;right: 1em;border: none;outline: none;box-sizing: border-box;z-index: 999;overflow: hidden;padding: 0;" onclick="ciscoBubbleChat.showChatWindow()">Start Chat</button>
	</footer>

<?php wp_footer(); ?>
</body>
</html>