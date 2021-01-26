<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'speech-bubbles-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'speech-bubbles';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container xl-f-row">
			<div class="left">
				<h1><?php the_field( 'main_text' ); ?></h1>
				<span class="strapline"><?php the_field( 'strapline' ); ?></span>
			</div>
			<div class="right" data-tilt>
				<div class="bubble bubble1">
					<svg viewBox="0 0 518 267" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
										    
										    <g id="01-Layouts" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										        <g id="Home" transform="translate(-733.000000, -278.000000)">
										            
										            <path d="M1250.78144,306.302713 C1250.8749,307.368214 1250.91132,308.437951 1250.89053,309.507341 L1248.03521,456.397048 C1247.74859,471.142343 1236.78695,483.492344 1222.17991,485.527104 L798.754141,544.510294 C782.344049,546.796219 767.187931,535.346319 764.902006,518.936226 C764.789549,518.128921 764.710064,517.317545 764.663707,516.504123 L736.342139,512.193914 C734.158139,511.861587 732.657062,509.821701 732.989389,507.637702 C733.140422,506.645136 733.659193,505.745663 734.442697,505.117874 L764.148841,481.315519 L762.290204,346.937538 C762.072879,331.227104 774.013921,318.010351 789.665751,316.637346 L1218.27462,279.03906 C1234.77978,277.5912 1249.33358,289.797553 1250.78144,306.302713 Z" id="Combined-Shape" fill="#6FB74D"></path>
										            
										            
										            
										        </g>
										    </g>
					</svg>
				 	<div class="bubble-text">
				 		<?php the_field( 'speech_bubble_text_1' ); ?>
				 	</div>
				</div>

			  <div class="bubble bubble2">
			   	<svg viewBox="0 0 569 282" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					 	    <title>Combined Shape</title>
					 	    <g id="01-Layouts" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					 	        <g id="Home" transform="translate(-820.000000, -480.000000)">					 	      
					 	            <path d="M1340.47409,482.5 C1349.44871,482.5 1357.57371,486.137686 1363.45506,492.01903 C1369.3364,497.900373 1372.97409,506.025373 1372.97409,515 C1372.97409,516.517857 1372.86775,518.03385 1372.65587,519.536849 L1372.65587,519.536849 L1354.93558,645.233389 L1383.73353,668.210772 C1384.91513,669.153528 1385.72805,670.475917 1386.03908,671.947241 C1386.34571,673.908124 1385.92469,675.583973 1385.06186,676.897901 C1384.12515,678.324329 1382.65897,679.339431 1380.90379,679.675471 L1380.90379,679.675471 L1349.4065,684.452095 L1347.10857,700.754717 C1346.04324,708.311555 1342.42039,714.988649 1337.1615,719.921617 C1331.90261,724.854585 1325.00769,728.043427 1317.39823,728.623765 L1317.39823,728.623765 L923.404171,758.671799 C915.839234,759.24874 908.578062,757.169918 902.648278,753.134639 C896.718495,749.09936 892.1201,743.107624 889.880717,735.858742 L889.880717,735.858742 L824.614759,524.592837 C821.96577,516.01806 823.043176,507.181342 826.926523,499.826071 C830.80987,492.4708 837.499158,486.596976 846.073935,483.947987 C849.181093,482.988099 852.414724,482.5 855.666772,482.5 L855.666772,482.5 Z" id="Combined-Shape" stroke="#FFFFFF" stroke-width="5" fill="#8E4895"></path>
					 	            
					 	        </g>
					 	    </g>
					</svg>
					<div class="bubble-text"><?php the_field( 'speech_bubble_text_2' ); ?>
						
					</div>		
			  </div>
			</div>
	</div>
</div>