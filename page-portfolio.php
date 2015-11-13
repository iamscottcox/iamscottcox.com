<?php
/*
Template Name: Portfolio Page
*/

?>
<?php get_header(); ?>

<div class="container" role="main">

  <div class="row">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="page-header">
        <h1><?php the_title(); ?></h1>
      </div>

      <?php the_content(); ?>

    <?php endwhile; endif; ?>

    <?php
    $args = array(
      'post_type' => 'portfolio'
    );
    $the_query = new WP_Query( $args );
    ?>
    <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class-"row">
        <a class="portfolio-link" href="<?php the_permalink(); ?>">
          <div class="col-xs-4">
            <div class="content-block">
              <h3 class="text-center"><?php the_title(); ?></h3>
              <div class="text-center">
                <?php the_post_thumbnail('thumbnail'); ?>
              </div>
              <p class="portfolio-excerpt"><?php the_excerpt(); ?></p>
            </div>
          </a>
        </div>
      </div>


      <!-- <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> -->

    <?php endwhile; endif; ?>

  </div>


</div>

</div>

<?php get_footer(); ?>
