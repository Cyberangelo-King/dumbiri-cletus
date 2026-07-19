# Admin Dashboard Document
## Dumbiri Cletus — Personal Brand Website

---

## 1. Overview

The Dumbiri Cletus admin dashboard is the command center behind the public-facing site. It gives Dumbiri full visibility into how his brand is performing — enquiries, bookings, portfolio views, blog engagement, email subscribers — and surfaces what needs his attention without making him dig through multiple tools.

**Access:** Private, password-protected. Dumbiri only (single-user admin).  
**Tech:** Next.js admin panel or Retool (fastest build), hosted on Vercel.  
**Auth:** Supabase Auth or NextAuth.js with Google OAuth (one-click login with Gmail).

---

## 2. Authentication

### Login
- Google OAuth (primary — one-click, no password to manage)
- Email + password fallback
- 2FA via authenticator app (optional, recommended)
- Session timeout: 24 hours
- IP whitelist option for extra security

### Security
- HTTPS enforced
- CSRF protection on all forms
- Rate limiting on login attempts
- Audit log: every admin action logged with timestamp

---

## 3. Dashboard Home (Overview)

The landing page after login. One-glance summary of everything happening across the site.

### Key Metric Cards (top row)
| Metric | Data Source | Refresh |
|---|---|---|
| New enquiries (last 7 days) | Contact form / email | Real-time |
| Discovery calls booked (this month) | Calendly API | Daily |
| Site visitors (last 30 days) | GA4 | Daily |
| Email subscribers | Mailchimp / ConvertKit API | Daily |
| WhatsApp button clicks (last 7 days) | GA4 custom event | Daily |

### Charts (below cards)
- **Traffic over time** — 30-day line chart (sessions, users, pageviews)
- **Top pages** — bar chart (which pages get the most traffic)
- **Enquiry source breakdown** — pie chart (which service page converts most)
- **Service click distribution** — which of the 5 services gets the most CTA clicks

### Quick Actions (right sidebar)
- ➕ Add new portfolio item
- 📝 Create new blog post
- 👤 View new enquiries
- 📆 See upcoming Calendly bookings

---

## 4. Modules / Sections

### 4.1 Enquiries & Leads

**What it does:** Aggregates all contact form submissions into a CRM-lite interface.

**Columns per enquiry:**
- Date/time received
- Name + Email
- Service of interest
- Message preview
- Status: New / In progress / Replied / Archived
- Actions: Reply (email compose), Archive, Add note

**Features:**
- Filter by: status, service type, date range
- Search by name or email
- Bulk archive/mark as read
- Email reply opens pre-filled compose window (mailto or SendGrid)
- Notes field per lead (internal only)
- Export to CSV

**Integrations:**
- Formspree / EmailJS → webhook → Supabase table
- Optional: Zapier → Notion database (if Dumbiri uses Notion for CRM)

---

### 4.2 Bookings (Calendly)

**What it does:** Shows Calendly bookings pulled via Calendly API.

**Displays:**
- Upcoming bookings: date, time, name, email, service selected
- Past bookings: count by service type, completion rate
- Cancellations / reschedules

**Features:**
- Filter: upcoming / past / cancelled
- Click to view full booking details
- Manual add note to a booking
- Summary: bookings this month vs. last month

**Integration:** Calendly API v2 (OAuth token, read-only)

---

### 4.3 Blog / Content Manager

**What it does:** CMS interface to create, edit, publish, and manage blog posts (Insights section).

**Post editor:**
- Title, slug (auto-generated), category, tags
- Rich text editor (TipTap or Notion-like)
- Cover image upload (stored to Cloudinary or Supabase Storage)
- SEO fields: meta title, meta description, og:image
- Status: Draft / Scheduled / Published
- Publish date (with scheduling)

**Post list view:**
- Table: title, category, status, published date, views
- Filter by: status, category
- Bulk: publish, unpublish, delete

**Analytics per post:**
- Views (from GA4 by URL)
- Avg time on page
- Scroll depth

**Integration:** Sanity.io or Supabase (whichever is chosen as CMS)

---

### 4.4 Portfolio Manager

**What it does:** Add, edit, and remove portfolio items displayed on the public site.

**Per item:**
- Project title
- Category (Brand Design / Social Media / Events / Real Estate)
- Cover image upload
- Gallery images (up to 10)
- Project description (rich text)
- Client name (optional — can be "Confidential")
- Year
- Tags
- Featured toggle (shows in homepage portfolio preview)
- Published / Draft toggle

**Features:**
- Drag-and-drop reorder (sets display order)
- Bulk publish/unpublish

---

### 4.5 Email Subscribers

**What it does:** View and manage email list from the newsletter capture.

**Displays:**
- Total subscribers
- New subscribers (last 30 days)
- Growth chart (subscribers over time)
- List of subscribers: name, email, date subscribed, source (which page)

