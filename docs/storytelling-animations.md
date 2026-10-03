# Storytelling, Animations & Transitions
## Dumbiri Cletus — Personal Brand Website
### Spline · Three.js · GSAP · Framer Motion

---

## 1. Philosophy

This site doesn't just present Dumbiri — it **takes you on a journey through his story**. Every scroll triggers a chapter. Every hover reveals a layer. The animations aren't decoration — they're the narrative mechanism. By the time the visitor reaches the contact section, they've been *shown* who Dumbiri is, not just told.

The technical stack is intentionally stratified by purpose:
- **Spline** — atmospheric 3D backgrounds and interactive hero objects
- **Three.js** — custom particle systems, floating geometry, career path visualization
- **GSAP** — scroll-triggered storytelling, timeline animations, smooth page transitions
- **Framer Motion** — React component-level micro-interactions and state transitions

---

## 2. The Narrative Arc (Page by Page)

### ACT 1: ARRIVAL — The Hero Section

**Story:** The visitor lands in Dumbiri's world. Before a word is read, the environment communicates ambition.

#### Spline: Hero 3D Background
```
Scene: Abstract 3D environment
  - Floating geometric shapes (cubes, dodecahedra, spheres)
  - Slow rotation orbit around an invisible center
  - Objects have a metallic gold/amber material — Dumbiri's brand color
  - Subtle depth of field — foreground objects sharp, background soft
  - Responds to mouse movement (parallax rotation using Spline's mouse tracking)
  - No heavy physics — slow, deliberate, authoritative

Scene mood: Think a premium fintech/Web3 product landing but grounded.
Spline scene is embedded as a WebGL canvas, full-viewport behind the hero text.
```

**Implementation:**
```html
<!-- Spline scene via @splinetool/react-spline -->
<Spline scene="https://prod.spline.design/{scene-id}/scene.splinecode" />
```

#### GSAP: Name Reveal (Hero Text Entrance)
```javascript
// Sequence: 
// 1. Page loads → dark screen
// 2. Spline scene fades in (0.8s)
// 3. "REALTOR · DESIGNER · BUSINESS BUILDER" overline fades in (0.6s)
// 4. "DUMBIRI" drops in from above, letter by letter (SplitText, 0.8s stagger 0.05s)
// 5. "CLETUS" rises from below (0.8s, delayed 0.3s after DUMBIRI complete)
// 6. Positioning statement fades up (0.6s)
// 7. CTAs scale in from 0.8 → 1.0 (0.4s each, staggered)

gsap.timeline()
  .to(".hero-overlay", { opacity: 0, duration: 0.8 })
  .from(".overline", { opacity: 0, y: -20, duration: 0.6 }, "-=0.2")
  .from(".hero-name-first .char", { 
    opacity: 0, y: -80, stagger: 0.05, duration: 0.8, ease: "power3.out" 
  })
  .from(".hero-name-last .char", { 
    opacity: 0, y: 80, stagger: 0.05, duration: 0.8, ease: "power3.out" 
  }, "-=0.5")
  .from(".hero-subtitle", { opacity: 0, y: 30, duration: 0.6 }, "-=0.2")
  .from(".hero-cta", { opacity: 0, scale: 0.9, stagger: 0.15, duration: 0.4 })
```

#### Three.js: Particle Field (Optional Enhancement)
```javascript
// 800 small particles float slowly across the hero background
// Each particle: small white dot, 0.3–0.8 opacity random
// Movement: slow upward drift with slight horizontal sway
// On mouse move: particles nearest to cursor gently scatter
// Creates organic "living" background without distracting from the Spline scene
// Layer order: Three.js canvas (z-index: 1) → Spline (z-index: 2) → Text (z-index: 3)

const geometry = new THREE.BufferGeometry();
// 800 random positions within viewport
// Animate with requestAnimationFrame — gentle Y drift
// Mouse proximity detection with Vector2 raycasting
```

---

### ACT 2: THE JOURNEY — About / Stats Section

**Story:** As the visitor scrolls, they watch Dumbiri's career unfold in real time.

