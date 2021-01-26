<?php
/**
 * Block template file: template-parts/blocks/download-cta.php
 *
 * Download Cta Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'download-cta-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-download-cta';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>" style="background-color: <?php the_field( 'background_color' ); ?>">
	<div class="container download-cta-container">
		<div class="left">
			<h3><?php the_field( 'heading' ); ?></h3>
			<p><?php the_field( 'paragraph' ); ?><p>
			<?php $download_file = get_field( 'download_file' ); ?>
			<?php if ( $download_file ) : ?>
				<a class="wp-block-button__link has-purple-background-color has-background" download href="<?php echo esc_url( $download_file['url'] ); ?>"><?php echo esc_html( $download_file['title'] ); ?></a>
			<?php endif; ?>
		</div>
		<div class="right">
			<?php $image = get_field( 'image' ); ?>
			<?php if ( $image ) : ?>
				<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
		</div>
	</div>
</div>