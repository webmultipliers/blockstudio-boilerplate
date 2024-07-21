<?php

/**
 * Plugin Name: Example Plugin
 * Text Domain: example
 * Description: Example Plugin
 * Requires Plugins: blockstudio
 */

if (!defined('ABSPATH')) {
	exit;
}

define('EXAMPLE_PLUGIN_PATH', plugin_dir_path(__FILE__));

add_filter('blockstudio/settings/users/ids', function () {
	return [1];
});

add_filter('blockstudio/settings/assets/enqueue', function () {
	return true;
});

add_filter('blockstudio/settings/assets/minify/css', function () {
	return true;
});

add_filter('blockstudio/settings/assets/minify/js', function () {
	return true;
});

add_filter('blockstudio/settings/assets/process/scssFiles', function () {
	return true;
});

add_filter('blockstudio/settings/tailwind/enabled', function () {
	return false;
});

add_filter('blockstudio/settings/editor/formatOnSave', function () {
	return false;
});

add_filter('blockstudio/settings/library', function () {
	return false;
});

if (class_exists('Blockstudio\Build')) {

	$instances = [
		'assets/styles',
		'assets/scripts',
		'blocks/core',
		'blocks/example',
		'experiences',
		'plugins',
		'vendors',
	];

	foreach ($instances as $instance) {
		if (!is_dir(EXAMPLE_PLUGIN_PATH . $instance)) {
			$instances = array_diff($instances, [$instance]);
		}
	}

	foreach ($instances as $instance) {
		Blockstudio\Build::init([
			'dir' => EXAMPLE_PLUGIN_PATH . $instance
		]);
	}
}
