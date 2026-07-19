# Marketing Website Blueprint
## Dumbiri Cletus — Personal Brand Website
**Version:** 1.0  
**Document Type:** Developer Blueprint — Read Before Building

---

## Purpose of This Document

This is the site blueprint. It describes — in plain language — every section of the Dumbiri Cletus website: what goes in it, what it looks like, how it's structured, what it's trying to accomplish, and how visitors are guided through it. Read this before touching a file. It is the single source of truth for the site's architecture and intent.

---

## Navigation Structure

### Fixed Top Navigation Bar

The navigation is fixed at the top of the viewport at all times. It is the spine of the site's wayfinding.

**Left:** Dumbiri's name (`DUMBIRI CLETUS`) in the display font (Bebas Neue), linked to `#hero` / page top.

**Center/Right — Navigation Links:**

| Label | Anchor | Purpose |
|---|---|---|
| Books | `#books` | Jump to book catalog section |
| Podcast | `#podcast` | Jump to podcast player |
| Community | `#community` | Jump to community section |
| About | `#about` | Jump to about/bio section |
| Media | `#media` | Jump to press/media section |
| Contact | `#contact` | Jump to contact section |

**Far Right — CTA Button:** `Get in Touch` → anchors to `#contact`. Ghost button style (white border, white text).

**Scroll behavior:** On initial load, nav is transparent. After user scrolls past the hero section (80px scroll depth), the nav transitions to a semi-transparent dark panel with blur (`rgba(5,5,5,0.92)` + `backdrop-filter: blur(12px)`).

**Active link tracking:** As user scrolls, the nav link corresponding to the visible section becomes active (white color + 2px red bottom border). This is implemented via IntersectionObserver.

**Mobile nav:** The full nav collapses to a hamburger icon (top right). Tapping opens a full-screen overlay menu with all links stacked vertically, large type (24px), centered. Closes via X button, link click, or Escape key.

---

## Page Structure — All Sections in Order

---

### SECTION 1: Hero

**What it is:** The opening of the entire experience. Full-screen, cinematic, editorial.

**What goes in it:**
- A full-viewport-height section (`height: 100vh`)
- Full-bleed background: Dumbiri's professional portrait photo with a dark radial gradient overlay (50% opacity at center, 85% at edges — enough to create depth without fully hiding the photo)
- Content is left-aligned, vertically centered

**Content blocks, top to bottom:**
1. **Pre-label** (small, 12px, uppercase, muted): `AUTHOR · SPEAKER · COMMUNITY BUILDER`
2. **H1 headline** (Bebas Neue, max scale — clamp 56px to 132px, line-height 0.9, two lines):
   > IDEAS THAT
   > MOVE PEOPLE
3. **Subheadline** (Inter, 18px, muted, max-width 560px, line-height 1.55):
   > Dumbiri Cletus sits at the rare intersection of rigorous thinking and practical action — writing books, hosting conversations, and building communities around the questions that shape how we lead, live, and connect.
4. **Three CTA buttons** (inline-flex row, 16px gap, stacks vertically on mobile):
   - Primary (red fill): `Explore Books` → `#books`
   - Secondary (ghost/white border): `Listen to Podcast` → `#podcast`
   - Text link (muted with underline on hover): `Join the Community` → `#community`
5. **Scroll indicator:** Animated downward chevron at the bottom center of the section

**What it accomplishes:** Within 5 seconds, the visitor knows: who this person is, what he does, and that this is a premium, serious website. The three CTAs immediately present three paths forward — matching whatever reason brought the visitor here.

---

### SECTION 2: Social Proof Bar

**What it is:** A horizontal strip of publication logos that credentialize Dumbiri without any copy bragging.

**What goes in it:**
- A single centered row of logos
- Small label above: `IDEAS EXPLORED IN` (12px, uppercase, muted)
- Logos (left to right): Entrepreneur · Fast Company · Wired · Forbes · The New York Times · Time · Harvard Business Review
- All logos are rendered white (CSS filter: `brightness(0) invert(1)`), at 50% opacity default, 85% on hover

**Layout notes:**
- 80px vertical padding (top and bottom)
- Horizontal gap between logos: 48px on desktop
- On mobile (< 480px): horizontal scroll if logos overflow the viewport

**What it accomplishes:** Rapid credibility transfer. The visitor's brain processes logos faster than words. This section takes 2 seconds and increases trust substantially.

---

### SECTION 3: Content Discovery

**What it is:** An interactive content library that lets visitors find Dumbiri's ideas by topic or keyword. Converts passive browsers into active explorers.

