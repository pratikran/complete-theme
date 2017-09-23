<?php
#require('header.php');
get_header();
?>
<body>

<h1>Parent Theme</h1>
<?php echo '<a href="'.home_url().'">Home</a>' ?>

<?php

$menu_args = array(
		'theme_location'	=> 'header_menu',
		'echo'				=> false,
		'menu_id'			=> 'header_complete_theme',
		'menu_class'		=> 'all_menus',
		#'fallback_cb' 		=> true,
		#'before'			=> '-->',
		'before'			=> '<img src="https://cdn2.iconfinder.com/data/icons/aspneticons_v1.0_Nov2006/edit_16x16.gif">&nbsp;&nbsp;',
		'after'				=> ' | ',
		'container'			=> 'div',
		'container_id'		=> 'header_parent',
		'container_class'	=> 'header_menus',
	);
$header_menu = wp_nav_menu($menu_args);

echo $header_menu;

$args = array(
'smallest'		=> '15',
'largest'		=> '30',
'unit'			=> 'pt',
'number'		=> '10',
'format'		=> 'flat',
'separator'		=> ' | ',
'order'			=> 'DESC',
'orderby'		=> 'count',
);

wp_tag_cloud($args);

?>

<!-- <h1><?php echo bloginfo('title'); ?></h1> -->
<div class="section group">
	<div class="col span_1_of_3">
	<!--<?php echo esc_url(bloginfo('stylesheet_url')); ?><br>-->
	<!--<?php echo esc_url(bloginfo('get_stylesheet_directory_uri')); ?>/style.css--></Br>
	
		<?php
			if(has_nav_menu('left_sidebar'))
			{
				wp_nav_menu(
					array(
						'theme_location'	=> 'left_sidebar',
						'fallback_cb'		=> false,
						'menu_id'			=> 'left-sidebar-menu',
						'menu_class'		=> 'left-sidebar-menus',
						'depth'				=> '0',
					)
				);
			} else {
				echo "Oops! Sorry there is no left sidebar menu. Please click on one of the menu links above.";
			}

		?>
		
		<?php 	

			die();
			
			if(happy_new_year())
			{
				print '<h3>' . get_theme_mod('happy_new_year_message') . '</h3>'; 
			}
		?>

		<h2>Hours of Operation</h2>
		<?php
			echo "Open from ".get_theme_mod('hours_open')." AM - Closed at ".get_theme_mod('hours_closed')." PM";
		?>
		
	</div>
	<div class="col span_1_of_3">
	<?php 
	
		$args = array(
		
		'post_type'=> 'countries',
		'posts_per_page'=>1,
		'orderby' => 'rand'
		
		);
		echo "<h2>Countries</h2>";
		$post_data = get_posts($args);
		foreach($post_data as $post)
		{
			$link = get_permalink();
			echo '<hr/><h3><a href="'.$link.'">'.get_the_title() . '</a></h3>';
			echo get_the_date() . '<br><hr/>';
		}
		
		$args = array(
		
		'posts_per_page'	=> 3,
		'orderby' 			=> 'rand'
		
		);
		echo "<h2>Posts</h2>";
		$post_data = get_posts($args);
		foreach($post_data as $post)
		{
			$link = get_permalink();
			echo '<hr/><h3><a href="'.$link.'">'.get_the_title() . '</a></h3>';
			echo get_the_date() . '<br><hr/>';
		}
	
		$args = array(
		
		'post_type'			=> 'page',
		'posts_per_page'	=> 3,
		'orderby' 			=> 'rand'
		
		);
		echo "<h2>Pages</h2>";
		$post_data = get_posts($args);
		foreach($post_data as $post)
		{
			$link = get_permalink();
			echo '<hr/><h3><a href="'.$link.'">'.get_the_title() . '</a></h3>';
			echo get_the_date() . '<br><hr/>';
		}
	?>
	</div>
	<div class="col span_1_of_3">
	<?php get_sidebar(); ?>
	</div>
	
	<?php
		#require('footer.php');
		get_footer();
	?>
	
</div>

</body>
