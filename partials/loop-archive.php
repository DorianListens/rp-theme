<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<div class="row">
		<div class="large-9 columns large-centered">
			<div class="blog-row" data-equalizer>

					<div class="blog-image" data-equalizer-watch>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
					</div>
					<div class="small-6 columns" data-equalizer-watch>
						<header class="article-header">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" class="article-link" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<?php //get_template_part( 'partials/content', 'byline' ); ?>
							</p>
						</header> <!-- end article header -->

						<section class="entry-content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
						</section> <!-- end article section -->

						<footer class="article-footer">
					    	<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
								<i class="fa fa-facebook-square fa-2x f-share" data-href="<?php the_permalink() ?>"></i>
								<i class="fa fa-twitter fa-2x t-share" data-href="<?php the_permalink() ?>"></i>
						</footer> <!-- end article footer -->


							<?php // comments_template(); // uncomment if you want to use them ?>
					</div>
				<!-- </a> -->
			</div>
		</div>
	</div>
</article> <!-- end article -->
