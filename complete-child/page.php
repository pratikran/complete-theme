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

		echo "<h2>" . get_the_title() . "</h2>";
		echo "<h4>" . get_the_date() . "</h4>";
		
		/* This section is for category and/or tags */
		echo "<section>";
		echo "</section>";
		
		if(have_posts()):
		while(have_posts()): the_post();
		
		echo "Written by ";
		the_author();
		
		the_content();
		endwhile;
		endif;
		
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
