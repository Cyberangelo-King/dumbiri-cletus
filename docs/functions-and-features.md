# Functions & Interactive Features
## Dumbiri Cletus — Personal Brand Website
**Version:** 1.0

---

## Overview

This document specifies every interactive feature on the site — how it works, how it behaves, what states it has, and how it should be implemented. Written for an AI build system to execute without ambiguity.

---

## 1. Sticky Navigation

### Behavior
- Navigation bar is fixed to the top of the viewport at all times
- On initial page load: transparent background, full-opacity logo and links
- After user scrolls **more than 80px** from the top: nav transitions to dark semi-transparent panel with backdrop blur
- Transition: `background` and `backdrop-filter` with 300ms ease-out

### Active Section Tracking
- As user scrolls, the nav link corresponding to the currently visible section is highlighted
- Implementation: `IntersectionObserver` with `threshold: 0.4` on each section
- Active state: link color becomes `--color-text-strong` (white); 2px bottom border in `--color-red`
- Observer tracks: `#hero`, `#social-proof`, `#content`, `#books`, `#podcast`, `#community`, `#about`, `#media`, `#contact`

### Smooth Scroll
- All anchor `<a href="#section">` links trigger `window.scrollTo({ behavior: 'smooth' })`
- Scroll offset accounts for sticky nav height (64px): use `scrollTop = element.offsetTop - 80`

### Mobile Hamburger Menu
- **Trigger:** Hamburger icon button (top-right)
  - Icon: 3 horizontal lines, 24×24px, `--color-text-strong`
  - `aria-label="Open navigation menu"`
  - `aria-expanded="false"` (updates on toggle)
  - `aria-controls="mobile-nav"`
- **State: Open**
  - Menu overlay slides in from right: `transform: translateX(100%)` → `translateX(0)`, 300ms ease-out
  - Overlay: full viewport, `--color-bg`, `z-index: var(--z-overlay)`
  - Hamburger → X icon (rotate animation: 0deg → 45deg on one line, fade out middle, rotate -45deg on third)
  - `body` overflow hidden (prevent background scroll)
  - `aria-expanded="true"` on trigger
- **State: Closed**
  - Overlay slides back right, 300ms ease-in
  - X → Hamburger (reverse animation)
  - `body` overflow restored
- **Close triggers:** X button click, any nav link click, Escape key press
- **Mobile nav links:** vertically stacked, centered, 24px font, generous 40px padding between items

---

## 2. Content Discovery — Search + Filter

### Search Input
- **Location:** Top of Content Discovery section
- **Type:** `<input type="search">` with `placeholder="Search ideas, topics, books..."`
- **Behavior:** Real-time filtering as user types (no submit button required; filter on `input` event with 150ms debounce)
- **Matching:** Case-insensitive; matches against card title and excerpt/body text
- **Visual feedback:** 
  - On focus: border transitions to `--color-red`
  - On type: cards that don't match fade out (`opacity: 0`, `height: 0`, `margin: 0` with 200ms transition) and matching cards remain visible
  - Search icon inside input, left-aligned, `--color-muted`
  - Clear button (×) appears when input has value; clears and resets filter on click

### Filter Pills
- **Display:** Horizontal row of pill buttons below search input
- **Pills:**
  - All (default active state)
  - Leadership
  - Purpose
  - Culture
  - Human Potential
  - Community
  - Books
  - Podcast
- **Single-select behavior:** Only one pill active at a time. Clicking "Leadership" deactivates previous active pill and activates "Leadership"
- **Combined behavior:** Search query AND active filter pill both apply simultaneously (AND logic)
- **Active pill state:** border-color → `--color-red`, background → `--color-red-tint`, text → `--color-text-strong`
- **Inactive pill state:** border → `--color-border`, background transparent, text → `--color-muted`
- **Hover (inactive):** border → `--color-border-light`, text → `--color-text`
- **"All" pill:** Resets filter to show all cards regardless of category

### Content Cards
- **States:**
  - `visible`: `opacity: 1`, `transform: none`, pointer-events enabled
  - `hidden`: `opacity: 0`, `height: 0`, `overflow: hidden`, `margin-bottom: 0`, pointer-events none
- **Transitions:** All state changes animate with 250ms ease
- **Empty State:** When no cards match, display: centered message "No results for '[query]'" with a reset-all link
- **Card data attributes:** Each card has `data-categories="leadership purpose"` and `data-title="..."` for JS matching

---

## 3. Horizontal Book Scroll Rail

### Layout
- Container: full-section width, `overflow-x: auto`, `overflow-y: visible`
- `scroll-snap-type: x mandatory`
- `scrollbar-width: none` (hidden scrollbar on all browsers)
- Inner track: flex row, `gap: 24px`, left padding matching container, right padding 40px
- Each card: `min-width: 260px`, `max-width: 280px`, `scroll-snap-align: start`

