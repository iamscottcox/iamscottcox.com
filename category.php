<?php get_header(); ?>

<div class="container" role="main">

  <div class="row">

    <div class="col-md-8">

      <div class="page-header">
        <h1><?php wp_title( '' ); ?></h1>
      </div>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article class="post">

          <div class="row">

            <div class="col-sm-4">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>

            <div class="col-sm-8">

              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

              <p class="meta">
                By <?php the_author_posts_link(); ?>
                on <?php echo the_time('l, F jS, Y'); ?>
                <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
              </p>

            </div>

          </div>

        </article>
      <?php endwhile; endif; ?>

    </div>

  <?php get_sidebar( 'blog' ); ?>

</div>

</div>

<?php get_footer(); ?>
