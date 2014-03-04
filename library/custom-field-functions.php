<?php

function get_video_src() {
	if ( get_field ('vimeo_embed') ) {
		$vimeo_embed = get_field ('vimeo_embed');
	}
	preg_match('/src="([^"]+)"/', $vimeo_embed, $match);
	$video_src = $match[1];
	echo $video_src;
}

function display_video() {
		if ( get_field ('vimeo_embed') ) {
		$vimeo_embed = get_field ('vimeo_embed');
	}
	preg_match('/src="([^"]+)"/', $vimeo_embed, $match);
	$video_src = $match[1];
	echo '<div class="flex-video vimeo widescreen"><iframe src= " ', $video_src ,'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
}

function display_film_info() {
	if (get_field('credits')) {
		$credits = get_field('credits');
	} else { $credits = "Sorry, no credits have been added."; }

	if (get_field('running_time')) {
		$running_time = get_field('running_time');
	} else { $running_time = "Not Available"; }

	if (get_field('official_website')) {
		$official_website = get_field('official_website'); 
	} else { $official_website = "Not Available";}

	if ($official_website == "Not Available")  {
		$website_link = "Not Available";
	} else {
		$website_link = '<a href="'.$official_website.'" target="blank">'.$official_website.'</a>';
	}

	echo '<h5>Official Website:</h5> <p>'.$website_link.'</p>';
	echo "<h5>Credits:</h5> <p>", $credits, "</p>";
	echo '<h5>Running Time:</h5> <p>', $running_time, "</p>";

}