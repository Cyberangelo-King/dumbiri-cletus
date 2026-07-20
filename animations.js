/**
 * animations.js — Dumbiri Cletus Personal Brand Website
 * Scroll-driven storytelling layer using GSAP + ScrollTrigger
 * Add to index.html: <script src="animations.js"></script>
 * Safe to add — all selectors are null-checked. Will not break if elements are missing.
 */

(function () {
  "use strict";

  /* ─── Respect reduced motion preference ─── */
  const reducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;
  if (reducedMotion) return;

  /* ─── Load GSAP + ScrollTrigger via CDN ─── */
  function loadScript(src, onLoad) {
    const s = document.createElement("script");
    s.src = src;
    s.onload = onLoad;
    s.onerror = function () {
      console.warn("[animations.js] Failed to load: " + src);
    };
    document.head.appendChild(s);
  }

  loadScript(
    "https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js",
    function () {
      loadScript(
        "https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js",
        initAnimations
      );
    }
  );

  function initAnimations() {
    if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") return;
    gsap.registerPlugin(ScrollTrigger);

    /* ═══════════════════════════════════════════════════════
       1. PAGE LOADER — DC initials ring, then fade to hero
    ═══════════════════════════════════════════════════════ */
    const loaderEl = createLoader();
    document.body.prepend(loaderEl);

    const loaderTl = gsap.timeline({
      onComplete: function () {
        gsap.to(loaderEl, {
          opacity: 0,
          duration: 0.5,
          onComplete: function () {
            loaderEl.remove();
            document.body.style.overflow = "";
            initHeroEntrance();
          },
        });
      },
    });

    document.body.style.overflow = "hidden";
    loaderTl
      .from(".dc-loader-text", { opacity: 0, scale: 0.8, duration: 0.5, ease: "power3.out" }, 0.2)
      .from(".dc-loader-ring", { strokeDashoffset: 280, duration: 0.9, ease: "power2.inOut" }, 0.3)
      .to(".dc-loader-text", { opacity: 0.4, duration: 0.3 }, 1.2);

    function createLoader() {
      const div = document.createElement("div");
      div.id = "dc-loader";
      div.innerHTML = `
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
          <text class="dc-loader-text" x="50" y="58" text-anchor="middle"
            font-family="Georgia,serif" font-size="28" fill="#D4A017" letter-spacing="2">DC</text>
          <circle class="dc-loader-ring" cx="50" cy="50" r="44"
            fill="none" stroke="#D4A017" stroke-width="1.5"
            stroke-dasharray="280" stroke-dashoffset="0"
            stroke-linecap="round" transform="rotate(-90 50 50)" />
        </svg>`;
      const style = document.createElement("style");
      style.textContent = `
        #dc-loader {
          position: fixed; inset: 0; z-index: 9999;
          background: #0A0A0F;
          display: flex; align-items: center; justify-content: center;
        }
        #dc-loader svg { width: 120px; height: 120px; }
        .scroll-progress-bar {
          position: fixed; top: 0; left: 0; height: 2px;
          width: 0%; background: #D4A017; z-index: 9998;
          pointer-events: none;
        }
      `;
      document.head.appendChild(style);
      return div;
    }

    /* ═══════════════════════════════════════════════════════
       2. SCROLL PROGRESS BAR
    ═══════════════════════════════════════════════════════ */
    const bar = document.createElement("div");
    bar.className = "scroll-progress-bar";
    document.body.appendChild(bar);

    gsap.to(bar, {
      width: "100%",
      ease: "none",
      scrollTrigger: {
        trigger: document.body,
        start: "top top",
        end: "bottom bottom",
        scrub: 0.3,
      },
    });

    /* ═══════════════════════════════════════════════════════
       3. HERO ENTRANCE — after loader fades
    ═══════════════════════════════════════════════════════ */
    function initHeroEntrance() {
      const heroH1 = document.querySelector(
        ".hero h1, #hero h1, [id='hero'] h1, .hero-content h1"
      );
      const heroP = document.querySelector(
        ".hero-content p, #hero p, .hero p"
      );
      const heroBtns = document.querySelectorAll(
        ".hero .button, .hero-content .button, .button-row .button"
      );

      const heroTl = gsap.timeline({ defaults: { ease: "power3.out" } });

      if (heroH1) {
        heroTl.from(heroH1, { opacity: 0, y: -50, duration: 1 }, 0.1);
      }
      if (heroP) {
        heroTl.from(heroP, { opacity: 0, y: 30, duration: 0.8 }, 0.6);
      }
      if (heroBtns.length) {
        heroTl.from(
          heroBtns,
          { opacity: 0, scale: 0.92, stagger: 0.12, duration: 0.5 },
          0.9
        );
      }

      /* Press strip / media logos */
      const pressItems = document.querySelectorAll(".press-strip span, .press-strip li");
      if (pressItems.length) {
        heroTl.from(
          pressItems,
          { opacity: 0, y: 10, stagger: 0.06, duration: 0.4 },
          1.2
        );
      }
    }

    /* ═══════════════════════════════════════════════════════
       4. SCROLL-TRIGGERED SECTION REVEALS
       Works on any section with class "reveal" or major sections
    ═══════════════════════════════════════════════════════ */
    const revealSections = document.querySelectorAll(
      "section:not(.hero):not(#hero), .reveal"
    );

    revealSections.forEach(function (section) {
      /* Section heading */
      const heading = section.querySelector("h2");
      if (heading) {
        gsap.from(heading, {
          opacity: 0,
          y: 40,
          duration: 0.8,
          ease: "power3.out",
          scrollTrigger: {
            trigger: section,
            start: "top 80%",
          },
        });
      }

      /* Eyebrow / overline labels */
      const eyebrow = section.querySelector(".eyebrow, p.eyebrow");
      if (eyebrow) {
        gsap.from(eyebrow, {
          opacity: 0,
          x: -20,
          duration: 0.5,
          ease: "power2.out",
          scrollTrigger: { trigger: section, start: "top 82%" },
        });
      }
    });

    /* ═══════════════════════════════════════════════════════
       5. CARD GRIDS — stagger fan-in
       Targets: book cards, initiative cards, service cards,
                media grid articles
    ═══════════════════════════════════════════════════════ */
    const cardGroups = [
      ".book-rail article, .book-rail .book-card",
      ".initiative-grid article, .initiative-grid .initiative-card",
      ".media-grid article",
      ".service-card",
      ".services-grid .card",
    ];

    cardGroups.forEach(function (selector) {
      const cards = document.querySelectorAll(selector);
      if (!cards.length) return;

      gsap.from(cards, {
        opacity: 0,
        y: 50,
        rotation: 2,
        stagger: 0.1,
        duration: 0.7,
        ease: "power3.out",
        scrollTrigger: {
          trigger: cards[0].closest("section") || cards[0].parentElement,
          start: "top 75%",
        },
      });

      /* Hover lift on each card */
      cards.forEach(function (card) {
        card.addEventListener("mouseenter", function () {
          gsap.to(card, { y: -6, duration: 0.25, ease: "power2.out" });
        });
        card.addEventListener("mouseleave", function () {
          gsap.to(card, { y: 0, duration: 0.25, ease: "power2.out" });
        });
      });
    });

    /* ═══════════════════════════════════════════════════════
       6. TIMELINE — draw-in animation (About section)
    ═══════════════════════════════════════════════════════ */
    const timelineItems = document.querySelectorAll(".timeline div, .timeline li");
    if (timelineItems.length) {
      gsap.from(timelineItems, {
        opacity: 0,
        x: -30,
        stagger: 0.2,
        duration: 0.6,
        ease: "power2.out",
        scrollTrigger: {
          trigger: ".timeline",
          start: "top 75%",
        },
      });
    }

    /* ═══════════════════════════════════════════════════════
       7. ABOUT MEDIA — cinematic reveal (clip-path wipe)
    ═══════════════════════════════════════════════════════ */
    const aboutMedia = document.querySelector(".about-media, .about-media img");
    if (aboutMedia) {
      gsap.from(aboutMedia, {
        clipPath: "inset(0 100% 0 0)",
        duration: 1.2,
        ease: "power3.inOut",
        scrollTrigger: {
          trigger: aboutMedia.closest("section") || aboutMedia,
          start: "top 70%",
        },
      });
    }

    /* Community hero image — same treatment */
    const communityImg = document.querySelector(".community-hero img");
    if (communityImg) {
      gsap.from(communityImg, {
        clipPath: "inset(0 0 100% 0)",
        duration: 1.2,
        ease: "power3.inOut",
        scrollTrigger: {
          trigger: communityImg.closest("section") || communityImg,
          start: "top 70%",
        },
      });
    }

    /* ═══════════════════════════════════════════════════════
       8. BLOCKQUOTE / PULL QUOTES — scale-fade
    ═══════════════════════════════════════════════════════ */
    const quotes = document.querySelectorAll("blockquote");
    quotes.forEach(function (q) {
      gsap.from(q, {
        opacity: 0,
        scale: 0.97,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: { trigger: q, start: "top 80%" },
      });
    });

    /* ═══════════════════════════════════════════════════════
       9. PODCAST EPISODE LIST — stagger entrance
    ═══════════════════════════════════════════════════════ */
    const episodeButtons = document.querySelectorAll(".episode-button");
    if (episodeButtons.length) {
      gsap.from(episodeButtons, {
        opacity: 0,
        x: -30,
        stagger: 0.12,
        duration: 0.6,
        ease: "power3.out",
        scrollTrigger: {
          trigger: ".podcast-layout, .podcast-section",
          start: "top 75%",
        },
      });
    }

    const episodeArt = document.querySelector(".episode-art");
    if (episodeArt) {
      gsap.from(episodeArt, {
        opacity: 0,
        scale: 0.9,
        duration: 0.8,
        ease: "back.out(1.4)",
        scrollTrigger: {
          trigger: ".podcast-layout, .podcast-section",
          start: "top 75%",
        },
      });
    }

    /* ═══════════════════════════════════════════════════════
       10. CONTACT SECTION — warm entrance
    ═══════════════════════════════════════════════════════ */
    const contactIntro = document.querySelector(".contact-intro");
    const contactForm = document.querySelector(".contact-form");

    if (contactIntro) {
      gsap.from(contactIntro, {
        opacity: 0,
        y: 40,
        duration: 0.8,
        ease: "power3.out",
        scrollTrigger: { trigger: contactIntro, start: "top 80%" },
      });
    }
    if (contactForm) {
      const formFields = contactForm.querySelectorAll("label, button[type='submit']");
      gsap.from(formFields, {
        opacity: 0,
        y: 20,
        stagger: 0.08,
        duration: 0.5,
        ease: "power2.out",
        scrollTrigger: { trigger: contactForm, start: "top 80%" },
      });
    }

    /* Form success micro-animation */
    const contactFormEl = document.querySelector(".contact-form");
    if (contactFormEl) {
      contactFormEl.addEventListener("submit", function () {
        gsap.fromTo(
          contactFormEl,
          { scale: 1 },
          {
            scale: 1.02,
            duration: 0.15,
            yoyo: true,
            repeat: 1,
            ease: "power1.inOut",
          }
        );
      });
    }

    /* ═══════════════════════════════════════════════════════
       11. BUTTON HOVER LIFT — global
    ═══════════════════════════════════════════════════════ */
    document.querySelectorAll(".button, a.button").forEach(function (btn) {
      btn.addEventListener("mouseenter", function () {
        gsap.to(btn, { y: -3, duration: 0.2, ease: "power2.out" });
      });
      btn.addEventListener("mouseleave", function () {
        gsap.to(btn, { y: 0, duration: 0.2, ease: "power2.out" });
      });
    });

    /* ═══════════════════════════════════════════════════════
       12. FOOTER — gentle fade
    ═══════════════════════════════════════════════════════ */
    const footer = document.querySelector(".site-footer, footer");
    if (footer) {
      gsap.from(footer, {
        opacity: 0,
        y: 20,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: { trigger: footer, start: "top 95%" },
      });
    }

    /* ═══════════════════════════════════════════════════════
       13. HEADER — hide on scroll down, show on scroll up
    ═══════════════════════════════════════════════════════ */
    const header = document.querySelector(".site-header, header");
    if (header) {
      let lastScroll = 0;
      ScrollTrigger.create({
        trigger: document.body,
        start: "100px top",
        onUpdate: function (self) {
          const currentScroll = window.scrollY;
          if (currentScroll > lastScroll && currentScroll > 100) {
            gsap.to(header, { y: "-100%", duration: 0.3, ease: "power2.out" });
          } else {
            gsap.to(header, { y: "0%", duration: 0.3, ease: "power2.out" });
          }
          lastScroll = currentScroll;
        },
      });
    }

  } /* end initAnimations */

})();
