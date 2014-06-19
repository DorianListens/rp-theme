<div class="bpanel">
  <p class="lead">￼Committed to the power of distinctive storytelling, Rotating Planet produces and distributes an extensive library of award winning documentaries, TV series and short films.</p>

<!-- <p class="lead">We are fascinated by what makes the Earth go ‘round.</p> -->
<h2>We are ROTATING PLANET</h2>
  <!-- <h2>Recent News:</h2>
<ul>
<?php //News Query
 $news_args = array ('post_type' => 'post', 'posts_per_page' => 3);
 $rp_newsloop = new WP_Query ($news_args); ?>
 <?php while ($rp_newsloop->have_posts()) : $rp_newsloop->the_post(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
 <?php endwhile;
    wp_reset_query(); ?>
  </ul></p> -->
   <!-- </div>
 </div>
</div> -->

</div>

<!-- <div class="logo-image"></div> -->

<div class="cpanel">
  <!-- <div class="row"> -->
    <h3>Recent News:</h3>
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
