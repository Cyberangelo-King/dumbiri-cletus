# Product Requirements Document
## Dumbiri Cletus — Personal Brand Website

**Version:** 1.0  
**Priority:** HIGH  
**Target Launch:** TBD  
**Prepared for:** the design and implementation workflow Build

---

## 1. Executive Summary

Dumbiri Cletus is a Lagos-based multi-hyphenate professional operating at the intersection of real estate, technology, brand design, and business development. His LinkedIn is doing the work of a website — and failing to reach beyond existing followers. This site consolidates five distinct service lines under one authoritative personal brand, positions him as a credible thought leader for Gen Z entering real estate, and converts visitors into booked clients or training students.

This is not a portfolio site. This is a $5,000 personal brand command center.

---

## 2. Project Objectives

- Consolidate 5 service lines into a single, authoritative web presence
- Position Dumbiri as the go-to hybrid tech + real estate + creative professional in Nigeria
- Generate qualified leads for: real estate coaching, realtor training, brand design, social media marketing, and corporate speaking/training
- Showcase the Scale Up Conference 2024 as a credibility anchor
- Own the "Gen Z meets real estate" positioning — currently unoccupied in the Nigerian market
- Convert LinkedIn traffic into owned-audience relationships (email list, bookings)

---

## 3. Target Audience

### Primary: Gen Z Professionals (Age 20–30)
- Curious about entering real estate but overwhelmed by traditional gatekeepers
- Active on LinkedIn, Instagram, X (Twitter)
- Needs a trusted, credible, relatable coach — not an old-school broker
- Values authenticity, results, and peer credibility

### Secondary: SME Founders & Brand Owners (Age 25–40)
- Need brand design or social media marketing help
- Prefer working with someone who understands both creative and business sides

### Tertiary: Corporate HR & Event Organizers
- Looking for a corporate trainer or keynote speaker
- Want credentials, social proof, and a booking form

---

## 4. Site Architecture / Sitemap

```
Home (/)
├── About (/about)
├── Services (/services)
│   ├── Real Estate Coaching (/services/real-estate-coaching)
│   ├── Realtor Training (/services/realtor-training)
│   ├── Brand Design (/services/brand-design)
│   ├── Social Media Marketing (/services/social-media-marketing)
│   └── Corporate Training & Speaking (/services/corporate-training)
├── Scale Up Conference (/scale-up) [credibility anchor]
├── Blog / Insights (/insights)
├── Portfolio (/portfolio) [design & brand work samples]
├── Testimonials (/testimonials)
├── Contact / Book a Call (/contact)
└── 404
```

---

## 5. Page Requirements

### 5.1 Homepage
- Hero: Bold name-first statement with Dumbiri's core positioning line
- Animated stat bar: Years of experience / Clients served / Projects completed / Training graduates
- Service card grid (5 cards, each links to service page)
- "Why Dumbiri" section: 3–4 differentiating points with icons
- Scale Up Conference feature block (photo, quick stat, CTA to dedicated page)
- Testimonials carousel (social proof)
- Featured blog/insight post
- Sticky CTA: "Book a Free Discovery Call"

### 5.2 About Page
- Professional origin story (CS → Ecommerce → Creative → BizDev)
- Personal mission statement
- Timeline / career journey visualization
- Values section (3–5 core values)
- "As Featured In / Conference" section
- High-quality photography (candid + professional)

### 5.3 Services Pages (each)
- Hero with service-specific hook headline
- What it is / Who it's for / What you get
- Process breakdown (3–5 step visual)
- Pricing tiers or "Book a Discovery Call" (no hard pricing if flexible)
- FAQs (5–7 questions)
- Testimonials specific to that service
- CTA block

### 5.4 Scale Up Conference Page
- Hero with event photography
- Key stats: attendees, speakers, date/location (Enugu 2024)
- Highlights reel / gallery
- "Want me to speak at or organize your event?" CTA
- Future editions teaser if applicable

### 5.5 Portfolio Page
- Filterable grid: Brand Design / Social Media / Event Collateral
- Project cards: thumbnail → modal or case study page
- Minimal. Let the work speak.

### 5.6 Insights / Blog
- Article cards with category tags
- Search + filter
- Email capture at bottom ("Get weekly insights from Dumbiri")

### 5.7 Contact / Book Page
- Calendly embed or custom booking form
- Clear service selector dropdown in form
- Response time expectation ("I respond within 24 hours")
- Social links
- Email: visible, not hidden

---

## 6. Functional Requirements

| Feature | Priority | Notes |
|---|---|---|
| Responsive mobile-first design | Must-have | 70%+ Nigerian internet usage is mobile |
| Contact/booking form | Must-have | Service selector, name, email, message |
| Calendly or booking embed | Must-have | For coaching & training calls |
| Testimonials section | Must-have | With photo + name for credibility |
| Portfolio gallery with filter | Must-have | Brand + social + event work |
| Blog/CMS integration | Should-have | Contentful, Notion, or Sanity backend |
| Email capture / newsletter | Should-have | ConvertKit or Mailchimp integration |
| Analytics (GA4) | Must-have | Track conversions per service |
| SEO optimization | Must-have | Meta tags, structured data, og:image |
| Social media feed embed | Nice-to-have | LinkedIn or Instagram latest posts |
| WhatsApp chat button | Should-have | Nigerian market expects this |
| Page transition animations | Should-have | Elevates premium feel |

---

## 7. Technical Requirements

- **Stack (based on existing GitHub repo):** TBD after repo review
- **Hosting:** Vercel or Netlify (fast global CDN)
- **Performance:** Lighthouse score 90+ on mobile
- **Accessibility:** WCAG 2.1 AA minimum
- **Images:** WebP format, lazy-loaded
- **Forms:** Connected to email (Formspree, EmailJS, or custom endpoint)
- **CMS:** Headless preferred (Sanity, Contentful, or Notion as CMS)

---

## 8. Success Metrics

| Metric | Target |
|---|---|
| Monthly unique visitors | 500+ within 3 months |
| Contact form submissions | 20+ per month |
| Discovery call bookings | 10+ per month |
| Email list growth | 100+ subscribers in 3 months |
| Bounce rate | < 55% |
| Avg. session duration | > 2.5 minutes |

---

## 9. Constraints & Notes

- GitHub repo already exists — build must integrate with or replace it
- No hard pricing to be shown (flexible, discovery-call model)
- Brand assets (logo, headshots, event photos) needed from client before final build
- WhatsApp integration is essential for the Nigerian market
- Copy must be sharp, confident, and human — never corporate-generic
