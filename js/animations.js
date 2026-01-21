// ==========================================
// ADVANCED ANIMATIONS & INTERACTIONS
// ==========================================

// ===== PARALLAX EFFECT =====

function initParallax() {
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
            const speed = element.dataset.parallax || 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
}

// ===== CURSOR TRAIL EFFECT =====

function initCursorTrail() {
    const coords = { x: 0, y: 0 };
    const circles = document.querySelectorAll('.cursor-circle');
    
    if (circles.length === 0 && window.innerWidth > 768) {
        // Create cursor circles
        for (let i = 0; i < 20; i++) {
            const circle = document.createElement('div');
            circle.className = 'cursor-circle';
            circle.style.cssText = `
                position: fixed;
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: linear-gradient(135deg, #FF6600, #9A48D0);
                pointer-events: none;
                z-index: 9999;
                opacity: ${1 - i * 0.05};
                transition: transform 0.1s ease;
            `;
            document.body.appendChild(circle);
        }
    }
    
    const circles2 = document.querySelectorAll('.cursor-circle');
    
    window.addEventListener('mousemove', (e) => {
        coords.x = e.clientX;
        coords.y = e.clientY;
    });
    
    function animateCircles() {
        let x = coords.x;
        let y = coords.y;
        
        circles2.forEach((circle, index) => {
            circle.style.left = x - 5 + 'px';
            circle.style.top = y - 5 + 'px';
            circle.style.transform = `scale(${(circles2.length - index) / circles2.length})`;
            
            const nextCircle = circles2[index + 1] || circles2[0];
            x += (nextCircle.offsetLeft - x) * 0.3;
            y += (nextCircle.offsetTop - y) * 0.3;
        });
        
        requestAnimationFrame(animateCircles);
    }
    
    if (window.innerWidth > 768) {
        animateCircles();
    }
}

// ===== MAGNETIC BUTTONS =====

function initMagneticButtons() {
    const magneticButtons = document.querySelectorAll('.btn-primary');
    
    magneticButtons.forEach(button => {
        button.addEventListener('mousemove', (e) => {
            const rect = button.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            button.style.transform = `translate(${x * 0.2}px, ${y * 0.2}px)`;
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.transform = 'translate(0, 0)';
        });
    });
}

// ===== TEXT REVEAL ANIMATION =====

function initTextReveal() {
    const textElements = document.querySelectorAll('.reveal-text');
    
    textElements.forEach(element => {
        const text = element.textContent;
        element.innerHTML = '';
        
        text.split('').forEach((char, index) => {
            const span = document.createElement('span');
            span.textContent = char;
            span.style.cssText = `
                display: inline-block;
                opacity: 0;
                transform: translateY(20px);
                animation: revealChar 0.5s forwards;
                animation-delay: ${index * 0.03}s;
            `;
            element.appendChild(span);
        });
    });
}

// Add reveal animation to stylesheet
const revealStyle = document.createElement('style');
revealStyle.textContent = `
    @keyframes revealChar {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(revealStyle);

// ===== TILT EFFECT FOR CARDS =====

function initTiltEffect() {
    const tiltCards = document.querySelectorAll('.project-card, .skill-category');
    
    tiltCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
        });
    });
}

// ===== PROGRESS BAR ANIMATION =====

function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-bar');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.dataset.width || '100';
                bar.style.width = width + '%';
            }
        });
    }, { threshold: 0.5 });
    
    progressBars.forEach(bar => observer.observe(bar));
}

// ===== TYPEWRITER EFFECT =====

function typewriterEffect(element, text, speed = 50) {
    let i = 0;
    element.textContent = '';
    
    function type() {
        if (i < text.length) {
            element.textContent += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

// ===== SCROLL PROGRESS INDICATOR =====

function initScrollProgress() {
    // Create progress bar
    const progressBar = document.createElement('div');
    progressBar.id = 'scroll-progress';
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        height: 4px;
        background: linear-gradient(to right, #FF6600, #9A48D0);
        z-index: 10000;
        transition: width 0.1s ease;
        width: 0;
    `;
    document.body.appendChild(progressBar);
    
    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });
}

