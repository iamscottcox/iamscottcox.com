<?php get_header(); ?>

<div class="container" role="main">

  <div class="row">

    <div class="col-md-12">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="page-header">
          <h1><?php the_title(); ?></h1>
        </div>


        <?php the_content(); ?>

      <?php endwhile; endif; ?>

    </div>

  </div>

  <div class="row contact-row">
    <div class="col-sm-6 contact-mail text-center">
      <a href="mailto:scottcox89@gmail.com"><p><span class="glyphicon glyphicon-envelope"></span>scottcox89@gmail.com</p></a>
    </div>
    <div class="col-sm-6 contact-phone text-center">
      <a href="tel:07780604094"><p><span class="glyphicon glyphicon-earphone"></span>07780604094</p></a>
    </div>

  </div>

</div>

<?php get_footer(); ?>
