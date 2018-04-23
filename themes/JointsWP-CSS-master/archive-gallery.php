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
          <div class="cell small-12 medium-6 gallery-subtitle">
            <span>Showcasing the complete archive of original Morris Nathanson artwork.</span>
          </div>
          <div class="cell small-12 medium-3 gallery-notice">
            <span>
              For orginal artwork purchases/inquiries, please contact gallery respresentative:<br><a href="#" data-open="studio-purchase-modal"><i>Phyllis Van Orden</i></a>
            </span>
          </div>
        </div>
      </div>
		</div>
	</div>

	<div class="gallery-container">
		<div class="grid-container">
			<div class="grid-x">
				<div class="gallery-grid small-12 medium-9 cell">
          <div class="grid-x galleries-wrapper">
            <?php
              $default_posts_per_page = get_option( 'posts_per_page' );
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $gallery_query = new WP_Query(
                array(
                  'post_type' => 'gallery',
                  'orderby' => 'post_date',
                  'order' => 'ASC',
                  'paged' => $paged
                  )
                );
              if ($gallery_query->have_posts()) :
                while ($gallery_query->have_posts()) : $gallery_query->the_post(); ?>
                <div class="gallery-item cell small-6 medium-4 large-4">
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
            <div>
              <?php
                if (function_exists('mn_custom_pagination')) {
                  mn_custom_pagination($gallery_query->max_num_pages, "", $paged);
                }
              ?>
            </div>
				</div>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>

	<div class="page-sidebar page-sidebar__yellow">
    <ul class="terms-list">
      <li>
        <a href="<?php echo get_site_url(); ?>/gallery" class="gallery-all">All artwork</a>
      </li>
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
    <select class="terms-select" onchange="location = this.value">
      <option value="<?php echo get_site_url(); ?>/gallery" selected>All artwork</option>
      <?php foreach ($terms as $key => $term) : ?>
      <option value="<?php echo get_term_link($term); ?>">
        <?php echo $term->name; ?>
      </option>
      <?php endforeach; ?>
    </select>
	</div>
</div>

<?php get_footer(); ?>