#### GSAP ScrollTrigger: Stats Counter
```javascript
// Stats bar enters from below (fade-up, staggered)
// Numbers count up from 0 when scrolled into view
// Duration: 2s with ease: "power2.out"
// Each counter: eases in slow, accelerates, and hits the final number cleanly

ScrollTrigger.create({
  trigger: ".stats-bar",
  start: "top 80%",
  onEnter: () => {
    gsap.to(".stat-number", {
      textContent: [targetValue], // via gsap.utils.snap
      duration: 2,
      ease: "power2.out",
      snap: { textContent: 1 },
      stagger: 0.2
    });
  }
});
```

#### Three.js: Career Path Visualization
```javascript
// On the About page, as the user scrolls through the career timeline:
// A glowing line DRAWS ITSELF across the screen from left to right
// Each milestone node (CS Grad → Ecommerce → Design → Real Estate) 
// materializes as a glowing point when the line reaches it
// The line is a TubeGeometry drawn with LineDrawProgress animation
// Color: starts cold blue (tech/CS), transitions to warm amber (current/real estate)

// GSAP controls the drawProgress uniform in the shader:
gsap.to(tubeUniforms.drawProgress, {
  value: 1,
  duration: 3,
  ease: "none",
  scrollTrigger: {
    trigger: ".timeline-section",
    start: "top center",
    end: "bottom center",
    scrub: 1
  }
});
```

#### Framer Motion: Timeline Node Reveal
```jsx
// Each career milestone node appears as the line reaches it
// Spring animation: scale from 0 → 1 with bounce
// Label text slides in from the right
<motion.div
  initial={{ scale: 0, opacity: 0 }}
  animate={{ scale: 1, opacity: 1 }}
  transition={{ type: "spring", stiffness: 200, damping: 20, delay: nodeDelay }}
>
  <MilestoneNode label="CS Graduate" year="20XX" />
</motion.div>
```

---

### ACT 3: THE WORK — Services & Portfolio

**Story:** Each service reveals itself as a world unto itself. The transition between services feels like opening a door.

#### GSAP: Service Card Stagger Entrance
```javascript
// Service cards fan out from center, like cards being dealt
// Desktop: each card slides from slightly below and rotates slightly on entrance
// Stagger: 0.12s between cards
// Hover: each card lifts 8px with gold glow shadow

gsap.from(".service-card", {
  y: 60,
  opacity: 0,
  rotation: 3,
  stagger: 0.12,
  duration: 0.7,
  ease: "power3.out",
  scrollTrigger: {
    trigger: ".services-grid",
    start: "top 75%"
  }
});

// Hover interaction (GSAP + CSS):
card.addEventListener("mouseenter", () => {
  gsap.to(card, { y: -8, duration: 0.25, ease: "power2.out" });
  gsap.to(card.querySelector(".card-glow"), { opacity: 1, duration: 0.25 });
});
```

#### Framer Motion: Service Page Transition
```jsx
// Clicking a service card → page transition
// Outgoing page: scale down slightly (0.97) and fade out
// Incoming page: slide up from 40px below and fade in
// Duration: 0.4s — fast enough to not feel slow, slow enough to feel premium

const pageVariants = {
  initial: { opacity: 0, y: 40 },
  animate: { opacity: 1, y: 0 },
  exit: { opacity: 0, scale: 0.97 }
};

const pageTransition = {
  type: "tween",
  ease: "anticipate",
  duration: 0.4
};
```

#### Spline: Portfolio Section Enhancement (Optional)
```
If portfolio has 3D elements (e.g., floating design mockups):
  - Each portfolio category has a small Spline scene above its filter tab
  - Brand Design: floating logo cube
  - Social Media: floating phone frame
  - Events: floating star/sparkle particle
  - These are decorative, 80x80px embedded Spline scenes — not full screen
```

---

### ACT 4: THE PROOF — Scale Up Conference & Testimonials

**Story:** The Scale Up Conference section should feel like watching a highlight reel.

#### GSAP: Conference Section Cinematic Entrance
```javascript
// 1. Section enters with a horizontal wipe animation (clip-path)
// 2. Background image reveals from left to right (2s)
// 3. Text overlay fades in (0.8s delay)
// 4. Stats appear one by one below (stagger 0.3s)

gsap.from(".conference-section", {
  clipPath: "inset(0 100% 0 0)",
  duration: 1.4,
  ease: "power3.inOut",
  scrollTrigger: {
    trigger: ".conference-section",
    start: "top 80%"
  }
});
```

