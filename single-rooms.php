<?php 
// archive-rooms.php
// Room Archive

global $post, $pinar_opt;
get_header();

$price_unit = !empty($pinar_opt['pinar-booking-currency']) ? ravis_currency_converter($pinar_opt['pinar-booking-currency']) : '&#36;';
while ( have_posts() ) 
{
	the_post();	
	$post_id       = get_the_id();
	$rooms_price   = get_post_meta( $post_id, 'rooms_price', true );
	$room_imgs_id  = explode( ',' , get_post_meta( $post_id, 'rooms_slideshow_images', true ));
	
	$features_list = '';
	$room_services = get_post_meta( $post_id, 'rooms_services_checkboxes',true);
	foreach ($room_services as $room_service) {
        $service_post   = get_post($room_service);
        if(!empty($service_post->post_title))
        {
     		$features_list .= '<li><i class="fa fa-check"></i>'.esc_html($service_post->post_title).'</li>';   	
        }
    }   
    $rooms_max_guest = get_post_meta($post_id, 'rooms_max_guest', true);
	$rooms_room_size = get_post_meta($post_id, 'rooms_room_size', true);
	$rooms_room_view = get_post_meta($post_id, 'rooms_room_view', true);
	if(!empty($rooms_max_guest))
	{
		$features_list .= '<li><i class="fa fa-check"></i>'.sprintf(esc_html__('Max %s people', 'pinar'), $rooms_max_guest).'</li>';
	}
	if(!empty($rooms_room_size))
	{
		$features_list .= '<li><i class="fa fa-check"></i>'.sprintf(esc_html__('Room Size : %s sqf', 'pinar'), $rooms_room_size).'</li>';
	}
	if(!empty($rooms_room_view))
	{
		$features_list .= '<li><i class="fa fa-check"></i>'.sprintf(esc_html__('View: %s', 'pinar'), $rooms_room_view).'</li>';
	}

?>
	<div class="room-detail-page">

		<div id="room-details-slider">
			<?php 
			foreach ($room_imgs_id as $room_img_id) {
				if(empty($room_img_id)) continue;
				echo '
					<div class="items vh_height100 vw_width100">
			            '.wp_get_attachment_image( $room_img_id, 'full' ).'
			        </div>
				';
			}

			?>
	    </div>
<?php $page_title= get_the_title(); ?>
<div class="heading-box slider-title"><h2><?php echo ''.$page_title; ?></h2></div>
	    <div class="booking-title-box">
	    	<div class="booking-title-box-inner container bold">
				<div class="heading-box">
					<h2><?php echo ravis_fn_title_effect(esc_html(get_the_title( ))); ?></h2>
					<div class="subtitle price"><?php echo esc_html($price_unit.number_format($rooms_price) ); ?> <span>- <?php esc_html_e( 'Per Night', 'pinar' ); ?></span></div>
				</div>
 				<?php echo do_shortcode('[sudamala-availability-form type="horizontal"]' ); ?>
	        </div>
	    </div>
	    <div class="room-details container">
	    	<div class="description"><?php the_content(); ?></div>
	    	<ul class="services list-inline">
	    		<?php echo balancetags($features_list ); ?>
			</ul>
	    </div>
	</div>
	<?php echo do_shortcode('[sudamala-other-rooms-nav]' ); ?>
<?php 
} 
get_footer();