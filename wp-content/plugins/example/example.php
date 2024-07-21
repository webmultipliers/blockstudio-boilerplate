<?php

/*
 * Plugin Name:       Example
 * Plugin URI:        https://example.com/
 * Description:       A companion plugin for the theme.
 * Version:           1.0.0
 * Requires at least: 6.6
 * Requires PHP:      8.0
 * Author:            Vinny Green
 * Author URI:        https://vinnysgreen.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       example
 * Domain Path:       /languages
 * Requires Plugins:  blockstudio
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
