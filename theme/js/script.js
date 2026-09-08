const body = document.body;
const menuButton = document.querySelector(".menu-button");
const closeMenu = document.querySelector(".close-menu");
const menuOverlay = document.querySelector("#menuOverlay");
const overlayLinks = document.querySelectorAll(".overlay-nav a");

function setMenuState(isOpen) {
  body.classList.toggle("menu-open", isOpen);
  menuOverlay.classList.toggle("is-open", isOpen);
  menuOverlay.setAttribute("aria-hidden", String(!isOpen));
  menuButton.setAttribute("aria-expanded", String(isOpen));
  menuOverlay.toggleAttribute("inert", !isOpen);

  if (isOpen) {
    closeMenu.focus();
  } else {
    menuButton.focus();
  }
}

menuButton.addEventListener("click", () => setMenuState(true));
closeMenu.addEventListener("click", () => setMenuState(false));
overlayLinks.forEach((link) => link.addEventListener("click", () => setMenuState(false)));

document.addEventListener("keydown", (event) => {
  if (event.key === "Escape") {
    setMenuState(false);
  }
});

const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-visible");
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.16 }
);

document.querySelectorAll(".reveal").forEach((element) => revealObserver.observe(element));

const hero = document.querySelector(".hero");
if (hero) {
  window.addEventListener(
    "scroll",
    () => {
      const progress = Math.min(window.scrollY / window.innerHeight, 1);
      hero.style.setProperty("--hero-scale", String(1 + progress * 0.08));
    },
    { passive: true }
  );
}

const siteSearch = document.querySelector("#siteSearch");
const filterPills = document.querySelectorAll(".filter-pill");
const searchableItems = document.querySelectorAll(".searchable-item");
let activeFilter = "all";

function normalize(value) {
  return value.toLowerCase().trim();
}

function filterContent() {
  if (!siteSearch) return;
  const query = normalize(siteSearch.value);

  searchableItems.forEach((item) => {
    const tags = normalize(item.dataset.tags || "");
    const text = normalize(item.textContent);
    const matchesFilter = activeFilter === "all" || tags.includes(activeFilter);
    const matchesQuery = !query || tags.includes(query) || text.includes(query);
    item.classList.toggle("is-hidden", !matchesFilter || !matchesQuery);
  });
}

if (filterPills.length > 0) {
  filterPills.forEach((pill) => {
    pill.addEventListener("click", () => {
      filterPills.forEach((item) => item.classList.remove("is-active"));
      pill.classList.add("is-active");
      activeFilter = pill.dataset.filter;
      filterContent();
    });
  });
}

if (siteSearch) {
  siteSearch.addEventListener("input", filterContent);
}

const episodeButtons = document.querySelectorAll(".episode-button");
const episodeMeta = document.querySelector("#episodeMeta");
const episodeTitle = document.querySelector("#episodeTitle");
const episodeDescription = document.querySelector("#episodeDescription");

if (episodeButtons.length > 0 && episodeMeta && episodeTitle && episodeDescription) {
  episodeButtons.forEach((button) => {
    button.addEventListener("click", () => {
      episodeButtons.forEach((item) => item.classList.remove("is-active"));
      button.classList.add("is-active");
      episodeMeta.textContent = `${button.dataset.date} - ${button.dataset.duration}`;
      episodeTitle.textContent = button.dataset.title;
      episodeDescription.textContent = button.dataset.description;
    });
  });
}

const inquiryType = document.querySelector("#inquiryType");
const formHelper = document.querySelector("#formHelper");
const helperText = {
  "Speaking engagement": "Share the event theme, audience, city, and date if available.",
  "Podcast invitation": "Share the show name, topic, format, and recording window.",
  "Media / press": "Share your outlet, deadline, angle, and preferred response format.",
  "Community membership": "Share what you are building and the kind of community support you need.",
  Partnership: "Share the organization, goal, timeline, and collaboration model you have in mind."
};

if (inquiryType && formHelper) {
  inquiryType.addEventListener("change", () => {
    formHelper.textContent = helperText[inquiryType.value] || helperText["Speaking engagement"];
  });
}

const contactForm = document.querySelector(".contact-form");
if (contactForm && formHelper) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();
    formHelper.textContent = "Inquiry drafted. Connect this form to your preferred form service when ready.";
  });
}
