<?php get_header(); ?>

<div class="page-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title">Stories</h1>
			</div>
		</div>
	</div>

	<div class="story-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="small-12 medium-10 cell story-left-content">
					<?php
						$story_query = new WP_Query(
							array(
								'post_type' => 'story',
								'orderby' => 'post_date',
								'order' => 'ASC'
								)
							);

						if ($story_query->have_posts()) :
							while ($story_query->have_posts()) : $story_query->the_post(); ?>
							<div class="grid-x story-item gray-line">
								<!-- Title -->
								<div class="small-12 medium-12 cell story-title-section">
									<div class="post-title">
										<h4 class="story-title">
											<?php the_title(); ?>
											<span class='story-date'>
												<?php the_field('story_year'); ?>
											<span>
										</h4>
									</div>
								</div>
								<!-- Info -->
								<div class="small-12 medium-6 cell story-info-section">
									<div class="bg-cover story-featured-img" style="background-image:url('<?php the_field('intro_vertical_image'); ?>');"></div>
								</div>
								<div class="medium-1 cell"></div>
								<div class="small-12 medium-5 cell story-info-section">
									<div class="story-map bg-contain" style="background-image:url('<?php the_field('story_map_image'); ?>');"></div>
									<div class="story-quote">
										<p>
											<?php the_field('story_quote'); ?>
											<br>
											<span class="story-quote-author">- Morris</span>
										</p>
									</div>
								</div>
								<!-- Cover -->
								<div class="small-12 medium-12 cell bg-cover story-cover-1" style="background-image:url('<?php the_field('horitonzal_image_1'); ?>');"></div>
								<!-- Content -->
								<div class="small-12 medium-12 cell story-content-section">
									<div class="post-content">
										<?php the_field('story_content'); ?>
									</div>
								</div>
								<!-- Cover -->
								<div class="small-12 medium-12 cell bg-cover story-cover-1" style="background-image:url('<?php the_field('horitonzal_image_2'); ?>');"></div>
							</div>

							<?php endwhile; ?>
						<?php endif; ?>
				</div>
				<div class="medium-1 cell"></div>
				<div class="medium-1 cell nowrap">
					<ul class="terms-list">
						<?php
							$terms = get_terms(
								array(
									'taxonomy' => 'story-category',
									// 'hide_empty' => false,
									'order' => 'DESC'
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
