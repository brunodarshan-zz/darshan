<?php
  /*
   Template Name: About
   Template Post Type: sessions
  */
?>
<section id="<?php?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-offset-2 col-md-3 text-center">
      <?php the_post_thumbnail('thumbnail', array('class'=>'round')); ?>
      </div>
      <div class="col-sm-8 col-md-5">
      <h2 ><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </div>
  </div>
</section>
