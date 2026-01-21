// OBLINK Advanced Frontend JavaScript

document.addEventListener('DOMContentLoaded', function () {
  console.log('🚀 OBLINK Glassmorphism v3.1 with Blog initialized');

  // ===== BLOG FILTERS =====
  const filterButtons = document.querySelectorAll('.filter-btn');
  const articleCards = document.querySelectorAll('.article-card');

  if (filterButtons.length > 0) {
    filterButtons.forEach(button => {
      button.addEventListener('click', function () {
        const category = this.getAttribute('data-category');

        // Update active button
        filterButtons.forEach(btn => {
          btn.classList.remove('active');
          btn.classList.remove('bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');
          btn.classList.add('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');
        });

        this.classList.add('active');
        this.classList.remove('bg-white/60', 'backdrop-blur-xl', 'border', 'border-white/40', 'text-oblink-gray');
        this.classList.add('bg-gradient-to-r', 'from-oblink-orange', 'to-oblink-violet', 'text-white');

        // Filter articles
        articleCards.forEach(card => {
          const cardCategory = card.getAttribute('data-category');

          if (category === 'all' || cardCategory === category) {
            card.style.display = 'block';
            setTimeout(() => {
              card.style.opacity = '1';
              card.style.transform = 'scale(1)';
            }, 50);
          } else {
            card.style.opacity = '0';
            card.style.transform = 'scale(0.95)';
            setTimeout(() => {
              card.style.display = 'none';
            }, 300);
          }
        });
      });
    });
  }

  // ===== 3D CAROUSEL =====
  const carousel = document.getElementById('processCarousel');
  const prevBtn = document.getElementById('carousel-prev');
  const nextBtn = document.getElementById('carousel-next');
  const indicators = document.querySelectorAll('.carousel-indicator');
  const items = document.querySelectorAll('.carousel-3d-item');

  let currentIndex = 0;
  let autoRotateInterval;
  const totalItems = items.length || 3;

  function updateCarousel() {
    items.forEach((item, index) => {
      item.classList.remove('active', 'prev', 'next');

      if (index === currentIndex) {
        item.classList.add('active');
      } else if (index === (currentIndex - 1 + totalItems) % totalItems) {
        item.classList.add('prev');
      } else if (index === (currentIndex + 1) % totalItems) {
        item.classList.add('next');
      }
    });

    // Update indicators
    indicators.forEach((indicator, index) => {
      if (index === currentIndex) {
        indicator.classList.add('active');
      } else {
        indicator.classList.remove('active');
      }
    });
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalItems;
    updateCarousel();
  }

  function prevSlide() {
    currentIndex = (currentIndex - 1 + totalItems) % totalItems;
    updateCarousel();
  }

  function goToSlide(index) {
    currentIndex = index;
    updateCarousel();
  }

  // Event listeners
  if (nextBtn && prevBtn) {
    nextBtn.addEventListener('click', () => {
      nextSlide();
      resetAutoRotate();
    });

    prevBtn.addEventListener('click', () => {
      prevSlide();
      resetAutoRotate();
    });
  }

  // Indicator clicks
  indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => {
      goToSlide(index);
      resetAutoRotate();
    });
  });

  // Auto rotate
  function startAutoRotate() {
    autoRotateInterval = setInterval(nextSlide, 5000);
  }

  function stopAutoRotate() {
    if (autoRotateInterval) {
      clearInterval(autoRotateInterval);
    }
  }

  function resetAutoRotate() {
    stopAutoRotate();
    startAutoRotate();
  }

  // Start auto-rotation when carousel is visible
  const carouselObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        startAutoRotate();
      } else {
        stopAutoRotate();
      }
    });
  }, { threshold: 0.5 });

  if (carousel) {
    carouselObserver.observe(carousel);
  }

  // Pause on hover
  if (carousel) {
    carousel.addEventListener('mouseenter', stopAutoRotate);
    carousel.addEventListener('mouseleave', startAutoRotate);
  }

  // Keyboard navigation
  document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') {
      prevSlide();
      resetAutoRotate();
    } else if (e.key === 'ArrowRight') {
      nextSlide();
      resetAutoRotate();
    }
  });

  // Touch/Swipe support
  let touchStartX = 0;
  let touchEndX = 0;

  if (carousel) {
    carousel.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    carousel.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    }, { passive: true });
  }

  function handleSwipe() {
    const swipeThreshold = 50;
    const diff = touchStartX - touchEndX;

    if (Math.abs(diff) > swipeThreshold) {
      if (diff > 0) {
        // Swipe left - next
        nextSlide();
      } else {
        // Swipe right - prev
        prevSlide();
      }
      resetAutoRotate();
    }
  }

  // ===== MOBILE MENU =====
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenu = document.getElementById('mobile-menu');

  if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function () {
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

  // ===== LIQUID GLASS PARTICLES =====
  function createParticles(containerId, count = 20) {
    const container = document.getElementById(containerId);
    if (!container) return;

    for (let i = 0; i < count; i++) {
      const particle = document.createElement('div');
      particle.className = 'particle';
      particle.style.left = Math.random() * 100 + '%';
      particle.style.top = Math.random() * 100 + '%';
      particle.style.animationDelay = Math.random() * 15 + 's';
      particle.style.animationDuration = (10 + Math.random() * 10) + 's';
      container.appendChild(particle);
    }
  }

  // Create particles for testimonials section
  createParticles('particles-testimonials', 15);

  // ===== LIQUID GLASS CARD ANIMATIONS =====
  const liquidCards = document.querySelectorAll('.service-card-liquid, .testimonial-card-liquid');
  liquidCards.forEach((card, index) => {
    const delay = card.getAttribute('data-delay') || (index * 0.1);
    card.style.opacity = '0';
    card.style.transform = 'translateY(30px)';
    card.style.transition = `all 0.6s cubic-bezier(0.4, 0, 0.2, 1) ${delay}s`;
  });

  // ===== INTERSECTION OBSERVER FOR ANIMATIONS =====
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const fadeInObserver = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        fadeInObserver.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe liquid cards
  liquidCards.forEach(card => fadeInObserver.observe(card));

  // Observe sections for fade-in
  document.querySelectorAll('section').forEach(section => {
    fadeInObserver.observe(section);
  });

  // ===== ANIMATED COUNTERS =====
  const counterObserver = new IntersectionObserver(function (entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        // Parse target, handling both string '8.3' and numbers
        const targetAttr = counter.getAttribute('data-target');
        const target = parseFloat(targetAttr);

        // Determine if we need decimal formatting based on the input string or value
        // If data-target is "8.3", isDecimal is true. If "13300", false.
        const isDecimal = targetAttr.includes('.') || target % 1 !== 0;

        // Reset text content to 0 before starting (in case it wasn't)
        counter.textContent = isDecimal ? "0,0" : "0";

        console.log(`Starting counter animation for ${targetAttr}`);

        animateCounter(counter, 0, target, 2500, isDecimal);
        counterObserver.unobserve(counter);
      }
    });
  }, { threshold: 0.5 }); // Increased threshold to ensure visibility

  document.querySelectorAll('.counter').forEach(counter => {
    counterObserver.observe(counter);
  });

  function animateCounter(element, start, end, duration, isDecimal) {
    let startTimestamp = null;
    const step = (timestamp) => {
      if (!startTimestamp) startTimestamp = timestamp;
      const progress = Math.min((timestamp - startTimestamp) / duration, 1);

      // Easing function (easeOutExpo) for smoother animation
      // 1 - Math.pow(2, -10 * progress)
      const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);

      const current = start + (easeProgress * (end - start));

      if (isDecimal) {
        element.textContent = current.toFixed(1).replace('.', ',');
      } else {
        element.textContent = Math.round(current).toLocaleString('fr-FR');
      }

      if (progress < 1) {
        window.requestAnimationFrame(step);
      } else {
        // Ensure final value is exact
        if (isDecimal) {
          element.textContent = end.toFixed(1).replace('.', ',');
        } else {
          element.textContent = Math.round(end).toLocaleString('fr-FR');
        }
      }
    };
    window.requestAnimationFrame(step);
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

  window.addEventListener('scroll', function () {
    if (!ticking) {
      window.requestAnimationFrame(updateParallax);
      ticking = true;
    }
  });

  // ===== NAVBAR SHADOW ON SCROLL =====
  const navbar = document.getElementById('navbar');

  window.addEventListener('scroll', function () {
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
    card.addEventListener('mouseenter', function () {
      this.style.transform = 'scale(1.02)';
    });

    card.addEventListener('mouseleave', function () {
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

  document.addEventListener('mousemove', function (e) {
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
    form.addEventListener('submit', function (e) {
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
    btn.addEventListener('click', function (e) {
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
  window.addEventListener('resize', function () {
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
  // ===== MESSAGING SYSTEM (V62) =====
  const conversationList = document.getElementById('conversation-list');
  const chatMessages = document.getElementById('chat-messages');
  const chatInputArea = document.getElementById('chat-input-area');
  const currentContactIdInput = document.getElementById('current-contact-id');
  const sendMessageForm = document.getElementById('send-message-form');

  if (conversationList) {
    // 1. CLICK CONVERSATION
    conversationList.addEventListener('click', function (e) {
      const item = e.target.closest('.conversation-item');
      if (!item) return;

      // Enhance UI active state
      document.querySelectorAll('.conversation-item').forEach(el => el.classList.remove('bg-blue-50', 'border-l-4', 'border-oblink-blue'));
      item.classList.add('bg-blue-50', 'border-l-4', 'border-oblink-blue');

      const contactId = item.getAttribute('data-contact-id');
      currentContactIdInput.value = contactId;
      chatInputArea.classList.remove('hidden');

      // Load Messages AJAX
      chatMessages.innerHTML = '<div class="flex h-full items-center justify-center text-gray-400"><i class="fas fa-spinner fa-spin text-2xl"></i></div>';

      const formData = new FormData();
      formData.append('action', 'oblink_load_chat');
      formData.append('contact_id', contactId);
      formData.append('nonce', oblink_vars.nonce);

      fetch(oblink_vars.ajax_url + '?action=oblink_load_chat&contact_id=' + contactId + '&nonce=' + oblink_vars.nonce)
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            chatMessages.innerHTML = data.data.html || '<div class="text-center text-xs text-gray-400 mt-10">Début de la conversation</div>';
            chatMessages.scrollTop = chatMessages.scrollHeight;
          } else {
            chatMessages.innerHTML = '<div class="text-red-500 text-center">Erreur chargement</div>';
          }
        });
    });

    // 2. SEND MESSAGE
    if (sendMessageForm) {
      sendMessageForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const contactId = currentContactIdInput.value;
        const messageInput = document.getElementById('message-input');
        const message = messageInput.value.trim();

        if (!message) return;

        // Optimistic UI update
        const tempMsg = document.createElement('div');
        tempMsg.className = 'flex justify-end mb-4 opacity-50';
        tempMsg.innerHTML = `<div class="bg-oblink-blue text-white rounded-2xl py-2 px-4 max-w-[80%] text-sm">${message}</div>`;
        chatMessages.appendChild(tempMsg);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        messageInput.value = '';

        const formData = new FormData();
        formData.append('action', 'oblink_send_msg');
        formData.append('receiver_id', contactId);
        formData.append('message', message);
        formData.append('nonce', oblink_vars.nonce);

        fetch(oblink_vars.ajax_url, {
          method: 'POST',
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              tempMsg.classList.remove('opacity-50');
            } else {
              tempMsg.classList.add('bg-red-500');
              alert('Erreur envoi');
            }
          });
      });
    }
  }
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
});
