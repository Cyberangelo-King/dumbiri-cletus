# Master Prompt
## Dumbiri Cletus — Personal Brand Website
### For Google Stitch / Google AI Studio

---

## MASTER PROMPT

You are building a premium personal brand website for **Dumbiri Cletus**, a Lagos-based multi-hyphenate professional who operates across real estate coaching, realtor training, brand design, social media marketing, and corporate training/public speaking. This is a $5,000-tier personal brand command center — not a generic template website.

---

## CONTEXT

Dumbiri Cletus is unique in the Nigerian professional market: he has a Computer Science background, ran e-commerce operations, built brands as a designer, and works as Business Development Manager at a real estate firm. He produced the Scale Up Conference 2024 in Enugu. He has a Gen Z audience in real estate — a niche with no strong competitor. His LinkedIn is currently doing the work of a website, and this site must make LinkedIn visitors never want to go back.

---

## VISUAL DESIGN DIRECTION

**Aesthetic:** Dark Premium Minimal  
**Palette:**
- Background: `#0A0A0F` (Obsidian)
- Surface: `#13131A` (Deep Slate)
- Accent: `#D4A017` (Amber Gold) — primary CTAs, highlights, hover states
- Secondary accent: `#B87333` (Electric Copper)
- Text primary: `#F0EDE8` (Off-White)
- Text secondary: `#8A8785` (Warm Grey)
- Border: `#2A2A35`

**Typography:**
- Headings: Playfair Display (serif) — weight 600–700
- Body/UI: Inter (sans-serif) — weight 400–600
- Display H1: 72–96px desktop, 44px mobile
- H2: 48px desktop, 32px mobile
- Body: 16–18px, 1.7 line height

**Layout:** Mobile-first, responsive. Max content width 1280px. 8px spacing system. Generous white space — this site breathes.

---

## SITE STRUCTURE

Build the following pages:

1. **Homepage** — Hero, stats bar, services grid (5 cards), Scale Up Conference feature, about teaser, testimonials carousel, portfolio preview, final CTA band, footer
2. **About** — Origin story, career timeline, values grid, credentials section, testimonial pull quote
3. **Services** — Grid index page linking to 5 individual service pages
4. **Real Estate Coaching** — Dedicated service page
5. **Realtor Training** — Dedicated service page
6. **Brand Design** — Dedicated service page
7. **Social Media Marketing** — Dedicated service page
8. **Corporate Training & Speaking** — Dedicated service page
9. **Scale Up Conference** — Event showcase page
10. **Portfolio** — Filterable gallery (Brand Design | Social | Events | Real Estate)
11. **Insights/Blog** — CMS-powered listing + article template
12. **Contact / Book** — Form + Calendly embed

---

## HERO SECTION SPEC

Full-viewport. Animated character-by-character name reveal. Dark background with subtle animated gradient blob. Content left-aligned desktop, centered mobile.

```
OVERLINE: REALTOR · DESIGNER · BUSINESS BUILDER (small caps, amber, tracked)

H1: DUMBIRI CLETUS (Playfair Display, massive, off-white)

H2: Most professionals choose one lane.
    I built a career across all of them.

SUBTEXT: Real estate coach. Brand designer. Business development leader. 
Corporate trainer. Event producer. One person. Every tool you need.

CTA1: [Book a Discovery Call] — amber gradient button
CTA2: [See My Work ↓] — ghost button
```

---

## KEY INTERACTIONS

- **Sticky navigation** with frosted glass on scroll
- **Stats bar** with count-up animation on scroll entry
- **Service cards** lift and glow gold on hover
- **Portfolio gallery** with category filter tabs and lightbox
- **Testimonials carousel** auto-rotates, pauses on hover
- **WhatsApp floating button** — fixed bottom-right, appears after 3s
- **Scroll-triggered section reveals** — fade-up entrance animations
- **Form success animation** — animated checkmark on submission
- **Smooth scroll** between sections

---

## COPY TONE

Confident. Direct. Warm. Lagos-grounded. Every sentence earns its place. Short punchy paragraphs. No "I am passionate about..." language. No corporate jargon. Reads like advice from a brilliant friend who has figured something out.

Use the copy exactly as written in `copy.md` — do not rewrite in AI-sounding language.

---

## TECHNICAL REQUIREMENTS

- Mobile-first, responsive (breakpoints: 640px, 768px, 1024px, 1280px)
- Lighthouse score 90+ mobile
- WebP images, lazy-loaded
- WhatsApp integration: `https://wa.me/{number}?text=Hi Dumbiri...` pre-filled
- Contact form connected to email (Formspree or EmailJS)
- GA4 analytics with custom events (CTA clicks, form submissions, WhatsApp clicks)
- SEO: unique title + meta per page, og:image, JSON-LD structured data (Person, Service)
- Accessibility: WCAG 2.1 AA, keyboard navigable, reduced-motion support

---

## CONTENT NEEDED FROM CLIENT (placeholders to fill)

- [ ] Final logo SVG
- [ ] Professional headshots (min. 3 shots)
- [ ] Scale Up Conference photos
- [ ] Portfolio work samples
- [ ] Client testimonials (name, title, quote, photo)
- [ ] Specific numbers (clients, years, training graduates)
- [ ] WhatsApp number
- [ ] Email address
- [ ] Calendly link
- [ ] Social media handles (LinkedIn, Instagram)

---

## WHAT SUCCESS LOOKS LIKE

A first-time visitor lands, reads the hero, and thinks: *"I didn't expect this level. I need to know more."* They scroll. They find a service that matches their need. They read testimonials. They click "Book a Call." They feel stupid not to.

**This site should be undeniably awesome.** Treat every section like a prospective client is deciding whether to invest their money. Design and write accordingly.

---

## FILES TO REFERENCE

All supporting documents for this build:
- `PRD.md` — Full product requirements
- `design.md` — Page layouts and component specs
- `style.md` — Color, typography, spacing system
- `brand.md` — Brand positioning, voice, differentiators
- `emotions.md` — Emotional arc and micro-moment design
- `goals.md` — Conversion goals and success metrics
- `features-and-functions.md` — Full feature specs
- `copy.md` — All website copy, ready to use

Read all files before building. Do not improvise positioning, copy, or design direction — use the documents.
