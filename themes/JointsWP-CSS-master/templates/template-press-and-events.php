<?php
/*
Template Name: Press & Events
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


<!--  Featured Post -->
<div class="gray-line">
	<div class="grid-container news-featured-container">
		<div class="grid-x">
			<div class="medium-12 cell">
				<!--  Featured Post In The News/Press Release All Caps -->
				<h2 class="news-featured-header">Featured Story:</h2>
			</div>
		</div>

		<div class="grid-x grid-padding-x">
				<?php
					$queryObject = new WP_Query( 'post_type=news-article&posts_per_page=1' );
					if ($queryObject->have_posts()) {
						while ($queryObject->have_posts()) {
							$queryObject->the_post();
				?>
						<div class="medium-7 cell">
							<!-- Featured Post Image -->
							<?php the_post_thumbnail('full'); ?>
							<div class="share-links">
								<a class="share-icon" href="http://www.facebook.com/sharer.php?u=<?php echo the_field('news_article_url'); ?>&amp;t=<?php the_title(); ?>" title="Share on Facebook." target="_blank">
									<span class="icon icon-facebook"></span>
								</a>
								<a class="share-icon" href="/feed/?post_type=news-article" title="RSS Feed" target="_blank">
									<span class="icon icon-rss"></span>
								</a>
								<a class="share-icon" href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_field('news_article_url'); ?>" title="Tweet this!" target="_blank">
									<span class="icon icon-twitter"></span>
								</a>
								<a class="share-icon"href="https://plus.google.com/share?url=<?php the_field('news_article_url'); ?>" title="Share on Google Plus." target="_blank">
									<span class="icon icon-googleplus"></span>
								</a>
							</div>
						</div>

						<div class="medium-5 cell">
							<!-- Featured Post Date -->
							<h4 class="news-featured-date"><?php the_field('news_article_date'); ?></h4>

							<!-- Featured Post Title -->
							<h3 class="news-featured-title"><?php the_title(); ?></h3>

							<!-- Featured Post Excerpt + Link -->
							<p class="news-featured-excerpt"><?php echo get_the_excerpt(); ?></p>
							<a class="outline-button news-featured-button" href="<?php echo the_field('news_article_url'); ?>" target='_blank'>Learn&nbsp;More&nbsp;&raquo;</a>
						</div>
					</div>
				<?php } } wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>

<!-- Press & Events Archive -->
<div class="grid-container">
	<div class="grid-x align-center align-middle">
		<div class="cell shrink">
			<h3 class="news-archive-header">Press &amp; Events Archive</h3>
		</div>
	</div>
</div>

<div class="grid-container news-archive-container">
	<div class="grid-x grid-padding-x">

		<?php
		global $paged;
		  if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		  elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		  else { $paged = 1; }
		  $args = array(
			  'post_type' => 'news-article',
			  'posts_per_page' => 6,
			  'paged' => $paged,
			);

		  $custom_query = new WP_Query( $args );

		  if ($custom_query->have_posts()) :
			while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
				<div class="medium-4 cell news-archive-wrapper">

					<div class="relative">

						<div class="gradient-overlay">
							<div class="news-title">
								<h5 "news-archive-title"><a <?php echo "href='" . get_field('news_article_url') . "' target='_blank'"; ?> rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
								<a class="news-archive-link" <?php echo "href='" . get_field('news_article_url') . "' target='_blank'";?>>Learn&nbsp;More&nbsp;&raquo;</a>
							</div>
						</div>

						<div>
							<a <?php echo "href='" . get_field('news_article_url') . "' target='_blank'";?>><img class="news-image" src="<?php the_field('news_article_square_image'); ?>" /></a>
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
