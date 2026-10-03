# MASTER PROMPT — the design and implementation workflow
## Dumbiri Cletus Personal Brand Website
**Version:** 1.0  
**Purpose:** Single authoritative prompt for AI-assisted site generation

---

## HOW TO USE THIS PROMPT

Paste this entire document into the design workflow or the implementation workflow as the primary generation prompt. It is self-contained: it defines the person, the site, the aesthetic, the copy philosophy, the sections, the interactions, and the technical requirements. Do not abbreviate or summarize it — use it in full.

If the AI requests clarification, refer to the companion documents:
- `PRD.md` — Full product requirements
- `design.md` — Visual design direction
- `style.md` — Design token system
- `copy.md` — All production copy
- `functions-and-features.md` — All interactive behaviors
- `brand.md` — Brand voice and identity
- `emotions.md` — Emotional experience design
- `goals.md` — Business and conversion goals
- `marketing-website.md` — Full site blueprint

---

# THE PROMPT

## IDENTITY

You are building the official personal brand website for **Dumbiri Cletus** — a thought leader, author, podcast host, and community builder whose work sits at the intersection of purpose, leadership, culture, and human potential.

Dumbiri is the kind of person Forbes profiles and Harvard Business Review quotes. He is not a motivational speaker or life coach. He is a rigorous, warm, serious intellectual — someone who helps leaders and communities locate what matters most and build durable structures around it.

The one-sentence truth of his brand: *He helps people name what matters and build the life, work, and community they mean to create.*

He has been featured in: Entrepreneur, Fast Company, Wired, Forbes, The New York Times, Time, and Harvard Business Review.

---

## AESTHETIC VISION

**The site feels like a private library at midnight.** Intimate, deliberate, radiating quiet authority.

**Aesthetic reference points:**
- Kinfolk magazine's restraint and editorial patience
- McKinsey's command and precision
- The New Yorker's confidence in white space
- A luxury watch brand's slowness and permanence

**The design must communicate:** This person has thought carefully about everything you are looking at. Nothing is accidental.

**Do not build:** A startup landing page. A portfolio site. A blog. A motivational speaker's website. A personal brand that looks like every other personal brand. This must feel editorial, intellectual, and singular.

---

## COLOR SYSTEM

Use these exact values — no substitutions:

```
--color-bg:         #050505   /* near-black page background */
--color-bg-soft:    #0d0d0d   /* form inputs, elevated panels */
--color-panel:      #111111   /* cards, sidebar */
--color-text:       #f0ece4   /* primary text — warm white */
--color-muted:      #7a7a7a   /* secondary text, metadata */
--color-border:     #222222   /* default borders */
--color-red:        #e1191d   /* sole accent — CTAs, active states, borders on hover, blockquote */
--color-red-dark:   #c81518   /* red hover/pressed state */
--color-red-tint:   rgba(225,25,29,0.08)  /* active background tint */
```

**Color rules:**
- Red is used ONLY for: primary CTA buttons, active/hover border states, blockquote left border, focus rings, active filter pills, active episode highlight
- Never red for body text
- Publication logos: rendered white via `filter: brightness(0) invert(1)` at 50% opacity

---

## TYPOGRAPHY SYSTEM

```
Display font: Bebas Neue (from Google Fonts) — ALL CAPS, tight line-height 0.92
Body font:    Inter (from Google Fonts) — weights 400, 500, 600, 800
Serif accent: Playfair Display Italic — for blockquotes only

Hero H1:      clamp(56px, 10vw, 132px) — Bebas Neue, line-height 0.9
Section H2:   clamp(42px, 7vw, 92px) — Bebas Neue
Subheadline:  clamp(20px, 2.5vw, 28px) — Inter, muted
Body text:    16px — Inter, line-height 1.55
Labels/tags:  12px — Inter 800, UPPERCASE, letter-spacing 0.08em
```

---

## SITE STRUCTURE

The site is a **single-page application** with 9 sections, accessible via fixed navigation anchor links. All sections scroll continuously on one page.