**What goes in it:**
1. **Section label** (12px, uppercase, red): `THE WORK`
2. **H2 headline** (Bebas Neue, section scale): `FIND YOUR ENTRY POINT`
3. **Intro paragraph** (Inter, 16px, muted): Brief description of the content library concept
4. **Search bar** (full-width input): `Search ideas, topics, themes...` — real-time filter with 150ms debounce
5. **Filter pills** (horizontal row below search): `All · Leadership · Purpose · Culture · Human Potential · Community · Books · Podcast`
6. **Content card grid** (3 columns desktop, 2 tablet, 1 mobile): Each card has category tag, title, excerpt, and a "Read More" / link CTA

**Layout notes:**
- Search bar spans full content width
- Filter pills are horizontally scrollable on mobile
- Card grid gap: 24px
- Cards animate in on scroll reveal (IntersectionObserver), staggered 100ms

**Interaction detail:**
- Only one filter pill active at a time
- Active pill: red border + red-tinted background
- Search + filter combine (AND logic)
- Non-matching cards: fade out with 250ms opacity + height transition
- Empty state: friendly "No results" message with reset link

**CTA strategy:** No direct conversion CTA here — this section's job is to deepen engagement and let visitors self-select into the content that's most relevant to them. The CTAs live on the individual cards (links to the book, episode, or essay).

---

### SECTION 4: Books

**What it is:** The book catalog — a horizontal scroll rail displaying all of Dumbiri's published works with covers, descriptions, and purchase links.

**What goes in it:**
1. **Section label**: `BOOKS`
2. **H2 headline**: `THE IDEAS IN FULL`
3. **Intro paragraph**: Short framing of the books as complete explorations of his key ideas
4. **Horizontal scroll rail**: All books displayed as cards in a scrollable row

**Each book card contains:**
- Book cover image (full, at natural aspect ratio ~2:3)
- Book title
- 2–3 sentence description (not a plot summary — a pitch. What the reader gets from it)
- CTA button: `Get the Book →` (opens external purchase link in new tab)

**Layout notes:**
- Rail is full content-width with `overflow-x: auto`, hidden scrollbar
- `scroll-snap-type: x mandatory` for controlled scrolling
- Each card: `min-width: 260px`, `max-width: 280px`
- Left/right arrow buttons for desktop navigation (hidden on mobile)
- Touch/swipe on mobile handled natively

**Hover interactions:**
- Cover image: scales up (`scale(1.03)`) with enhanced drop shadow
- Card border transitions from muted gray to red
- Card lifts slightly (`translateY(-3px)`)

**CTA strategy:** Every book card has one CTA — `Get the Book →`. This links directly to the purchase page (Amazon, publisher site, etc.). No friction, no intermediate steps.

---

### SECTION 5: Podcast

**What it is:** A full podcast experience embedded in the site — episode list on the left, active player on the right. Visitors can sample multiple episodes without ever leaving the page.

**What goes in it:**
1. **Section label**: `PODCAST`
2. **H2 headline**: `CONVERSATIONS WORTH HAVING`
3. **Intro paragraph**: Brief description of the podcast's intent and format
4. **Two-column layout** (0.8fr left, 1.2fr right):

**Left column — Episode List:**
- Scrollable list, max-height 480px
- Each item: episode number (small, muted, uppercase) + episode title + date + duration
- Clicking an episode updates the right-side player
- Active episode: red border + red-tinted background
- Default state: muted gray border

**Right column — Active Episode Player:**
- Podcast artwork (200×200px square)
- Episode title (H3)
- Episode description (2–3 sentences, muted)
- Audio player (HTML5 `<audio controls>`, accent-color: `#e1191d`)
- Platform links row: Spotify · Apple Podcasts · YouTube · Google Podcasts — white SVG icons, open in new tab

**Layout notes:**
- On mobile: stacks vertically (episode list above player)
- First episode in list is active by default on page load
- No autoplay — visitor must press play
- Episode click: updates player content with 300ms fade transition on artwork

**CTA strategy:** The platform links are the conversion point — clicking to Spotify or Apple Podcasts is the conversion. The player is designed to create desire; the platform links capture it.

---

### SECTION 6: Community

**What it is:** A showcase of Dumbiri's ongoing community work — not a sign-up wall, but a window into the communities he has built and an invitation to join.

**What goes in it:**
1. **Full-width hero image** (420px tall on desktop, 280px on mobile): A compelling community or gathering image. Object-fit cover, dark overlay.
2. **Section label**: `COMMUNITY`
3. **H2 headline**: `IDEAS NEED COMPANY`
4. **Intro paragraph**: Philosophy of community as the unit of lasting change
5. **3-column initiative grid** (3 desktop, 2 tablet, 1 mobile): Each initiative card

