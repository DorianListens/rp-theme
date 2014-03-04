<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<section class = "vimeo_embed">
	 <div class="row">
      <div class="large-10 large-centered columns">
      	<?php display_video(); ?>
      </div>
    </div>
	
	

	</section>					
	
	<header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php //get_template_part( 'partials/content', 'byline' ); ?>
    </header> <!-- end article header -->
	<div class="row">
		<div class="large-8 small-12 columns">	
	    <section class="entry-content clearfix" itemprop="articleBody">
			<?php the_post_thumbnail('full'); ?>
			<?php the_content(); ?>
		</section><!-- end article section -->
		</div> 
		<div class="large-4 small-12 columns panel">
			<h4>Film Information</h4>
			<?php display_film_info(); ?>
		</div>
	</div>
						
	<footer class="article-footer">
		<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->
									
	<?php comments_template(); ?>	
													
</article> <!-- end article -->