```
Navigation (fixed top)
├── Section 1: Hero
├── Section 2: Social Proof Bar
├── Section 3: Content Discovery
├── Section 4: Books
├── Section 5: Podcast
├── Section 6: Community
├── Section 7: About
├── Section 8: Media & Press
└── Section 9: Contact
Footer
```

---

## NAVIGATION

**Structure:**
- Fixed top bar, 64px tall
- Logo left: "DUMBIRI CLETUS" in display font
- Nav links (center or right): Books · Podcast · Community · About · Media · Contact — 13px, uppercase, Inter 800, letter-spacing 0.1em
- CTA button right: "Get in Touch" — ghost style (white border, white text)
- On scroll past hero: nav background transitions to `rgba(5,5,5,0.92)` with `backdrop-filter: blur(12px)`
- Active section link: white color + 2px bottom border in `--color-red`

**Mobile nav:**
- Hamburger (3-line icon) top right
- Full-screen overlay menu, `--color-bg` background
- Large link text (24px), centered, vertically stacked
- Close with X button, nav link click, or Escape key

---

## SECTION 1: HERO

**Layout:** Full viewport height (100vh), full-bleed background image of Dumbiri with dark overlay (`radial-gradient` from 50% opacity center to 85% opacity edges). Content is left-aligned, vertically centered.

**Content:**
- Pre-label (small, uppercase, muted): `AUTHOR · SPEAKER · COMMUNITY BUILDER`
- H1 (display, two lines): `IDEAS THAT / MOVE PEOPLE`
- Subheadline (Inter, muted, max-width 560px): `Dumbiri Cletus sits at the rare intersection of rigorous thinking and practical action — writing books, hosting conversations, and building communities around the questions that shape how we lead, live, and connect.`
- Three CTAs (inline-flex, gap 16px, stacked on mobile):
  - Primary button (red): `Explore Books` → `#books`
  - Secondary button (ghost): `Listen to Podcast` → `#podcast`
  - Text link (muted, underline on hover): `Join the Community` → `#community`
- Scroll chevron: animated bounce at bottom center

**Interaction:** Section fades in on load with 600ms opacity transition.

---

## SECTION 2: SOCIAL PROOF BAR

**Layout:** Full-width, 80px vertical padding. Single row of logos centered.

**Content:**
- Small label above: `IDEAS EXPLORED IN` (uppercase, muted, 12px)
- Publication logos in order: Entrepreneur · Fast Company · Wired · Forbes · The New York Times · Time · Harvard Business Review
- Logo treatment: `filter: brightness(0) invert(1)`, opacity 0.5 default, 0.85 on hover
- Max logo height: 28px, width auto, horizontal gap 48px

**Mobile:** Horizontal scroll if logos overflow

---

## SECTION 3: CONTENT DISCOVERY

**Layout:** Full container width, section label + H2, then search bar + filter pills, then card grid (3-column, collapses to 1 on mobile).

**Content:**
- Section label: `THE WORK`
- H2: `FIND YOUR ENTRY POINT`
- Intro: `Books, episodes, and essays organized by the themes that matter most. Search by idea or browse by category — wherever you are, there's a place to start.`
- Search input: real-time filter (150ms debounce), placeholder: `Search ideas, topics, themes...`
- Filter pills: `All · Leadership · Purpose · Culture · Human Potential · Community · Books · Podcast`

**Interactions:**
- Filter pills: single-select, active state = red border + red tint bg
- Search: hides non-matching cards with opacity + height transition (250ms)
- Cards animate in via scroll reveal (staggered 100ms delay)

---

## SECTION 4: BOOKS

**Layout:** Section label + H2 + intro, then horizontal scroll rail of book cards.

**Content:**
- Section label: `BOOKS`
- H2: `THE IDEAS IN FULL`
- Intro: `Each book is an attempt to make an important idea fully usable — not just understood, but lived. Browse the full catalog.`
- Book cards: each shows cover image, title, 2-sentence description, "Get the Book →" button