#### Framer Motion: Testimonial Carousel
```jsx
// Testimonials don't just auto-rotate — they slide with a spring animation
// Current card: scale 1.0, full opacity
// Adjacent cards (partially visible): scale 0.94, 60% opacity
// Transition: spring, stiffness: 100, damping: 25
// Drag to navigate (framer-motion drag with swipe gesture detection)

const variants = {
  center: { scale: 1, opacity: 1, x: 0 },
  left: { scale: 0.94, opacity: 0.6, x: -80 },
  right: { scale: 0.94, opacity: 0.6, x: 80 }
};
```

---

### ACT 5: THE CALL — Contact Section

**Story:** The final section should feel like a natural conclusion — warm, inviting, easy.

#### GSAP: Final CTA Band Entrance
```javascript
// Background gradient animates (slow hue shift, 8s loop)
// Headline words split and appear with a slight upward drift (SplitText)
// Button pulses once gently after appearing

const tl = gsap.timeline({ scrollTrigger: { trigger: ".final-cta", start: "top 75%" }});
tl.from(".cta-headline .word", { opacity: 0, y: 30, stagger: 0.08, duration: 0.7 })
  .to(".cta-button", { keyframes: { scale: [1, 1.05, 1] }, duration: 0.8, ease: "power2.inOut" }, "+=0.5");
```

#### Three.js: Ambient Particle System (Contact Section)
```javascript
// Subtle golden particles rise slowly from the bottom of the contact section
// Like embers floating upward — warmth and momentum
// 200 particles, slow upward velocity, fade out at top
// On form submission: particle burst (100 particles scatter from form center)

// Form success micro-animation:
// 1. Form scales slightly (1.02)
// 2. Gold particle burst from center
// 3. Checkmark draws itself (SVG stroke animation)
// 4. Success message slides in from below
```

---

## 3. Page-Level Transitions

### Standard Page Transition (Between All Pages)
```jsx
// Framer Motion AnimatePresence wraps all routes
// Every page transition: 
//   Out: opacity 0, y: -20 (lifts away upward)
//   In: opacity 0 → 1, y: 20 → 0 (enters from below)
//   Duration: 0.35s
// This maintains the directional hierarchy — deeper pages feel "below" the home

<AnimatePresence mode="wait">
  <motion.div
    key={router.pathname}
    initial={{ opacity: 0, y: 20 }}
    animate={{ opacity: 1, y: 0 }}
    exit={{ opacity: 0, y: -20 }}
    transition={{ duration: 0.35, ease: "easeOut" }}
  >
    {children}
  </motion.div>
</AnimatePresence>
```

### Navigation Hover Effects
```css
/* Nav links: underline grows from left on hover */
.nav-link::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 0%;
  height: 1.5px;
  background: #D4A017;
  transition: width 0.25s ease;
}
.nav-link:hover::after { width: 100%; }
```

---

## 4. Scroll-Triggered Storytelling System

### GSAP ScrollTrigger Map (Full Site)
```
Scroll position → Animation trigger

0–10vh:     Hero entrance sequence (plays on load, not on scroll)
10–25vh:    Stats bar fades up + numbers count
25–40vh:    Services section — cards fan in (staggered)
40–55vh:    About / Career timeline draws (Three.js line)
55–65vh:    Conference section wipes in (clip-path)
65–75vh:    Testimonials section enters (fade + slide)
75–85vh:    Portfolio preview fades up
85–95vh:    Blog/Insights section slides in
95–100vh:   Final CTA band entrance
```

### Scroll Progress Indicator
```javascript
// Thin amber line at top of page (like YouTube's red progress bar)
// Grows from 0% to 100% as user scrolls from top to bottom
// Implemented with GSAP ScrollTrigger + CSS width animation

gsap.to(".scroll-progress", {
  width: "100%",
  ease: "none",
  scrollTrigger: {
    trigger: "body",
    start: "top top",
    end: "bottom bottom",
    scrub: 0.3
  }
});
```

---

## 5. Micro-Interactions (Framer Motion)

### Button Hover + Tap
```jsx
<motion.button
  whileHover={{ scale: 1.03, boxShadow: "0 8px 24px rgba(212, 160, 23, 0.4)" }}
  whileTap={{ scale: 0.97 }}
  transition={{ type: "spring", stiffness: 400, damping: 30 }}
>
  Book a Discovery Call
</motion.button>
```

