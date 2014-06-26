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
          <div class="blog-row" data-equalizer>
            <div class="blog-image" data-equalizer-watch>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
              </a>
            </div>
            <div class="large-6 small-6 columns" data-equalizer-watch>
              <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">
                  <h2><a href="<?php the_permalink() ?>" rel="bookmark" class="article-link" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                  <p>Filed Under: <?php if ($single_film_cats) foreach ($single_film_cats as $cat) echo $cat->name . ' '; ?></p>
                </header> <!-- end article header -->

                <section class="entry-content clearfix" itemprop="articleBody">
                  <?php the_content(); ?>
                </section> <!-- end article section -->


                <footer class="article-footer text-right">
                  <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointstheme') . '</span> ', ', ', ''); ?></p>

                  <p><a href="<?php the_permalink(); ?>">Read More...</a></p>
                  <i class="fa fa-facebook-square fa-2x f-share" data-href="<?php the_permalink() ?>"></i>
                  <i class="fa fa-twitter fa-2x t-share" data-href="<?php the_permalink() ?>"></i>

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
