<?php
/*
Template Name: Home
*/

get_header(); ?>
	


<?php $the_query = new WP_Query(array(
	'post_type' => 'work',
	'posts_per_page' => '-1',
	'order' => 'ASC'
)); ?>


<?php if ( $the_query->have_posts() ) : ?>
	<div class="isotope-list-container">
		<div class="row small-up-1 medium-up-3">

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
				$termsArray = get_the_terms( $post->ID, "category" );  //Get the terms for this particular item
				$termsString = ""; //initialize the string that will contain the terms

				foreach ( $termsArray as $term ) { // for each term 
					$termsString .= $term->slug.' '; //create a string that has all the slugs 
				}
			?> 

				<div class="<?php echo $termsString; ?> portfolio column column-block"> <?php // 'portfolio' is used as an identifier (see Setp 5, line 6) ?>
					<div class="portfolio-item-container">

						<a href="<?php the_field('portfolio_video_url'); ?>" rel="lightbox" data-lightbox-type="iframe">
							<div class="thumbnail-wrapper">
								<?php echo the_post_thumbnail('full'); ?>
								<div class="thumbnail-container">
									<h3 class="portfolio-client"><?php echo the_field('portfolio_client'); ?></h3>
									<h4 class="portfolio-title"><?php echo the_field('portfolio_project_title'); ?></h4>
								</div>
							</div>
						</a>

					</div>
				</div>

			<?php endwhile;  ?>

		</div>
	</div>
<?php endif; ?>		


<?php get_footer(); ?>
