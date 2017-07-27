<?php

add_filter('show_admin_bar', '__return_false');

function registerScripts() {

    $directory = get_stylesheet_directory();

    // Array to hold scripts to be loaded, they will be included in the order specified below
    $order_scripts_array = [];

    // First add files in plugins/
    foreach (glob($directory . "/assets/js/default/*.js") as $file_name) {
        $order_scripts_array[] = "default/".basename($file_name);
    }

    // Next add files in site_scripts/
    foreach (glob($directory . "/assets/js/main/*.js") as $file_name) {
        $order_scripts_array[] = "main/".basename($file_name);
    }

    // Lastly add script.js
    $order_scripts_array[] = "script.js";

    foreach ($order_scripts_array as $scripts) {
        wp_enqueue_script(
            basename($scripts),
            get_template_directory_uri(). '/assets/js/' . $scripts
        );
    }

}

function registerStyles() {

    $directory = get_stylesheet_directory();

    // Array to hold scripts to be loaded, they will be included in the order specified below
    $order_styles_array = [];

    // First add files in plugins/
    foreach (glob($directory . "/assets/less/default/*.less") as $file_name) {
        $order_styles_array[] = "default/".basename($file_name);
    }

    // Next add files in site_scripts/
    foreach (glob($directory . "/assets/less/main/*.less") as $file_name) {
        $order_styles_array[] = "main/".basename($file_name);
    }

    $less_files = '';

    foreach ($order_styles_array as $styles) {
		$less_files .= "@import '" . $styles . "';\n";
    }

    $my_file = $directory . "/assets/less/dynamic.less";

	if ( file_exists( $my_file ) ) {
		file_put_contents($my_file, $less_files);
	} else {
		fopen($my_file, 'w') or die("Can't create file");
		file_put_contents($my_file, $less_files);
	}

}


if (!is_admin()) {

    wp_register_style(
        'default-stylesheet',
        get_bloginfo('stylesheet_directory') . '/assets/less/style.less',
        false,
        0.1
    );

    wp_enqueue_style('default-stylesheet');

    add_action('wp_enqueue_scripts', 'registerScripts');

    registerStyles();
}

function pre($value) {
	echo '<pre>';
	print_r($value);
	echo '</pre>';
}
