<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-12 medium-12 columns clearfix" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					    	<?php get_template_part( 'partials/loop', 'archive' ); ?>
					
					    <?php endwhile; ?>	
					
					        <?php if (function_exists('joints_page_navi')) { ?>
					            <?php joints_page_navi(); ?>
					        <?php } else { ?>
					        
					            <nav class="wp-prev-next">
					                <ul class="clearfix">
					        	        <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "jointstheme")) ?></li>
					        	        <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "jointstheme")) ?></li>
					                </ul>
					            </nav>
					        <?php } ?>		
					
					    <?php else : ?>
					    
    						<?php get_template_part( 'partials/content', 'missing' ); ?>
					
					    <?php endif; ?>
			
				    </div> <!-- end #main -->
    
				
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>

	<section class="eight columns push_one">	
		<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
					<div>
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>	
		<?php endwhile; 
    //Setup Filter
    $cats = get_terms('portfolio_cats');
    if($cats) { ?>
        
        <!-- Portfolio Filter -->
        <ul id="portfolio-cats" class="filter clearfix">
            <li><a href="#" class="active" data-filter="*"><span>All</span></a></li>
            <?php
            foreach ($cats as $cat ) : ?>
            <li><a href="#" data-filter=".<?php echo $cat->slug; ?>"><span><?php echo $cat->name; ?></span></a></li>
            <?php endforeach; ?>
        </ul><!-- /portfolio-cats -->
  <?php } ?> 
		<hr />
		  <div class="port-grid clearfix">
  <?php
  // New Query
	$args = array( 'post_type' => 'dl_portfolio', 'posts_per_page' => -1 );
  $loop = new WP_Query( $args );
  while ( $loop->have_posts() ) : $loop->the_post(); 
  // Get the terms
  $terms = get_the_terms( get_the_ID(), 'portfolio_cats' );
  ?>
 		<div class="portfolio-item <?php if($terms) foreach ($terms as $term) echo $term->slug .' '; ?>">
      <div class="port-piece">
			<div class="port-image">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('medium'); ?></a>
				<div class="port-cat">
				<h5><?php foreach ($terms as $term) : echo $term->name; endforeach;?></h5>
				</div>
			</div>
      <div class="port-content">
			<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h3>
      <div class="port-date">
      <?php echo get_the_date('F, Y') ?>
      </div>
			<div class="port-excerpt">
				<?php the_excerpt(); ?>
			</div> 
    </div>
  </div>

		</div>
 
  <?php endwhile;?>
  </div>
  <br />
  <nav>
  <div class = "navleft"><?php previous_posts_link('Previous') ?></div>
  <div class="navright"><?php next_posts_link('More') ?></div>
  </nav>
  	
	</div>
	</section>