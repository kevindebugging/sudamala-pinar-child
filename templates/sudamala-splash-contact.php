<?php
/**
 *	sudamala-splash-contact.php
 * 	Sudamala Splash Contacttemplate
 *  Template Name: Sudamala Splash Contact
 */
global $pinar_opt;
get_header();
?>
<div id="map"></div>
<div class="contact-page-container container">
	<!-- Contact Info -->
	<div class="contact-info-main-box clearfix">
		<div class="contact-info-inner clearfix">
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-envelope-o"></i><div class="info"><?php echo esc_html( $pinar_opt['opt-hotel-email'] ); ?></div>
				</div>
			</div>
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-phone"></i><div class="info"><?php echo $pinar_opt['opt-hotel-phone']; ?></div>
				</div>
			</div>
			<div class="contact-info-box col-md-4">
				<div class="inner-content">
					<i class="fa fa-map-marker "></i><div class="info"><?php echo $pinar_opt['opt-hotel-address']; ?></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->
		<div class="contact-form-container">
			<div class="title"><?php echo ravis_fn_title_effect(esc_html__('How to contact', 'pinar') ); ?></div>

			<div class="contact-form-box col-md-8">
				<?php
					if(have_posts())
					{
						while (have_posts()) {
							the_post();
							the_content();
						}
					}
				?>

			</div>
			<div class="how-contact col-md-4">
				<h3>Get In Touch</h3>
				<ul class="contact-social-icon">
				<li><a href="<?php the_field('facebook'); ?>" target="_blank"><i class="fa fa-facebook fa-fw"></i> Facebook</a></li>
				<li><a href="<?php the_field('tripadvisor'); ?>" target="_blank"><i class="fa fa-tripadvisor fa-fw"></i> TripAdvisor</a></li>
				<li><a href="<?php the_field('instagram'); ?>" target="_blank"><i class="fa fa-instagram fa-fw"></i> Instagram</a></li>
</ul>
			</div>
		</div>
</div>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	"use strict";
    function initialize() {
        var lat = "<?php echo esc_js( $pinar_opt['opt-map-lat'] ); ?>";
        var lng = "<?php echo esc_js( $pinar_opt['opt-map-lng'] ); ?>";
        var latSanur = parseFloat( lat.split('_')[0] );
        var lngSanur = parseFloat( lng.split('_')[0] );
        var latLombok = parseFloat( lat.split('_')[1] );
        var lngLombok = parseFloat( lng.split('_')[1] );
        var myLatLngSanur = new google.maps.LatLng(latSanur, lngSanur);
        var myLatLngLombok = new google.maps.LatLng(latLombok, lngLombok);
        var centerMap = new google.maps.LatLng(-8.5733185, 115.6925643);
        var mapOptions = {
            zoom: 9,
            center: centerMap,
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"off"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],

            // Extra options
            scrollwheel: false,
            mapTypeControl: false,
            panControl: false,
            zoomControlOptions: {
                style   : google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        }
        var map = new google.maps.Map(document.getElementById('map'),mapOptions);

        var image = '<?php echo esc_js( PINAR_IMG_PATH ); ?>marker2.png';

        var myLatLng = [myLatLngSanur, myLatLngLombok];

        for (var i = 0; i < myLatLng.length; i++) {
          var marker = new google.maps.Marker({
              position: myLatLng[i],
              map: map,
              icon: image
          });
        }

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php
get_footer();
