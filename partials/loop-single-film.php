<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
	<section class = "vimeo_embed">
	 <div class="row">
      <div class="large-10 large-centered columns" id="bigvidcontainer">
      	<div id="bigvid" class='flex-video vimeo widescreen'>
					<iframe id="vimeoplayer" src="<?php get_video_src(); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
      </div>
    </div>
	</section>

	<div class="row">
		<div class="large-10 columns large-centered">
<header class="article-header">
	<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
	<span class="share-links">
	<i class="fa fa-facebook-square fa-2x f-share" data-href="<?php the_permalink() ?>"></i>
	<i class="fa fa-twitter fa-2x t-share" data-href="<?php the_permalink() ?>"></i>
</span>
	<?php //get_template_part( 'partials/content', 'byline' ); ?>
	</header> <!-- end article header -->
			<div class="row">
				<div class="large-8 small-12 columns">

			    <section class="entry-content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
					<a class="button radius rp-vid-link" href="#" data-src="<?php get_video_src();?>"><?php
					if (function_exists('pll_e')) {
						pll_e("full film");
					} else {
						echo "Full Film";
					}
					?></a>
					<?php related_clips(); ?>
				</section><!-- end article section -->
				</div>
				<div class="large-4 small-12 columns">
					<?php display_film_info(); ?>
				</div>
			</div>
		</div>
	</div>

	<footer class="article-footer">
		<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->
	<?php comments_template(); ?>


</article> <!-- end article -->
