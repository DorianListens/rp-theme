<!-- <div class="rp-section "> -->
  <!-- <div class="row"> -->
    <ul data-orbit class="browse-slider">
      <?php
      //Single Query
      $browse_args = array( 'post_type' => 'rp_films', 'posts_per_page' => 3 );
      $film_loop = new WP_Query( $browse_args );
      // $count = 0
      while ($film_loop->have_posts()) : $film_loop->the_post();
      $single_film_cats = get_the_terms( get_the_ID(), 'film_cat');

      ?>
      <?php // echo $count

         if (! $count) {
            echo '<li class="active">';
          } else {
            echo "<li>";
        }
        ?>
          <!-- <li class="active"> -->
          <div class="row">
            <div class="large-6 small-6 columns">
              <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="large-6 small-6 columns end">
              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">
                  <h3 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h3>
                </header> <!-- end article header -->

                <section class="entry-content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
                </section> <!-- end article section -->

                Filed Under: <?php if ($single_film_cats) foreach ($single_film_cats as $cat) echo $cat->name . ' '; ?>
                <span class="right"><a href="<?php the_permalink(); ?>">Read More...</a></span>

                <footer class="article-footer">
                  <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>
                </footer> <!-- end article footer -->
              </article><!-- end article -->
            </div>
          </div>
        </li>
        <?php $count++; ?>
      <?php endwhile; ?>
    </ul>
  <!-- </div>
</div> -->
