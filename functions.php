<?php

add_theme_support('post-thumbnails');

function the_current_year()
{
	$this_year = date('Y');
	return $this_year;
}

?>