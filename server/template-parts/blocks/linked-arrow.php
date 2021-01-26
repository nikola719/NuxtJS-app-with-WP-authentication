<?php $link = get_field( 'link' ); ?>
<?php if ( $link ) : ?>
	<a class="linked-arrow" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
	<svg width="16px" height="13px" viewBox="0 0 16 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	    <g id="01-Layouts" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
	        <g id="Home" transform="translate(-306.000000, -2315.000000)">
	            <rect id="Rectangle" fill="#F8FCFF" x="0" y="1872" width="1440" height="1155"></rect>
	            <g id="Group" transform="translate(61.000000, 2304.000000)" stroke="#0097CE" stroke-linecap="square" stroke-width="2">
	                <g id="Group-2" transform="translate(246.000000, 13.000000)">
	                    <line x1="0.5" y1="4.5" x2="10.5" y2="4.5" id="Line"></line>
	                    <polyline id="Path-2" points="8.5 0 13 4.5 8.5 9"></polyline>
	                </g>
	            </g>
	        </g>
	    </g>
	</svg>
<?php endif; ?>
