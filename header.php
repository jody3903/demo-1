<!DOCTYPE html>
<html <?php language_attributes(); ?> id="html" style="overflow-x:hidden;" 
	  <?php 
	  $add_schemas = get_field('add_schemas');
	  $faq_schema = get_field('faq_schema', 'option');
	  $blog_id = get_current_blog_id();
	  if ( (is_page( $faq_schema )) ) { ?>itemscope itemtype="https://schema.org/FAQPage" 
	  <?php } 
	  ?>
>
	<head>
		<meta charset="<?php bloginfo('charset') ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
		<?php wp_head(); ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KPZMBJ');</script>
		<!-- End Google Tag Manager -->
		<meta name="google-site-verification" content="WY63FuKG6KBqaANQQmm1g1EMm84-ficLvWo-Bi1yGhg">
		
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,700;1,700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
		<!-- END Google Fonts -->
		<style>
			header.sticky + main {padding-top: 100px;}
			header input {border-width: 0 0 1px 0!important;border-radius: 0!important;border-color: #6E6E63!important; background: url(/wp-content/themes/demo/images/search.svg) no-repeat calc(100% - 10px) 50%;padding: 2px!important;}
			@media only screen and (max-width: 600px) {
				.lang-toggle {max-height: 40px;}
				.lang-holder {flex-basis: 100%;border-bottom: 2px solid #D2D2D1;}
				.lang-holder > div {flex-basis: 50%;}
				.header-phone {margin-left: 10px;}
				.header-btn {font-size: 0.8rem!important;min-width: 90px!important;line-height: 1rem;}
			}
			@media only screen and (max-width: 800px) {
				.login-icon {padding: 10px;border: 2px solid #334F55;border-radius: 4px;margin-top: 6px;}
				div#header-search {display: none;}
			}
			@media only screen and (max-width: 600px) {
				.header-phone {margin-left: 10px;}
			}
			@media only screen and (max-width: 1149px) {
				.header {padding: 12px 0 12px 5%;}
				.header-btn {margin-right: 10px!important;}
				div#client-login span {padding-right: 10px;}
			}
			@media only screen and (min-width: 1150px) {
				.top-header {padding: 0 5%;}
				.top-header .phone {font-size: 1.3rem;}
				.header {padding: 12px 12px 12px 0;}
			}
			@media only screen and (min-width: 1350px) {
				.header {padding: 12px 5% 12px 3%;}
			}
			/*
			font-family: 'Archivo', sans-serif;
			font-family: 'Roboto', sans-serif;
			*/
		
		</style>
		<?php if($add_schemas){ echo $add_schemas; } ?>
	</head>
<body <?php body_class(); ?> style="margin: 0;font-family: 'Roboto', sans-serif;color: #43403D;font-size: 18px;line-height: 1.7rem;position: relative;padding-bottom: 0">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KPZMBJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php 
	$logo = get_field('logo', 'option');  
	$header_button = get_field('header_button', 'option');
	?>
	<header id="main-nav" onscroll="stickyFunction()" style="padding: 0;">
		<a class="skip-link screen-reader-text" href="#top">Skip to content</a>
		<div class="top-header flex-row-stretch phone-wrap" style="border-bottom: 2px solid #D2D2D1;">
			<div class="lang-holder flex-row-stretch">
				<a href="<?php echo get_home_url( 1 ); ?>">
				<div id="english" class="lang-toggle flex-row-center" style="width: 150px;height: 60px;justify-content: center;box-sizing: border-box;-webkit-box-sizing: border-box;cursor: pointer;">English</div>
				</a>
				<a href="<?php echo get_home_url( 4 ); ?>/">
				<div id="espanol" class="lang-toggle flex-row-center" style="width: 150px;height: 60px;justify-content: center;box-sizing: border-box;-webkit-box-sizing: border-box;cursor: pointer;">Español</div>
				</a>
			</div>
			<div class="header-phone flex-row-center no-phones">
				<img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/phone-solid.svg" alt="Phone Icon" width="14" height="14" style="margin: 10px;" />
				<a class="phone" href="tel:<?php the_field('contact_phone_to_link', 'option'); ?>"><?php the_field('contact_phone', 'option'); ?></a>
			</div>
			<div class="flex-row-center no-phones" style="margin-left: auto;">
				<div id="header-search" style="margin-right: 40px;">
					<?php echo do_shortcode('[searchandfilter id="115"]'); ?>
				</div>
				<div id="client-login">
					<a href="https://cportal.cordelllaw.com/" class="flex-row-center" target="_blank">
					<?php if($blog_id == 1){ ?>
					<img class="login-icon" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/user-icon.svg" alt="Client Login" width="14" height="14" style="margin-right: 10px;" />
					<span class="no-sm-mobile">Client Login</span>
					<?php } elseif($blog_id == 4) { ?>
					<img class="login-icon" loading="lazy" src="<?php echo get_template_directory_uri(); ?>/images/user-icon.svg" alt="Iniciar sesión" width="14" height="14" style="margin-right: 10px;" />
					<span class="no-sm-mobile">Iniciar sesión</span>
					<?php } ?>
					</a>
				</div>
			</div>
		</div>
		<div class="header flex-row-center">
			<!-- LOGO-->
			<div class="logo">
				<a href="<?php echo site_url(); ?>">
						<?php
							if( !empty( $logo ) ): ?>
								<img style="max-width:100%;height: auto;" class="logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="300" height="75" />
						<?php endif; ?>
				</a>
			</div>
			<!-- MAIN NAV -->
			<nav class="main-nav no-print">
				<div class="dropdown">
 					
  					<div id="myDropdown" class="dropdown-content">
   						<div>
							<?php
								if ( has_nav_menu( 'mainNav' ) ) {
								  wp_nav_menu( array(
									'theme_location' => 'mainNav',
									'container'      => false,
									'menu_class'     => 'main-navigation',
									'walker'         => new Aria_Walker_Nav_Menu(),
									'items_wrap'     => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
								  ) );
								}
							  ?>
							
						</div>						
 					</div>
				</div>
			</nav>
			<!-- Header BUTTON -->
			<?php if($header_button) { ?>
			<div class="header-btn-holder no-print" style="margin-left: auto;">
				<a style="min-width: 180px;" class="button header-btn" href="<?php echo $header_button['url']; ?>" target="<?php echo $header_button['target']; ?>"> <?php echo $header_button['title']; ?></a>
			</div>
			<?php } ?>
			<!-- Mobile Menu BUTTON -->
			<!--
		    <div class="no-desktop no-print" style="margin:0 10px;">
				<button aria-label="Main Menu Toggle" onclick="menuFunction()" class="dropbtn" style="background: url(<?php echo get_template_directory_uri(); ?>/images/bars.svg) center no-repeat #fff;position: relative;width:25px;height:40px;"></button>
			</div>
			-->
			<button id="dropbtn" onclick="menuFunction()" class="hamburger hamburger--squeeze mobile-only" type="button">
			  <span class="hamburger-box">
				<span class="hamburger-inner"></span>
			  </span>
			</button>
		</div>

	</header>