<?php
/*
Template Name: Rotating Planet Front Page
*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row clearfix">

				    <div id="main" class="large-12 medium-12 columns clearfix" role="main">
							<div class="large-8 columns">
								<?php get_template_part( 'partials/loop', 'rp-main' ); ?>
							</div>

							<div class="large-4 columns">
								<?php get_template_part( 'partials/loop', 'rp-side' ); ?>
							</div>
<!-- 						<hr /> -->


				    </div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
