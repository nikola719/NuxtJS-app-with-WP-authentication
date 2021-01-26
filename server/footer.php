<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blueprint
 */

?>
	<nav id="dot-nav"></nav>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="container center">
				<img src="<?php echo get_template_directory_uri(); ?>/dist/images/rapport-digital-circles-logo.svg" alt="Rapport Digital logo" class="text-center">
				<div class="center lg-f-row">
					<h5 class="lg-mr-16">Does your marketing need a boost?</h5>
					<div class="button-speech">
						<a href="#">Let's Talk</a>
					</div>
				</div>
				<div class="social mt-80 mb-32 center lg-md-row">
					<div class="social-icon">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/instagram.svg" alt="Instagram logo"> Instagram
						</a>
					</div>
					<div class="social-icon">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/facebook.svg" alt="Facebook logo">
							Facebook
						</a>
					</div>
					<div class="social-icon">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/twitter.svg" alt="Twitter logo">
							Twitter
						</a>
					</div>
					<div class="social-icon">
						<a href="#">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/linkedin.svg" alt="LinkedIn logo">
							LinkedIn
						</a>
					</div>
				</div>
				<span class="muted"><a href="#">Terms & Conditions</a></span><span class="muted">&copy; <?php echo date('Y'); ?> Rapport Digital, All Rights Reserved.</span>
			</div>	
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
