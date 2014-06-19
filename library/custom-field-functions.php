<?php

function get_video_src() {
	if ( get_field('video_url')) {
		$video_url = get_field('video_url');
		$oembed_endpoint = 'http://vimeo.com/api/oembed';
		// Create the URLs
		$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url) . 'api=1&player_id=vimeoplayer';

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

function src_from_url($video_url) {
	$oembed_endpoint = 'http://vimeo.com/api/oembed';
	// Create the URLs
	$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url) . 'api=1&player_id=vimeoplayer';

	$oembed = simplexml_load_string(curl_get($xml_url));
	$vimeo_embed = html_entity_decode($oembed->html);
	preg_match('/src="([^"]+)"/', $vimeo_embed, $match);
	$video_src = $match[1];
	return $video_src;
}

function display_video() {
	echo '<div class="flex-video vimeo widescreen"><iframe id="vimeoplayer" src= " ', get_video_src() ,'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
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

	echo '<h4>Official Website:</h4> <p>'.$website_link.'</p>';
	echo "<h4>Credits:</h4> <p>", $credits, "</p>";
	echo '<h4>Running Time:</h4> <p>', $running_time, "</p>";

}

function related_clips() {
	if( have_rows('related_clips') ):
		$i = 0;
		echo "<h4>Related Clips:</h4>";

	 	// loop through the rows of data
	    while ( have_rows('related_clips') ) : the_row();
					$string = $i.'_clip_thumb';

	        // display a sub field value
	        $url = get_sub_field('vimeo_url');
					$src = src_from_url($url);
					$title = get_sub_field('clip_title');
					$thumb = get_sub_field('clip_image');
					$short_desc = get_sub_field('short_desc');
					// $thumb = get_post_meta($post->ID, $string);
					echo '<div class="row"><a href="#" class="rp-vid-link" data-src="'.$src.'">';
					echo '<div class="large-4 columns"><img src="'.$thumb.'"></div>';
					echo '<div class="large-8 columns"><h5>'.$title.'</h5>'.$short_desc.'</div>';
					echo "</a></div><br />";
					// echo $i;
					$i++;
	    endwhile;

	else :

	    // no rows found
	endif;
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
function video_thumb() {
	if ( get_field('video_url') ) {
		$video_url = get_field('video_url');
	}
	$oembed_endpoint = 'http://vimeo.com/api/oembed';
	$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url);
	$oembed = simplexml_load_string(curl_get($xml_url));
	$thumb = $oembed->thumbnail_url;

	return $thumb;

}

function thumb_from_url($video_url) {
	$oembed_endpoint = 'http://vimeo.com/api/oembed';
	$xml_url = $oembed_endpoint . '.xml?url=' . rawurlencode($video_url);
	$oembed = simplexml_load_string(curl_get($xml_url));
	$thumb = $oembed->thumbnail_url;

	return $thumb;
}

function get_video_thumb($width) {
	echo '<img src="'. video_thumb() .'"width="'.$width.'"/>';
}


// Autosave Thumbnails
function save_vimeo_thumb( $post_id, $post ) {

  $slug = 'rp_films';

	if ( ! has_post_thumbnail($post_id)) {

	  // If this isn't a film, don't update.
	  if ( $slug == $_POST['post_type'] ) {

	  // - Update the post's metadata.
			require_once(ABSPATH . 'wp-admin/includes/media.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');

			$url = video_thumb();
			$desc = "Film Thumbnail " . $post_id;
			$tmp = download_url( $url );

	    $file_array['name'] = $post_id . '-thumb.jpg';
	    $file_array['tmp_name'] = $tmp;
	    // If error storing temporarily, unlink
	    if ( is_wp_error( $tmp ) ) {
	        @unlink($file_array['tmp_name']);
	        $file_array['tmp_name'] = '';
	    }
	    // do the validation and storage stuff
	    $attachment_id = media_handle_sideload( $file_array, $post_id, $desc );
	    // If error storing permanently, unlink
	    if ( is_wp_error($id) ) {@unlink($file_array['tmp_name']);}

	    add_post_meta( $post_id, '_thumbnail_id', $attachment_id, true );
			// set_post_thumbnail( $post, $attachment_id);
		}
	}
}
add_action( 'save_post', 'save_vimeo_thumb' );

function save_related_post_thumbs($post_id) {
	$slug = 'rp_films';

	if ( $slug == $_POST['post_type'] ) :

		if (have_rows('related_clips')) :
			$i = 0;
			while (have_rows('related_clips')) : the_row();
				if (! get_sub_field('clip_image')) {
					$thumb = thumb_from_url(get_sub_field('vimeo_url'));
					$desc = "Clip Thumbnail " . get_sub_field('clip_title');
					$tmp2 = download_url( $thumb );

					$file_array['name'] = get_sub_field('clip_title') . '-thumb.jpg';
					$file_array['tmp_name'] = $tmp2;
					// If error storing temporarily, unlink
					if ( is_wp_error( $tmp ) ) {
							@unlink($file_array['tmp_name']);
							$file_array['tmp_name'] = '';
					}
					// do the validation and storage stuff
					$clip_thumb = media_handle_sideload( $file_array, $post_id, $desc );
					// If error storing permanently, unlink
					if ( is_wp_error($id) ) {@unlink($file_array['tmp_name']);}
					$src = wp_get_attachment_url( $clip_thumb );

			}
			endwhile;
		endif;
	endif;

}
add_action( 'save_post', 'save_related_post_thumbs' );

add_image_size( 'video_thumb', 350, 220, true);
add_image_size( "large_vid", 400, 240, true);