**Book rail specs:**
- `overflow-x: auto`, `scroll-snap-type: x mandatory`
- Each card: `min-width: 260px`, `scroll-snap-align: start`
- Hide scrollbar on desktop; prev/next arrow buttons
- Cover hover: `scale(1.03)`, `box-shadow: 0 16px 48px rgba(0,0,0,0.8)`, 200ms ease
- Card border: `1px solid #222` → `1px solid #e1191d` on hover + `translateY(-3px)`

---

## SECTION 5: PODCAST

**Layout:** Section label + H2 + intro, then two-column split (0.8fr episode list / 1.2fr active player). Stacks vertically on mobile (list above player).

**Content:**
- Section label: `PODCAST`
- H2: `CONVERSATIONS WORTH HAVING`
- Intro: `Long-form conversations with leaders, thinkers, and builders who are doing the serious work. Each episode is a place where ideas become honest.`

**Episode list:**
- Scrollable list, max-height 480px, overflow-y auto
- Each item: episode number (muted, 11px, uppercase) + title + date + duration
- Default state: `1px solid #222` border
- Active state: `1px solid #e1191d` border + red tint background
- Click → updates right-side player

**Active episode player:**
- Podcast artwork (200px × 200px, square, sharp corners)
- Episode title (H3)
- Episode description (2–3 sentences, muted)
- HTML5 audio player with `accent-color: #e1191d`
- Platform links: Spotify · Apple Podcasts · YouTube · Google Podcasts (white SVG icons)
- **NO AUTOPLAY** — visitor must press play

**Default:** First episode active on page load.

---

## SECTION 6: COMMUNITY

**Layout:** Full-width hero image (420px tall), then section intro, then 3-column initiative card grid (2-col tablet, 1-col mobile).

**Content:**
- Section label: `COMMUNITY`
- H2: `IDEAS NEED COMPANY`
- Intro: `Dumbiri believes that the most important work happens in community — among people organized around shared purpose, willing to think together and act together. These are the ongoing experiments in what that looks like.`
- Initiative cards: image/icon + name + 2-sentence description + CTA

**Interactions:**
- Hero image: scale(1.04) → scale(1.0) on scroll enter (800ms ease-out)
- Initiative cards: hover → `translateY(-3px)`, border → red, shadow → `0 8px 32px rgba(0,0,0,0.6)`
- Staggered card reveal (100ms between each)

---

## SECTION 7: ABOUT

**Layout:** Two-column (0.82fr left, 1.18fr right). Desktop: left is sticky (`position: sticky; top: 88px`). Mobile: stacked (photo above bio).

**Content:**
- Section label: `ABOUT`
- H2: `A LIFE ORGANIZED AROUND IDEAS`
- Left (sticky): professional portrait photo + name text below
- Right (scrolls):
  - Bio (3 paragraphs — see copy.md for full text)
  - Blockquote: `"Ideas matter most when they become communities, habits, and movements — when they stop being things you believe and start being things you live."` — 4px red left border, Playfair Display italic
  - Timeline: years + milestone events, red year labels

---

## SECTION 8: MEDIA & PRESS

**Layout:** Section label + H2 + intro, then two CTA buttons, then 3-column press card grid (2-col tablet, 1-col mobile).

**Content:**
- Section label: `MEDIA & PRESS`
- H2: `THE RECORD`
- Intro: `Dumbiri Cletus is available for keynotes, panel discussions, podcast interviews, and written contributions. His work has been covered across major outlets. Everything you need to tell the story is below.`
- Primary CTA (red): `Download Media Kit` — triggers file download
- Secondary CTA (ghost): `Book for Speaking` — links to `#contact`
- Press card label: `AS SEEN IN`
- Press cards: publication name/logo + article headline + date + "Read Article →" link

**Card hover:** `translateY(-3px)`, border → red

---

## SECTION 9: CONTACT

**Layout:** Two-column (0.9fr left, 1.1fr right). Stacks on tablet/mobile.

