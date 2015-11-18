<?php get_header(); ?>

<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php bloginfo('title'); ?></h1>

          <p><?php the_content(); ?></p>

        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-6 portfolio">
      <a href="<?php echo site_url(); ?>/portfolio"><h2 class="text-center home-content-header">Portfolio</h2></a>

      <?php
      $portfolio_args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 2
      );
      $portfolio_query = new WP_Query( $portfolio_args );
      ?>
      <?php if ( have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
      ?>

      <div class="row front-page-content">
        <div class="col-sm-4">
          <a href="<?php the_permalink(); ?>">
            <div class="text-center post-thumbnail">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
          </div>
          <div class="col-sm-8">
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
          </div>
        </a>
      </div>

    <?php endwhile; endif; ?>

  </div>

  <div class="col-md-6 blog">
    <a href="<?php echo site_url(); ?>/blog"><h2 class="text-center home-content-header">Blog</h2></a>


    <?php
    $portfolio_args = array(
      'post_type' => 'post',
      'posts_per_page' => 2
    );
    $portfolio_query = new WP_Query( $portfolio_args );
    ?>
    <?php if ( have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
    ?>

    <div class="row front-page-content">
      <a href="<?php the_permalink(); ?>">
        <div class="col-sm-4">
          <div class="text-center post-thumbnail">
            <?php the_post_thumbnail('thumbnail'); ?>
          </div>
        </div>
        <div class="col-sm-8">
          <h3><?php the_title(); ?></h3>
          <p><?php the_excerpt(); ?></p>
        </div>
      </a>
    </div>

  <?php endwhile; endif; ?>

</div>

</div>
</div>

<?php get_footer(); ?>
