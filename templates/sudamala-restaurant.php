<?php
/**
 *	sudamala-restaurant.php
 * 	Restaurant template
 *  Template Name: Sudamala Restaurant
 */
global $pinar_opt;
$price_unit = !empty($pinar_opt['pinar-booking-currency']) ? ravis_currency_converter($pinar_opt['pinar-booking-currency']) : '&#36;';

get_header();
echo '<div id="home-top-section">';
echo do_shortcode('[sudamala-page-slider image="'. get_field('slider_images').'"]' );
echo do_shortcode('[sudamala-availability-form]' );
echo '</div>';
?>
<div id="welcome" class="container bold">
	<?php
	if(!empty($pinar_opt['restaurant-welcome-title']))
	{
		echo '
			<div class="heading-box">
				<h2>'.esc_html($pinar_opt['restaurant-welcome-title']).'</h2>';
				if(!empty($pinar_opt['restaurant-welcome-subtitle']))
				{
					echo '<div class="subtitle">'.esc_html($pinar_opt['restaurant-welcome-subtitle']).'</div>';
				}
		echo '</div>';
	}
	?>

	<div class="inner-content justify">
		<?php
		if(!empty($pinar_opt['restaurant-welcome-banner']['url']))
		{
			/*echo '
			<div class="img-frame " data-parallax="scroll" data-image-src="'.esc_attr($pinar_opt['restaurant-welcome-banner']['url']).'">
			</div>';*/
			echo do_shortcode('[sudamala-image-frame image="'.esc_attr($pinar_opt['restaurant-welcome-banner']['url']).'"]');
		}

		if ( have_posts() ) {
			echo '<div class="desc">';
			while ( have_posts() ) {
				the_post();
				echo the_content();
			}
			echo '</div>';
		}
		?>
	</div>
</div>

<?php
if( get_field('gallery_images_link') ){
echo do_shortcode('[sudamala-grid-gallery link="'. get_field('gallery_images_link').'" caption="'. get_field('gallery_images_caption').'" class="sudamala-gallery no-hover"]' );}
?>

<div id="luxury-rooms" class="container art-space">

	<?php
	if(!empty($pinar_opt['restaurant-dishes-title']))
	{
		echo '
			<div class="heading-box">
				<h2>'.ravis_fn_title_effect(esc_html($pinar_opt['restaurant-dishes-title'])).'</h2>
			</div>
		';
	}
	?>
	<div class="room-container">

		<?php
		$dishes_i   = 1;
		foreach ($pinar_opt['restaurant-dishes-slides'] as $resaurant_dishes) {
			if($resaurant_dishes['title'] =='') continue;

			echo '
				<div class="room-boxes wow fade '.($dishes_i % 2 == 0 ? esc_attr('fadeInLeft right') :  'fadeInRight' ).'">
					<div class="img-container col-xs-6 col-md-7">
						<img src="'.esc_attr($resaurant_dishes['image']).'" alt="'.esc_attr($resaurant_dishes['title']).'" class="room-img">
					</div>
					<div class="room-details col-xs-6 col-md-5">
						<div class="title">'.esc_html($resaurant_dishes['title']).'</div>
						<div class="description">'.esc_html($resaurant_dishes['description']).'</div>';
					if(!empty($resaurant_dishes['url']))
					{
						echo '<div class="btn btn-default">'.esc_html($price_unit.$resaurant_dishes['url']).'</div>';
					}
				echo '</div>
				</div>
			';
			$dishes_i ++;
		}
		 ?>

	</div>
</div>

<?php
// Promo Section
$promo_bg       = (!empty($pinar_opt['restaurant-promo-background']['url']) ? $pinar_opt['restaurant-promo-background']['url'] : '');
$promo_title    = (!empty($pinar_opt['restaurant-promo-title']) ? $pinar_opt['restaurant-promo-title'] : '');
$promo_subtitle = (!empty($pinar_opt['restaurant-promo-subtitle']) ? $pinar_opt['restaurant-promo-subtitle'] : '');

