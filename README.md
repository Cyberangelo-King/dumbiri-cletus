# Dumbiri Cletus | WordPress Theme

This project has been transformed from a static landing page into a custom, cinematic WordPress theme. It is designed for a "Headless-adjacent" or "Static Export" workflow, where WordPress provides the powerful content management dashboard, and the frontend remains a lightning-fast, custom-built experience.

## Theme Overview

- **Custom Post Types:** Includes built-in support for `Events`, `Library`, and `Podcasts`.
- **Dynamic Content:** All major sections (Books, Podcasts, Blog) are now powered by WordPress loops.
- **Cinematic Design:** Maintained the original dark, high-impact visual identity without the "generic WordPress" look.
- **Static Optimized:** Assets and scripts are structured for compatibility with static site generators (like WP2Static or Simply Static).

## Folder Structure

- `theme/` - The complete WordPress theme directory.
  - `functions.php` - Handles CPT registrations and asset enqueuing.
  - `front-page.php` - The dynamic home page template.
  - `index.php` & `single.php` - The Blog and Post templates.
  - `archive-event.php` & `archive-library_item.php` - Custom archive layouts.
  - `template-parts/` - Modular components for easy maintenance.

## Installation

1. Install a fresh WordPress instance.
2. Zip the `theme/` folder.
3. In your WordPress Dashboard, go to **Appearance > Themes > Add New > Upload Theme**.
4. Upload and Activate the `theme.zip`.
5. Create your content (Posts, Events, Library Items) to see the site come to life.

## Getting "Fully Functional"

To achieve the full vision of this project, follow the instructions in [WP-GUIDE.md](./WP-GUIDE.md).
