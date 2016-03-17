<?php
/**
 *	sudamala-booking-form-lombok.php
 * 	Sudamala Booking Form Lombok template
 *  Template Name: Sudamala Booking Form Lombok
 */
global $pinar_opt;
get_header();

echo '<div id="home-top-section">';
echo do_shortcode('[sudamala-page-slider image="'. get_field('slider_images').'"]' );
echo '</div>';

$get_url = '';
$get_url_choice = '';
$type = '';
$choice = 0;
$choice1 = '';

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

if($type == "Dining")
{
	if(isset($_GET['choice']))
	{
		$get_url_choice = $_GET['choice'];
		$choice1 = ' - '. str_replace('-',' ', $get_url_choice);
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
	var romantic = jQuery('#romantic');
	var quartet = jQuery('#quartet');
	var diningSpa = jQuery('.dining-spa');

	jQuery(document).ready(function(){

		accomodation.hide();
		spa.hide();
		romantic.hide();
		quartet.hide();
		diningSpa.hide();

		if(type != null || type != '')
		{
			jQuery('input[type=radio][value="'+ type +'"]').prop('checked', true);
			checkTypeStart();
		}

		checkType();
	});

	function checkDiningChoice()
	{
		if(choice == "romantic-dinner")
		{
			romantic.show(500);
			quartet.hide(500);
		}
		else if(choice == "dinner-with-quartet-entertainment")
		{
			romantic.hide(500);
			quartet.show(500);
			jQuery('#dining-choice option')[1].selected = true;
		}
	}

	function checkTypeStart()
	{
		 if (type == 'Dining')
	        {
	            accomodation.hide(500);
				spa.hide(500);
				diningSpa.show(500);

				checkDiningChoice();
	        }
	        else if (type == 'Accomodation')
	        {
						choice = 1;
	            accomodation.show(500);
							jQuery('#accomodation-choice option')[choice].selected = true;
							spa.hide(500);
							dining.hide(500);
							diningSpa.hide(500);
	        }
	        else if(type == 'Spa Indulgence')
	        {
	        	accomodation.hide(500);
						spa.show(500);
						dining.hide(500);
						diningSpa.show(500);
	        }
	}

	function checkType()
	{
		jQuery('input[type=radio][name=type]').change(function() {
	        if (this.value == 'Dining')
	        {
	            accomodation.hide(500);
							spa.hide(500);
							diningSpa.show(500);

							checkDiningChoice();
	        }
	        else if (this.value == 'Accomodation')
	        {
							choice = 1;
	            accomodation.show(500);
							jQuery('#accomodation-choice option')[choice].selected = true;
							spa.hide(500);
							dining.hide(500);
							diningSpa.hide(500);

	        }
	        else if(this.value == 'Spa Indulgence')
	        {
	        	accomodation.hide(500);
				spa.show(500);
				dining.hide(500);
				diningSpa.show(500);
	        }
	    });
	}
</script>
