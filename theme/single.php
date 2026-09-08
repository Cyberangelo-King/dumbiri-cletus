<?php
/**
 * The template for displaying all single posts
 *
 * @package Dumbiri_Cletus
 */

get_header(); ?>

<main id="main">
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('reveal'); ?> style="padding: var(--section-pad) var(--page-gutter); max-width: 800px; margin: 0 auto;">
      <header class="entry-header">
        <p class="eyebrow"><?php echo get_the_date(); ?> &middot; <?php the_category(', '); ?></p>
        <h1 class="entry-title" style="font-family: var(--font-display); font-size: clamp(48px, 8vw, 92px); text-transform: uppercase; line-height: 0.95; margin-bottom: 32px;">
          <?php the_title(); ?>
        </h1>
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="post-thumbnail" style="margin-bottom: 48px;">
            <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; filter: grayscale(1);')); ?>
          </div>
        <?php endif; ?>
      </header>

      <div class="entry-content" style="line-height: 1.8; font-size: 18px; color: var(--color-muted);">
        <?php the_content(); ?>
      </div>

      <footer class="entry-footer" style="margin-top: 64px; border-top: 1px solid var(--color-border); padding-top: 32px;">
        <div class="button-row">
          <a class="button" href="<?php echo esc_url( home_url( '/blog' ) ); ?>">← Back to Blog</a>
        </div>
      </footer>
    </article>
  <?php endwhile; ?>

  <?php get_template_part('template-parts/newsletter', 'signup'); ?>
</main>

<?php get_footer(); ?>
