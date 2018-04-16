<?php
/*
Template Name: Stories
*/

get_header(); ?>

<!-- Page Title -->
<div class="gray-line">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="story-container">
	<div class="grid-container">
		<div class="grid-x">

			<?php
			  $story_query = new WP_Query( 'post-type=stories' );

			  if ($story_query->have_posts()) :
				while ($story_query->have_posts()) : $story_query->the_post(); ?>

					<div class="medium-10 cell">
						<!-- Title -->
						<div class="">
							<h4 class="story-title"><?php the_title() ?><span class='story-date'> <?php the_field('story_year') ?><span></h4>
						</div>
					</div>

					<div class="medium-10 cell">
						<div class="grid-x">
							<div class="medium-6 cell">

							</div>
						</div>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
