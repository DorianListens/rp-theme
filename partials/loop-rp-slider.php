
<div class="rp-section">
	<div class="row">
		<?php // New Query
		$slider_args = array( 'post_type' => 'rp_films', 'posts_per_page' => -1);
		$rp_slider_loop = new WP_Query( $slider_args );
		if ($rp_slider_loop->have_posts()) : $counter = 0; ?>

		<?php while ( $rp_slider_loop->have_posts() ) : ?>
			<?php if ($counter == 0){$rp_slider_loop->the_post();} ?> <!-- First Film -->
		    <div class="large-8 columns" id="bigvidcontainer">
					<div id="bigvid" class='flex-video vimeo widescreen'>
		      	<iframe src="<?php get_video_src(); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
					<hr />
		    </div>
				<div class="large-4 columns">
					<?php get_template_part( 'partials/loop', 'rp-threeup'); ?>
					<div class="bpanel">
						<p class="lead">￼Committed to the power of distinctive storytelling, Rotating Planet produces and distributes an extensive library of award winning documentaries, TV series and short films.</p>

					<p class="lead">We are fascinated by what makes the Earth go ‘round.</p>
					<h2>We are ROTATING PLANET</h2>
					</div>
					<div class="cpanel">
						Some Stuff
					</div>
				</div>

	</div>
	<!-- <div class="row">
		<div class="large-12 columns">
			<p><a id="main-vid-link" href="<?php the_permalink(); ?>" class="right">More About This Film</a></p>
			<br />
		</div>
	</div> -->
</div>

<div class="rp-section">
		<div class="row"> <!-- Main Orbit Slider -->
			<div class="large-1 columns">
				<img src="images/rp-logo-image.png"/>
			</div>
		    <div class="large-7 columns end">
		    	<ul class="rp-slider" data-orbit data-options="bullets: false; timer: false; slide_number: false;">
			      	<li> <!-- First Orbit Slide -->
			      		<div class="row">
						<?php $counter++; ?>
						<?php while ($counter < 5) :


					  	// Get the terms
						 $film_cats = get_the_terms( get_the_ID(), 'film_cat' );
						 $film_types = get_the_terms( get_the_ID(), 'film_type' );
						 ?>
						  <div class="large-3 small-6 columns">
						  	<a class="rp-vid-link" href="#" data-src="<?php get_video_src(); ?>" data-link="<?php the_permalink(); ?>">
						  		<?php the_post_thumbnail('video_thumb');//get_video_thumb('200px');?>
									<hr/>
							  	<h4><?php the_title(); ?></h4>
	              		<!-- <p class="slider-film-type">
                      <?php foreach ($film_types as $type) : echo $type->name; endforeach;?>
                    </p> -->
		            </a>
								<p><?php the_excerpt(); ?></p>
						  </div>
            <?php if ($counter == 4) : ?>
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
</div>
