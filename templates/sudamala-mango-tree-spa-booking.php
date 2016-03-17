<?php
/**
 *	sudamala-mango-tree-spa-booking.php
 * 	Mango Tree Spa Booking template
 *  Template Name: Sudamala Mango Tree Spa Booking Form Lombok
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

		<h2 align="center">MANGO TREE SPA ENQUIRY FORM</h2>
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
		if(choice == "signature-sea-shell-massage")
		{
			choice = 1;
		}
		else if(choice == "hot-sand-massage")
		{
			choice = 2;
		}
		else if(choice == "pearl-mango-scrub")
		{
			choice = 3;
		}
		else if(choice == "signature-natural-facial")
		{
			choice = 4;
		}
    else if(choice == "luxury-cooling-ritual")
    {
      choice = 5;
    }
    jQuery('#spa-choice option')[choice].selected = true;
	}
</script>
