<div class="row">
      <?php //Film Query
      $browse_args = array( 'post_type' => 'rp_films', 'posts_per_page' => 4 );
      $film_loop = new WP_Query( $browse_args );
      while ($film_loop->have_posts()) : $film_loop->the_post();
      $film_types = get_the_terms( get_the_ID(), 'film_type');
      $single_film_cats = get_the_terms( get_the_ID(), 'film_cat');
      ?>
      <div class="large-3 small-6 columns">
          <a href="<?php the_permalink(); ?>"><?php get_video_thumb('200px');?></a>
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
          <span class="right"><a href="<?php the_permalink(); ?>">Read More...</a></span>
      </div>
    <?php endwhile; ?>
</div>
