<div class="bpanel show-for-medium-up">
  <p class="lead">￼Committed to the power of distinctive storytelling, Rotating Planet produces and distributes an extensive library of award winning documentaries, TV series and short films.</p>

<!-- <p class="lead">We are fascinated by what makes the Earth go ‘round.</p> -->
<h2>We are ROTATING PLANET</h2>
</div>

<div class="cpanel radius show-for-medium-up">
  <!-- <div class="row"> -->
    <h3>Recent News:</h3>
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
<div class="show-for-medium-up"  id="lightswitch">
  <i class="fa fa-lightbulb-o fa-4x"></i>
</div>
