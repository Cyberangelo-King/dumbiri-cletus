# Design Document
## Dumbiri Cletus — Personal Brand Website

---

## 1. Design Intent

This website should communicate one thing above all else: **this person is worth your time and money.**

Every design decision — layout, spacing, typography, motion, imagery — signals quality, confidence, and authority. Visitors should feel, before reading a single word, that they are dealing with a serious professional.

The design borrows from luxury personal brand websites (think Tobias van Schneider, Naval Ravikant's site era, or a modern architecture firm portfolio) and adapts it for the Lagos market — energetic but not loud, premium but not cold, modern but not sterile.

---

## 2. Overall Design System

**Style:** Dark Premium Minimal  
**Mood:** Ambitious, authoritative, warm, grounded  
**Reference Directions:**
- Fonts: Serif headings for gravitas, clean sans for utility
- Colors: Deep obsidian backgrounds, amber gold accents
- Space: Generous — the design breathes
- Motion: Purposeful, smooth, never distracting

---

## 3. Page-by-Page Layout Specifications

### 3.1 Homepage Layout

```
[NAVIGATION — sticky, frosted glass]
─────────────────────────────────────
[HERO — full viewport]
  Dark background + subtle motion
  DUMBIRI CLETUS [animated type]
  Positioning statement (1 line)
  2 CTAs: Primary + Secondary
  Scroll indicator
─────────────────────────────────────
[STATS BAR — narrow band]
  4 metrics, count-up on scroll
─────────────────────────────────────
[SERVICES — card grid]
  Section headline
  5 cards, 3-col grid desktop
─────────────────────────────────────
[SCALE UP CONFERENCE — full-width feature]
  Photo background, overlay content
─────────────────────────────────────
[ABOUT TEASER — 2-column]
  Photo left, text right
  "The Story" — 2-3 sentence origin
  "About Dumbiri →" CTA
─────────────────────────────────────
[TESTIMONIALS — carousel]
  3 visible at once (desktop)
  Auto-rotate
─────────────────────────────────────
[PORTFOLIO PREVIEW — 3 items]
  "See the work →" CTA
─────────────────────────────────────
[LATEST INSIGHT — 1 featured article]
─────────────────────────────────────
[FINAL CTA BAND — full width gradient]
  "Ready to move? Let's talk."
  Book a Call button
─────────────────────────────────────
[FOOTER]
  Logo, nav links, socials, email
  Copyright, built-with note
```

---

### 3.2 Hero Section — Detailed

**Layout:**
- Full viewport height (`100vh` minimum, `min-height: 100svh`)
- Centered content, left-aligned on desktop
- Content max-width: `600px` on left side, rest dark with subtle visual element

**Visual elements:**
- Background: `#0A0A0F` with subtle animated gradient blob or noise texture
- Optional: thin horizontal line graphic or geometric ornament top-right
- Photography: candid of Dumbiri (right side, desktop only, enters with fade)

**Typography:**
```
Overline: "REALTOR · DESIGNER · BUSINESS BUILDER" (tracked, caps, amber)
H1: "DUMBIRI CLETUS" (Playfair Display, 72–96px, off-white)
Subheading: Positioning statement (Inter, 20–24px, warm grey)
```

**CTA placement:**
```
[Book a Discovery Call]   [See My Work ↓]
```
Primary fills amber gradient. Secondary is ghost style.

---

### 3.3 Services Section — Card Grid

**Cards (each):**
```
┌─────────────────────────┐
│  [Icon 32px amber]      │
│                         │
│  Service Name           │
│  One-line description   │
│                         │
│  Explore →              │
└─────────────────────────┘
```

**Grid:**
- 3 across desktop → first row: 3 cards, second row: 2 centered
- Or 2+3 split with a featured card larger
- Gap: 24px

**Card hover:**
- Border changes from `#2A2A35` to amber at 60% opacity
- Card lifts `translateY(-6px)`
- Transition: 250ms ease

---

### 3.4 About Page Layout

```
[HERO — narrow banner]
  "About Dumbiri" heading
  Short positioning line
─────────────────────────────────────
[INTRO — 2-column]
  Professional headshot (left, 45%)
  Origin story text (right, 55%)
─────────────────────────────────────
[CAREER TIMELINE — horizontal scroll]
  Years: 20XX → 20XX → present
  Milestones: CS Grad → Ecommerce → Design → BizDev
─────────────────────────────────────
[VALUES — 4-col icon grid]
  Each value: icon + name + 1-line description
─────────────────────────────────────
[CREDENTIALS / FEATURES BAND]
  "As heard at / organized:"
  Scale Up Conference logo + year
─────────────────────────────────────
[TESTIMONIAL PULL QUOTE]
  Large typographic treatment of one powerful testimonial
─────────────────────────────────────
[CTA — "Work With Me"]
```

---

### 3.5 Service Page Layout (template for all 5)

```
[HERO — centered, narrow]
  Service icon (large, amber)
  Service name (H1)
  Hook headline (H2 — a question or bold claim)
  1-paragraph intro
─────────────────────────────────────
[WHO THIS IS FOR — 3 columns]
  Each: icon + "If you are..." statement
─────────────────────────────────────
[WHAT YOU GET — feature list]
  Icon + deliverable name + 1-line description
─────────────────────────────────────
[THE PROCESS — step cards]
  Step 1 → Step 2 → Step 3 → Step 4
  Connected with horizontal line (desktop)
─────────────────────────────────────
[INVESTMENT — pricing or CTA to call]
─────────────────────────────────────
[TESTIMONIALS — 2-3 from this service]
─────────────────────────────────────
[FAQ — accordion]
─────────────────────────────────────
[BOOKING CTA — full-width band]
  Calendly embed or "Book Now" button → /contact
```

---

### 3.6 Portfolio Layout

```
[HEADER]
  "The Work" — clean heading
  Brief line: "Brand. Social. Events. Real Estate."
─────────────────────────────────────
[FILTER TABS]
  All | Brand Design | Social Media | Events | Real Estate
─────────────────────────────────────
[GRID — masonry or uniform]
  Cards: thumbnail + hover overlay (project name + category)
  Click → Lightbox or Case Study page
─────────────────────────────────────
[CTA]
  "Want to see what I'd do for your brand?"
  Book a Design Call →
```

---

## 4. Component Library

### Navigation
- Height: 72px
- Logo: Left-aligned, 140px wide max
- Links: Inter, 15px, 500 weight, warm grey, amber on active/hover
- CTA Button: Amber gradient, right-aligned
- Mobile: Full-screen drawer, links stack vertically, 24px padding

### Footer
- Dark (`#0D0D12`)
- 4-column desktop, 2-column mobile, 1-column smallest
- Columns: Logo/tagline | Navigation | Services | Connect
- Bottom bar: copyright + built-with

### Breadcrumb
- Show on all sub-pages: Home > Services > Real Estate Coaching
- Font: Inter 13px, warm grey
- Separator: `›`

### Loading State
- Page preloader: minimal — fade overlay, logo pulse, fast dismiss
- Or: no preloader, instant load with content reveal animation

---

## 5. Responsive Design Breakpoints

### Mobile (< 640px)
- Single column
- Nav: hamburger drawer
- Hero: full-width, centered content, no side image
- Cards: full width
- Font sizes: 10–15% smaller than desktop

### Tablet (640px–1024px)
- 2-column layouts
- Cards: 2 per row
- Nav: horizontal but compressed

### Desktop (> 1024px)
- Full layout as designed
- Max content width: 1280px centered

---

## 6. Accessibility Requirements

- Colour contrast ratio: minimum 4.5:1 for body text, 3:1 for large text
- All images: descriptive alt text
- All interactive elements: keyboard focusable with visible focus ring
- Focus ring: 2px amber outline, 2px offset
- Skip-to-content link visible on keyboard tab
- Form labels: associated with inputs (not placeholder-only)
- ARIA landmarks: header, main, nav, footer
- Reduced motion: `prefers-reduced-motion` media query — disable all animations

---

## 7. Design Deliverables Checklist

Before handoff to Google Stitch / AI Studio, confirm:

- [ ] Full-resolution logo (SVG + PNG@2x)
- [ ] Professional headshots (minimum 3 poses)
- [ ] Scale Up Conference photography
- [ ] Portfolio work samples (minimum 6 per category)
- [ ] 3–5 real client testimonials with names and photos
- [ ] Specific stat numbers (years, clients, graduates)
- [ ] All copy finalized (from copy.md)
- [ ] Favicon (32×32, 192×192 SVG preferred)
- [ ] OG image designed (1200×630)
