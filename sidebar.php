<?php 
get_search_form();

#wp_tag_cloud();
#echo nl2br ("\n");

?>

<h2 style="color:<?php echo get_theme_mod('specials_color'); ?> !important;">

<img src="<?php echo get_theme_mod('logo_setting'); ?>" />

Specials of The Day: <?php echo get_theme_mod('food_choice'); ?>

</h2>

This year is <?php echo the_current_year(); ?>

<h2>Visit Us on The Map</h2>
<div id="map"></div>
    <script>
      function initMap() {
        // var uluru = {lat: -25.363, lng: 131.044};
		var uluru = {lat: <?php echo get_theme_mod('google_map_lat'); ?>, lng: <?php echo get_theme_mod('google_map_lon'); ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-CgHXpdvhC022mxelYbKVhtiJAVYsiJg&callback=initMap">
    </script>
