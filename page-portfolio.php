<?php
/*
Template Name: Portfolio Page
*/

?>

<?php get_header(); ?>

<div class="container" role="main">
  <div class="row">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="page-header col-sm-12">
        <h1><?php the_title(); ?></h1>
      </div>

      <?php the_content(); ?>

    <?php endwhile; endif; ?>

  </div>
</div>

<div class="container">
  <?php
  $args = array(
    'post_type' => 'portfolio'
  );
  $the_query = new WP_Query( $args );
  ?>
  <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

    <div class-"row">
      <a class="portfolio-link" href="<?php the_permalink(); ?>">
        <div class="col-sm-4">
          <div class="content-block">
            <div class="text-center">
              <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <h4 class="text-center"><?php the_title(); ?></h4>
          </div>
        </a>
      </div>
    </div>

  <?php endwhile; endif; ?>
</div>



<?php get_footer(); ?>
