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

		echo "Shop!";
		
		echo "<h2>" . get_the_title() . "</h2>";
		
		woocommerce_content()
		
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
