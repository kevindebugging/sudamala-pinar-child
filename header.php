<?php
/**
 * Header.php
 * The header section of the theme
 */
global $pinar_opt;

$page_meta_id    = (get_post_meta( get_the_id() , 'pinar_page_id', true ) ? get_post_meta( get_the_id() , 'pinar_page_id', true ) : '');
$page_meta_class = (get_post_meta( get_the_id() , 'pinar_page_class', true ) ? get_post_meta( get_the_id() , 'pinar_page_class', true ) : '');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php esc_attr( bloginfo( 'charset' ) ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">

	<?php
    if(isset($pinar_opt['opt-custom-css']) && $pinar_opt['opt-custom-css'] !=='')
    {
        echo '
            <style type="text/css">
                '.esc_html( $pinar_opt["opt-custom-css"] ).'
            </style>
        ';
    }
    wp_head();
    ?>
</head>
<body <?php
		if(!empty($page_meta_id)) echo ' id="'.$page_meta_id.'"';
        $pinar_body_class =
        	( isset($pinar_opt['opt-sticky-header']) && $pinar_opt['opt-sticky-header'] =='1'  ? esc_attr( ' sticky ' ) : '' )
        	.( (!empty($pinar_opt['opt-layout']) && $pinar_opt['opt-layout'] == '2') ? ' boxed ' : '')
        	.( (!empty($pinar_opt['opt-pattern'])) ? ' pattern-'.$pinar_opt['opt-pattern'].' ' : '')
        	.( is_singular('rooms' ) ? esc_attr(' room-details ') : '')
        	.( is_post_type_archive('guest_book') ? ' guest-book ' : '')
        	.( is_page_template( 'templates/booking.php' ) ? ' booking-page ' : '')
            .( isset($pinar_opt['opt-trans-header']) && $pinar_opt['opt-trans-header'] =='1'  ? esc_attr( ' trans-header ' ) : '' )
            .( !is_page_template('templates/home-page.php') && !is_page_template('templates/splash-page.php')  ? esc_attr( ' internal-pages ' ) : '' )
            .' '.$page_meta_class;
        body_class($pinar_body_class);
    ?>
>
	<div id="main-wrapper">
		<?php
		if ( ! is_page_template( 'templates/home-page-alt.php' ))
		{
		?>
		<!-- Top Header -->
		<?php
			$blog_id = get_current_blog_id();

			if($blog_id != 1){
		?>
		<div id="top-header">
			<div class="inner-container <?php echo !is_page_template('templates/home-page-fullscreen.php') ? 'container' : ''; ?>">
				<!-- Contact Info -->
				<ul class="contact-info list-inline" style="color: #50ACE7;">
					<?php
					/*if(isset($pinar_opt['opt-hotel-email']) && $pinar_opt['opt-hotel-email'] !=='')
	    			{
						echo '<li><i class="fa fa-envelope-o"></i>'.esc_html($pinar_opt['opt-hotel-email']).'</li>';

					}
					if(isset($pinar_opt['opt-hotel-phone']) && $pinar_opt['opt-hotel-phone'] !=='')
	    			{
						echo '<li><i class="fa fa-phone"></i>'.esc_html($pinar_opt['opt-hotel-phone']).'</li>';
					}*/
					?>
					<li><?php if($blog_id != 2) {echo '<a href="/bali/">';} ?>BALI<?php if($blog_id != 2) {echo '</a>';} ?></li>
					<li><?php if($blog_id != 4) {echo '<a href="/lombok/">';} ?>LOMBOK<?php if($blog_id != 4) {echo '</a>';} ?></li>
					<li style="color: white;"><?php if($blog_id != 5) {echo '<!--<a href="/komodo/">-->';} ?>KOMODO - Coming Soon<?php if($blog_id != 5) {echo '</a>';} ?></li>
				</ul>
				<?php
				if(shortcode_exists( 'icl_language_selector' ))
	            {
	                do_shortcode( 'icl_language_selector' );
	            }
	            else
	            {
	                /*echo '
	                    <!-- Language Switcher -->
			            <select id="language-switcher">
			                <option value="1">'.esc_html__( 'English', 'pinar' ).'</option>
			                    <option value="2">'.esc_html__( 'Arabic', 'pinar' ).'</option>
			            </select>
			            <!-- End of Language Switcher -->
	                ';    */
	            }
				?>
			</div>
		</div>
			<?php  } ?>
		<!-- End of Top Header -->
		<?php
		}
		?>
		<!-- Main Header -->
		<header id="main-header">
			<div class="inner-container <?php echo !is_page_template('templates/home-page-fullscreen.php') ? 'container' : ''; ?>">
				<div class="left-sec col-sm-4 <?php echo !is_page_template('templates/home-page-fullscreen.php') ? 'col-md-2' : 'col-md-3'; ?> clearfix">
					<!-- Top Logo -->
					<a href="/" id="top-logo" <?php echo ( (isset($pinar_opt['logo-image-normal']) && $pinar_opt['logo-image-normal']['url']!='') ? 'class="logo-img"' : '');  ?>>
						<?php
							if(isset($pinar_opt['logo-image-normal']) && $pinar_opt['logo-image-normal']['url']!='')
							{
								echo '<img src="'.esc_attr($pinar_opt['logo-image-normal']['url']).'" alt="'.esc_attr($pinar_opt['opt-hotel-name']).'">';
							}
							else
							{
							?>
								<span class="title"><span><?php echo esc_html($pinar_opt['opt-hotel-name']); ?></span> <?php esc_html_e( 'Hotel', 'pinar' ); ?></span>
								<?php
								$hotel_stars = (isset($pinar_opt['opt-hotel-stars']) && $pinar_opt['opt-hotel-stars']!='' ? intval($pinar_opt['opt-hotel-stars']) : 5);
								for ($i=0; $i < $hotel_stars; $i++) {
									echo '<i class="fa fa-star-o"></i>';
								}
							}
						?>
					</a>
				</div>
				<div class="right-sec col-sm-8 <?php echo !is_page_template('templates/home-page-fullscreen.php') ? 'col-md-10' : 'col-md-9'; ?> clearfix">
					<!-- Book Now -->
					<!--<a href="<?php echo esc_url( RAVIS_BOOKING_PAGE_URL ) ?>" class="book-now-btn btn btn-default btn-sm btn-out-border"><?php esc_html_e( 'Book Now', 'pinar' ); ?></a>-->

					<!-- Main Menu -->
					<div class="menu-container">
						<?php
	                    $menu_arg = array(
	                        'theme_location'  => 'top-menu',
	                        'container'       => 'nav',
	                        'container_id'    => 'main-menu',
	                        'menu_class'      => 'main-menu list-inline',
	                    );
	                    wp_nav_menu( $menu_arg );
	                    ?>
	                </div>

					<!-- Menu Handel -->
					<div id="main-menu-handle" class="hidden-md hidden-lg"><i class="fa fa-bars"></i></div>
				</div>
			</div>
			<div id="mobile-menu-container" class="hidden-md hidden-lg"></div>
		</header>
		<!-- End of Main Header -->

		<?php

		if ( ! is_page_template( 'templates/home-page.php' ) && ! is_page_template( 'templates/home-page-alt.php' ) && ! is_page_template( 'templates/gallery-fullscreen.php' ) && !is_singular('rooms' ) && ! is_page_template( 'templates/contact-alt.php' )  && ! is_page_template( 'templates/home-page-fullscreen.php' ) && ! is_page_template( 'templates/splash-page.php' ) && ! is_page_template( 'templates/sudamala-contact-alt.php' )  && ! is_page_template( 'templates/sudamala-default.php' ) && ! is_page_template( 'templates/sudamala-diving.php' ) && ! is_page_template( 'templates/sudamala-restaurant.php' ) && ! is_page_template( 'templates/sudamala-gallery-grid.php' ) && ! is_page_template( 'templates/sudamala-booking-form-bali.php' ) && ! is_page_template( 'templates/sudamala-booking-form-lombok.php' ) && ! is_page_template( 'templates/sudamala-sudajiva-booking.php' ) && ! is_page_template( 'templates/sudamala-mango-tree-spa-booking.php' ) && ! is_page_template( 'templates/sudamala-splash-contact.php' ))
		{
			$main_page_title       = explode(' | ', wp_title( " | ", false, "right" ));

			echo '
			<!-- Internal Page Header -->
			<div class="internal-page-title about-page" data-parallax="scroll" data-image-src="'.esc_attr( ravis_fn_breadcrumb_bg( get_the_id() ) ).'">
				<h1>'.balancetags(ravis_fn_title_effect($main_page_title[0])).'</h1>';

				if(function_exists('ravis_fn_breadcrumbs'))
		        {
		            ravis_fn_breadcrumbs();
		        }
	        echo '</div>
			<!-- End of Internal Page Header -->';
		}
