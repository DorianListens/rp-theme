<div class="row">
<?php //rp_fpitems Query
$fp_args = array( 'post_type' => 'rp_fpitems', 'posts_per_page' => 2);
$rp_fploop = new WP_Query ( $fp_args );
?>
<?php while ($rp_fploop->have_posts()) : $rp_fploop->the_post(); ?>
  <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
    <div class="large-4 columns">
      <div class="img-circular" style="background-image: url(<?php echo $url; ?>);"></div>
      <h4 class="text-center"><?php the_title();?></h4>
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>
    
    <div class="large-4 columns">
      <div class="img-circular"></div>
      <h4 class="text-center">News</h4>
      <?php //News Query
      $news_args = array ('post_type' => 'post', 'posts_per_page' => 3);
      $rp_newsloop = new WP_Query ($news_args);
      ?>
      <p><ul>
        <?php while ($rp_newsloop->have_posts()) : $rp_newsloop->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      <?php endwhile; ?>
      </ul></p>
    </div>
  </div>
  <div class="row"><br /></div>