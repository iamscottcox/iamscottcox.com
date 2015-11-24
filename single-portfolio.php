<?php get_header(); ?>

<div class="container" role="main">
  <div class="row">
    <div class="col-md-8">
      <div class="page-header">
        <h3><a href="<?php bloginfo( 'url' ); ?>/portfolio"><span class="glyphicon glyphicon-arrow-left"></span>Back to Portfolio</a></h3>
      </div>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="row">
          <div class="col-sm-12">

            <div class="page-header">
              <h1><?php the_title(); ?></h1>
              <p class="meta">
                By <?php the_author_posts_link(); ?> on <?php echo the_time('l, F jS, Y'); ?>
              </p>
            </div>

            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small' );
            $url = $thumb['0']; ?>

            <div class="single-image" style="background: url(<?php echo $url ?>) no-repeat top center; background-size: cover; background-color: #fff">
            </div>

            <p class="single-content"><?php the_content(); ?></p>

          </div>
        </div>

        <hr>


      <?php endwhile; endif; ?>

    </div>

    <div class="col-md-4">
      <?php get_sidebar('blog'); ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
