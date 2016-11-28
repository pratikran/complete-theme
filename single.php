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
	
		echo "<h2>" . get_the_title() . "</h2>";
		echo "<h4>" . get_the_date() . "</h4>";
		
		/* $posts = get_posts();
		foreach($posts as $post):
		setup_postdata($post);
		echo get_the_content();
		endforeach; */
		
		/* This section is for category and/or tags */
		echo "<section>";
		echo "Categories: ";
		the_category(', ');
		the_tags('<div style="background:#00ff00;height:20%;width:100%;display:block>', ' / ', '</div>');
		echo "</section>";
		
		if(have_posts()):
		while(have_posts()): the_post();
		the_content();
		endwhile;
		endif;
		
		comments_template();
		
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
