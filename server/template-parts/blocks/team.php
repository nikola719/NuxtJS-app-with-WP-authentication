<?php
/**
 * Block template file: template-parts/blocks/team.php
 *
 * Team Block Template.
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
$classes = 'block-team';
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
		<div class="meet-the-team mb-32">
			<h2><?php the_field( 'heading' ); ?></h2>
			<p><?php the_field( 'short_description' ); ?></p>
		</div>

		<?php if ( have_rows( 'founders' ) ) : ?>
			<div class="founders">
			<?php while ( have_rows( 'founders' ) ) : the_row(); ?>
				<div class="founder">
					<div class="founder-image">
						<?php $image = get_sub_field( 'image' ); ?>
						<?php if ( $image ) : ?>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
						<?php endif; ?>
					</div>
					<div class="founder-info">
						<h4 class="mb-0 mt-0"><?php the_sub_field( 'name' ); ?></h4>
						<span class="has-blue-color"><?php the_sub_field( 'position' ); ?></span>
						<p><?php the_sub_field( 'description' ); ?></p>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php else : ?>
			<?php // no rows found ?>		
		<?php endif; ?>

		<div class="team-members mt-40">
			<?php if ( have_rows( 'team_members' ) ) : ?>
				<?php while ( have_rows( 'team_members' ) ) : the_row(); ?>
					<div class="team-member service-bubble">
						<svg width="27px" height="29px" viewBox="0 0 27 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						    <g id="01-Layouts" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						        <g id="Home" transform="translate(-489.000000, -2536.000000)">
						            <path d="M509.318784,2543.21405 L519.571301,2566.6087 L519.571301,2566.6087 L491.754965,2566.59983 L501.990828,2543.21564 C502.876676,2541.19189 505.235372,2540.26944 507.259123,2541.15528 C508.179974,2541.55836 508.915305,2542.29338 509.318784,2543.21405 Z" id="Triangle" fill="#F59E5D" transform="translate(505.663133, 2550.728997) rotate(-270.000000) translate(-505.663133, -2550.728997) "></path>
						        </g>
						    </g>
						</svg>
						<div class="service-bubble-text">
							<h4 class="mt-0 mb-0"><?php the_sub_field( 'name' ); ?></h4>
							<p class="mt-0"><?php the_sub_field( 'position' ); ?></p>
							<p><?php the_sub_field( 'description' ); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php else : ?>
				<?php // no rows found ?>
			<?php endif; ?>
		</div>
	</div>
	
</div>