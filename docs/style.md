# Style Guide
## Dumbiri Cletus — Personal Brand Website

---

## 1. Design Philosophy

This site should feel like walking into a well-appointed, modern Lagos office — confident, intentional, and nothing out of place. Every design decision communicates: *this person is serious, capable, and worth your time.*

The aesthetic is **Dark Premium** — not dark for the sake of trend, but dark as authority. Gold/amber accents communicate ambition and warmth without going flashy. White space is used aggressively because the work and the person deserve room to breathe.

**Design Principles:**
1. **Confidence over decoration** — nothing is decorative unless it communicates
2. **Hierarchy is the design** — the eye should always know where to go next
3. **Motion has meaning** — animations reveal, they don't perform
4. **Mobile is the primary canvas** — design desktop second

---

## 2. Color System

### Primary Palette

| Role | Name | Hex | Usage |
|---|---|---|---|
| Background | Obsidian | `#0A0A0F` | Primary dark background |
| Surface | Deep Slate | `#13131A` | Cards, sections, modals |
| Accent 1 | Amber Gold | `#D4A017` | Primary CTA, highlights, hover states |
| Accent 2 | Electric Copper | `#B87333` | Secondary accent, gradient end |
| Text Primary | Off-White | `#F0EDE8` | Body text on dark |
| Text Secondary | Warm Grey | `#8A8785` | Captions, meta text, subheadings |

### Functional Colors

| Role | Hex | Usage |
|---|---|---|
| Success | `#2DD4BF` | Form success, confirmation |
| Warning | `#F59E0B` | Alerts |
| Error | `#EF4444` | Form errors |
| Border | `#2A2A35` | Dividers, card borders |

### Gradient
```css
/* Hero gradient — use on key CTA elements and hero overlays */
background: linear-gradient(135deg, #D4A017 0%, #B87333 50%, #8B1A1A 100%);

/* Subtle section gradient */
background: linear-gradient(180deg, #0A0A0F 0%, #13131A 100%);
```

---

## 3. Typography

### Type Stack

```css
/* Headings — Authority + Character */
font-family: 'Playfair Display', Georgia, serif;

/* Body + UI — Clarity + Modernity */
font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;

/* Accent / Pull quotes — Personality */
font-family: 'DM Serif Display', Georgia, serif;
```

### Type Scale

| Element | Font | Size (desktop) | Size (mobile) | Weight | Line Height |
|---|---|---|---|---|---|
| Display H1 | Playfair Display | 72–96px | 44px | 700 | 1.05 |
| H2 | Playfair Display | 48px | 32px | 600 | 1.2 |
| H3 | Inter | 28px | 22px | 600 | 1.3 |
| H4 | Inter | 20px | 18px | 600 | 1.4 |
| Body Large | Inter | 18px | 16px | 400 | 1.7 |
| Body | Inter | 16px | 15px | 400 | 1.7 |
| Caption | Inter | 13px | 12px | 400 | 1.5 |
| CTA Button | Inter | 16px | 15px | 600 | 1 |
| Overline | Inter | 11px | 10px | 700 | 1 | uppercase, tracked |

### Typography Rules
- Headings: Playfair Display, never bold-italic together
- Never use font weight below 400 in dark mode
- Letter spacing on overlines: `0.15em`
- Max body text column width: `72ch`
- Paragraph spacing: `1em` between paragraphs

---

## 4. Spacing System

Based on an 8px base unit.

```
4px   — micro (between inline elements)
8px   — xs (icon padding, tight spacing)
16px  — sm (internal card padding)
24px  — md (between related elements)
32px  — lg (section internal spacing)
48px  — xl (between page sections on mobile)
64px  — 2xl (section top/bottom padding mobile)
80px  — 3xl (section top/bottom padding desktop)
120px — 4xl (hero vertical padding)
```

---

## 5. Component Styles

### Buttons

**Primary CTA:**
```css
background: linear-gradient(135deg, #D4A017, #B87333);
color: #0A0A0F;
font-family: Inter;
font-weight: 600;
font-size: 16px;
padding: 14px 32px;
border-radius: 4px;
letter-spacing: 0.02em;
transition: transform 0.2s, box-shadow 0.2s;
/* Hover: lift + glow */
box-shadow: 0 8px 24px rgba(212, 160, 23, 0.35);
transform: translateY(-2px);
```

**Secondary / Ghost:**
```css
background: transparent;
border: 1.5px solid #D4A017;
color: #D4A017;
/* Same padding, border-radius */
/* Hover: fill with gradient */
```

**Text Link:**
```css
color: #D4A017;
text-decoration: none;
border-bottom: 1px solid transparent;
/* Hover: border-bottom: 1px solid #D4A017 */
```

### Cards
```css
background: #13131A;
border: 1px solid #2A2A35;
border-radius: 12px;
padding: 32px;
/* Hover: border-color shifts to #D4A017 at 40% opacity */
transition: border-color 0.25s, transform 0.25s;
/* Hover: translateY(-4px) */
```

### Navigation
```css
/* Sticky. Blur backdrop. */
position: fixed;
background: rgba(10, 10, 15, 0.85);
backdrop-filter: blur(16px);
border-bottom: 1px solid #2A2A35;
height: 72px;
```

### Section Dividers
- Use gradient line or geometric ornament sparingly
- No standard `<hr>` — use space and visual weight instead

---

## 6. Imagery Direction

### Photography Style
- **Lighting:** Natural or studio with strong contrast, never washed out
- **Colour grade:** Warm-to-cool shift — golden tones in shadows, cool in highlights (cinematic)
- **Composition:** Subject takes 60–70% of frame, environmental details visible
- **Expression:** Direct, confident, natural — no forced smiles
- **Settings:** Real estate properties, conference stage, creative workspace, Lagos urban environment

### Avoid
- ❌ Stock photo energy
- ❌ White-background corporate headshots
- ❌ Images that look like they could belong to anyone

### Icons
- Use Lucide Icons (consistent line weight) or custom SVG
- Icon size: 20px inline, 32px in features, 48px in hero
- Icon color: Amber Gold `#D4A017` or white depending on context

---

## 7. Motion & Animation

### Principles
- **Entrance:** Elements enter as the user scrolls into them (intersection observer)
- **Duration:** 300–500ms for UI interactions, 600–800ms for section entrances
- **Easing:** `cubic-bezier(0.25, 0.1, 0.25, 1)` for most transitions
- **Never:** Autoplay video with sound, parallax so aggressive it causes motion sickness

### Standard Animations
```css
/* Fade-up (most common entrance) */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Fade-in (for images) */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

/* Stagger children: delay each by 100ms */
```

### Specific Elements
- **Hero name:** Animate character-by-character or word-by-word on load
- **Stats counter:** Count-up animation when scrolled into view
- **Service cards:** Stagger entrance, then hover lift
- **CTA button:** Subtle pulse on first load to draw attention

---

## 8. Layout Patterns

### Grid System
- Desktop: 12-column, `max-width: 1280px`, `24px` gutters
- Tablet: 8-column
- Mobile: 4-column, `16px` gutters

### Section Patterns
1. **Full-width dark hero** — edge-to-edge, centered content
2. **Two-column feature** — image left, content right (or reverse)
3. **Card grid** — 3-col desktop, 2-col tablet, 1-col mobile
4. **Full-width CTA band** — gradient or image background, centered copy + button
5. **Timeline / step list** — vertical on mobile, horizontal on desktop

### Breakpoints
```css
sm: 640px
md: 768px
lg: 1024px
xl: 1280px
2xl: 1536px
```
