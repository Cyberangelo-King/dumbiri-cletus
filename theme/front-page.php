<?php
/**
 * The front page template file
 *
 * @package Dumbiri_Cletus
 */

get_header(); ?>

<main id="main">
  <section class="hero section-panel" id="hero" aria-labelledby="heroTitle">
	<div class="hero-media" aria-hidden="true">
	  <img
		src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1800&q=80"
		alt=""
	  />
	</div>
	<div class="hero-shade" aria-hidden="true"></div>
	<div class="hero-content">
	  <h1 id="heroTitle">Dumbiri Cletus</h1>
	  <p>
		Dumbiri Cletus is a thought leader, author, and community builder exploring ideas at the
		intersection of purpose, leadership, culture, and human potential.
	  </p>
	  <div class="button-row" aria-label="Primary actions">
		<a class="button" href="#books">Explore Books <span aria-hidden="true">-&gt;</span></a>
		<a class="button" href="#podcasts">Listen to Podcast <span aria-hidden="true">-&gt;</span></a>
		<a class="button" href="#community">Join Community <span aria-hidden="true">-&gt;</span></a>
	  </div>
	</div>
  </section>

  <section class="press-strip" aria-label="Featured media logos">
	<span>Entrepreneur</span>
	<span>Fast Company</span>
	<span>Wired</span>
	<span>Forbes</span>
	<span>The New York Times</span>
	<span>Time</span>
	<span>Harvard Business Review</span>
  </section>

  <section class="content-discovery reveal" aria-labelledby="discoveryTitle">
	<div>
	  <p class="eyebrow">Content discovery</p>
	  <h2 id="discoveryTitle">Find the right entry point.</h2>
	</div>
	<div class="discovery-tools">
	  <label class="search-field">
		<span class="sr-only">Search content</span>
		<input id="siteSearch" type="search" placeholder="Search books, episodes, topics..." />
	  </label>
	  <div class="filter-pills" aria-label="Curated collections">
		<button class="filter-pill is-active" type="button" data-filter="all">Start Here</button>
		<button class="filter-pill" type="button" data-filter="leaders">For Leaders</button>
		<button class="filter-pill" type="button" data-filter="builders">For Builders</button>
		<button class="filter-pill" type="button" data-filter="reflection">Deep Reflection</button>
		<button class="filter-pill" type="button" data-filter="latest">Latest Work</button>
	  </div>
	</div>
  </section>

  <section class="work-section reveal" id="books" aria-labelledby="booksTitle">
	<div class="section-heading">
	  <h2 id="booksTitle">Books</h2>
	  <a class="view-all" href="#contact">View all <span aria-hidden="true">-&gt;</span></a>
	</div>
	<div class="book-rail searchable-grid">
	  <?php
	  $books_query = new WP_Query(array(
		  'post_type' => 'library_item',
		  'posts_per_page' => 4,
	  ));

	  if ($books_query->have_posts()) :
		  while ($books_query->have_posts()) : $books_query->the_post();
			  $tags = wp_get_post_terms( get_the_ID(), 'library_category', array( 'fields' => 'names' ) );
			  ?>
			  <article class="book-card searchable-item" data-tags="<?php echo esc_attr( implode( ' ', $tags ) ); ?>">
				<div class="book-cover">
				  <?php if (has_post_thumbnail()) : ?>
					<?php the_post_thumbnail('medium'); ?>
				  <?php else : ?>
					<span>0<?php echo $books_query->current_post + 1; ?></span>
					<strong><?php the_title(); ?></strong>
				  <?php endif; ?>
				</div>
				<p class="tag">Featured</p>
				<h3><?php the_title(); ?></h3>
				<p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
				<a href="<?php the_permalink(); ?>">Read / Buy <span aria-hidden="true">-&gt;</span></a>
			  </article>
			  <?php
		  endwhile;
		  wp_reset_postdata();
	  else :
		  ?>
		  <!-- Static fallbacks if no posts yet -->
		  <article class="book-card searchable-item" data-tags="book leadership leaders latest">
			<div class="book-cover book-cover--red">
			  <span>01</span>
			  <strong>The Builder's Mind</strong>
			</div>
			<p class="tag">Featured</p>
			<h3>The Builder's Mind</h3>
			<p>A field guide for people shaping communities, culture, and consequential ideas.</p>
			<a href="#">Read / Buy <span aria-hidden="true">-&gt;</span></a>
		  </article>
	  <?php endif; ?>
	</div>
  </section>

  <section class="podcast-section reveal" id="podcasts" aria-labelledby="podcastsTitle">
	<div class="section-heading">
	  <h2 id="podcastsTitle">Podcasts</h2>
	  <p>Conversations for leaders, builders, and communities in motion.</p>
	</div>
	<div class="podcast-layout">
	  <div class="episode-list" role="list" aria-label="Podcast episodes">
		<?php
		$podcasts_query = new WP_Query(array(
			'post_type' => 'podcast',
			'posts_per_page' => 3,
		));

		if ($podcasts_query->have_posts()) :
			while ($podcasts_query->have_posts()) : $podcasts_query->the_post();
				?>
				<button
				  class="episode-button <?php echo $podcasts_query->current_post === 0 ? 'is-active' : ''; ?> searchable-item"
				  type="button"
				  data-title="<?php the_title_attribute(); ?>"
				  data-date="<?php echo get_the_date('F Y'); ?>"
				  data-duration="<?php echo esc_attr(get_post_meta(get_the_ID(), '_podcast_duration', true) ?: '42 min'); ?>"
				  data-description="<?php echo esc_attr(get_the_excerpt()); ?>"
				  data-tags="podcast"
				>
				  <span>EP 0<?php echo $podcasts_query->current_post + 1; ?></span>
				  <strong><?php the_title(); ?></strong>
				  <small>Podcast &middot; <?php echo esc_html(get_post_meta(get_the_ID(), '_podcast_duration', true) ?: '42 min'); ?></small>
				</button>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			?>
			<button class="episode-button is-active searchable-item" type="button" data-title="Leadership Without Noise">
				<span>EP 01</span><strong>Leadership Without Noise</strong><small>Leadership &middot; 42 min</small>
			</button>
		<?php endif; ?>
	  </div>
	  <article class="active-episode" aria-live="polite">
		<div class="episode-art" aria-hidden="true">
		  <span>DC</span>
		</div>
		<p class="eyebrow" id="episodeMeta">June 2026 &middot; 42 min</p>
		<h3 id="episodeTitle">Leadership Without Noise</h3>
		<p id="episodeDescription">
		  A conversation on disciplined influence, public conviction, and doing meaningful work
		  without becoming performative.
		</p>
		<audio controls preload="none">
		  <source src="" type="audio/mpeg" />
		  Your browser does not support audio playback. Use the platform links below.
		</audio>
		<div class="platform-links">
		  <a href="#">Spotify</a>
		  <a href="#">Apple Podcasts</a>
		  <a href="#">YouTube</a>
		</div>
	  </article>
	</div>
  </section>

  <!-- More sections like Community, About, Media, Contact follow the same pattern... -->

  <?php get_template_part('template-parts/section', 'community'); ?>
  <?php get_template_part('template-parts/section', 'about'); ?>
  <?php get_template_part('template-parts/section', 'media'); ?>
  <?php get_template_part('template-parts/section', 'contact'); ?>

</main>

<?php get_footer(); ?>
