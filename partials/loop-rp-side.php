<div class="bpanel show-for-medium-up">
<?php the_content(); ?>
</div>

<div class="cpanel radius show-for-medium-up">
  <!-- <div class="row"> -->
    <h3><?php
    if (function_exists('pll_e')) {
      pll_e("recent news");
    } else {
      echo "Recent News";
    }
     ?>:</h3>
    <br />
  <ul>
<?php //News Query
 $news_args = array ('post_type' => 'post', 'posts_per_page' => 3);
 $rp_newsloop = new WP_Query ($news_args); ?>
 <?php while ($rp_newsloop->have_posts()) : $rp_newsloop->the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
 <?php endwhile;
    wp_reset_query(); ?>
    </ul></p>
  <!-- </div> -->
</div>
