<?php
/**
 *	home-page.php
 * 	Home page template of Sudamala
 *  Template Name: Sudamala Home Page
 */
global $pinar_opt;

get_header();

echo '<div id="home-top-section">';
//echo do_shortcode('[pinar-main-slider]' );
echo do_shortcode('[sudamala-main-slider]' );
echo do_shortcode('[sudamala-availability-form]' );
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
<h2><?php the_field('home_welcome_title'); ?></h2>
</div>
<div class="inner-content">
<div class="desc quote"><?php the_field('home_welcome_paragraph'); ?><cite><?php the_field('home_welcome_writter'); ?></cite></div>
</div>
<div class="heading-box">
<h2><?php the_field('booking_information_title'); ?></h2>
</div>
<div class="inner-content">
<div class="desc quote"><?php the_field('booking_information_paragraph'); ?><cite><?php the_field('home_welcome_writter'); ?></cite></div>
</div>
</div>
<?php
echo do_shortcode('[sudamala-luxury-rooms type="wide" room_count="5"]' );
//echo do_shortcode('[pinar-main-gallery title="Sudamala Gallery"]' );
echo do_shortcode('[sudamala-main-gallery title="Sudamala Gallery" images="'. get_field( "home_gallery_image" ) .'"]' );
//echo do_shortcode('[pinar-video title="'. get_field( "home_video_title" ) . '" sub_title="' .get_field ( "home_video_subtitle") .'" video_id="'. get_field( "home_video_id" ) .'" ]' );
echo do_shortcode('[sudamala-packages links="'. get_field( "special_packages_link" ) . '"]' );

get_footer();