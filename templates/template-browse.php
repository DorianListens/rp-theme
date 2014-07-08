<?php
/*
Template Name: Rotating Planet Browse Page
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
							<?php get_template_part ('partials/content', 'film-panel'); ?>
				    <?php
				    //Setup Filter
				    $film_cats = get_terms('film_cat');
				    if ($film_cats) : ?>
					    <!-- Film Filter -->
					    <div class="row">
					    	<div class="large-12 columns">

									<dl id="filter" class="sub-nav">
									  <dt><?php
										if (function_exists('pll_e')) {
											pll_e("filters");
										} else {
											echo "Filters";
										}
										?>:</dt>
									  <dd class="active"><a href="#" class="active" data-filter="*"><span>All</span></a></dd>
									  <?php foreach ($film_cats as $cat ) : ?>
											<dd><a href="#" data-filter=".<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></dd>
										<?php endforeach; ?>
									</dl>
						    </div>
						</div>

				  	<?php endif; //filter ?>
				  	 <div class="row"><br /></div>
				  	<!-- .Broswe-Grid -->

				  	<div class="row">
						<div class="large-12 columns" >
							<ul class="large-block-grid-3" id="browse-grid">
								<?php //Film Query
								$browse_args = array( 'post_type' => 'rp_films', 'posts_per_page' => -1 );
								$film_loop = new WP_Query( $browse_args );
								while ($film_loop->have_posts()) : $film_loop->the_post();
								$film_types = get_the_terms( get_the_ID(), 'film_type');
								$single_film_cats = get_the_terms( get_the_ID(), 'film_cat');
								?>
								<li class="film-item <?php if ($single_film_cats) foreach ($single_film_cats as $cat) echo $cat->slug . ' '; ?>">
									<span data-tooltip class="has-tip tip-bottom" title="<h2 class='tip-title'><?php the_title(); ?></h2><p><?php the_excerpt(); ?></p>">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large_vid');?><h4 class="browse-film-title"><?php the_title(); ?></h4></a>
									</span>
								</li>
							<?php endwhile; ?>
							</ul>
						</div>
					</div>

					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
