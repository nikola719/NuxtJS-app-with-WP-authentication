<?php
/**
 * Block template file: template-parts/blocks/spiral-backgrounds.php
 *
 * Full Width Spirals Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-spirals-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-full-width-spirals';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> has-<?php the_field( 'background_color' ); ?>-background-color">
	<?php $image_background = get_field( 'image_background' ); ?>
		<?php if ( $image_background ) : ?>
			<img src="<?php echo esc_url( $image_background['url'] ); ?>" alt="<?php echo esc_attr( $image_background['alt'] ); ?>" class="background-image d-none d-md-block" />
		<?php endif; ?>
	<img src="<?php echo get_template_directory_uri(); ?>/dist/images/spirals.svg" class="spiral-background-img-<?php the_field( 'spiral_align' ); ?>" >
	<div class="container center">
		<div class="content">
			<?php the_field( 'content' ); ?>
		</div>
	</div>	
</div>