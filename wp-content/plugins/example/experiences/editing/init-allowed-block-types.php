<?php
/**
 * Title: Allowed Block Types
 * Description: Limit the allowed block types in the editor.
 * 
 * @param array $allowed_block_types The array of allowed block types.
 * @param object $editor_context The editor context object.
 * @return array The modified array of allowed block types.
 */
add_filter('allowed_block_types_all', function ($allowed_block_types, $editor_context) {

	// Pages
	if ($editor_context->post->post_type === 'page') {
		return $allowed_block_types;
	}

	// Site Editor
	if ($editor_context->name === 'core/edit-site') {
		return $allowed_block_types;
	}

	// In All Other Cases
	return [
		'core/paragraph',
	];

}, 10, 2);