if($promo_bg!='' && $promo_title!='')
{
	echo '
		<div id="great-taste" data-parallax="scroll" data-image-src="'.esc_attr($promo_bg).'">
			<h2>'.ravis_fn_title_effect(esc_html($promo_title)).'</h2>
			<h3>'.esc_html($promo_subtitle).'</h3>
		</div>';
}
?>

<div id="restaurant-menu" class="container">

	<?php
	if(!empty($pinar_opt['restaurant-menu-title']))
	{
		echo '
			<div class="heading-box">
				<h2>'.ravis_fn_title_effect(esc_html($pinar_opt['restaurant-menu-title'])).'</h2>';
			if(!empty($pinar_opt['restaurant-menu-subtitle']))
			{
				echo '<div class="subtitle">'.esc_html($pinar_opt['restaurant-menu-subtitle']).'</div>';
			}
		echo '</div>';
	}
	?>

	<div class="package-container clearfix">

		<div class="package-box wow fadeInUp col-md-4">
			<div class="package-inner">
				<div class="title"><?php esc_html_e('Breakfast', 'pinar') ?></div>
				<?php
				if(!empty($pinar_opt['restaurant-menu-breakfast-chef']))
				{
					echo '<div class="selection"><span>'.esc_html($pinar_opt['restaurant-menu-breakfast-chef']).'</span>'.esc_html__( 'Chef Selection', 'pinar' ).'</div>';
				}
				?>
				<div class="package-details">
					<ul>
						<?php
						foreach ($pinar_opt['restaurant-menu-breakfast'] as $menu_list) {
							$menu_list_parts = explode('---', $menu_list);
							if(!empty($menu_list_parts[0]))
							{
								echo '<li>'.esc_html($menu_list_parts[0]).(!empty($menu_list_parts[1]) ? ' <span>'.esc_html($price_unit.$menu_list_parts[1]).'</span>' : '').'</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="package-box wow fadeInUp col-md-4" data-wow-delay="0.5s">
			<div class="package-inner">
				<div class="title"><?php esc_html_e('Lunch', 'pinar') ?></div>
				<?php
				if(!empty($pinar_opt['restaurant-menu-lunch-chef']))
				{
					echo '<div class="selection"><span>'.esc_html($pinar_opt['restaurant-menu-lunch-chef']).'</span>'.esc_html__( 'Chef Selection', 'pinar' ).'</div>';
				}
				?>
 				<div class="package-details">
					<ul>
						<?php
						foreach ($pinar_opt['restaurant-menu-lunch'] as $menu_list) {
							$menu_list_parts = explode('---', $menu_list);
							if(!empty($menu_list_parts[0]))
							{
								echo '<li>'.esc_html($menu_list_parts[0]).(!empty($menu_list_parts[1]) ? ' <span>'.esc_html($price_unit.$menu_list_parts[1]).'</span>' : '').'</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>


		<div class="package-box wow fadeInUp col-md-4" data-wow-delay="1s">
			<div class="package-inner">
				<div class="title"><?php esc_html_e('Dinner', 'pinar') ?></div>
				<?php
				if(!empty($pinar_opt['restaurant-menu-dinner-chef']))
				{
					echo '<div class="selection"><span>'.esc_html($pinar_opt['restaurant-menu-dinner-chef']).'</span>'.esc_html__( 'Chef Selection', 'pinar' ).'</div>';
				}
 				?>
				<div class="package-details">
					<ul>
						<?php
						foreach ($pinar_opt['restaurant-menu-dinner'] as $menu_list) {
							$menu_list_parts = explode('---', $menu_list);
							if(!empty($menu_list_parts[0]))
							{
								echo '<li>'.esc_html($menu_list_parts[0]).(!empty($menu_list_parts[1]) ? ' <span>'.esc_html($price_unit.$menu_list_parts[1]).'</span>' : '').'</li>';
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
<p style="text-align: center;line-height: 30px;">
<?php  the_field('restaurant_contact') ?>
</p>

<?php //echo do_shortcode('[pinar-service-slider]'); ?>
<?php //echo do_shortcode('[sudamala-service-slider]'); ?>
<?php
get_footer();
