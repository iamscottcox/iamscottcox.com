<?php get_header(); ?>

<div class="container" role="main">
  <div class="row">
    <div class="col-md-8">
      <div class="page-header">
        <h1><a href="<?php bloginfo( 'url' ); ?>/portfolio"><span class="glyphicon glyphicon-arrow-left"></span>Back to Portfolio</a></h1>
      </div>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="row">
          <div class="col-sm-12">

            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small' );
            $url = $thumb['0']; ?>

            <div class="single-portfolio-image" style="background: url(<?php echo $url ?>) no-repeat top center; background-size: cover; background-color: #fff">
            </div>

          </div>
        </div>



        <h2><?php the_title(); ?></h2>

        <?php the_content(); ?>

      <?php endwhile; endif; ?>

      </div>

      <div class="col-md-4">
        <?php get_sidebar('blog'); ?>
      </div>

    </div>
  </div>

<?php get_footer(); ?>
