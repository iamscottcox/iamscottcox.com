<?php get_header(); ?>

<div class="container" role="main">

  <div class="row">

    <div class="col-md-8">

      <div class="row">
        <div class="col-sm-12">
          <h3><a href="<?php bloginfo( 'url' ); ?>/blog"><span class="glyphicon glyphicon-arrow-left"></span>Back to Blog</a></h3>
        </div>
      </div>

      <hr>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
          <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
          <p class="meta">
            By <?php the_author_posts_link(); ?> on <?php echo the_time('l, F jS, Y'); ?>
          </p>
        </div>


        <?php if( has_post_format( 'image' )): ?>

          <p><?php the_post_thumbnail('medium'); ?></p>

          <?php the_content(); ?>

        <?php elseif ( has_post_format( 'quote' )): ?>

          <blockquote>
            <?php the_excerpt(); ?>
          </blockquote>

          <?php the_content(); ?>

        <?php else: ?>

          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small' );
          $url = $thumb['0']; ?>

          <div class="single-portfolio-image" style="background: url(<?php echo $url ?>) no-repeat top center; background-size: cover; background-color: #fff">
          </div>

          <?php the_content(); ?>

        <?php endif; ?>


        <hr>

        <p>
          Post Type: <span class="post-type"><?php echo get_post_format(); ?></span> |
          Category: <?php the_category( ', ' );?> |
          <?php the_tags('Tags: ', ', ');?>

        </p>

        <hr>

      <?php endwhile; endif; ?>

    </div>

    <?php get_sidebar( 'blog' ); ?>

  </div>

</div>

<?php get_footer(); ?>
