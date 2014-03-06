<?php

function get_video_src() {
	if ( get_field('video_url')) {
		$video_url = get_field('video_url'); 
		$oembed_endpoint = 'http://vimeo.com/api/oembed';
		// Create the URLs
		$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url);

		$oembed = simplexml_load_string(curl_get($xml_url));
		$vimeo_embed = html_entity_decode($oembed->html);
	}
	elseif ( get_field ('vimeo_embed') ) {
	$vimeo_embed = get_field ('vimeo_embed');	
	}
	preg_match('/src="([^"]+)"/', $vimeo_embed, $match);
	$video_src = $match[1];
	echo $video_src;
}

function display_video() {
	echo '<div class="flex-video vimeo widescreen"><iframe src= " ', get_video_src() ,'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
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

// Curl helper function
function curl_get($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($curl);
    curl_close($curl);
    return $return;
}


// Vimeo Thumbnails
function get_video_thumb($width) {
	if ( get_field ('video_url') ) {
		$video_url = get_field ('video_url');
	}
	$oembed_endpoint = 'http://vimeo.com/api/oembed';
	$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url);
	$oembed = simplexml_load_string(curl_get($xml_url));
	$thumb = $oembed->thumbnail_url;

	echo '<img src="'. $thumb .'"width="'.$width.'"/>';
}



