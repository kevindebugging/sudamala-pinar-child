<?php
/**
 *	splash-page.php
 * 	Splash page template of Sudamala
 *  Template Name: Sudamala Splash Page
 */
global $pinar_opt;

get_header();

echo '<div id="home-top-section">';
//echo do_shortcode('[pinar-main-slider]' );
echo do_shortcode('[sudamala-main-slider]' );
echo do_shortcode('[sudamala-splash-availability-form]' );
echo '</div>';

if(have_posts())
{
	global $pinar_opt;
	while (have_posts())
	{
		the_post();
		the_content();
	}
}
?>
<div id="welcome" class="container bold">
<div class="heading-box">
<h2><?php the_field('booking_information_title'); ?></h2>
</div>
<div class="inner-content">
<div class="desc quote"><?php the_field('booking_information_paragraph'); ?><cite><?php the_field('home_welcome_writter'); ?></cite></div>
</div>
</div>
<div class="heading-box bold" style="margin:30px 0">
<h2>Sudamala Resorts on Instagram</h2>
</div>
<?php
echo do_shortcode('[instagram-feed]' ); 
//echo do_shortcode('[pinar-main-gallery title="Sudamala Gallery"]' );
//echo do_shortcode('[pinar-video title="'. get_field( "home_video_title" ) . '" sub_title="' .get_field ( "home_video_subtitle") .'" video_id="'. get_field( "home_video_id" ) .'" ]' );
//echo do_shortcode('[pinar-packages]' );
?>
<div style="height:40px;"></div>
<?php
get_footer();
?>