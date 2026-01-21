// ==========================================
// PARTICLES.JS CONFIGURATION
// ==========================================

// Initialize particles.js with optimized settings
if (typeof particlesJS !== 'undefined') {
    particlesJS('particles-js', {
        particles: {
            number: {
                value: 80,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: ['#FF6600', '#62929E', '#9A48D0', '#FF1493']
            },
            shape: {
                type: ['circle', 'triangle'],
                stroke: {
                    width: 0,
                    color: '#000000'
                }
            },
            opacity: {
                value: 0.3,
                random: true,
                anim: {
                    enable: true,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 4,
                random: true,
                anim: {
                    enable: true,
                    speed: 2,
                    size_min: 0.3,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#FF6600',
                opacity: 0.2,
                width: 1
            },
            move: {
                enable: true,
                speed: 1.5,
                direction: 'none',
                random: true,
                straight: false,
                out_mode: 'out',
                bounce: false,
                attract: {
                    enable: true,
                    rotateX: 600,
                    rotateY: 1200
                }
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'grab'
                },
                onclick: {
                    enable: true,
                    mode: 'push'
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 200,
                    line_linked: {
                        opacity: 0.5
                    }
                },
                push: {
                    particles_nb: 4
                },
                repulse: {
                    distance: 100,
                    duration: 0.4
                }
            }
        },
        retina_detect: true
    });
} else {
    console.warn('particles.js library not loaded. Skipping particles initialization.');
}

// Optimize particles for mobile devices
function optimizeParticlesForDevice() {
    if (window.innerWidth <= 768 && typeof pJSDom !== 'undefined' && pJSDom[0]) {
        // Reduce particle count on mobile
        pJSDom[0].pJS.particles.number.value = 30;
        pJSDom[0].pJS.particles.line_linked.enable = false;
        pJSDom[0].pJS.fn.particlesRefresh();
    }
}

// Call optimization on load and resize
window.addEventListener('load', optimizeParticlesForDevice);
window.addEventListener('resize', optimizeParticlesForDevice);
