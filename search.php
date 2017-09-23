<?php
#require('header.php');
get_header();
?>
<body>

<h1><?php echo bloginfo('title'); ?></h1>
<div class="section group">
	<div class="col span_1_of_3">
	<?php echo esc_url(bloginfo('stylesheet_url')); ?><br>
	<?php echo esc_url(bloginfo('get_stylesheet_directory_uri')); ?>/style.css
	</div>
	<div class="col span_1_of_3">
	<?php 
	
		
		echo "<h2>Search Results:" . get_search_query() . "</h2>";
		
		while(have_posts()): the_post();
		
		echo '<a href="' . get_the_permalink() . '">';
		echo get_the_post_thumbnail(get_the_ID(), medium);
		echo '</a><br/>';
		
		echo '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a><br/>';
		
		echo "Published by " . get_the_author() . '(' . get_the_author_posts() . ')<br/>';
		echo "Published on " . get_the_date() . '<br/><br/>';
		
		$content = substr(strip_tags(get_the_content()), 0, 100);
		echo $content . '<br/>';
		
		echo '[...] <a href="' . get_the_permalink() . '">Read more</a><br/>';
		echo '<hr/>';
		
		endwhile;
		
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
