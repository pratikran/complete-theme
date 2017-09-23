<?php

/* Start: Hook parent theme css to child */
add_action('wp_enqueue_scripts','load_parent_css');

function load_parent_css() {
	wp_enqueue_style('complete-theme', get_template_directory_uri() . '/style.css');
}
/* End: */