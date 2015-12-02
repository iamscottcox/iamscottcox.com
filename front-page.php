<?php get_header(); ?>

<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <h1><?php bloginfo('title'); ?></h1>

          <p><?php the_content(); ?></p>

        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="container portfolio-container">
  <div class="row portfolio-heading">
    <a href="<?php echo site_url(); ?>/portfolio">
      <div class="col-xs-12">
        <h2 class="text-center">Portfolio</h2>
      </div>
    </a>
  </div>
  <div class="row portfolio-row">

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

        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small' );
        $url = $thumb['0']; ?>

        <div class="portfolio-tile" style="background: url(<?php echo $url ?>) no-repeat top center; background-size: cover; background-color: #fff">
        </div>

      </a>
    </article>

  <?php endwhile; endif; ?>

</div>
</div>

<div class="container blog-container">
  <div class="row blog-heading">
    <a href="<?php echo site_url(); ?>/blog">
      <div class="col-xs-12">
        <h2 class="text-center">Blog</h2>
      </div>
    </a>
  </div>
  <div class="row blog-row">

    <?php
    $blog_args = array(
      'post_type' => 'post',
      'posts_per_page' => 2
    );
    $blog_query = new WP_Query( $blog_args );
    ?>
    <?php if ( have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
    ?>

    <div class="col-md-6">
      <a href="<?php the_permalink(); ?>">
        <div class="blog-tile">
          <div class="row">
            <div class="col-sm-4">
              <div class="text-center post-thumbnail">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
            </div>
            <div class="col-md-8">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>
        </div>
      </div>

    <?php endwhile; endif; ?>

  </div>
</div>

<?php get_footer(); ?>
