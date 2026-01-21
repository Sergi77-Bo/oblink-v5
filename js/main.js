// ==========================================
// PORTFOLIO SERGIO SANDOVAL - MAIN JAVASCRIPT
// ==========================================

// ===== DOM ELEMENTS =====
const navbar = document.getElementById('navbar');
const mobileMenuToggle = document.getElementById('mobileMenuToggle');
const navMenu = document.getElementById('navMenu');
const navLinks = document.querySelectorAll('.nav-link');
const scrollToTopBtn = document.getElementById('scrollToTop');
const contactForm = document.getElementById('contactForm');
const metricValues = document.querySelectorAll('.metric-value[data-count]');

// ===== UTILITY FUNCTIONS =====

// Debounce function for performance
function debounce(func, wait = 20, immediate = true) {
    let timeout;
    return function () {
        const context = this, args = arguments;
        const later = function () {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

// ===== NAVBAR FUNCTIONALITY =====

// Sticky navbar on scroll
let lastScroll = 0;

function handleNavbarScroll() {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 100) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }

    lastScroll = currentScroll;
}

// Mobile menu toggle
function toggleMobileMenu() {
    mobileMenuToggle.classList.toggle('active');
    navMenu.classList.toggle('active');
    document.body.classList.toggle('menu-open');
    document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
}

// Close mobile menu when clicking on a link
function closeMobileMenu() {
    mobileMenuToggle.classList.remove('active');
    navMenu.classList.remove('active');
    document.body.classList.remove('menu-open');
    document.body.style.overflow = '';
}

// Active nav link on scroll
function updateActiveNavLink() {
    const sections = document.querySelectorAll('section[id]');
    const scrollPosition = window.pageYOffset + 100;

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute('id');
        const correspondingLink = document.querySelector(`.nav-link[href="#${sectionId}"]`);

        if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
            navLinks.forEach(link => link.classList.remove('active'));
            if (correspondingLink) {
                correspondingLink.classList.add('active');
            }
        }
    });
}

// Smooth scroll for anchor links
function smoothScroll(e) {
    // Only proceed if the link has a hash
    if (this.hash !== '') {
        // Check if the link points to the current page (ignoring leading slashes for consistency)
        const currentPath = window.location.pathname.replace(/^\//, '');
        const linkPath = this.pathname.replace(/^\//, '');

        // Only intercept if paths match (or link path is empty) AND hostname matches
        if ((linkPath === '' || linkPath === currentPath || (linkPath === 'index.html' && currentPath === '')) &&
            this.hostname === window.location.hostname) {

            const hash = this.hash;
            const targetElement = document.querySelector(hash);

            if (targetElement) {
                e.preventDefault();
                const offsetTop = targetElement.offsetTop - 80;

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });

                // Close mobile menu if open
                closeMobileMenu();
            }
        }
    }
}

// ===== SCROLL TO TOP BUTTON =====

function handleScrollToTop() {
    const scrollPosition = window.pageYOffset;

    if (scrollPosition > 500) {
        scrollToTopBtn.classList.add('visible');
    } else {
        scrollToTopBtn.classList.remove('visible');
    }
}

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// ===== COUNTER ANIMATION =====

function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-count'));
    const duration = 2000; // 2 seconds
    const increment = target / (duration / 16); // 60fps
    let current = 0;

    const updateCounter = () => {
        current += increment;
        if (current < target) {
            element.textContent = Math.ceil(current);
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = target;
        }
    };

    updateCounter();
}

// Intersection Observer for counter animation
function observeMetrics() {
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                entry.target.classList.add('counted');
                animateCounter(entry.target);
            }
        });
    }, observerOptions);

    metricValues.forEach(metric => observer.observe(metric));
}

// ===== SCROLL ANIMATIONS =====

function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('aos-animate');
            }
        });
    }, observerOptions);

    // Observe all elements with data-aos attribute
    const animatedElements = document.querySelectorAll('[data-aos]');
    animatedElements.forEach(el => observer.observe(el));
}

