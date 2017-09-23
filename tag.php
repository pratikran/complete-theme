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
	
	<h1>Tag: <?php echo single_cat_title();?></h1>
	
	
	<?php 
	
		// The Loop
		while ( have_posts() ) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		
		<!--
		<small><?php //the_time('F jS', 'Y') ?> by <?php //the_author_posts_link() ?></small>
		
		<div class="entry">
		<?php //the_content(); ?>
		
		<p class="postmetadata"><?php 
			//comments_popup_link('No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
		?></p>
		</div>
		-->
		
		<?php endwhile;
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