### Image Hover (Portfolio)
```jsx
// Portfolio card image: scale + slight rotation + color reveal
<motion.div
  whileHover={{ scale: 1.04, rotate: 1 }}
  transition={{ duration: 0.3, ease: "easeOut" }}
>
  <img src={item.cover} alt={item.title} className="grayscale-[0.3] hover:grayscale-0 transition-all" />
</motion.div>
```

### Form Field Focus
```jsx
// Input fields: left border grows on focus
<motion.input
  whileFocus={{ boxShadow: "inset 0 0 0 2px #D4A017" }}
  transition={{ duration: 0.2 }}
/>
```

### WhatsApp Button Entrance
```jsx
// First load: WhatsApp button slides in from bottom-right after 3s
<motion.div
  initial={{ x: 80, opacity: 0 }}
  animate={{ x: 0, opacity: 1 }}
  transition={{ delay: 3, type: "spring", stiffness: 200, damping: 25 }}
>
  <WhatsAppButton />
</motion.div>
```

---

## 6. Loading Experience

### Initial Page Load
```
1. Dark screen (#0A0A0F) — instant
2. Dumbiri's initials "DC" appear in center (amber, serif, 80px) — fade in 0.4s
3. Thin amber ring draws itself around the initials (SVG stroke animation, 0.8s)
4. Everything fades out (0.4s)
5. Hero scene fades in (Spline + content)

Total load animation: ~2 seconds
If page loads faster: skip or trim the loader
If page loads slower: loader stays until resources are ready
```

```jsx
// Loader component:
<motion.div
  className="fixed inset-0 z-50 bg-[#0A0A0F] flex items-center justify-center"
  exit={{ opacity: 0 }}
  transition={{ duration: 0.4 }}
>
  <svg>
    <text className="initials">DC</text>
    <circle className="ring" strokeDasharray="251" strokeDashoffset="251">
      {/* Animated via CSS @keyframes strokeDraw */}
    </circle>
  </svg>
</motion.div>
```

---

## 7. Performance & Accessibility

### Performance Rules
- Spline scene: max 5MB compressed. Use Spline's built-in optimization tools.
- Three.js: particles max 800 on desktop, 200 on mobile (reduce with `window.innerWidth` check)
- GSAP plugins used: ScrollTrigger, SplitText, CustomEase — tree-shake unused
- All animations respect `prefers-reduced-motion`:

```css
@media (prefers-reduced-motion: reduce) {
  * { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
}
```

```javascript
// GSAP global reduced motion check:
if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
  gsap.globalTimeline.timeScale(10); // Skip animations effectively
}
```

- Three.js canvas: `aria-hidden="true"` — decorative only, screen reader ignored
- Spline canvas: `aria-hidden="true"`
- All text content must work fully without animations (progressive enhancement)

### Mobile Considerations
- Spline: reduce particle count, disable mouse parallax on touch devices
- Three.js: render at 0.75x device pixel ratio on mobile to save GPU
- GSAP animations still run on mobile — just simpler (no 3D transforms)
- Touch gestures on testimonial carousel (framer-motion drag enabled on mobile)

---

## 8. Library & Dependency List

```json
{
  "dependencies": {
    "@splinetool/react-spline": "^2.2.6",
    "three": "^0.163.0",
    "@react-three/fiber": "^8.16.6",
    "@react-three/drei": "^9.105.0",
    "gsap": "^3.12.5",
    "framer-motion": "^11.1.7"
  }
}
```

### Plugin Registrations (GSAP)
```javascript
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { SplitText } from "gsap/SplitText"; // Club GreenSock license
import { CustomEase } from "gsap/CustomEase";

gsap.registerPlugin(ScrollTrigger, SplitText, CustomEase);
```

---

## 9. Master Animation Prompt for the design and implementation workflow

When implementing the animations, give the design workflow this supplementary instruction:

> "This site uses a layered animation architecture: Spline for the hero 3D background scene (embedded WebGL canvas), Three.js for particle systems and the career path line visualization on the About page, GSAP ScrollTrigger for all scroll-based storytelling sequences, and Framer Motion for all React component-level micro-interactions and page transitions. Every section entrance is scroll-triggered. The hero sequence plays on page load. All animations must respect `prefers-reduced-motion`. The scroll progress bar (thin amber line, top of page) should always be present. The loader is DC initials + ring. See the full spec in `storytelling-animations.md`."
