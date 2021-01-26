<?php
/**
 * Block template file: template-parts/blocks/download-book.php
 *
 * Download Book Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-download';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="container">
        <div class="block-download__left">
            <h3 class="block-download__title"><?php the_field('title'); ?></h3>
            <p class="block-download__content"><?php the_field('content');  ?></p>
            <button class="block-download__btn">download e-book</button>
        </div>
        <div class="block-download__right">
            <img src="<?php echo get_field('image')['url']; ?>" alt="book">
        </div>
    </div>
</div>