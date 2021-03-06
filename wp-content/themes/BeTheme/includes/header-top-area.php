<?php $translate['wpml-no'] = mfn_opts_get('translate') ? mfn_opts_get('translate-wpml-no','No translations available for this page') : __('No translations available for this page','betheme'); ?>

<?php if( mfn_opts_get('action-bar')): ?>
	<div id="Action_bar">
		<div class="container">
			<div class="column one">
			
				<ul class="contact_details">
					<?php
						if( $header_slogan = mfn_opts_get( 'header-slogan' ) ){
							echo '<li class="slogan">'. $header_slogan .'</li>';
						}
						if( $header_phone = mfn_opts_get( 'header-phone' ) ){
							echo '<li class="phone"><i class="icon-phone"></i><a href="tel:'. str_replace(' ', '', $header_phone) .'">'. $header_phone .'</a></li>';
						}					
						if( $header_phone_2 = mfn_opts_get( 'header-phone-2' ) ){
							echo '<li class="phone"><i class="icon-phone"></i><a href="tel:'. str_replace(' ', '', $header_phone_2) .'">'. $header_phone_2 .'</a></li>';
						}					
						if( $header_email = mfn_opts_get( 'header-email' ) ){
							echo '<li class="mail"><i class="icon-mail-line"></i><a href="mailto:'. $header_email .'">'. $header_email .'</a></li>';
						}
					?>
				</ul>
				
				<?php 
					if( has_nav_menu( 'social-menu' ) ){

						// #social-menu
						mfn_wp_social_menu();

					} else {

						$target = mfn_opts_get('social-target') ? 'target="_blank"' : false;
						
						echo '<ul class="social">';
							if( mfn_opts_get('social-skype') ) echo '<li class="skype"><a '.$target.' href="'. mfn_opts_get('social-skype') .'" title="Skype"><i class="icon-skype"></i></a></li>';
							if( mfn_opts_get('social-facebook') ) echo '<li class="facebook"><a '.$target.' href="'. mfn_opts_get('social-facebook') .'" title="Facebook"><i class="icon-facebook"></i></a></li>';
							if( mfn_opts_get('social-googleplus') ) echo '<li class="googleplus"><a '.$target.' href="'. mfn_opts_get('social-googleplus') .'" title="Google+"><i class="icon-gplus"></i></a></li>';
							if( mfn_opts_get('social-twitter') ) echo '<li class="twitter"><a '.$target.' href="'. mfn_opts_get('social-twitter') .'" title="Twitter"><i class="icon-twitter"></i></a></li>';
							if( mfn_opts_get('social-vimeo') ) echo '<li class="vimeo"><a '.$target.' href="'. mfn_opts_get('social-vimeo') .'" title="Vimeo"><i class="icon-vimeo"></i></a></li>';
							if( mfn_opts_get('social-youtube') ) echo '<li class="youtube"><a '.$target.' href="'. mfn_opts_get('social-youtube') .'" title="YouTube"><i class="icon-play"></i></a></li>';						
							if( mfn_opts_get('social-flickr') ) echo '<li class="flickr"><a '.$target.' href="'. mfn_opts_get('social-flickr') .'" title="Flickr"><i class="icon-flickr"></i></a></li>';
							if( mfn_opts_get('social-linkedin') ) echo '<li class="linkedin"><a '.$target.' href="'. mfn_opts_get('social-linkedin') .'" title="LinkedIn"><i class="icon-linkedin"></i></a></li>';
							if( mfn_opts_get('social-pinterest') ) echo '<li class="pinterest"><a '.$target.' href="'. mfn_opts_get('social-pinterest') .'" title="Pinterest"><i class="icon-pinterest"></i></a></li>';
							if( mfn_opts_get('social-dribbble') ) echo '<li class="dribbble"><a '.$target.' href="'. mfn_opts_get('social-dribbble') .'" title="Dribbble"><i class="icon-dribbble"></i></a></li>';
							if( mfn_opts_get('social-instagram') ) echo '<li class="instagram"><a '.$target.' href="'. mfn_opts_get('social-instagram') .'" title="Instagram"><i class="icon-instagram"></i></a></li>';
							if( mfn_opts_get('social-behance') ) echo '<li class="behance"><a '.$target.' href="'. mfn_opts_get('social-behance') .'" title="Behance"><i class="icon-behance"></i></a></li>';
							if( mfn_opts_get('social-vkontakte') ) echo '<li class="vkontakte"><a '.$target.' href="'. mfn_opts_get('social-vkontakte') .'" title="VKontakte"><i class="icon-vkontakte"></i></a></li>';
							if( mfn_opts_get('social-viadeo') ) echo '<li class="viadeo"><a '.$target.' href="'. mfn_opts_get('social-viadeo') .'" title="Viadeo"><i class="icon-viadeo"></i></a></li>';
							if( mfn_opts_get('social-rss') ) echo '<li class="rss"><a '.$target.' href="'. get_bloginfo('rss2_url') .'" title="RSS"><i class="icon-rss"></i></a></li>';
						echo '</ul>';
				
					}
				?>

			</div>
		</div>
	</div>
