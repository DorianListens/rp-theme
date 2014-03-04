<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-12 medium-12 columns clearfix" role="main">

<div class="row"> <!-- Main Orbit Slider -->
    <div class="large-12 columns">
    	<ul class="example-orbit" data-orbit data-options="bullets: false; timer: false; slide_number: false;">
	      	<li>
	      		<div class="row">
					  <?php
					  // New Query
						$args = array( 'post_type' => 'rp_films', 'posts_per_page' => 5 );
					 	$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); 
					  // Get the terms
					  $category = get_the_terms( get_the_ID(), 'film_category' );
					  $film_type = get_the_terms( get_the_ID(), 'film_type' );
					  ?>
					  <div class="large-2 small-4 columns">
					  	<a class="rp-vid-link" href="#" data-src="<?php get_video_src(); ?>">
					  		<?php the_thumbnail(); ?>
					  	</a>
					  	<h4 class="slider-film-title"><?php the_title(); ?></h4>
	              		<h5 class="slider-film-type"><?php echo $film_type->name; ?></h5>
					  </div>

	 
	  				<?php endwhile;?>
				</div> <!--End Orbit Row -->
			</li>	<!-- End Orbit Item -->
			<li>
				<div class="row">
					<?php
				  	// New Query
					$args2 = array( 'post_type' => 'rp_films', 'posts_per_page' => 5, 'offset' => 5 );
				 	$loop2 = new WP_Query( $args2 );
					while ( $loop2->have_posts() ) : $loop2->the_post(); 
				  	// Get the terms
				  	$category = get_the_terms( get_the_ID(), 'film_category' );
				  	$film_type = get_the_terms( get_the_ID(), 'film_type' );
				  	?>
				  	<div class="large-2 small-4 columns">
					  	<a class="rp-vid-link" href="#" data-src="<?php get_video_src(); ?>">
					  		<?php the_thumbnail(); ?>
					  	</a>
					  	<h4 class="slider-film-title"><?php the_title(); ?></h4>
	              		<h5 class="slider-film-type"><?php echo $film_type->name; ?></h5>
					</div>
					<?php endwhile;?>
				</div> <!--End Orbit Row -->
			</li>	<!-- End Orbit Item -->
		</ul> 
	</div>
</div> <!-- End Orbit -->



			
				    </div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>

