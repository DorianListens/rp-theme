<?php
/*
The Template file for displaying the Browse Page

*/
?>

<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row clearfix">
			
					<div id="main" class="large-12 medium-12 columns first clearfix" role="main">
					
					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'page' ); ?>
					    					
					    <?php endwhile; else : ?>
					
					   		<?php get_template_part( 'partials/content', 'missing' ); ?>

					    <?php endif; ?>

				    <?php 
				    //Setup Filter
				    $film_cats = get_terms('film_cat');
				    if ($film_cats) : ?>
					    <!-- Film Filter -->
					    <div class="row">
					    	<div class="large-12 columns">
						        <ul id="filter" class="filter clearfix">
						            <li><a href="#" class="active" data-filter="*"><span>All</span></a></li>
						            <?php foreach ($film_cats as $cat ) : ?>
						            <li><a href="#" data-filter=".<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
						            <?php endforeach; ?>
						        </ul><!-- /filter -->
						    </div>
						</div>

				  	<?php endif; //filter ?> 
				  	<!-- .Broswe-Grid -->
				  	<div class="row">
						<div class="large-12 columns" id="browse-grid">
			<?php //Film Query
			$browse_args = array( 'post_type' => 'rp_films', 'posts_per_page' => -1 );
			$film_loop = new WP_Query( $browse_args );
			while ($film_loop->have_posts()) : $film_loop->the_post();
			$film_types = get_the_terms( get_the_ID(), 'film_type');
			$single_film_cats = get_the_terms( get_the_ID(), 'film_cat');
			?>
			<div class="film-item <?php if ($single_film_cats) foreach ($single_film_cats as $cat) echo $cat->slug . ' '; ?>">
				<span data-tooltip class="has-tip tip-right" title="<h1 class='tip-title'><?php the_title(); ?></h1><p><?php the_excerpt(); ?></p>">
					<a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {the_post_thumbnail();} else { echo '<img src="http://placehold.it/215x121&text=[img]" />';}?></a>
				</span>
			</div>
		<?php endwhile; ?>
	</div>
</div>
			
					</div> <!-- end #main -->
  
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>