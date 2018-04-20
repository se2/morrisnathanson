<?php
/*
Template Name: In the Studio
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

<!-- Featured Video -->
<div class="grid-container studio-featured-video" id="video-ops">
	<div class="grid-x align-center align-middle">
		<div class="medium-10 cell">
			<div class=""><?php the_field('studio_main_video'); ?></div>
			<p class="studio-main-video-caption"><?php the_field('studio_main_video_caption'); ?></p>
		</div>
	</div>
</div>

<!-- Related Videos -->
<div class="studio-related-videos-container">
	<div class="grid-container">
		<div class="grid-x">
			<div class="medium-12 cell">

				<?php if( have_rows('studio_related_videos') ): ?>

					<div class="grid-x medium-up-3 small-up-1">

						<?php while ( have_rows('studio_related_videos') ) : the_row();
							$studio_related_video_thumbnail = get_sub_field('studio_related_video_thumbnail');
							$studio_related_video_url = get_sub_field('studio_related_video_url');
							$studio_related_video_caption = get_sub_field('studio_related_video_caption');
						?>

							<div class="cell medium-4 text-center studio-related-video-link">
								<a href='<?php echo $studio_related_video_url; ?>' rel="lightbox" data-lightbox-type="iframe">
									<?php if( !empty($studio_related_video_thumbnail) ): ?>
										<img src="<?php echo $studio_related_video_thumbnail['url']; ?>" src="<?php echo $studio_related_video_thumbnail['alt']; ?>" />
									<?php endif; ?>
								</a>

								<p class="studio-related-video-caption"><?php echo $studio_related_video_caption; ?></p>
							</div>

						<?php endwhile; ?>

					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>

<!-- In Progress Header -->
<div class="grid-container studio-progress-header" id="work-in-progress">
	<div class="grid-x align-center align-middle">
		<div class="cell shrink">
			<h3><?php the_field('studio_progress_header'); ?></h3>
		</div>
	</div>
</div>

<!-- In Progress Slider -->
<div class="background-image studio-progress-container pos-rel" style="background-image: url('<?php the_field('studio_progress_background_image'); ?>');">
	<div class="slideshow-wrapper" id="in-the-studio-slideshow">
		<?php
			$slides = get_field('slideshow');
			foreach ($slides as $key => $slide) :
		?>
		<div class="in-the-studio-slide pos-rel">
			<div class="slide-image bg-cover" style="background-image:url('<?php echo $slide['slide_image']; ?>');"></div>
			<div class="slide-caption"><?php echo $slide['slide_caption']; ?></div>
		</div>
		<?php endforeach; ?>
	</div>
	<div class="slide-arrows" id="in-the-studio-arrows">
		<div class="slide-arrow slide-prev slick-arrow" style="display: block;"></div>
		<div class="slide-arrow slide-next slick-arrow" style="display: block;"></div>
	</div>
</div>

<!-- Schedule a Visit CTA -->
<div class="studio-visit-cta" id="schedule-visit">
	<div class="grid-container">
		<div class="grid-x">
			<div class="medium-4 cell">
				<h3><?php the_field('studio_visit_headline'); ?></h3>
			</div>

			<div class="medium-7 medium-offset-1 cell studio-visit-description">
				<p><?php the_field('studio_visit_description'); ?></p>

				<div class="grid-x shrink">
					<div class="studio-visit-button outline-button" data-open="studio-contact-modal">
						<?php the_field('studio_visit_cta_text'); ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<?php get_footer(); ?>
