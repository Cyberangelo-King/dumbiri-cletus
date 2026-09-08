<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link" href="#main">Skip to content</a>

    <header class="site-header" aria-label="Primary navigation">
      <a class="brand-mark" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Dumbiri Cletus home">DC</a>
      <p class="identity-stack">author<br />speaker<br />community builder<br />strategist</p>
      <button class="menu-button" type="button" aria-expanded="false" aria-controls="menuOverlay">
        <span class="menu-dot" aria-hidden="true"></span>
        <span>Menu</span>
      </button>
    </header>

    <aside class="menu-overlay" id="menuOverlay" aria-hidden="true" inert>
      <div class="menu-overlay__top">
        <span class="brand-mark">DC</span>
        <button class="close-menu" type="button">Close</button>
      </div>
      <nav class="overlay-nav" aria-label="Expanded navigation">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'menu-1',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
          )
        );
        ?>
        <!-- Fallback or additional static links if needed -->
        <?php if ( ! has_nav_menu( 'menu-1' ) ) : ?>
          <a href="#books">Books</a>
          <a href="#podcasts">Podcasts</a>
          <a href="#community">Community</a>
          <a href="#about">About</a>
          <a href="#media">Media</a>
          <a href="#contact">Contact</a>
        <?php endif; ?>
      </nav>
      <div class="overlay-footer">
        <a href="#contact" class="button button--red">Book Dumbiri</a>
        <div class="social-row" aria-label="Social links">
          <a href="#" aria-label="LinkedIn">LinkedIn</a>
          <a href="#" aria-label="Instagram">Instagram</a>
          <a href="#" aria-label="X">X</a>
        </div>
      </div>
    </aside>
