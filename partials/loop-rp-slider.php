
<div class="row">
<?php // New Query
$slider_args = array( 'post_type' => 'rp_films', 'posts_per_page' => -1);
$rp_slider_loop = new WP_Query( $slider_args );
if ($rp_slider_loop->have_posts()) : $counter = 0; ?>

<?php while ( $rp_slider_loop->have_posts() ) : ?>
	<?php if ($counter == 0){$rp_slider_loop->the_post();} ?> <!-- First Film -->
	    <div class="large-12 columns" id="bigvidcontainer"><div id="bigvid" class='flex-video vimeo widescreen'>
	      <iframe src="<?php get_video_src(); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
	    </div>
	    <a id="main-vid-link" href="<?php the_permalink(); ?>" class="right">More About This Film</a>
	</div>
	<div class="row"><br /></div>
		<div class="row"> <!-- Main Orbit Slider -->
		    <div class="large-12 columns">
		    	<ul class="example-orbit" data-orbit data-options="bullets: false; timer: false; slide_number: false;">
			      	<li> <!-- First Orbit Slide -->
			      		<div class="row">
						<?php $counter++; ?>
						<?php while ($counter < 7) :


					  	// Get the terms
						 $film_cats = get_the_terms( get_the_ID(), 'film_cat' );
						 $film_types = get_the_terms( get_the_ID(), 'film_type' );
						 ?>
						  <div class="large-2 small-4 columns">
						  	<a class="rp-vid-link" href="#" data-src="<?php get_video_src(); ?>" data-link="<?php the_permalink(); ?>">
						  		<?php get_video_thumb('200px');?>
							  	<h4 class="slider-film-title"><?php the_title(); ?></h4>
	              		<h5 class="slider-film-type">
                      <?php foreach ($film_types as $type) : echo $type->name; endforeach;?>
                    </h5>
		            </a>
						  </div>
            <?php if ($counter == 6) : ?>
						</div> <!--End Orbit Row -->
					</li>	<!-- End Orbit Slide -->
					<li> <!-- New Orbit Slide -->
						<div class="row">
					<?php if ($rp_slider_loop->have_posts()) {$counter = 0;} ?>
        <?php endif ?>
        <?php $counter += 1; ?>
					<?php if (!($rp_slider_loop->current_post + 1 < $rp_slider_loop->post_count)) {break;} ?>
					<?php $rp_slider_loop->the_post(); ?>

        <?php endwhile; ?>
	<?php endwhile; ?>
<?php endif; ?>
				</ul>
			</div>
		</div> <!-- End Orbit -->
