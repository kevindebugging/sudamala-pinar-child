<?php
/**
 *	sudamala-sudajiva-booking.php
 * 	Sudajiva Spa Booking template
 *  Template Name: Sudamala Sudajiva Spa Booking Form Bali
 */
global $pinar_opt;
global $post;

get_header();

echo '<div id="home-top-section">';
echo do_shortcode('[sudamala-page-slider image="'. get_field('slider_images').'"]' );
echo '</div>';

$get_url_choice = '';
$choice = '';

if(isset($_GET['choice']))
{
	$get_url_choice = $_GET['choice'];
	$choice = ' - '. str_replace('-',' ', $get_url_choice);
}
?>

<input type="hidden" id="choice" value="<?php echo $get_url_choice; ?>">
<div class="container main-page-container">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  <img src="<?php echo $image[0]; ?>" class="center-block">
		<?php endif; ?>

		<h2 align="center">SUDAJIVA SPA ENQUIRY FORM</h2>
		<h3 align="center"><strong><?php strtoupper($choice); ?></strong></h3>
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
	var choice = jQuery('#choice').val();

	jQuery(document).ready(function(){
    checkChoiceFromSpa();
	});

	function checkChoiceFromSpa()
	{
		if(choice == "sudajiva-signature-massage")
		{
			choice = 1;
		}
		else if(choice == "jetlag-anti-stress-massage")
		{
			choice = 2;
		}
		else if(choice == "purity-facial")
		{
			choice = 3;
		}
		else if(choice == "marine-collagen")
		{
			choice = 4;
		}
    else if(choice == "traditional-lulur")
    {
      choice = 5;
    }
    else if (choice == "balinese-boreh-wrap")
    {
      choice = 6;
    }
    else if (choice == "exotic-kopi-bali-ritual")
    {
      choice = 7;
    }
    else if (choice == "mystique-escape-ritual")
    {
      choice = 8;
    }
    jQuery('#spa-choice option')[choice].selected = true;
	}
</script>
