<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<div class="row">
		<div class="large-4 small-6 columns">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<div class="large-6 small-6 columns end">
	<header class="article-header">
		<h2><?php the_title(); ?></h2>
		<?php //get_template_part( 'partials/content', 'byline' ); ?>
		</p>
	</header> <!-- end article header -->

	<section class="entry-content clearfix" itemprop="articleBody">

		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
			<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

		<?php // comments_template(); // uncomment if you want to use them ?>
		</div>
	</div>
</article> <!-- end article -->
