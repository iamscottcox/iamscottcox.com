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
  <div class="row portfolio-row">

    <?php
    $portfolio_args = array(
      'post_type' => 'portfolio'
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


<?php get_footer(); ?>