**Each initiative card contains:**
- Image or icon representing the initiative
- Initiative name (bold)
- 2-sentence description of what the initiative is and who it's for
- CTA: `Learn More →` or `Get Involved →`

**Below grid:**
- Short bridging sentence: *"These aren't programs with application windows. They're ongoing communities with open doors."*
- Newsletter/community link CTA: `Stay Connected →`

**Interactions:**
- Hero image: scale animation on scroll entry (1.04 → 1.0, 800ms ease-out)
- Initiative cards: hover → lift + red border + shadow
- Cards reveal with staggered scroll animation

**CTA strategy:** Two-tier:
1. Individual initiative CTAs (Learn More / Get Involved) — drive specific community action
2. Section-level newsletter CTA — captures those interested but not yet ready to commit to a specific initiative

---

### SECTION 7: About

**What it is:** The biographical and personal section — where the visitor meets Dumbiri the person, not just Dumbiri the brand.

**What goes in it:**
1. **Section label**: `ABOUT`
2. **H2 headline**: `A LIFE ORGANIZED AROUND IDEAS`
3. **Two-column layout** (0.82fr left sticky, 1.18fr right scrollable):

**Left column (sticky on desktop):**
- Professional portrait photo (full-width within column)
- Name text below photo: `DUMBIRI CLETUS`
- Descriptor: Author · Speaker · Community Builder

**Right column (scrolls):**
- **Bio** (3 paragraphs): Who he is, what he has built, what makes him distinct. Opens with the idea of the person, not a list of credentials.
- **Blockquote** (pull quote): 4px red left border, Playfair Display italic, 22px. The emotional peak of the section:
  > *"Ideas matter most when they become communities, habits, and movements — when they stop being things you believe and start being things you live."*
  > — Dumbiri Cletus
- **Timeline** (career milestones): Year (red, uppercase, small) + event description. Reads as a life lived with intention.

**Layout notes:**
- Sticky sidebar: `position: sticky; top: 88px; align-self: start`
- On mobile: left column (photo) stacks above right column (bio), sticky disabled
- Timeline items reveal with staggered scroll animation

**CTA strategy:** No hard CTA in this section — its job is trust-building and emotional connection. The "action" is the visitor deciding to reach out (Contact section) or subscribe (Footer). A CTA here would interrupt the intimacy.

---

### SECTION 8: Media & Press

**What it is:** The press room — everything a journalist, booker, or event organizer needs, in one clean section.

**What goes in it:**
1. **Section label**: `MEDIA & PRESS`
2. **H2 headline**: `THE RECORD`
3. **Intro paragraph**: Available for keynotes, panels, podcast interviews, written contributions. Direct and professional.
4. **Two primary CTAs** (side by side):
   - Primary (red): `Download Media Kit` — triggers file download (PDF or ZIP)
   - Ghost: `Book for Speaking` — links to `#contact`
5. **Press label**: `AS SEEN IN`
6. **3-column press card grid** (3 desktop, 2 tablet, 1 mobile)

**Each press card contains:**
- Publication name or logo (white filter)
- Article headline
- Date (muted, small)
- `Read Article →` link (external, opens new tab)

**Card hover:** Lift + red border, 200ms ease

**CTA strategy:** Two simultaneous conversion paths:
1. **Media Kit download** — captures press/media visitors who need assets immediately
2. **Book for Speaking** — captures event organizers and booking contacts

---

### SECTION 9: Contact

**What it is:** The conversion endpoint. Where the visit becomes a relationship.

**What goes in it:**
1. **Section label**: `CONTACT`
2. **H2 headline**: `LET'S TALK`
3. **Two-column layout** (0.9fr left, 1.1fr right):

**Left column — Contact info:**
- Intro copy: Sets tone (genuine, not corporate). Signals that Dumbiri reads his messages.
- **Direct email** (visible, clickable mailto): `hello@dumbiricletus.com`
- **Social links**: LinkedIn · Twitter/X · Instagram (icon + text, opens in new tab)

**Right column — Contact form:**
- Form heading (small): `Send a Message`
- Fields:
  - Full Name (text, required)
  - Email Address (email, required)
  - Subject (dropdown, required): Speaking Inquiry / Media & Press / Collaboration / Book a Meeting / General Inquiry
  - Message (textarea, 5 rows, required, min 20 characters)
- Submit button (red fill): `Send Message`
- Honeypot anti-spam field (hidden)
- Form backend: Web3Forms or Formspree

**Form states:**
- Loading: button disabled + "Sending..." text with spinner
- Success: form replaced with confirmation message
- Error: retry message + direct email fallback shown

**Layout notes:**
- Stacks to single column on tablet/mobile
- Left column has no sticky behavior
- Input focus state: border → red