// ===== FORM VALIDATION & SUBMISSION =====

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validateForm(e) {
    e.preventDefault();

    // Get form values
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const message = document.getElementById('message').value.trim();

    // Reset error messages
    const errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(msg => msg.textContent = '');

    let isValid = true;

    // Validate name
    if (name === '') {
        document.querySelector('#name + .error-message').textContent = 'Le nom est requis';
        isValid = false;
    }

    // Validate email
    if (email === '') {
        document.querySelector('#email + .error-message').textContent = 'L\'email est requis';
        isValid = false;
    } else if (!validateEmail(email)) {
        document.querySelector('#email + .error-message').textContent = 'Email invalide';
        isValid = false;
    }

    // Validate message
    if (message === '') {
        document.querySelector('#message + .error-message').textContent = 'Le message est requis';
        isValid = false;
    } else if (message.length < 10) {
        document.querySelector('#message + .error-message').textContent = 'Le message doit contenir au moins 10 caractères';
        isValid = false;
    }

    // If valid, submit form
    if (isValid) {
        submitForm(name, email, message);
    }
}

async function submitForm(name, email, message) {
    const submitBtn = contactForm.querySelector('.btn-submit');
    const originalText = submitBtn.querySelector('span').textContent;

    // Show loading state
    submitBtn.disabled = true;
    submitBtn.querySelector('span').textContent = 'Envoi en cours...';
    submitBtn.querySelector('i').className = 'fas fa-spinner fa-spin';

    // If form action is configured (not the placeholder), POST to it (supports Formspree)
    const action = contactForm.getAttribute('action') || '';
    const isPlaceholder = action.includes('yourFormId') || action.trim() === '';

    if (!isPlaceholder) {
        try {
            const formData = new FormData(contactForm);

            const res = await fetch(action, {
                method: (contactForm.getAttribute('method') || 'POST').toUpperCase(),
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (res.ok) {
                // Success
                contactForm.style.display = 'none';
                const successMessage = document.getElementById('formSuccess');
                successMessage.style.display = 'block';
                contactForm.reset();
                console.log('Form submitted (remote):', { name, email, message });

                // Reset button visuals
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = originalText;
                submitBtn.querySelector('i').className = 'fas fa-paper-plane';

                // Optionally show form again
                setTimeout(() => {
                    successMessage.style.display = 'none';
                    contactForm.style.display = 'block';
                }, 5000);
            } else {
                // Server returned an error
                const text = await res.text();
                console.error('Form submit error', res.status, text);
                alert('Une erreur est survenue lors de l\'envoi. Veuillez réessayer.');
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = originalText;
                submitBtn.querySelector('i').className = 'fas fa-paper-plane';
            }
        } catch (err) {
            console.error('Network error while submitting form', err);
            alert('Impossible d\'envoyer le message pour le moment. Vérifiez votre connexion et réessayez.');
            submitBtn.disabled = false;
            submitBtn.querySelector('span').textContent = originalText;
            submitBtn.querySelector('i').className = 'fas fa-paper-plane';
        }
    } else {
        // Placeholder behavior: keep the simulated local success so the UI still demonstrates functionality
        setTimeout(() => {
            contactForm.style.display = 'none';
            const successMessage = document.getElementById('formSuccess');
            successMessage.style.display = 'block';
            contactForm.reset();
            submitBtn.disabled = false;
            submitBtn.querySelector('span').textContent = originalText;
            submitBtn.querySelector('i').className = 'fas fa-paper-plane';
            console.log('Form submitted (local simulation):', { name, email, message });
            setTimeout(() => {
                successMessage.style.display = 'none';
                contactForm.style.display = 'block';
            }, 5000);
        }, 1200);
    }
}

// ===== KEYBOARD NAVIGATION =====

function handleKeyboardNav(e) {
    // ESC key closes mobile menu
    if (e.key === 'Escape' && navMenu.classList.contains('active')) {
        closeMobileMenu();
    }
}

// ===== LAZY LOADING IMAGES =====

function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.add('loaded');
                observer.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
}

// ===== PERFORMANCE MONITORING =====

function logPerformance() {
    if (window.performance && window.performance.timing) {
        const timing = window.performance.timing;
        const loadTime = timing.loadEventEnd - timing.navigationStart;

        console.log(`%c⚡ Page Load Time: ${(loadTime / 1000).toFixed(2)}s`,
            'color: #FF6600; font-weight: bold; font-size: 14px;');
    }
}

// ===== EASTER EGG =====

function initEasterEgg() {
    const konamiCode = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
    let konamiIndex = 0;

    document.addEventListener('keydown', (e) => {
        if (e.key === konamiCode[konamiIndex]) {
            konamiIndex++;
            if (konamiIndex === konamiCode.length) {
                activateEasterEgg();
                konamiIndex = 0;
            }
        } else {
            konamiIndex = 0;
        }
    });
}

function activateEasterEgg() {
    // Add fun animation to the page
    document.body.style.animation = 'rainbow 2s infinite';

    // Show message
    const message = document.createElement('div');
    message.style.cssText = `
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: linear-gradient(135deg, #FF6600, #9A48D0);
        color: white;
        padding: 2rem 3rem;
        border-radius: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        z-index: 10000;
        box-shadow: 0 10px 50px rgba(0,0,0,0.3);
        text-align: center;
    `;
    message.innerHTML = '🎉 Bravo ! Vous avez trouvé l\'easter egg ! 🎉<br><small style="font-size: 0.8em; opacity: 0.9; margin-top: 10px; display: block;">Recruteurs curieux sont les meilleurs ! 😄</small>';
    document.body.appendChild(message);

    // Remove message after 5 seconds
    setTimeout(() => {
        message.remove();
        document.body.style.animation = '';
    }, 5000);

    console.log('%c🎉 EASTER EGG ACTIVATED! Vous êtes un vrai curieux ! 🎉',
        'color: #FF6600; font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);');
}

// Add rainbow animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes rainbow {
        0% { filter: hue-rotate(0deg); }
        100% { filter: hue-rotate(360deg); }
    }
