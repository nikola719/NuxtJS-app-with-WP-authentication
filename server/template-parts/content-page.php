<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blueprint
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php blueprint_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blueprint' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
	$featured_post = get_field('featured_post', $post_object->ID);
	if( $featured_post ): ?>
		<div class="featured-post-title">
			<svg width="634px" height="470px" viewBox="0 0 634 470" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

					            
					            <path d="M264.756322,4139.08865 C295.901084,4091.19622 367.328044,4067.438 433.365116,4085.51936 C452.759824,4090.82975 469.726747,4099.21162 483.701415,4109.74509 C518.119514,4096.97733 558.211038,4096.92916 591.296876,4112.45714 C637.106403,4133.95664 654.857758,4178.45066 637.718817,4219.36049 C685.681342,4246.9281 712.51966,4306.52791 700.126304,4368.56975 C688.548434,4426.52921 646.044437,4470.03734 595.588191,4482.10464 C589.674865,4502.1816 573.594576,4520.30487 548.665739,4531.80663 C498.245078,4555.0699 430.719656,4542.43625 397.84349,4503.58858 C397.090842,4502.69923 396.36288,4501.80384 395.659472,4500.90289 C373.911507,4520.82023 342.612474,4536.63035 306.048885,4544.0618 C228.170102,4559.89046 155.898687,4531.7136 144.626163,4481.12702 C143.35645,4475.42906 142.914806,4469.68982 143.242088,4463.96828 C116.856502,4454.81162 94.412695,4436.20829 81.3876994,4409.70608 C59.8388718,4365.86027 70.3144794,4313.09941 103.703428,4276.32885 C100.727796,4266.82427 99.138174,4256.8092 99.138174,4246.46671 C99.138174,4184.61081 155.998011,4134.46671 226.138174,4134.46671 C239.473669,4134.46671 252.329107,4136.27932 264.404978,4139.64041 Z" id="Combined-Shape-Copy-9" fill="#6FB74D" transform="translate(386.638179, 4313.966705) scale(-1, 1) translate(-386.638179, -4313.966705) "></path>
					            
		
			</svg>
			<h2><a href="<?php echo get_the_permalink( $featured_post->ID ); ?>"><?php echo $featured_post->post_title; ?></a></h2>
		</div>
		
	    
	    <p><?php echo get_the_excerpt( $featured_post->ID ); ?></p>
	<?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'blueprint' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