**CTA strategy:** The form IS the CTA. Everything else on the page has been building to this moment. The copy in the left column's intro removes hesitation; the dropdown subject lines remove ambiguity about what's appropriate to send.

---

## Footer Structure

**Layout:** Multi-column on desktop, stacked on mobile.

**Content blocks:**
1. **Logo + Tagline** (left column):
   - `DUMBIRI CLETUS`
   - Tagline: `Building at the intersection of ideas, people, and purpose.`

2. **Navigation links** (center column, vertical list):
   - Books · Podcast · Community · About · Media · Contact

3. **Newsletter signup** (right column):
   - Label: `Stay in the loop`
   - Body: `New essays, early announcements, and ideas worth sharing — directly to your inbox.`
   - Input: email address field
   - Button: `Subscribe` (red)
   - Integration: Mailchimp or ConvertKit embed

4. **Social icons** (below main columns or right-aligned):
   - LinkedIn · Twitter/X · Instagram — icon links, open in new tab

5. **Legal bar** (bottom of footer, full width, dividing line above):
   - `© [Year] Dumbiri Cletus. All rights reserved.`
   - `Privacy Policy` link (right-aligned or separated by ·)

**Footer CTA strategy:** The newsletter is the footer's primary conversion. Visitors who have made it to the footer without converting are still engaged — the newsletter ask captures them at lower commitment than a contact form.

---

## Overall CTA Strategy

The site uses a **progressive commitment ladder** — CTAs escalate in commitment as the visitor moves down the page:

| Section | CTA | Commitment Level |
|---|---|---|
| Hero | Explore Books / Listen / Join | Low — just explore |
| Books | Get the Book → | Low-medium — external purchase |
| Podcast | Platform links (Spotify, Apple) | Low — free subscribe |
| Community | Learn More / Get Involved | Medium — express interest |
| About | (No CTA — trust building) | — |
| Media | Download Kit / Book Speaking | High — direct professional action |
| Contact | Send Message | High — direct relationship initiation |
| Footer | Subscribe to newsletter | Low-medium — low friction, high value |

No section tries to do everything. Each section has one primary conversion job, and the CTA is designed to complete only that job.

---

## Section Ordering — Rationale

The order is deliberate and follows the visitor's psychological journey:

1. **Hero** — Arrested attention. Who is this? What is this?
2. **Social Proof** — Calibration. OK, this person is serious.
3. **Content Discovery** — Engagement. Let me explore.
4. **Books** — Desire. I want one of these.
5. **Podcast** — Intimacy. Let me hear him think.
6. **Community** — Belonging. There are others here.
7. **About** — Trust. This is a real, serious, good person.
8. **Media** — Credibility confirmation. The world knows this.
9. **Contact** — Action. I want to reach out.

Each section answers the question raised by the previous one and plants the question that the next one answers.

---

## Responsive Design Notes

| Section | Mobile Behavior |
|---|---|
| Navigation | Hamburger → full-screen overlay menu |
| Hero | Smaller type, CTAs stack vertically, photo crops to upper body |
| Social Proof | Horizontal scroll on overflow |
| Content Discovery | Single-column card grid, filter pills scroll horizontally |
| Books | Touch/swipe rail, arrows hidden |
| Podcast | Episode list above player, stacked single column |
| Community | 1-column initiative grid |
| About | Photo stacks above bio, sticky disabled |
| Media | 1-column press grid |
| Contact | Stacked (info above form) |
| Footer | Stacked single column, newsletter above legal |

---

## Content the Developer Needs from the Client

Before building is complete, the following content must be provided by Dumbiri or his team:

- [ ] Professional portrait photo (high-res, well-lit, dark-background compatible)
- [ ] Community section hero image (people/gathering, high quality)
- [ ] Book cover images (high-res, all titles)
- [ ] Book titles, descriptions, and purchase URLs
- [ ] Podcast name and RSS/embed details
- [ ] Podcast episode list (title, description, date, duration, audio URL for at least 10 episodes)
- [ ] Podcast platform URLs (Spotify, Apple Podcasts, Google, YouTube)
- [ ] Community initiative names, descriptions, and images/icons
- [ ] Career timeline milestones (years + events)
- [ ] Press article list (publication, headline, date, URL) for press grid
- [ ] Media Kit file (PDF or ZIP, ready for download)
- [ ] Preferred contact email address
- [ ] Social profile URLs (LinkedIn, Twitter/X, Instagram)
- [ ] Form backend account (Web3Forms or Formspree API key)
- [ ] Newsletter platform account (Mailchimp or ConvertKit embed code)
- [ ] Privacy Policy copy or page
