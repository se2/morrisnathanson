<?php get_header(); ?>

<div class="page-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title">Gallery</h1>
      </div>
		</div>
	</div>

	<div class="gallery-container">
		<div class="grid-container">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="grid-x gallery-single-info">
        <div class="cell medium-7" style="text-align:center;">
          <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="cell medium-3">
          <h4 class="gallery-single-title"><?php the_title(); ?></h4>
          <h5 class="gallery-single-field-title">Details</h5>
          <?php the_content(); ?>
          <h5 class="gallery-single-field-title">Medium</h5>
          <p><?php the_field('gallery_medium'); ?></p>
          <h5 class="gallery-single-field-title">Year</h5>
          <p><?php the_field('gallery_year'); ?></p>
          <h5 class="gallery-single-field-title">Size</h5>
          <p><?php the_field('gallery_size'); ?></p>
          <p>Sold / Available</p>
        </div>
        <div class="cell medium-1"></div>
        <div class="medium-1 cell nowrap">
          <a href="/gallery" class="gallery-all">All artwork</a>
          <ul class="terms-list">
            <?php
              $terms = get_terms(
                array(
                  'taxonomy' => 'gallery-category',
                  'hide_empty' => false,
                  'order' => 'DESC'
              ) );
              foreach ($terms as $key => $term) : ?>
              <li class="term-item">
                <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <?php endwhile; endif; ?>
			<div class="grid-x gallery-single-related">
        <div class="small-12 medium-12 related-posts">You May Also Like:</div>
				<div class="small-12 medium-9 cell">
          <div class="grid-x galleries-wrapper">
            <?php
              $gallery_query = new WP_Query(
                array(
                  'post_type'       => 'gallery',
                  'posts_per_page'  => 3,
                  'orderby'         => 'post_date',
                  'order'           => 'ASC'
                  )
                );

              if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>

                <div class="gallery-item cell small-12 medium-6 large-4">
                  <a href="<?php the_permalink(); ?>">
                    <div class="gallery-bg">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                  </a>
                  <a href="<?php the_permalink(); ?>" class="gallery-name">
                    <?php the_title(); ?>
                  </a>
                  <div class="gallery-info">
                    <p><?php the_field('gallery_medium'); ?></p>
                    <p><?php the_field('gallery_year'); ?></p>
                  </div>
                </div>

                <?php endwhile; ?>
              <?php endif; ?>
            </div>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="page-sidebar page-sidebar__yellow">
	</div>
</div>

<?php get_footer(); ?>
