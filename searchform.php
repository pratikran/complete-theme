<form class="searchform" action="<?php home_url('/')?>" method="get">
Search <input type="text" name="s" value="<?php echo the_search_query()?>"><br/>

<select name="search_category">
<option name="none">Select a category</option>
<?php
	$categories = get_categories();
	foreach($categories as $cat)
	{
		
		$val = $cat->category_nickname;
		$name = $cat->cat_name;
		$count = $cat->category_count;
		
		print("<option name='$val'>$name ($count)</option>");
			
	}
?>
</select><br/>

<input type="submit" value="Go for it!!!">
</form>