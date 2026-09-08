<?php
/**
 * The template for displaying event archives
 *
 * @package Dumbiri_Cletus
 */

get_header(); ?>

<main id="main">
  <section class="work-section reveal">
    <div class="section-heading">
      <h1>Upcoming Events</h1>
      <p>Live gatherings that turn reflection into clearer language, strategy, and action.</p>
    </div>

    <div class="media-grid">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article>
            <p class="eyebrow"><?php echo get_the_date('M j, Y'); ?></p>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <p style="font-size: 12px; color: var(--color-faint);">Location: <?php echo esc_html( get_post_meta( get_the_ID(), '_event_location', true ) ?: 'TBD' ); ?></p>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p>No upcoming events scheduled at the moment.</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
