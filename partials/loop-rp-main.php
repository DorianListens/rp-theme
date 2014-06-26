<div class="row">
  <div class="medium-4 columns right">
    <?php get_template_part( 'partials/loop', 'rp-side' ); ?>
  </div>
  <div class="medium-8 columns">
    <div class="rp-section">
      <div class="row">
        <?php // New Query
        wp_reset_query();
        $slider_args = array( 'post_type' => 'rp_films', 'posts_per_page' => -1);
        $rp_slider_loop = new WP_Query( $slider_args );
        if ($rp_slider_loop->have_posts()) : $counter = 0; $rowCount = 0; ?>

        <?php while ( $rp_slider_loop->have_posts() ) : ?>
          <?php if ($counter == 0){$rp_slider_loop->the_post();} ?> <!-- First Film -->
            <div class="large-12 columns" id="bigvidcontainer">
              <div id="bigvid" class='flex-video vimeo widescreen'>
                <iframe id="vimeoplayer" src="<?php get_video_src(); ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>

              <hr />

            </div>
      </div>
      <!-- <div class="row">
        <div class="large-12 columns">
          <p><a id="main-vid-link" href="<?php the_permalink(); ?>" class="right">More About This Film</a></p>
          <br />
        </div>
      </div> -->
    </div>
  </div>

</div>

<div class="rp-section">
  <div class="row"> <!-- Main Orbit Slider -->
    <!-- <div class="large-2 columns">

      </div>
    </div> -->
      <div class="large-12 columns end">
        <ul class="rp-slider" data-orbit data-options="bullets: false; timer: false; slide_number: false;">
          <li> <!-- First Orbit Slide -->
            <div class="row">
          <?php $counter++;  ?>
          <?php while ($counter < 5) :
            // Get the terms
           $film_cats = get_the_terms( get_the_ID(), 'film_cat' );
           $film_types = get_the_terms( get_the_ID(), 'film_type' );
           ?>
              <div class="large-3 medium-4 small-6 columns">
                <a class="rp-vid-link" href="<?php the_permalink(); ?>" data-title="<?php the_title(); ?>" data-src="<?php get_video_src(); ?>" data-link="<?php the_permalink(); ?>" data-excerpt = "<?php the_excerpt(); ?>">
                  <?php if (has_post_thumbnail()) {

                  the_post_thumbnail('video_thumb');
                } else {

                  get_video_thumb(350);
                }?>
                  <hr/>
                  <h4 class="film-title"><?php the_title(); ?></h4>
                </a>
                <span class="fp-excerpt"><?php the_excerpt(); ?></span>
              </div>
          <?php if ($counter == 4) : $rowCount++ ?>
          </div> <!--End Orbit Row -->
        <?php if ($rowCount == 2) : $rowCount = 0; ?>
        </li>	<!-- End Orbit Slide -->
        <li> <!-- New Orbit Slide -->
        <?php endif ?>
          <div class="row">
        <?php if ($rp_slider_loop->have_posts()) {$counter = 0;} ?>
      <?php endif ?>
      <?php $counter += 1; ?>
        <?php if (!($rp_slider_loop->current_post + 1 < $rp_slider_loop->post_count)) {break;} ?>
        <?php $rp_slider_loop->the_post(); ?>

      <?php endwhile; ?>
    <?php endwhile; ?>
  <?php endif; ?>
      </ul>
    </div>
  </div> <!-- End Orbit -->
</div>
