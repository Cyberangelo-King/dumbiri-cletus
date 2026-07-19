# Features & Functions Document
## Dumbiri Cletus — Personal Brand Website

---

## 1. Feature Priority Matrix

| Feature | Priority | Complexity | Impact |
|---|---|---|---|
| Responsive layout (mobile-first) | P0 | Low | Critical |
| Service pages (5) | P0 | Medium | Critical |
| Booking/contact form | P0 | Low | Critical |
| WhatsApp chat button | P0 | Low | Critical |
| Portfolio gallery with filter | P0 | Medium | High |
| Testimonials section | P0 | Low | High |
| Calendly embed | P1 | Low | High |
| Analytics (GA4) | P1 | Low | High |
| Scale Up Conference page | P1 | Low | High |
| SEO meta optimization | P1 | Low | High |
| Blog / CMS integration | P1 | Medium | Medium |
| Email capture / newsletter | P1 | Low | Medium |
| Stats counter animation | P2 | Low | Medium |
| Social media embed (LinkedIn/IG) | P2 | Low | Low |
| Dark/light mode toggle | P3 | Medium | Low |
| Multi-language support | Backlog | High | Low |

**P0** = Launch blocker | **P1** = Launch target | **P2** = Post-launch sprint | **P3** = Someday

---

## 2. Feature Specifications

### F01 — Navigation

**What:** Sticky top navigation bar with mobile hamburger menu.

**Behavior:**
- Desktop: Logo left, nav links center, CTA button right ("Book a Call")
- Mobile: Logo left, hamburger icon right; drawer menu slides in from right
- On scroll past hero: background becomes frosted glass (backdrop-filter: blur)
- Active section highlighted in nav (scroll-spy)
- CTA button: amber gradient, "Book a Call"

**Links:** Home, About, Services (dropdown), Portfolio, Insights, Contact

---

### F02 — Hero Section

**What:** Full-viewport opening statement with animated name and positioning.

**Behavior:**
- Background: dark with subtle animated gradient or particle background
- Dumbiri's name types in character by character
- Subtitle fades in after name completes
- Two CTAs: Primary "Book a Discovery Call" + Secondary "See My Work" (scrolls to portfolio)
- Optional: looping background image or short video (conference/workspace footage)
- Scroll indicator arrow (bounces subtly)

---

### F03 — Stats / Social Proof Bar

**What:** Horizontal row of 4 key metrics with count-up animation.

**Metrics (placeholders — confirm with client):**
- `5+` Years of Experience
- `3` Business Disciplines Mastered
- `200+` Professionals Trained
- `1` Major Conference Produced

**Behavior:**
- Count-up animation triggers when section enters viewport (Intersection Observer)
- Each stat has a label and an icon

---

### F04 — Services Grid

**What:** Grid of 5 service cards linking to individual service pages.

**Each card contains:**
- Icon (Lucide or custom SVG)
- Service name (H3)
- One-line description
- Arrow CTA "Explore →"

**Behavior:**
- 3 columns desktop, 2 tablet, 1 mobile
- Cards lift and border glows gold on hover
- Click navigates to dedicated service page

**Services:**
1. Real Estate Coaching
2. Realtor Training
3. Brand Design
4. Social Media Marketing
5. Corporate Training & Public Speaking

---

### F05 — Service Detail Pages (5 pages)

**Each page contains:**
1. Hero with service name + hook headline
2. "What it is" paragraph (2–3 sentences max)
3. "Who it's for" — 3 bullet points (specific, targeted)
4. "What you get" — deliverables list
5. Process section (3–5 steps with icons)
6. Pricing section (tiered or "Discovery call for pricing")
7. FAQ accordion (5–7 questions)
8. Testimonials (2–3 specific to this service)
9. CTA block with booking form or Calendly embed

---

### F06 — Portfolio Gallery

**What:** Filterable grid of past work samples.

**Categories (filter tabs):**
- All
- Brand Design
- Social Media
- Events & Conference
- Real Estate

**Behavior:**
- Click filter: grid re-sorts with smooth animation (isotope.js or CSS grid + JS)
- Each item: thumbnail image with category label
- On hover: overlay with project name + "View →"
- On click: lightbox modal opens with project details (images, description, outcome)

---

### F07 — Testimonials

**What:** Rotating carousel of client/student testimonials.

