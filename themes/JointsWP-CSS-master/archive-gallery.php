<?php get_header(); ?>

<div class="page-wrapper">
	<!-- Page Title -->
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<h1 class="page-title">Gallery</h1>
      </div>
      <div class="cell gallery-sub-section">
        <div class="grid-x pos-rel">
          <div class="cell medium-6 gallery-subtitle">
            <span>Showcasing the complete archive of original Morris Nathanson artwork.</span>
          </div>
          <div class="cell medium-3 gallery-notice">
            <span>
              For orginal artwork purchases/inquiries, please contact gallery respresentative:<br><a href="mailto:email@domain.com"><i>Phyllis Van Orden</i></a>
            </span>
          </div>
          <div class="medium-2 cell nowrap"></div>
          <div class="medium-1 cell nowrap pos-abs" style="right:0;">
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
      </div>
		</div>
	</div>

	<div class="gallery-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="small-12 medium-9 cell">
          <div class="grid-x galleries-wrapper">
            <?php
              $gallery_query = new WP_Query(
                array(
                  'post_type' => 'gallery',
                  'orderby' => 'post_date',
                  'order' => 'ASC'
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
				<div class="medium-2 cell"></div>

				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="page-sidebar page-sidebar__yellow">
	</div>
</div>

<?php get_footer(); ?>