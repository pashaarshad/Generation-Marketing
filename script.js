// ===== GENERATION MARKETING - MAIN SCRIPT =====
document.addEventListener('DOMContentLoaded', () => {

  // --- Navbar scroll effect ---
  const navbar = document.querySelector('.navbar-custom');
  const backToTop = document.querySelector('.back-to-top');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
    if (backToTop) backToTop.classList.toggle('show', window.scrollY > 400);
  });

  // --- Back to top ---
  if (backToTop) backToTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  // --- Active nav link on scroll ---
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.nav-link[href^="#"]');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(l => l.classList.remove('active'));
        const active = document.querySelector(`.nav-link[href="#${entry.target.id}"]`);
        if (active) active.classList.add('active');
      }
    });
  }, { threshold: 0.3, rootMargin: '-80px 0px 0px 0px' });
  sections.forEach(s => observer.observe(s));

  // --- Close mobile nav on click ---
  document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
    link.addEventListener('click', () => {
      const toggler = document.querySelector('.navbar-toggler');
      const collapse = document.querySelector('.navbar-collapse');
      if (collapse.classList.contains('show')) toggler.click();
    });
  });

  // --- Counter animation ---
  const counters = document.querySelectorAll('.counter');
  let counted = false;
  function animateCounters() {
    counters.forEach(counter => {
      const target = +counter.dataset.target;
      const suffix = counter.dataset.suffix || '';
      const duration = 2000;
      const start = performance.now();
      function update(now) {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        counter.textContent = Math.floor(eased * target) + suffix;
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
    });
  }
  const statsSection = document.querySelector('.hero-stats');
  if (statsSection) {
    const statsObs = new IntersectionObserver(entries => {
      if (entries[0].isIntersecting && !counted) { counted = true; animateCounters(); }
    }, { threshold: 0.5 });
    statsObs.observe(statsSection);
  }

  // --- Service tab filtering ---
  const tabs = document.querySelectorAll('.service-tab');
  const cards = document.querySelectorAll('.service-item');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const filter = tab.dataset.filter;
      cards.forEach(card => {
        if (filter === 'all' || card.dataset.category === filter) {
          card.style.display = '';
          card.style.animation = 'fadeInUp 0.5s ease forwards';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // --- Poster modal ---
  const posterModal = document.getElementById('posterModal');
  if (posterModal) {
    posterModal.addEventListener('show.bs.modal', event => {
      const btn = event.relatedTarget;
      const imgSrc = btn.dataset.poster;
      const title = btn.dataset.title;
      posterModal.querySelector('.modal-body img').src = imgSrc;
      posterModal.querySelector('.modal-title').textContent = title;
    });
  }

  // --- Typewriter effect ---
  const typeEl = document.getElementById('typewriter');
  if (typeEl) {
    const words = ['Visibility', 'Leads', 'Growth', 'Revenue', 'Success'];
    let wordIdx = 0, charIdx = 0, deleting = false;
    function type() {
      const word = words[wordIdx];
      typeEl.textContent = word.substring(0, charIdx);
      if (!deleting) {
        charIdx++;
        if (charIdx > word.length) { deleting = true; setTimeout(type, 1500); return; }
      } else {
        charIdx--;
        if (charIdx === 0) { deleting = false; wordIdx = (wordIdx + 1) % words.length; }
      }
      setTimeout(type, deleting ? 50 : 100);
    }
    type();
  }

  // --- Form submission ---
  const form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const btn = form.querySelector('button[type="submit"]');
      const orig = btn.innerHTML;
      btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
      btn.disabled = true;
      setTimeout(() => {
        btn.innerHTML = '<i class="fas fa-check"></i> Message Sent!';
        btn.style.background = 'var(--green)';
        form.reset();
        setTimeout(() => { btn.innerHTML = orig; btn.disabled = false; btn.style.background = ''; }, 3000);
      }, 1500);
    });
  }

  // --- Scroll reveal animation ---
  const revealEls = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('revealed');
        revealObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => revealObs.observe(el));

  // --- Testimonial carousel auto ---
  const carousel = document.getElementById('testimonialCarousel');
  if (carousel) new bootstrap.Carousel(carousel, { interval: 5000, ride: 'carousel' });
});

// CSS for reveal animation
const style = document.createElement('style');
style.textContent = `
  .reveal { opacity:0; transform:translateY(30px); transition:opacity 0.6s ease, transform 0.6s ease; }
  .revealed { opacity:1; transform:translateY(0); }
  @keyframes fadeInUp { from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)} }
`;
document.head.appendChild(style);
