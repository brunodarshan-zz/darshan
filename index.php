<?php get_header(); ?>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <header class="page-header" id="headerSite">
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-4 col-sm-8 col-md-offset-2 col-md-8 text-center">
            <h4 class="down"> <?php bloginfo('name'); ?> </h4>
            <h1 id="" class="down"><?php bloginfo('description')?><br>
                </h1>
                 <div class="text-center center-block social-links">
                     <br />
                       <a href="https://www.facebook.com/brunodarshan" target="_blank"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
         	            <a href="https://twitter.com/brunodarshan" target="_blank"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
         	            <a href="https://goo.gl/feiewM" target="_blank"><i id="social-gp" class="fa fa-linkedin-square fa-3x social"></i></a>
         	            <a href="mailto:brunodarshan@gmail.com" target="_blank"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                </div>
          </div>
        </div>
      </div>

    </header>
    <?php $sessions = new WP_Query(array(
          'posts_per_page' => 3,
          'post_type'      => 'sessions',
          'paged'          => false
    ));
        ?>
    <?php if ($sessions -> have_posts()): ?>
        <?php while($sessions -> have_posts()): $sessions -> the_post(); ?>
          <?php the_title() ?>
        <?php endwhile; ?>
    <?php endif; ?>


<?php get_footer(); ?>