// ===== IMAGE HOVER EFFECT =====

function initImageHoverEffect() {
    const images = document.querySelectorAll('.project-image-placeholder');
    
    images.forEach(image => {
        image.addEventListener('mousemove', (e) => {
            const rect = image.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const moveX = (x / rect.width - 0.5) * 20;
            const moveY = (y / rect.height - 0.5) * 20;
            
            const icon = image.querySelector('i');
            const logo = image.querySelector('.project-logo');
            
            if (icon) {
                icon.style.transform = `translate(${moveX}px, ${moveY}px)`;
            }
            if (logo) {
                logo.style.transform = `translate(${-moveX * 0.5}px, ${-moveY * 0.5}px)`;
            }
        });
        
        image.addEventListener('mouseleave', () => {
            const icon = image.querySelector('i');
            const logo = image.querySelector('.project-logo');
            
            if (icon) {
                icon.style.transform = 'translate(0, 0)';
            }
            if (logo) {
                logo.style.transform = 'translate(0, 0)';
            }
        });
    });
}

// ===== STAGGER ANIMATION FOR LISTS =====

function initStaggerAnimation() {
    const lists = document.querySelectorAll('.skills-list, .tags-container');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const items = entry.target.children;
                Array.from(items).forEach((item, index) => {
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'translateX(0)';
                    }, index * 50);
                });
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });
    
    lists.forEach(list => {
        const items = list.children;
        Array.from(items).forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateX(-20px)';
            item.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        });
        observer.observe(list);
    });
}

// ===== RIPPLE EFFECT ON CLICK =====

function createRipple(event) {
    const button = event.currentTarget;
    const circle = document.createElement('span');
    const diameter = Math.max(button.clientWidth, button.clientHeight);
    const radius = diameter / 2;
    
    circle.style.cssText = `
        position: absolute;
        width: ${diameter}px;
        height: ${diameter}px;
        left: ${event.clientX - button.offsetLeft - radius}px;
        top: ${event.clientY - button.offsetTop - radius}px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s ease-out;
        pointer-events: none;
    `;
    
    const ripple = button.querySelector('.ripple-effect');
    if (ripple) {
        ripple.remove();
    }
    
    circle.className = 'ripple-effect';
    button.appendChild(circle);
}

// Add ripple animation
const rippleStyle = document.createElement('style');
rippleStyle.textContent = `
    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }
    
    .btn {
        position: relative;
        overflow: hidden;
    }
`;
document.head.appendChild(rippleStyle);

// Apply ripple to buttons
document.querySelectorAll('.btn').forEach(button => {
    button.addEventListener('click', createRipple);
});

// ===== NUMBER COUNTING ANIMATION =====

function countAnimation(element, start, end, duration) {
    const range = end - start;
    const increment = range / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if ((increment > 0 && current >= end) || (increment < 0 && current <= end)) {
            element.textContent = end;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// ===== GLITCH EFFECT =====

function initGlitchEffect() {
    const glitchElements = document.querySelectorAll('.glitch');
    
    glitchElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.classList.add('active-glitch');
            setTimeout(() => {
                element.classList.remove('active-glitch');
            }, 500);
        });
    });
}

// ===== INITIALIZE ALL ANIMATIONS =====

function initAdvancedAnimations() {
    // Check if user prefers reduced motion
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    
    if (!prefersReducedMotion) {
        // initParallax(); // Commented out by default
        // initCursorTrail(); // Optional - can be enabled
        initMagneticButtons();
        initTiltEffect();
        animateProgressBars();
        initScrollProgress();
        initImageHoverEffect();
        initStaggerAnimation();
    }
    
    // These work fine with reduced motion
    // initTextReveal(); // Optional
    initGlitchEffect();
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initAdvancedAnimations);
} else {
    initAdvancedAnimations();
}

// Export functions for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initAdvancedAnimations,
        typewriterEffect,
        countAnimation
    };
}