`;
document.head.appendChild(style);

// ===== EVENT LISTENERS =====

function initEventListeners() {
    // Navbar
    window.addEventListener('scroll', debounce(() => {
        handleNavbarScroll();
        updateActiveNavLink();
        handleScrollToTop();
    }));

    // Mobile menu
    mobileMenuToggle.addEventListener('click', toggleMobileMenu);

    // Close menu when clicking outside (on overlay)
    document.addEventListener('click', (e) => {
        if (navMenu.classList.contains('active') &&
            !navMenu.contains(e.target) &&
            !mobileMenuToggle.contains(e.target)) {
            closeMobileMenu();
        }
    });

    // Nav links
    navLinks.forEach(link => {
        link.addEventListener('click', smoothScroll);
    });

    // Availability badge: ensure external Calendly link opens (fallback for extensions/overlays)
    const availabilityBadge = document.querySelector('.availability-badge');
    if (availabilityBadge) {
        availabilityBadge.addEventListener('click', (e) => {
            const href = availabilityBadge.getAttribute('href');
            if (href && href.startsWith('http')) {
                // Open in a new tab/window as a fallback to anchor default behavior
                window.open(href, '_blank');
                // Prevent default to avoid potential duplicate navigation
                e.preventDefault();
            }
        });
    }

    // More aggressive fallback: capture pointerdown at document level and open Calendly
    document.addEventListener('pointerdown', (e) => {
        const target = e.target;
        const badge = target.closest ? target.closest('.availability-badge') : null;
        if (badge) {
            const href = badge.getAttribute('href');
            if (href && href.startsWith('http')) {
                // Small timeout to allow any native focus/visuals, but open before possible blocking handlers
                setTimeout(() => window.open(href, '_blank'), 10);
                e.preventDefault();
                e.stopPropagation();
            }
        }
    }, true); // use capture phase

    // Scroll to top button
    scrollToTopBtn.addEventListener('click', scrollToTop);

    // Contact form
    if (contactForm) {
        contactForm.addEventListener('submit', validateForm);
    }

    // Keyboard navigation
    document.addEventListener('keydown', handleKeyboardNav);
}

// ===== INITIALIZATION =====

function init() {
    console.log('%c🚀 Portfolio Sergio Sandoval',
        'color: #FF6600; font-size: 24px; font-weight: bold;');
    console.log('%c✨ Designed & Developed with ❤️',
        'color: #62929E; font-size: 14px;');

    // Initialize all features
    initEventListeners();
    initScrollAnimations();
    observeMetrics();
    initLazyLoading();
    initEasterEgg();

    // Set initial active nav link
    updateActiveNavLink();

    // Log performance on load
    window.addEventListener('load', () => {
        logPerformance();
    });
}

// Start everything when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}

// ===== EXPORT FOR MODULE USE (if needed) =====
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        init,
        smoothScroll,
        validateEmail
    };
}
