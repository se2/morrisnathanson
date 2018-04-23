<?php
/*
Template Name: Home
*/

get_header(); ?>

<!-- Banner -->
<div class="home-banner background-image" style="background-image: url('<?php the_field('home_banner_image'); ?>');">
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell small-12 medium-4 home-banner-text">
				<p class="home-headline-small">Morris Nathanson</p>
				<h1 class="home-headline-large"><?php the_field('home_banner_headline'); ?></h1>
				<a class="home-banner-cta" href="<?php the_field('home_banner_cta_link'); ?>"><?php the_field('home_banner_cta_text'); ?></a>
			</div>
		</div>
	</div>
</div>

<!--  Featured Happenings (news articles) -->
<div class="home-featured-container">

	<div class="grid-x align-middle align-center">
		<div class="cell shrink">
			<h3 class="home-featured-header"><?php the_field('home_featured_section_header'); ?></h3>
		</div>
	</div>

	<div class="grid-container">
		<div class="grid-x">
			<div class="medium-12 cell">
					<!-- News article repeater -->
					<?php if( have_rows('home_featured') ): $color_idx = 0; ?>
						<div class="grid-x grid-padding-x medium-up-3 small-up-1" id="home-slider">
							<?php while ( have_rows('home_featured') ) : the_row(); ?>

									<!-- Call for news article post object -->
									<?php $post_object = get_sub_field('home_featured_article'); ?>

									<?php if( $post_object ): ?>

										<?php
											$post = $post_object; setup_postdata( $post );
											$colors = array('#ffa409', '#e63c2e', '#1675a9');
											$news_article_title = get_the_title($post_object->ID);
											$news_article_url = get_field('news_article_url', $post_object ->ID);
											$news_article_vertical_image = get_field('news_article_vertical_image', $post_object->ID);
										?>
											<div class="cell medium-4 home-featured-item-container">
												<div class="relative">
													<div class="gradient-overlay">
														<a class="news-title" href="<?php echo $news_article_url; ?>" target="_blank"><?php echo $news_article_title; ?></a>
													</div>

													<div>
														<img class="news-image" src="<?php echo $news_article_vertical_image['url']; ?>" alt="<?php echo $news_article_vertical_image['alt']; ?>" />
													</div>
												</div>

												<div class="home-featured-link-container" style="background-color:<?php echo $colors[$color_idx]; ?>">
													<a class="news-link" href="<?php echo $news_article_url; ?>" target="_blank">Learn&nbsp;more&nbsp;&raquo;</a>
												</div>

											</div>

										<?php wp_reset_postdata(); ?>

									<?php endif; ?>

							<?php ($color_idx == sizeof($colors) - 1) ? $color_idx = 0 : $color_idx++; endwhile; ?>
						</div>
					<?php endif; ?>
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

<!-- Quote -->
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
<div class="grid-container">
	<div class="small-12 cell home-quote-text-container__responsive">
		<p class="quote-text"><?php the_field('home_quote_text'); ?></p>
		<p class="quote-author">–M.N.</p>
	</div>
</div>

<?php get_footer(); ?>
