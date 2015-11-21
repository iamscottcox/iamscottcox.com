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
  <a href="<?php echo site_url(); ?>/portfolio">
    <div class="row portfolio">
      <div class="col-sm-12">
        <h2 class="text-center">Portfolio</h2>
      </div>
    </div>
  </a>
</div>

<div class="container-fluid">
  <div class="row portfolio">

    <?php
    $portfolio_args = array(
      'post_type' => 'portfolio',
      'posts_per_page' => 3
    );
    $portfolio_query = new WP_Query( $portfolio_args );
    ?>
    <?php if ( have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
    ?>

    <article class="col-sm-4">
      <a href="<?php the_permalink(); ?>">
        <div class="portfolio-tile">
          <div class="text-center portfolio-thumbnail">
            <?php the_post_thumbnail('thumbnail'); ?>
          </div>
          <h3 class="text-center"><?php the_title(); ?></h3>
        </div>
      </a>
    </article>





  <?php endwhile; endif; ?>

</div>
<hr>

<div class="col-md-6 blog">
  <a href="<?php echo site_url(); ?>/blog"><h2 class="text-center home-content-header">Blog</h2></a>


  <?php
  $blog_args = array(
    'post_type' => 'post',
    'posts_per_page' => 3
  );
  $blog_query = new WP_Query( $blog_args );
  ?>
  <?php if ( have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
  ?>

  <div class="row">
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

  <hr>

<?php endwhile; endif; ?>

</div>

</div>
</div>

<?php get_footer(); ?>
