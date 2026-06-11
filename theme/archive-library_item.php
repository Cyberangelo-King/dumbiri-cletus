<?php
/**
 * The template for displaying library archives
 *
 * @package Dumbiri_Cletus
 */

get_header(); ?>

<main id="main">
  <section class="work-section reveal">
    <div class="section-heading">
      <h1>Library</h1>
      <p>A curated resource hub for people shaping communities, culture, and consequential ideas.</p>
    </div>

    <div class="book-rail" style="grid-auto-flow: row; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article class="book-card">
            <div class="book-cover" style="min-height: 250px;">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium'); ?>
              <?php else : ?>
                <strong><?php the_title(); ?></strong>
              <?php endif; ?>
            </div>
            <p class="tag"><?php echo get_the_term_list( get_the_ID(), 'library_category', '', ', ' ); ?></p>
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
            <?php
            $external_url = get_post_meta( get_the_ID(), '_library_url', true );
            if ( $external_url ) : ?>
              <a href="<?php echo esc_url( $external_url ); ?>" target="_blank" rel="noopener">View Resource <span aria-hidden="true">-&gt;</span></a>
            <?php endif; ?>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p>Our library is currently being curated. Check back soon.</p>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
