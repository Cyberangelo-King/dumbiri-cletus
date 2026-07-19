# Emotional Design Document
## Dumbiri Cletus — Personal Brand Website

---

## 1. Overview: The Emotional Journey

A visitor to this site should experience a specific emotional arc from first landing to conversion. Every design and copy decision should map to a stage in that arc.

```
ARRIVAL → INTRIGUE → RECOGNITION → TRUST → DESIRE → ACTION
```

### The Arc in Detail

**Arrival — "Who is this?"**
The hero hits hard. Strong name, bold statement, confident visual. The visitor stops scrolling and pays attention. Emotion: *Curiosity.*

**Intrigue — "This is different"**
The visual language, the positioning statement, the hybrid story — these don't fit any expected mold. The visitor leans in. Emotion: *Interest.*

**Recognition — "This is what I've been looking for"**
The services section mirrors the visitor's own problem back at them, in precise language. They feel understood. Emotion: *Relief.*

**Trust — "He's done this before"**
Scale Up Conference, testimonials, portfolio, timeline. The credentials stack. The visitor starts believing. Emotion: *Confidence.*

**Desire — "I want this for myself"**
The outcomes language and transformation stories create desire. The visitor imagines what it would feel like to work with Dumbiri. Emotion: *Aspiration.*

**Action — "Let's talk"**
The CTA feels like the natural next step — not a hard sell. Easy. Low friction. Clear. Emotion: *Momentum.*

---

## 2. Emotional Targets by Page

### Homepage
- **Dominant emotion:** Aspiration + Curiosity
- **Trigger:** The unexpected combination of skills. The "how does one person do all of this?" reaction.
- **Design tool:** Big, bold name treatment. Stat counter. Service cards that tease depth.

### About Page
- **Dominant emotion:** Trust + Respect
- **Trigger:** The origin story. Real journey, real challenges, real pivots.
- **Design tool:** Timeline visualization. Honest, direct language. No corporate biography.

### Services Pages
- **Dominant emotion:** Recognition + Relief
- **Trigger:** The "this is exactly what I need" moment when reading the service description.
- **Design tool:** Problem-first headings. "Who this is for" language. Testimonials with specific outcomes.

### Scale Up Conference Page
- **Dominant emotion:** Awe + Social Proof
- **Trigger:** Seeing the scale of what he's built. Events are concrete, undeniable proof of capability.
- **Design tool:** Large photography, attendee numbers, speaker names if available.

### Portfolio Page
- **Dominant emotion:** Confidence in quality
- **Trigger:** The visual quality speaks before the words do.
- **Design tool:** Large thumbnails, no clutter, work allowed to breathe.

### Contact / Book Page
- **Dominant emotion:** Ease + Excitement
- **Trigger:** The sense that reaching out is the right thing to do, and it'll be painless.
- **Design tool:** Short form. Warm copy. "What happens next" clarity.

---

## 3. Micro-Emotion Moments

These small details elevate the experience from "good website" to "exceptional website":

| Moment | Emotion | Implementation |
|---|---|---|
| Name types on screen | Intrigue | JS text animation on hero load |
| Stats count up | Excitement | Intersection observer count-up |
| Service card lifts on hover | Delight | CSS translateY + glow shadow |
| "Book a call" button pulses once | Urgency without pressure | CSS keyframe pulse on load |
| Testimonial quote fades in | Warmth | Smooth scroll reveal |
| Portfolio image color reveals on hover | Surprise | Desaturate → saturate on hover |
| Smooth scroll transitions | Calm competence | CSS scroll-behavior: smooth |
| Form sends with success animation | Satisfaction | Checkmark animation + warm message |

---

## 4. Tone of Emotional Language

### What This Site Should NOT Make People Feel
- ❌ Overwhelmed (too many services competing at once)
- ❌ Skeptical (empty claims with no evidence)
- ❌ Talked down to (condescending expert voice)
- ❌ Pressured (aggressive sales language)
- ❌ Generic (could be any consultant anywhere)

### What This Site SHOULD Make People Feel
- ✅ Seen (he understands my specific problem)
- ✅ Surprised (I didn't expect this level of quality from a personal site)
- ✅ Safe (credentials, testimonials, clear process)
- ✅ Excited (I want what these people got)
- ✅ Clear (I know exactly what to do next)

---

## 5. Emotional Copy Cues

Words and phrases that trigger the right emotional responses for this audience:

**Trigger words for Gen Z real estate:**
- "No one taught you this in school"
- "Your first deal, done right"
- "The gap between wanting it and getting it"
- "Real estate isn't gatekept anymore"

**Trigger words for SME brand design:**
- "Your brand is already telling a story — is it the right one?"
- "Stop looking like everyone else in your industry"
- "Design that converts, not just decorates"

**Trigger words for corporate training/speaking:**
- "The room changed after he spoke"
- "Practical. No theory. No filler."
- "Walk out with a decision, not a notebook of notes"

---

## 6. Visual Emotional Cues

| Emotion Target | Visual Signal |
|---|---|
| Premium / Authority | Dark palette, generous white space, serif headings |
| Warmth / Accessibility | Amber gold accents, direct photography, personal copy |
| Trust / Credibility | Real photography (not stock), specific numbers, named testimonials |
| Energy / Momentum | Motion, count-up stats, scroll animations, bold typography |
| Focus / Clarity | Minimal nav, clear visual hierarchy, deliberate CTA placement |
