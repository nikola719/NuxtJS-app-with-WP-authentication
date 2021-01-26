<?php
/**
 * Block template file: template-parts/blocks/services-bubbles.php
 *
 * Services Bubbles Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'services-bubbles-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-services-bubbles';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">

		<?php if ( have_rows( 'service_bubbles' ) ) : ?>
			<div class="service-bubbles-container">
				<?php while ( have_rows( 'service_bubbles' ) ) : the_row(); ?>
					<div class="service-bubble">
						<h4><?php the_sub_field( 'service_name' ); ?></h4>
						<svg width="27px" height="29px" viewBox="0 0 27 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <g id="01-Layouts" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <g id="Home" transform="translate(-489.000000, -2536.000000)">
						            <path d="M509.318784,2543.21405 L519.571301,2566.6087 L519.571301,2566.6087 L491.754965,2566.59983 L501.990828,2543.21564 C502.876676,2541.19189 505.235372,2540.26944 507.259123,2541.15528 C508.179974,2541.55836 508.915305,2542.29338 509.318784,2543.21405 Z" id="Triangle" fill="#F59E5D" transform="translate(505.663133, 2550.728997) rotate(-270.000000) translate(-505.663133, -2550.728997) "></path>
						        </g>
						    </g>
						</svg>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php // no rows found ?>
		<?php endif; ?>

</div>