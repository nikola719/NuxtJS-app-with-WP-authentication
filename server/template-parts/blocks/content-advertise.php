<?php
/**
 * Block template file: template-parts/blocks/content-advertise.php
 *
 * Advertise Template.
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
$classes = 'block-advertise';
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
        <h2 class="block-advertise__title"><?php the_field('title'); ?></h2>
        <h4 class="block-advertise__subtitle"><?php the_field('sub_title'); ?></h3>
        <div class="block-advertise__content">
            <?php if(have_rows('content')): while(have_rows('content')): the_row(); ?>
            <h5><?php the_sub_field('paragraph'); ?></h5>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>