### Scroll Controls (Desktop)
- Left arrow button: positioned left of rail, `position: absolute` or adjacent
- Right arrow button: positioned right of rail
- Arrow appearance: circular `48px × 48px` button, `--color-panel` background, white icon, `1px solid --color-border`
- Arrow hover: border → `--color-red`, icon color → `--color-red`
- On click: `scrollBy({ left: ±320, behavior: 'smooth' })` (one card width + gap)
- Left arrow disabled state (opacity 0.3) when rail is at start; right arrow disabled at end
- **Disable detection:** `scrollLeft === 0` (left), `scrollLeft >= scrollWidth - clientWidth - 1` (right)

### Touch / Swipe (Mobile)
- Relies on native touch scroll (no custom swipe logic needed)
- Arrow buttons hidden on mobile
- Show scrollbar (thin) on mobile for discoverability, styled: `--color-border` track, `--color-muted` thumb

### Book Card Interaction
- **Hover (desktop):**
  - Cover image: `transform: scale(1.03)`, `box-shadow: var(--shadow-lg)`, 200ms ease
  - Card border: `--color-border` → `--color-red`, 200ms ease
- **CTA Button:** "Get the Book" → external link opens in `_blank` with `rel="noopener noreferrer"`

---

## 4. Podcast Player

### Architecture
- **Two-column layout (desktop):**
  - Left: Episode list (scrollable, max-height 480px, overflow-y auto)
  - Right: Active episode player (fixed in view, no scroll)
- **Single-column (mobile):** Episode list above player

### Episode List
- **Each episode item:**
  - Episode number: `EP ###`, uppercase, `--color-muted`
  - Episode title: sentence case, `--color-text`
  - Metadata: Date + duration, `--color-muted`
  - Full row is clickable (`cursor: pointer`)
- **Default state:** `--color-border` border, `--color-panel` background
- **Hover state:** border → `--color-border-light`, background → `--color-panel-hover`
- **Active state:** border → `--color-red`, background → `--color-red-tint`
- **Click behavior:** 
  1. Active state removed from previously active item
  2. Active state applied to clicked item
  3. Player panel updates with new episode data (title, artwork, description)
  4. Audio src updates; player pauses and resets to 0:00 (does not autoplay — respects browser autoplay policy)
  5. Player shows new episode artwork with 300ms fade transition

### Active Episode Player
- **Artwork:** Square image, `200px × 200px` desktop, `120px × 120px` mobile
- **Episode title:** H3-level, `--color-text`
- **Episode description:** 2–3 sentences, `--color-muted`, `--text-sm`
- **Audio Player:** HTML5 `<audio controls>` element, or custom player
  - If custom: play/pause button (Lucide `Play` / `Pause` icons), progress bar with click-to-seek, current time / total duration display
  - `accent-color: var(--color-red)` for native controls
- **Platform Links:** Row of icon links below audio player
  - Spotify: white Spotify logo SVG, links to episode URL
  - Apple Podcasts: white Apple Podcasts logo SVG
  - Google Podcasts / YouTube: similar treatment
  - Each link: `aria-label="Listen on Spotify"`, opens `_blank`
  - Hover: opacity 0.6 → 1.0, 150ms ease

### Initial State
- First episode in list is active by default on page load
- Player shows first episode's data
- Audio does NOT autoplay

---

## 5. Community Section

### Hero Image
- Full-width image (`width: 100%`, `height: 420px` desktop, `280px` mobile)
- `object-fit: cover; object-position: center top`
- **Scroll-triggered animation:** On section enter (IntersectionObserver), image scales from 1.04 → 1.0 over 800ms ease-out
- Subtle overlay: `rgba(5,5,5,0.3)` for cinematic depth

### Initiative Grid
- 3 columns on desktop, 2 on tablet, 1 on mobile
- Each initiative card:
  - Image or icon at top
  - Initiative name: bold, `--color-text`
  - Description: 2–3 sentences, `--color-muted`
  - CTA: "Learn More" or "Get Involved" link
- **Hover:** `translateY(-3px)`, border → `--color-red`, shadow → `var(--shadow-md)`
- **Staggered scroll reveal:** Cards animate in with 100ms delay between each

---

## 6. About Section — Sticky Sidebar

### Desktop Layout
- Two columns: left `0.82fr` sticky, right `1.18fr` scrollable
- Left column: `position: sticky; top: 88px; align-self: start`
- Right column scrolls naturally
- Photo in left column: fixed-width portrait, border `1px solid --color-border`

### Mobile Layout
- Sticky disabled
- Left column (photo) stacks above right column (bio)
- Photo: max-width 240px, centered

### Timeline Component
- Each milestone: flex row with year and description
- Year: `--color-red`, `--text-xs`, uppercase, font-weight 800
- Divider: `1px` vertical line in `--color-border` connecting milestones
- Description: `--text-sm`, `--color-text`
- Animate items in via scroll reveal, 100ms stagger

### Blockquote
- Left border: `4px solid var(--color-red)`
- Padding-left: 24px
- Text: italic, `var(--font-serif)`, `--text-xl`
- Attribution line: `--text-xs`, uppercase, `--color-muted`, prepended with `—`