**Content:**
- Section label: `CONTACT`
- H2: `LET'S TALK`
- Left column: intro copy + direct email + social links (LinkedIn, Twitter, Instagram)
  - Intro: `If this work has found you at the right moment — for a speaking engagement, a media inquiry, a collaboration, or a conversation — Dumbiri reads every message. Reach out directly, or use the form.`
  - Email: `hello@dumbiricletus.com` (visible, clickable mailto)
- Right column: contact form
  - Fields: Full Name · Email Address · Subject (dropdown) · Message
  - Subject options: Speaking Inquiry / Media & Press / Collaboration / Book a Meeting / General Inquiry
  - Submit button (red): `Send Message`
  - Honeypot field for spam: `<input type="text" name="_gotcha" style="display:none">`
  - Form backend: Web3Forms or Formspree
  - Success state: confirmation message (see copy.md)
  - Error state: retry message + direct email fallback

---

## FOOTER

**Content:**
- Logo + tagline: `Building at the intersection of ideas, people, and purpose.`
- Navigation: Books · Podcast · Community · About · Media · Contact
- Newsletter signup: label + email input + Subscribe button → Mailchimp or ConvertKit
- Social icons: LinkedIn · Twitter/X · Instagram
- Legal: `© [Year] Dumbiri Cletus. All rights reserved. · Privacy Policy`

---

## INTERACTIONS SUMMARY

| Element | Interaction |
|---|---|
| All cards | `translateY(-3px)` + border → red + shadow on hover |
| Book covers | `scale(1.03)` + enhanced shadow on hover |
| Nav links | Color → white, 200ms ease on hover |
| Filter pills | Red border + red tint background when active |
| Episode items | Red border + red tint when active/selected |
| Community image | `scale(1.04 → 1.0)` on scroll enter |
| Podcast platform icons | Opacity 0.5 → 1.0 on hover |
| Publication logos | Opacity 0.5 → 0.85 on hover |
| Nav background | Transparent → `rgba(5,5,5,0.92)` + blur on scroll past hero |
| All CTAs (red) | Background → `#c81518` on hover |
| Ghost buttons | Border → red on hover |
| Scroll reveals | Fade + `translateY(20px → 0)` via IntersectionObserver |
| Staggered reveals | 100ms delay between each grid child |

---

## ACCESSIBILITY REQUIREMENTS

- WCAG 2.1 Level AA minimum
- Focus rings: `0 0 0 3px rgba(225,25,29,0.4)` on all interactive elements
- Skip-to-content link visible on focus
- All images: descriptive `alt` text
- Mobile menu: focus trap when open, returns focus to trigger on close
- Audio player: proper ARIA roles and labels
- Form: `aria-describedby` links fields to error messages
- `aria-live="polite"` on filter/search result count announcements

---

## PERFORMANCE REQUIREMENTS

- All images: WebP format with JPEG fallback (`<picture>` element)
- Below-fold images: `loading="lazy"`
- Google Fonts: `font-display: swap`
- Scroll events: throttled via `requestAnimationFrame`
- Search input: 150ms debounce
- Target: LCP < 2.5s, PageSpeed > 90 (mobile)

---

## TECHNICAL CONSTRAINTS

- **Single-page:** One `index.html` file; all sections on one page
- **No backend required:** Form via Web3Forms / Formspree; audio via streaming platform URLs
- **JavaScript:** Vanilla JS only — no frameworks, no bundler
- **CSS:** CSS custom properties for all design tokens; no CSS-in-JS
- **Fonts:** Google Fonts (Bebas Neue, Inter, Playfair Display)
- **Icons:** Lucide Icons (inline SVG or CDN)
- **External links:** Always `target="_blank" rel="noopener noreferrer"`

---

## THE EMOTIONAL NORTH STAR

If at any moment during the build you are uncertain about a design decision, copy choice, or interaction, ask: *Does this produce quiet authority? Does this make the visitor feel like they are in the presence of a serious, warm, rigorous mind?*

If yes: proceed. If not: recalibrate.

The visitor should leave the page feeling two things: that they have encountered someone worth knowing — and that they want to come back.

**Everything else follows from that.**