<?php endif; ?>

<?php 
	if( mfn_header_style( true ) == 'header-overlay' ){
		
		// Overlay ----------
		echo '<div id="Overlay">';
			mfn_wp_overlay_menu();
		echo '</div>';
		
		// Button ----------
		echo '<a class="overlay-menu-toggle" href="#">';
			echo '<i class="open icon-menu"></i>';
			echo '<i class="close icon-cancel"></i>';
		echo '</a>';
		
	}
?>

<!-- .header_placeholder 4sticky  -->
<div class="header_placeholder"></div>

<div id="Top_bar">

	<div class="container">
		<div class="column one">
		
			<div class="top_bar_left clearfix">
			
				<!-- .logo -->
				<div class="logo<?php if( $textlogo = mfn_opts_get('logo-text') ) echo ' text-logo'; ?>">
					<?php 
						// Logo | Options
						$logo_options = mfn_opts_get( 'logo-link' ) ? mfn_opts_get( 'logo-link' ) : false;
						$logo_before = $logo_after = '';

						// Logo | Link
						if( isset( $logo_options['link'] ) ){
							$logo_before 	= '<a id="logo" href="'. get_home_url() .'" title="'. get_bloginfo( 'name' ) .'">';
							$logo_after 	= '</a>';
						} else {
							$logo_before 	= '<span id="logo">';
							$logo_after 	= '</span>';
						}
						
						// Logo | H1
						if( is_front_page() ){
							if( is_array( $logo_options ) && isset( $logo_options['h1-home'] )){
								$logo_before = '<h1>'. $logo_before;
								$logo_after .= '</h1>';
							}
						} else {
							if( is_array( $logo_options ) && isset( $logo_options['h1-all'] )){
								$logo_before = '<h1>'. $logo_before;
								$logo_after .= '</h1>';
							}
						}
						
						// Logo | Source
						if( $_GET && key_exists('mfn-l', $_GET) ){	// demo
						
							$logo_src 		= THEME_URI .'/images/logo/'. $_GET['mfn-l'] .'.png';
							$logo_sticky	= THEME_URI .'/images/logo/'. $_GET['mfn-l'] .'.png';
						
						} elseif( $layoutID = mfn_layout_ID() ){
						
							$logo_src 		= get_post_meta( $layoutID, 'mfn-post-logo-img', true );
							$logo_sticky 	= get_post_meta( $layoutID, 'mfn-post-logo-img', true );
						
						} else {
						
							$logo_src 		= mfn_opts_get( 'logo-img', THEME_URI .'/images/logo/logo.png' );
							$logo_sticky 	= mfn_opts_get( 'sticky-logo-img' ) ? mfn_opts_get( 'sticky-logo-img' ) : $logo_src;
						
						}
						
						// Logo | Print
						echo $logo_before;

							if( $textlogo ){
								
								echo $textlogo;
								
							} else {
								
								echo '<img class="logo-main   scale-with-grid" src="'. $logo_src .'" 	alt="'. get_bloginfo( 'name' ) .'" />';
								echo '<img class="logo-sticky scale-with-grid" src="'. $logo_sticky .'" alt="" />';
								
							}
							
						echo $logo_after;
					?>
				</div>
			
				<div class="menu_wrapper">
					<?php 
						if( ( mfn_header_style( true ) != 'header-overlay' ) && ( mfn_opts_get( 'menu-style' ) != 'hide' ) ){
	
							// TODO: modify the mfn_header_style() function to be able to find the text 'header-split' in headers array
							
							// #menu --------------------------
							if( in_array( mfn_header_style(), array('header-split','header-below header-split') ) ){
								// split -------
								mfn_wp_split_menu();
							} else {
								// default -----
								mfn_wp_nav_menu();
							}
						
							// responsive menu button ---------
							$mb_class = '';
							if( mfn_opts_get('header-menu-mobile-sticky') ) $mb_class .= ' is-sticky';

							echo '<a class="responsive-menu-toggle '. $mb_class .'" href="#">';
								if( $menu_text = mfn_opts_get( 'header-menu-text' ) ){
									echo '<span>'. $menu_text .'</span>';
								} else {
									echo '<i class="icon-menu"></i>';
								}  
							echo '</a>';
							
						}
					?>					
				</div>			
				
				<div class="secondary_menu_wrapper">
					<!-- #secondary-menu -->
					<?php mfn_wp_secondary_menu(); ?>
				</div>
				
				<div class="banner_wrapper">
					<?php mfn_opts_show( 'header-banner' ); ?>
				</div>
				
				<div class="search_wrapper">
					<!-- #searchform -->
					<?php $translate['search-placeholder'] = mfn_opts_get('translate') ? mfn_opts_get('translate-search-placeholder','Enter your search') : __('Enter your search','betheme'); ?>
					<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if( mfn_opts_get('header-search') == 'shop' ): ?>
							<input type="hidden" name="post_type" value="product" />
						<?php endif;?>
						<i class="icon_search icon-search"></i>
						<a href="#" class="icon_close"><i class="icon-cancel"></i></a>
						<input type="text" class="field" name="s" id="s" placeholder="<?php echo $translate['search-placeholder']; ?>" />			
						<input type="submit" class="submit" value="" style="display:none;" />
					</form>
				</div>				
				
			</div>
			
			<?php
				global $woocommerce;
				$show_cart = mfn_opts_get( 'shop-cart' );
				if( $show_cart == 1 ) $show_cart = 'icon-basket'; // Be < 4.9 compatibility
				
				$has_cart = ( $woocommerce && $show_cart ) ? true : false;
				$header_search			= mfn_opts_get( 'header-search' );
				$header_action_link		= mfn_opts_get( 'header-action-link' );
			
				if( $has_cart || $header_search || function_exists( 'icl_get_languages' ) || $header_action_link ){
					echo '<div class="top_bar_right">';
						echo '<div class="top_bar_right_wrapper">';
						
							// WooCommerce Cart
							if( $has_cart ){
								echo '<a id="header_cart" href="'. $woocommerce->cart->get_cart_url() .'"><i class="'. $show_cart .'"></i><span>'. $woocommerce->cart->cart_contents_count .'</span></a>';
							}
							
							// Search Icon
							if( $header_search ){
								echo '<a id="search_button" href="#"><i class="icon-search"></i></a>';
							}
							
							// Languages menu
							if( has_nav_menu( 'lang-menu' ) ){

								// Custom Languages Menu
								echo '<div class="wpml-languages custom">';
									echo '<a class="active" href="#">'. mfn_get_menu_name( 'lang-menu' ) .'<i class="icon-down-open-mini"></i></a>';
									mfn_wp_lang_menu();
								echo '</div>';
								
							} elseif( function_exists( 'icl_get_languages' ) ){

								// WPML - Custom Languages Menu
								$languages	= icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
								$wmpl_flags = mfn_opts_get('header-wpml');
								
								if( is_array( $languages ) ){
									
									if( ! $wmpl_flags ){
										// dropdown ------------
										
										$active_lang = false;
										foreach( $languages as $lang_k=>$lang ){
											if( $lang['active'] ){
												$active_lang = $lang;
												unset( $languages[$lang_k] );
											}
										}
			
										// disabled
										if( count( $languages ) ){
											$lang_status = 'enabled';
										} else {
											$lang_status = 'disabled';
										}
										
										if( $active_lang ){
											echo '<div class="wpml-languages '. $lang_status .'">';
											
												echo '<a class="active tooltip" href="'. $active_lang['url'] .'" ontouchstart="this.classList.toggle(\'hover\');" data-tooltip="'. $translate['wpml-no'] .'">';
													echo '<img src="'. $active_lang['country_flag_url'] .'" alt="'. $active_lang['translated_name'] .'"/>';
													if( count( $languages ) ) echo '<i class="icon-down-open-mini"></i>';
												echo '</a>';
												
												if( count( $languages ) ){
													echo '<ul class="wpml-lang-dropdown">';
														foreach( $languages as $lang ){
															echo '<li><a href="'. $lang['url'] .'"><img src="'. $lang['country_flag_url'] .'" alt="'. $lang['translated_name'] .'"/></a></li>';
														}
													echo '</ul>';
												}
												
											echo '</div>';
										}
										
									} elseif( $wmpl_flags == 'horizontal' ) {
										// horizontal ------------
										
										echo '<div class="wpml-languages horizontal">';
											echo '<ul>';
												foreach( $languages as $lang ){
													echo '<li><a href="'. $lang['url'] .'"><img src="'. $lang['country_flag_url'] .'" alt="'. $lang['translated_name'] .'"/></a></li>';
												}
											echo '</ul>';
										echo '</div>';
										
									}
									
								}
	
							}

							// Action Button
							if( $header_action_link ){
								
								$header_action_options = mfn_opts_get( 'header-action-target' );
								$action_target = $action_class = false;
								
								// Action | Target
								if( isset( $header_action_options['target'] ) ) $action_target = 'target="_blank"';
								
								// Action | Scroll
								if( is_array( $header_action_options ) && isset( $header_action_options['scroll'] ) ) $action_class = 'scroll';
								
								echo '<a href="'. $header_action_link .'" class="button button_theme button_js action_button '. $action_class .'" '. $action_target .'><span class="button_label">'. mfn_opts_get( 'header-action-title' ) .'</span></a>';
							}
										
						echo '</div>';
					echo '</div>';
				}
			?>
			
		</div>
	</div>
</div>