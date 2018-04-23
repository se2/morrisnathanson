<?php
/*
Template Name: Template Cart
*/

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="page-wrapper cart-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title"><?php the_title(); ?></h1>
      </div>
		</div>
	</div>
	<div class="gallery-container single-page-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="small-12 medium-12 large-12 cell">
          <div class="grid-x">
            <?php the_content(); ?>
          </div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="page-sidebar page-sidebar__blue"></div> -->
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