**Each testimonial includes:**
- Quote text (2–4 sentences max)
- Full name
- Title/role and company (if applicable)
- Photo (real, not stock)
- Star rating (optional)

**Behavior:**
- Auto-rotates every 5 seconds, pauses on hover
- Manual prev/next arrows
- Dot indicators below
- Smooth fade or slide transition

---

### F08 — Scale Up Conference Feature

**What:** Full-width feature section on homepage + dedicated page.

**Homepage block:**
- Background: event photo
- Overlay text: "Scale Up Conference 2024 — Enugu"
- Key stat (e.g., attendees count)
- "See the full story →" link

**Dedicated page (/scale-up):**
- Event hero (large photography)
- Event summary + highlights
- Photo gallery grid
- Speaker/panelist section (if applicable)
- Quote from a keynote or memorable moment
- CTA: "Bring Dumbiri to your event"

---

### F09 — Blog / Insights

**What:** CMS-powered blog listing and article pages.

**Listing page:**
- Featured article at top (full width)
- Grid of recent articles (3-col desktop)
- Category filter tabs
- Search bar
- Email capture at bottom: "Get insights straight to your inbox"

**Article page:**
- Title, author, date, category, estimated read time
- Hero image
- Article body (styled typography)
- Inline CTA block midway through ("Like what you're reading? Book a call")
- Related articles section at bottom
- Share buttons (LinkedIn, X/Twitter, copy link)

**CMS options:** Sanity.io, Contentful, or Notion as CMS with static site generation

---

### F10 — Contact / Book Page

**What:** Primary conversion page.

**Components:**
- Page headline: "Let's Work Together" or "Start the Conversation"
- Short intro (2 sentences)
- Calendly embed (if available) for direct scheduling
- OR manual contact form with fields:
  - Name *
  - Email *
  - Service of Interest (dropdown: the 5 services + "Other")
  - Message *
  - Preferred contact method (Email / WhatsApp / Call)
- Form success state: warm animated confirmation
- Sidebar: email address, WhatsApp number, social links, response time expectation

---

### F11 — WhatsApp Floating Button

**What:** Fixed floating button bottom-right, always visible.

**Behavior:**
- WhatsApp icon in brand color
- On click: opens `https://wa.me/{number}?text=Hi Dumbiri, I found your website and I'd like to...`
- Pre-filled message reduces friction
- Appears after 3 seconds on page (slight delay so it doesn't compete with hero)

---

### F12 — Email Capture / Newsletter

**What:** Inline email capture form, appears in blog listing and About page.

**Behavior:**
- Single field: email input + "Subscribe" button
- On submit: success animation + "Check your email to confirm"
- Integration: Mailchimp, ConvertKit, or Brevo
- Lead magnet optional: "Download my free guide: How to Enter Real Estate Before Age 25"

---

### F13 — SEO & Meta

**What:** Full on-page SEO optimization.

**Implementation:**
- Unique title + meta description for every page
- OG image (1200×630) for every page
- Twitter card meta
- Structured data (JSON-LD): Person, Service, Event (Scale Up Conference)
- Sitemap.xml auto-generated
- Robots.txt
- Canonical URLs

**Primary keywords:**
- "Real estate coach Lagos"
- "Brand designer Nigeria"
- "Gen Z real estate Nigeria"
- "Corporate trainer Nigeria"
- "Dumbiri Cletus"

---

### F14 — Analytics

**What:** GA4 + event tracking.

**Events to track:**
- CTA button clicks (by page and service)
- Form submissions (by type)
- WhatsApp button clicks
- Calendly booking completions
- Email captures
- Portfolio item views (by category)
- Blog article reads (scroll depth)
- External link clicks

---

## 3. Mobile-Specific Requirements

- Tap targets minimum 44×44px
- No hover-only interactions (all hover states also work on tap)
- Sticky WhatsApp button positioned above browser chrome
- Form inputs: no zoom on focus (font-size: 16px minimum)
- Images: WebP with fallback, lazy-loaded
- Navigation: smooth drawer, no jarring transitions
- Video: autoplay only muted, prefers-reduced-motion respected

---

## 4. Performance Requirements

| Metric | Target |
|---|---|
| Lighthouse Performance | 90+ mobile, 95+ desktop |
| First Contentful Paint | < 1.5s |
| Largest Contentful Paint | < 2.5s |
| Cumulative Layout Shift | < 0.1 |
| Time to Interactive | < 3.5s |
| Total page weight (homepage) | < 1MB |