---

## 7. Media & Press Section

### Media Kit Download
- CTA button: "Download Media Kit" — links to `/assets/dumbiri-cletus-press-kit.zip`
- Button type: primary (`--color-red`)
- Download attribute: `download` on anchor tag to trigger browser download

### Speaking Booking CTA
- Ghost button: "Book for Speaking" → links to `#contact` section or external Calendly URL

### Press Grid
- 3 columns desktop, 2 tablet, 1 mobile
- Each press card:
  - Publication name or logo (white filter)
  - Article headline
  - Date: `--color-muted`
  - "Read Article →" link: `--color-red` on hover, external

---

## 8. Contact Form

### Form Fields
```
Full Name:    [text input, required]
Email:        [email input, required]
Subject:      [select dropdown OR text input]
              Options: Speaking Inquiry, Media & Press, Collaboration, 
                       Book a Meeting, General Inquiry
Message:      [textarea, rows=5, required]
[Submit Button: "Send Message"]
```

### Validation
- **Required fields:** All fields required
- **Email validation:** format check on `blur` event
- **On submit:**
  1. Run validation on all fields
  2. If errors: display inline error message beneath each invalid field (red text, `--text-xs`)
  3. If valid: disable submit button, show loading spinner inside button
- **Error messages:**
  - Name: "Please enter your full name"
  - Email: "Please enter a valid email address"
  - Subject: "Please select a subject"
  - Message: "Please enter a message (at least 20 characters)"

### Submission States
- **Loading:** Button text → "Sending..." + spinner animation, button disabled
- **Success:** 
  - Form fields hidden
  - Success message displayed: "Thank you, [Name]. Your message has been sent. Dumbiri typically responds within 2–3 business days."
  - Green checkmark icon (or red accent checkmark)
  - "Send another message" link resets form
- **Error:**
  - Error message: "Something went wrong. Please try again or email directly at [email]."
  - Submit button re-enabled
  
### Backend Integration
- Recommended: **Web3Forms** (free, no backend required)
- Alternatively: **Formspree** or **EmailJS**
- Include honeypot field (`<input type="text" name="_gotcha" style="display:none">`) for spam prevention

---

## 9. Scroll Reveal Animations

### Implementation
```javascript
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target); // fire once
    }
  });
}, { threshold: 0.15 });

document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
```

### Elements with `.reveal` class
- All section H2 headlines
- All section intro paragraphs
- Book rail (as a whole)
- Each podcast episode list item (staggered: delay `index * 60ms`)
- Each community initiative card (staggered: delay `index * 100ms`)
- About section content blocks
- Each media press card (staggered)
- Contact form and contact info block
- Social proof logos (staggered)

---

## 10. Social Proof Bar — Logo Display

### Behavior
- Static horizontal display on desktop
- On mobile (< 480px): enable horizontal scroll with `overflow-x: auto`, `white-space: nowrap`
- All logos: `filter: brightness(0) invert(1)`, `opacity: 0.5`
- On logo hover: `opacity: 0.85`, `transition: opacity 200ms ease`
- Optional: auto-scroll/marquee animation on desktop (CSS `animation: marquee linear infinite`)

---

## 11. Footer Newsletter Signup

### Form
- Single-line: `[Email input] [Subscribe button]`
- Email validation on submit
- Success state: input replaced with "You're in! Check your inbox to confirm."
- Integration: Mailchimp embed code or ConvertKit form action URL

---

## 12. Keyboard Navigation & Accessibility

### Tab Order
- Logical DOM order; no `tabindex` > 0
- Skip-to-content link: visually hidden, becomes visible on focus, jumps to `#main-content`

### Focus Management
- Mobile menu open: focus trapped inside menu until closed
- On menu close: focus returns to hamburger button
- Modal/overlay patterns: `aria-modal="true"`, `role="dialog"`

### Keyboard Shortcuts
- `Escape`: closes mobile menu if open
- Arrow keys on filter pills: navigate between pills (optional enhancement)
- Audio player: standard space/Enter for play/pause when focused

### Screen Reader Announcements
- Filter/search results: live region `aria-live="polite"` announces "Showing X of Y results"
- Form errors: `aria-describedby` links each input to its error message
- Podcast episode switch: announce new episode title with `aria-live="assertive"` region

---

## 13. Performance Features

### Lazy Loading
- All images below the fold: `loading="lazy"` attribute
- Hero image: `loading="eager"` (above fold)
- Podcast artwork: lazy-loaded on episode switch (load on demand, not upfront)

### Image Optimization
- All images: WebP format with JPEG fallback via `<picture>` element
- Responsive sizes: `srcset` with `320w, 640w, 1024w, 1440w` variants
- Book covers: preload first 3 visible covers

### Debouncing
- Search input filter: 150ms debounce
- Scroll events (nav, sticky detection): 10ms throttle via `requestAnimationFrame`
- Resize events: 200ms debounce
