# WordPress Configuration & Implementation Guide

This guide outlines how to fully develop and functionalize the Dumbiri Cletus project using the provided theme.

## 1. Recommended Plugins

To maintain the "minimal dependency" preference while ensuring a simple dashboard, install these industry-standard plugins:

- **Advanced Custom Fields (ACF):** Used to add specific fields like "Event Date", "Location", and "Resource URL" to your custom post types.
- **WP2Static or Simply Static:** If you wish to use the "Static Export" workflow for maximum performance and security.
- **Yoast SEO or Rank Math:** For managing the SEO-friendly structure of your blog and pages.

## 2. Setting Up Custom Fields

The theme expects certain metadata. In ACF, create field groups for:

### Events
- `_event_location` (Text): Where the event is taking place.
- `_event_date` (Date Picker): To sort events correctly.

### Library
- `_library_url` (URL): External link to the book, article, or tool.

### Podcasts
- `_podcast_duration` (Text): e.g., "42 min".
- `_podcast_url` (URL): Link to the audio file or platform.

## 3. The "Static Export" Workflow (Outside the Box)

For a lightning-fast site:
1. Manage all content in your WordPress dashboard (on a local machine or a private subdomain).
2. Use the **WP2Static** plugin to generate a static version of the site.
3. Deploy the resulting HTML/CSS/JS files to a host like **Netlify** or **Vercel**.
4. Result: A CMS-managed site with zero security vulnerabilities and instant load times.

## 4. Newsletter Integration

The `template-parts/newsletter-signup.php` file contains a generic form. To connect it:
- Replace the `<form action="#">` with the action URL provided by your service (Mailchimp, ConvertKit, etc.).
- Ensure the input `name` attribute matches what your service expects (usually `EMAIL`).

## 5. Scaling Over Time

- **Member Area:** Can be added via plugins like *MemberPress* if the static export workflow is not used for that specific section.
- **Improved Search:** For the static version, consider using *Algolia* or *PageFind* to maintain the fast, interactive search experience.
