// OBLINK Advanced Frontend JavaScript

document.addEventListener('DOMContentLoaded', function() {
  console.log('🚀 OBLINK Enhanced v2.0 initialized');

  // ===== MOBILE MENU =====
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  
  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function() {
      mobileMenu.classList.toggle('hidden');
      const icon = this.querySelector('i');
      if (mobileMenu.classList.contains('hidden')) {
        icon.className = 'fas fa-bars text-2xl';
      } else {
        icon.className = 'fas fa-times text-2xl';
      }
    });
  }

  // ===== SMOOTH SCROLL =====
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        const navHeight = document.querySelector('nav').offsetHeight;
        const targetPosition = target.offsetTop - navHeight;
        
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
        
        // Close mobile menu if open
        if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          const icon = mobileMenuButton.querySelector('i');
          icon.className = 'fas fa-bars text-2xl';
        }
      }
    });
  });

  // ===== INTERSECTION OBSERVER FOR ANIMATIONS =====
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const fadeInObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        fadeInObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe sections for fade-in
  document.querySelectorAll('section').forEach(section => {
    fadeInObserver.observe(section);
  });

  // ===== ANIMATED COUNTERS =====
  const counterObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = parseFloat(counter.getAttribute('data-target'));
        const isDecimal = target % 1 !== 0;
        
        animateCounter(counter, 0, target, 2000, isDecimal);
        counterObserver.unobserve(counter);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.counter').forEach(counter => {
    counterObserver.observe(counter);
  });

  function animateCounter(element, start, end, duration, isDecimal) {
    const range = end - start;
    const increment = range / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= end) {
        if (isDecimal) {
          element.textContent = end.toFixed(1).replace('.', ',');
        } else {
          element.textContent = Math.round(end).toLocaleString('fr-FR');
        }
        clearInterval(timer);
      } else {
        if (isDecimal) {
          element.textContent = current.toFixed(1).replace('.', ',');
        } else {
          element.textContent = Math.round(current).toLocaleString('fr-FR');
        }
      }
    }, 16);
  }

  // ===== PARALLAX EFFECT =====
  let ticking = false;
  
  function updateParallax() {
    const scrolled = window.pageYOffset;
    const hero = document.getElementById('hero');
    
    if (hero && scrolled < window.innerHeight) {
      const shapes = hero.querySelectorAll('.floating-shape');
      shapes.forEach((shape, index) => {
        const speed = 0.5 + (index * 0.1);
        const yPos = scrolled * speed;
        shape.style.transform = `translate3d(0, ${yPos}px, 0)`;
      });
    }
    
    ticking = false;
  }

  window.addEventListener('scroll', function() {
    if (!ticking) {
      window.requestAnimationFrame(updateParallax);
      ticking = true;
    }
  });

  // ===== NAVBAR SHADOW ON SCROLL =====
  const navbar = document.getElementById('navbar');
  
  window.addEventListener('scroll', function() {
    if (window.scrollY > 50) {
      navbar.classList.add('shadow-lg');
      navbar.style.background = 'rgba(255, 255, 255, 0.98)';
    } else {
      navbar.classList.remove('shadow-lg');
      navbar.style.background = 'rgba(255, 255, 255, 0.95)';
    }
  });

  // ===== CTA CARD HOVER EFFECT =====
  const ctaCards = document.querySelectorAll('.cta-card');
  
  ctaCards.forEach(card => {
    card.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });

  // ===== MOUSE TRAIL EFFECT =====
  let mouseX = 0;
  let mouseY = 0;
  let cursorDot, cursorOutline;

  function createCursor() {
    cursorDot = document.createElement('div');
    cursorDot.style.cssText = `
      width: 8px;
      height: 8px;
      background: #FF6600;
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9999;
      transition: transform 0.1s;
      display: none;
    `;
    
    cursorOutline = document.createElement('div');
    cursorOutline.style.cssText = `
      width: 32px;
      height: 32px;
      border: 2px solid rgba(255, 102, 0, 0.3);
      border-radius: 50%;
      position: fixed;
      pointer-events: none;
      z-index: 9998;
      transition: all 0.15s ease;
      display: none;
    `;
    
    document.body.appendChild(cursorDot);
    document.body.appendChild(cursorOutline);

    // Only show on desktop
    if (window.innerWidth > 768) {
      cursorDot.style.display = 'block';
      cursorOutline.style.display = 'block';
    }
  }

  createCursor();

  document.addEventListener('mousemove', function(e) {
    mouseX = e.clientX;
    mouseY = e.clientY;
    
    if (cursorDot && cursorOutline) {
      cursorDot.style.left = mouseX - 4 + 'px';
      cursorDot.style.top = mouseY - 4 + 'px';
      
      cursorOutline.style.left = mouseX - 16 + 'px';
      cursorOutline.style.top = mouseY - 16 + 'px';
    }
  });

  // Cursor hover effect on clickable elements
  const clickables = document.querySelectorAll('a, button, .cta-card');
  clickables.forEach(el => {
    el.addEventListener('mouseenter', () => {
      if (cursorOutline) {
        cursorOutline.style.transform = 'scale(1.5)';
        cursorOutline.style.borderColor = 'rgba(255, 102, 0, 0.5)';
      }
    });
    
    el.addEventListener('mouseleave', () => {
      if (cursorOutline) {
        cursorOutline.style.transform = 'scale(1)';
        cursorOutline.style.borderColor = 'rgba(255, 102, 0, 0.3)';
      }
    });
  });

  // ===== FORM VALIDATION =====
  const forms = document.querySelectorAll('form[data-validate]');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      let isValid = true;
      const requiredFields = form.querySelectorAll('[required]');
      
      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          isValid = false;
          field.classList.add('border-red-500');
          field.classList.add('shake');
          setTimeout(() => field.classList.remove('shake'), 500);
        } else {
          field.classList.remove('border-red-500');
        }
      });

      if (isValid) {
        const submitBtn = form.querySelector('button[type="submit"]');
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Envoi en cours...';
        }
        
        setTimeout(() => {
          showNotification('Formulaire envoyé avec succès !', 'success');
          form.reset();
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = 'Envoyer';
          }
        }, 1500);
      } else {
        showNotification('Veuillez remplir tous les champs obligatoires', 'error');
      }
    });
  });

  // ===== NOTIFICATION SYSTEM =====
  function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    const bgColor = type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
    
    notification.className = `fixed top-24 right-4 ${bgColor} text-white px-6 py-4 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
    notification.innerHTML = `
      <div class="flex items-center">
        <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'} mr-3"></i>
        <span>${message}</span>
      </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
      notification.style.transform = 'translateX(0)';
    }, 100);
    
    setTimeout(() => {
      notification.style.transform = 'translateX(calc(100% + 2rem))';
      setTimeout(() => notification.remove(), 300);
    }, 3000);
  }

  // ===== CTA TRACKING =====
  const ctaButtons = document.querySelectorAll('a[href*="register"], a[href*="inscription"], a[href*="opticiens"], a[href*="entreprises"]');
  ctaButtons.forEach(btn => {
    btn.addEventListener('click', function(e) {
      const action = this.href.includes('opticien') ? 'Opticien CTA' : 'Entreprise CTA';
      console.log('📊 CTA clicked:', action, this.href);
      // Here you would send to analytics
      // gtag('event', 'cta_click', { action: action });
    });
  });

  // ===== LAZY LOADING IMAGES =====
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          img.src = img.dataset.src;
          img.classList.remove('lazy');
          imageObserver.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img.lazy').forEach(img => {
      imageObserver.observe(img);
    });
  }

  // ===== DYNAMIC YEAR IN FOOTER =====
  const yearElements = document.querySelectorAll('.current-year');
  const currentYear = new Date().getFullYear();
  yearElements.forEach(el => {
    el.textContent = currentYear;
  });

  // ===== PARTICLE EFFECT ON HERO =====
  function createParticles() {
    const hero = document.getElementById('hero');
    if (!hero || window.innerWidth < 768) return;

    for (let i = 0; i < 20; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.cssText = `
        position: absolute;
        width: ${Math.random() * 4 + 2}px;
        height: ${Math.random() * 4 + 2}px;
        background: rgba(255, 102, 0, ${Math.random() * 0.5 + 0.2});
        border-radius: 50%;
        left: ${Math.random() * 100}%;
        top: ${Math.random() * 100}%;
        animation: float ${Math.random() * 10 + 10}s infinite ease-in-out;
        animation-delay: ${Math.random() * 5}s;
      `;
      hero.appendChild(particle);
    }
  }

  createParticles();

  // ===== RESIZE HANDLER =====
  let resizeTimer;
  window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      if (window.innerWidth > 768) {
        if (cursorDot) cursorDot.style.display = 'block';
        if (cursorOutline) cursorOutline.style.display = 'block';
      } else {
        if (cursorDot) cursorDot.style.display = 'none';
        if (cursorOutline) cursorOutline.style.display = 'none';
      }
    }, 250);
  });
});

// ===== API HELPER FUNCTIONS =====
const OBLINK = {
  async fetchStats() {
    try {
      const response = await fetch('/api/stats');
      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error fetching stats:', error);
      return null;
    }
  },

  async submitContact(formData) {
    try {
      const response = await fetch('/api/contact', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData)
      });
      return await response.json();
    } catch (error) {
      console.error('Error submitting contact:', error);
      return { error: 'Une erreur est survenue' };
    }
  }
};

// Make OBLINK API available globally
window.OBLINK = OBLINK;

// ===== CSS ANIMATIONS HELPER =====
const style = document.createElement('style');
style.textContent = `
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
  }
  
  .shake {
    animation: shake 0.5s;
  }
`;
document.head.appendChild(style);
