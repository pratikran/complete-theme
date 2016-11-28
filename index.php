<?php
#require('header.php');
get_header();
?>
<body>

<h1><?php echo bloginfo('title'); ?></h1>
<div class="section group">
	<div class="col span_1_of_3">
	<?php echo bloginfo('stylesheet_url'); ?><br>
	<?php echo bloginfo('stylesheet_directory'); ?>/style.css
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
