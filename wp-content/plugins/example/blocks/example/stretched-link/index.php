<?php
/**
 * Title: Stretched Link
 * Description: A block that stretches a link to the full width of the container.
 * 
 * @param array $attributes The attributes for the block.
 * @param string $tag The HTML tag to use for the block. Default is 'section'.
 * @param string|null $link The URL for the link. Default is null.
 * @param string $link_text The text to display for the link. Default is 'Read more'.
 * @param bool $inherit Whether to inherit the link and title from the parent post. Default is false.
 *
 * @return void
 */

$tag = $attributes['tag'] ?? 'section';
$link = $attributes['link']['url'] ?? null;
$link_text = $attributes['linkText'] ?? 'Read more';
$inherit = $attributes['inherit'] ?? false;

if ($inherit) {
	$post_id = $block['context']['postId'] ?? null;
	$post = get_post($post_id);
	if ($post) {
		$link = get_permalink($post);
		$title = $post->post_title;
	}
}
?>
<<?php echo esc_attr($tag); ?> useBlockProps >

	<InnerBlocks class="wp-block-example-stretched-link__inner" />

	<?php if ($link && !$isEditor): ?>
		<a href="<?php echo esc_url($link); ?>" aria-hidden="true">
			<span class="screen-reader-text">
				<?php echo esc_html($link_text); ?>
				<?php if ($inherit && isset($title))
					echo esc_html($title); ?>
			</span>
		</a>
	<?php endif; ?>

</<?php echo esc_attr($tag); ?>>