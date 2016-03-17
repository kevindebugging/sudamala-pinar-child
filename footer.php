<?php
/**
 * Footer.php
 * The footer section of the theme
 */
global $pinar_opt;

if(!is_page_template( 'templates/gallery-fullscreen.php' ) && !is_page_template( 'templates/home-page-fullscreen.php' ))
{
?>
		<!-- Buy Theme -->
		<?php if( get_field('cta_title') ) {do_shortcode('[sudamala-call-to-action title="'. get_field( "cta_title" ) .'" button_text="'. get_field( "cta_button_text" ) .'" link="'. get_field( "cta_link" ) .'"]' );} ?>
		<!-- End of Buy Theme -->

		<!-- Top Footer -->
		<div id="top-footer">
			<div id="go-up-box"><i class="fa fa-chevron-up"></i></div>
			<div class="inner-container container">
				<?php
	            /**
	             * Load the "Top Footer" sidebar
	             */
	            dynamic_sidebar("top-footer" );
	            ?>
			</div>
		</div>
		<!-- End of Top Footer -->

		<!-- Footer -->
		<footer id="footer">
			<?php
	        $menu_arg = array(
	            'theme_location'  => 'footer-menu',
	        	'container'       => 'nav',
	            'menu_class'      => 'footer-menu list-inline'
	        );
	        wp_nav_menu( $menu_arg );
	        ?>

<?php
$bali_name = '<p>Sudamala Suites & Villas, Sanur</p>';
$lombok_name = '<p>Sudamala Suites & Villas, Senggigi</p>';
$bali_address='<p>Jl. Sudamala No. 20. Sanur, Bali 80227. Indonesia</p>';
$lombok_address='<p>Jl. Raya Mangsit. Senggigi,  Lombok 83355. Indonesia</p>';
$komodo_address='<p>Jl. Raya Mangsit. Komodo, Flores 83355. Indonesia</p>
	<p><i class="fa fa-phone"></i> +62 370 693111 <i class="fa fa-fax"></i> +62 370 692333</p>
	<p><i class="fa fa-envelope-o"></i><a href="mailto:info@sudamalaresorts.com"> info@sudamalaresorts.com </a></p>';
$blog_id = get_current_blog_id();
?>
			<div class="footer-address">
				<?php if($blog_id == 1) {echo '<p>Sudamala Resorts</p>';}?>
				<?php if($blog_id == 1) {echo $bali_address.$lombok_address;}
					else if($blog_id == 2) {echo $bali_name.$bali_address;}
					else if($blog_id == 4) {echo $lombok_name.$lombok_address;}
					else if($blog_id == 5) {echo $komodo_address;}
				 ?>
			</div>

			<div class="copy-right">
				<?php
	                /**
	                 * Add the footer text which is set by user                     *
	                 */
	                if (isset($pinar_opt['opt-footer-text']) && $pinar_opt['opt-footer-text'] !=='' )
	                {
	                    esc_html_e( $pinar_opt['opt-footer-text'], 'pinar' );
	                }
	            ?>
			</div>

		<?php if($blog_id == 1 && is_front_page()){ ?>
		<div class="credit">
			<p>Website Developed by <a href="http://islandmediamanagement.com/" target="_blank">Island Media Management</a></p>
		</div>
		<?php } ?>
		</footer>
		<!-- End of Footer -->
	</div>
	<?php
}
		wp_footer();
	?>
</body>
</html>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41603140-1', 'sudamalaresorts.com');
  ga('send', 'pageview');
</script>
