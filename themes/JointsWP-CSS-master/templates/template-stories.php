<?php
/*
Template Name: Stories
*/

get_header(); ?>

<div class="page-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title"><?php echo get_the_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="story-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="medium-10 cell">
					<?php
						$story_query = new WP_Query(
							array(
								'post_type' => 'story'
								)
							);

						if ($story_query->have_posts()) :
							while ($story_query->have_posts()) : $story_query->the_post(); ?>

							<div class="medium-12 cell">
								<!-- Title -->
								<div>
									<h4 class="story-title">
										<?php the_title(); ?>
										<span class='story-date'>
											<?php the_field('story_year'); ?>
										<span>
									</h4>
								</div>
							</div>

							<?php endwhile; ?>
						<?php endif; ?>
				</div>
				<div class="medium-1 cell"></div>
				<div class="medium-1 cell">
					<ul class="terms-list">
						<?php
							$terms = get_terms(
								array(
									'taxonomy' => 'story-category',
									'order' => 'DESC',
									'hide_empty' => false,
							) );
							foreach ($terms as $key => $term) : ?>
							<li class="term-item">
								<a href="#"><?php echo $term->name; ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="page-sidebar">
	</div>
</div>

<?php get_footer(); ?>
