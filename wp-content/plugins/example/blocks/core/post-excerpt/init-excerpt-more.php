<?php
/**
 * Title: Excerpt Read More
 * Description: Modify the read more value for excerpts.
 *
 * @param string $more The current more text.
 * @return string The modified more text.
 */
add_filter( 'excerpt_more', function ( $more ) {
	return '';
} );
