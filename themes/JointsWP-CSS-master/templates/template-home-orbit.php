<?php
/*
Template Name: Home
*/

get_header(); ?>

<!-- Banner -->
<div class="home-banner background-image" style="background-image: url('<?php the_field('home_banner_image'); ?>');">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell medium-4 home-banner-text">
				<p class="home-headline-small">Morris Nathanson</p>
				<h1 class="home-headline-large"><?php the_field('home_banner_headline'); ?></h1>
				<a class="home-banner-cta" href="<?php the_field('home_banner_cta_link'); ?>"><?php the_field('home_banner_cta_text'); ?></a>
			</div>
		</div>
	</div>
</div>

<!-- Featured Happenings (news articles) -->
<div class="home-featured-container">

	<div class="grid-x align-middle align-center">
		<div class="cell shrink">
			<h3 class="home-featured-header"><?php the_field('home_featured_section_header'); ?></h3>
		</div>
	</div>

	<div class="orbit" role="region" aria-label="Featured Happenings – Recent News Articles" data-orbit>
		<div class="orbit-wrapper">
			<div class="orbit-controls">
			  <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
			  <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
			</div>

			<div class="grid-container">
				<div class="grid-x">
					<!--  News article repeater -->
					<?php if( have_rows('home_featured') ): ?>
						<ul class="orbit-container">
							<?php while ( have_rows('home_featured') ) : the_row(); ?>

								<!-- Call for news article post object -->
								<?php $post_object = get_sub_field('home_featured_article'); ?>

								<?php if( $post_object ): ?>

									<?php $post = $post_object; setup_postdata( $post );
										$news_article_title = get_the_title($post_object->ID);
										$news_article_url = get_field('news_article_url', $post_object ->ID);
										$news_article_vertical_image = get_field('news_article_vertical_image', $post_object->ID);
									?>
										<li class="orbit-slide home-featured-item-container">
											<div class="relative">
												<div class="gradient-overlay">
													<a class="news-title" href="<?php echo $news_article_url; ?>" target="_blank"><?php echo $news_article_title; ?></a>
												</div>

												<div>
													<img class="news-image" src="<?php echo $news_article_vertical_image['url']; ?>" alt="<?php echo $news_article_vertical_image['alt']; ?>" />
												</div>
											</div>

											<div class="home-featured-link-container">
												<a class="news-link" href="<?php echo $news_article_url; ?>" target="_blank">Learn&nbsp;more&nbsp;&raquo;</a>
											</div>

										</li>

									<?php wp_reset_postdata(); ?>

								<?php endif; ?>

							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>

<!-- View the Work CTA -->
<div class="home-cta-container background-image" style="background-image: url('<?php the_field('home_cta_background_image'); ?>');">
	<div class="grid-container">
		<div class="grid-x align-center align-middle">
			<div class="cell shrink">
				<a class="home-cta" href="<?php the_field('home_cta_link'); ?>"><?php the_field('home_cta_text'); ?></a>
			</div>
		</div>
	</div>
</div>

<!--  Quote -->
<div class="home-quote-container background-image" style="background-image: url('<?php the_field('home_quote_background_image'); ?>');">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell medium-6 medium-offset-6 small-12 home-quote-text-container">
				<p class="quote-text"><?php the_field('home_quote_text'); ?></p>
				<p class="quote-author">–M.N.</p>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
