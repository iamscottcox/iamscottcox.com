<?php get_header(); ?>

<div class="container" role="main">
  <div class="row">
    <div class="col-md-8">

      <div class="row back-to-blog-row">
        <div class="col-sm-12">
          <h3><a href="<?php bloginfo( 'url' ); ?>/blog"><span class="glyphicon glyphicon-arrow-left"></span>Back to Blog</a></h3>
        </div>
      </div>

      <hr>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="row single-background">
          <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
            <p class="meta">
              By <?php the_author_posts_link(); ?> on <?php echo the_time('l, F jS, Y'); ?>
            </p>

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

              <div class="single-image" style="background: url(<?php echo $url ?>) no-repeat top center; background-size: cover; background-color: #fff">
              </div>

              <div class="single-content">
                <?php the_content(); ?>
              </div>

            </div>
          </div>

        <?php endif; ?>

        <div class="row">
          <div class="col-sm-12">
            <p>Post Type: <span class="post-type"><?php echo get_post_format(); ?></span> |
            Category: <?php the_category( ', ' );?> |
            <?php the_tags('Tags: ', ', ');?></p>
          </div>
        </div>


      <hr>

    <?php endwhile; endif; ?>

    </div> <!-- End col-md-8 -->

  <?php get_sidebar( 'blog' ); ?>

</div>

</div>

<?php get_footer(); ?>
