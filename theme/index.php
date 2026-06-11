<?php
/**
 * The template for displaying the blog index page
 *
 * @package Dumbiri_Cletus
 */

get_header(); ?>

<main id="main">
  <section class="work-section reveal" id="blog-listing">
    <div class="section-heading">
      <h1>Blog</h1>
      <p>Essays on conviction, leadership, identity, and the inner life of visible work.</p>
    </div>

    <div class="media-grid">
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <article>
            <p class="eyebrow"><?php the_category(', '); ?></p>
            <h3><?php the_title(); ?></h3>
            <p><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
            <a href="<?php the_permalink(); ?>">Read Article</a>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <p>No posts found.</p>
      <?php endif; ?>
    </div>

    <div class="pagination">
      <?php the_posts_pagination(); ?>
    </div>
  </section>

  <?php get_template_part('template-parts/newsletter', 'signup'); ?>
</main>

<?php get_footer(); ?>
