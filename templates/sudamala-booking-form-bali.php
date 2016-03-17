<?php
/**
 *	sudamala-booking-form-bali.php
 * 	Sudamala Booking Form Bali template
 *  Template Name: Sudamala Booking Form Bali
 */
global $pinar_opt;
global $post;

get_header();

echo '<div id="home-top-section">';
echo do_shortcode('[sudamala-page-slider image="'. get_field('slider_images').'"]' );
echo '</div>';

$get_url = '';
$get_url_choice = '';
$type = '';
$choice = '';

if(isset($_GET['type']))
{
	$get_url = $_GET['type'];
	if($get_url == "dining")
	{
		$type = "Dining";
	}
	elseif ($get_url == "accomodation")
	{
		$type = "Accomodation";
		$choice = 1;
	}
	elseif ($get_url == "spa")
	{
		$type = "Spa Indulgence";
	}
}

if($type == "Spa Indulgence")
{
	if(isset($_GET['choice']))
	{
		$get_url_choice = $_GET['choice'];
		$choice = ' - '. str_replace('-',' ', $get_url_choice);
	}
}
?>

<input type="hidden" id="type" value="<?php echo $type; ?>">
<input type="hidden" id="choice" value="<?php echo $get_url_choice; ?>">
<div class="container main-page-container">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  <img src="<?php echo $image[0]; ?>" class="center-block">
		<?php endif; ?>

		<h2 align="center">RESERVATION ENQUIRY FORM</h2>
		<h3 align="center"><strong><?php echo strtoupper($type).strtoupper($choice); ?></strong></h3>
		<hr>
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
</div>

<?php
get_footer();
?>

<script type="text/javascript">
	var type = jQuery('#type').val();
	var choice = jQuery('#choice').val();

	var accomodation = jQuery('.accomodation');
	var spa = jQuery('.spa');
	var sudajiva = jQuery('#sudajiva-with-love');
	var creambath = jQuery('#hair-creambath');
	var room_bath = jQuery('#in-room-bath');
	var dining = jQuery('.dining');
	var diningSpa = jQuery('.dining-spa');

	jQuery(document).ready(function(){

		accomodation.hide();
		spa.hide();
		sudajiva.hide();
		creambath.hide();
		room_bath.hide();
		dining.hide();
		diningSpa.hide();

		if(type != null || type != '')
		{
			jQuery('input[type=radio][value="'+ type +'"]').prop('checked', true);
			checkTypeStart();
		}

		checkType();
	});

	function checkChoiceFromSpa()
	{
		if(choice == "nyepi-escape")
		{
			sudajiva.show(500);
		}
		else if(choice == "traditional-hair-creambath")
		{
			creambath.show(500);
		}
		else if(choice == "in-room-bath")
		{
			room_bath.show(500)
		}
		else if(choice == "your-own-spa-experience")
		{
			spa.show(500);
			sudajiva.hide(500);
			creambath.hide(500);
			room_bath.hide(500);
		}
	}

	function checkTypeStart()
	{
		 if (type == 'Dining')
	        {
	            accomodation.hide(500);
							spa.hide(500);
							sudajiva.hide();
							creambath.hide();
							room_bath.hide();
							dining.show(500);
							diningSpa.show(500);
	        }
	        else if (type == 'Accomodation')
	        {
	        	choice = 1;

	            accomodation.show(500);
							spa.hide(500);
							sudajiva.hide();
							creambath.hide();
							room_bath.hide();
							dining.hide(500);
							diningSpa.hide(500);

				jQuery('#accomodation-choice option')[choice].selected = true;
	        }
	        else if(type == 'Spa Indulgence')
	        {
	        	accomodation.hide(500);
	        	spa.show(500);
				dining.hide(500);
				diningSpa.show(500);

				checkChoiceFromSpa();
	        }
	}

	function checkType()
	{
		jQuery('input[type=radio][name=type]').change(function() {
	        if (this.value == 'Dining')
	        {
	            accomodation.hide(500);
				spa.hide(500);
				sudajiva.hide();
				creambath.hide();
				room_bath.hide();
				dining.show(500);
				diningSpa.show(500);
	        }
	        else if (this.value == 'Accomodation')
	        {
	        	choice = 1;

	            accomodation.show(500);
							spa.hide(500);
							sudajiva.hide();
							creambath.hide();
							room_bath.hide();
							dining.hide(500);
							diningSpa.hide(500);

				jQuery('#accomodation-choice option')[choice].selected = true;

				choice = 0;
	        }
	        else if(this.value == 'Spa Indulgence')
	        {
	        	accomodation.hide(500);
						spa.show(500);
						sudajiva.show(500);
						creambath.hide();
						room_bath.hide();
						dining.hide(500);
						diningSpa.show(500);
	        }
	    });
	}
</script>