**Features:**
- Export to CSV
- Manually add subscriber
- Unsubscribe a specific address

**Integration:** Mailchimp API or ConvertKit API (read + write)

---

### 4.6 Analytics (GA4 Dashboard)

**What it does:** Embeds key GA4 data directly in the admin panel.

**Metrics shown:**
- Sessions (daily, weekly, monthly)
- Users by country (chart — Nigeria should dominate)
- Top pages (ranked)
- Top traffic sources (organic, direct, social, referral)
- Devices: mobile vs. desktop breakdown
- Avg session duration + bounce rate
- Conversion events: CTA clicks, form submissions, WhatsApp clicks, Calendly bookings

**Integration:** GA4 Data API (service account credentials)

---

### 4.7 Scale Up Conference Manager

**What it does:** Manage the Scale Up Conference page content.

**Fields:**
- Event photos (gallery upload)
- Attendee count (editable number)
- Key stats (editable key-value pairs)
- Speaker/panelist list (name, title, photo)
- Testimonial quotes from the event
- Published/Draft toggle for the page

---

### 4.8 Testimonials Manager

**What it does:** Add, edit, approve, and display testimonials on the public site.

**Per testimonial:**
- Name
- Title / Role / Company
- Photo upload
- Quote text
- Service category (which service page it appears on)
- Featured toggle (homepage carousel)
- Published / Draft

**Features:**
- Drag-and-drop reorder
- Assign to specific service pages

---

### 4.9 Site Settings

**What it does:** Global settings that affect the public site.

**Sections:**
- **Profile:** Name, tagline, bio, headshot
- **Social links:** LinkedIn, Instagram, Twitter/X, WhatsApp number
- **Contact:** Email address, Calendly URL
- **SEO defaults:** Default OG image, default meta description
- **Maintenance mode:** Toggle (shows "site updating" page to visitors)
- **Analytics ID:** GA4 measurement ID
- **Newsletter:** Mailchimp/ConvertKit API key, list ID

---

## 5. Integrations Stack

| Integration | Purpose | Method |
|---|---|---|
| **Google OAuth** | Admin login | NextAuth.js / Supabase Auth |
| **Supabase** | Database (enquiries, leads, content) | Supabase JS SDK |
| **GA4 Data API** | Analytics in dashboard | Google Analytics Data API v1 |
| **Calendly API v2** | Booking visibility | REST API, OAuth |
| **Mailchimp / ConvertKit** | Email subscriber management | REST API |
| **Cloudinary / Supabase Storage** | Image uploads (portfolio, blog) | SDK |
| **Sanity.io / Supabase** | CMS for blog + portfolio | REST / GraphQL |
| **SendGrid / Resend** | Email replies to leads | REST API |
| **Zapier (optional)** | Lead → Notion/CRM automation | Webhook trigger |

---

## 6. Tech Stack Recommendation

| Layer | Choice | Rationale |
|---|---|---|
| Framework | Next.js 14 (App Router) | Same as public site — share components |
| Auth | Supabase Auth + Google OAuth | One-click login, secure, free tier |
| Database | Supabase (PostgreSQL) | Real-time, easy to query, free tier generous |
| UI Library | shadcn/ui + Tailwind | Fast to build, looks clean |
| Charts | Recharts or Chart.js | Lightweight, React-compatible |
| Rich Text | TipTap | Best open-source rich text editor for React |
| Image Storage | Supabase Storage or Cloudinary | Both work; Cloudinary has better transforms |
| Hosting | Vercel | Same as public site |
| Monitoring | Vercel Analytics + Sentry | Error tracking + performance |

---

## 7. Admin URL Structure

```
/admin (login)
/admin/dashboard (home — overview)
/admin/enquiries (leads & contact forms)
/admin/bookings (Calendly)
/admin/blog (post list)
/admin/blog/new (create post)
/admin/blog/[id]/edit (edit post)
/admin/portfolio (item list)
/admin/portfolio/new (add item)
/admin/subscribers (email list)
/admin/analytics (GA4 dashboard)
/admin/conference (Scale Up Conference page)
/admin/testimonials (testimonials)
/admin/settings (site settings)
```

---

## 8. Mobile Admin Considerations

- Responsive layout (Dumbiri may check on mobile)
- Priority mobile views: Enquiries, Bookings, Dashboard overview
- Non-priority mobile: Blog editor, Portfolio manager (desktop preferred for these)
- Notifications: consider a simple email digest (daily summary) as mobile fallback

---

## 9. Notifications

| Event | Notification Method |
|---|---|
| New enquiry received | Email to Dumbiri (SendGrid) + browser notification |
| New Calendly booking | Email (Calendly native) |
| New subscriber | Daily digest email |
| New portfolio comment (if enabled) | Email notification |
| GA4 traffic spike (optional) | Weekly email report |
