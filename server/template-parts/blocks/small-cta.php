<?php
/**
 * Block template file: template-parts/blocks/small-cta.php
 *
 * Small Cta Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'small-cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-small-cta';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php $cta_link = get_field( 'cta_link' ); ?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="small-cta-container container">
		<div class="card">
			<div class="left">
				<h4><?php the_field( 'text' ); ?></h4>
			</div>
			<div class="right">
				<?php if ( $cta_link ) : ?>
					<a class="wp-block-button__link has-purple-background-color has-background" href="<?php echo esc_url( $cta_link['url'] ); ?>" target="<?php echo esc_attr( $cta_link['target'] ); ?>"><?php echo esc_html( $cta_link['title'] ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>