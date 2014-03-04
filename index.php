<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row clearfix">
			
				    <div id="main" class="large-12 medium-12 columns clearfix" role="main">

				    	  <div class="row">

						    <div class="large-12 columns"><div id="bigvid" class='flex-video vimeo widescreen'>
						      <iframe src="//player.vimeo.com/video/87322941?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>
						    </div>
						    <a id="main-vid-link" href="#" class="right">More About This Film</a>
						  </div>
						<div class="row"><br /></div>

						<?php get_template_part( 'partials/loop', 'rp-slider' ); ?>
						<?php get_template_part( 'partials/loop', 'rp-threeup'); ?>
			
				    </div> <!-- end #main -->
				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>

