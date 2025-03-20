/**
 * ClubHub Main JavaScript
 * Handles theme switching, animations, and interactions
 */

document.addEventListener('DOMContentLoaded', function() {
    // Theme toggle functionality
    const themeToggle = document.querySelector('.theme-toggle');
    const themeIcon = themeToggle.querySelector('i');
    
    // Check for saved theme preference
    const savedTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', savedTheme);
    updateThemeIcon(savedTheme === 'dark');
    
    // Theme toggle click handler
    themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateThemeIcon(newTheme === 'dark');
    });
    
    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Mobile menu toggle
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler) {
        navbarToggler.addEventListener('click', () => {
            navbarCollapse.classList.toggle('show');
        });
    }
    
    // Back to top button
    const backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 100) {
                backToTop.classList.add('active');
            } else {
                backToTop.classList.remove('active');
            }
        });
        
        backToTop.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Contact form submission
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // Add form submission logic here
            alert('Thank you for your message! We will get back to you soon.');
            this.reset();
        });
    }
    
    // Hide loader when page is loaded
    setTimeout(() => {
        document.querySelector('.loading').classList.add('hidden');
    }, 1000);
});

// Helper function to update theme icon
function updateThemeIcon(isDark) {
    const icon = document.querySelector('.theme-toggle i');
    if (icon) {
        icon.className = isDark ? 'fas fa-moon' : 'fas fa-sun';
    }
}

// Animation Functions
function initializeAnimations() {
    initFadeAnimations();
    createBackgroundAnimation();
    initializeParallax();
    initializeTilt();
    initTextReveal();
    if (document.querySelector('.wave-container')) {
        createWaveAnimation();
    }
}

function initFadeAnimations() {
    const fadeElements = document.querySelectorAll('.fade-in');
    const staggerElements = document.querySelectorAll('.stagger-fade-in');
    
    const fadeOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -100px 0px"
    };
    
    // Fade in observer
    const fadeObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('appear');
                observer.unobserve(entry.target);
            }
        });
    }, fadeOptions);
    
    fadeElements.forEach(element => fadeObserver.observe(element));
    
    // Staggered fade in
    const staggerObserver = new IntersectionObserver((entries, observer) => {
        let delay = 0;
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationDelay = `${delay}s`;
                entry.target.classList.add('appear');
                delay += 0.1;
                observer.unobserve(entry.target);
            }
        });
    }, fadeOptions);
    
    staggerElements.forEach(element => staggerObserver.observe(element));
}

function createBackgroundAnimation() {
    const sections = document.querySelectorAll('.with-bg-animation');
    
    sections.forEach(section => {
        const bgAnimation = document.createElement('div');
        bgAnimation.className = 'bg-animation';
        
        for (let i = 0; i < 3; i++) {
            const circle = document.createElement('div');
            circle.className = 'bg-circle';
            bgAnimation.appendChild(circle);
        }
        
        section.appendChild(bgAnimation);
    });
}

function initializeParallax() {
    const parallaxElements = document.querySelectorAll('.parallax');
    
    window.addEventListener('scroll', () => {
        parallaxElements.forEach(element => {
            const distance = window.scrollY;
            const parallaxBg = element.querySelector('.parallax-bg');
            
            if (parallaxBg) {
                parallaxBg.style.transform = `translateY(${distance * 0.3}px)`;
            }
        });
    });
}

function initializeTilt() {
    const tiltElements = document.querySelectorAll('.tilt-effect');
    
    tiltElements.forEach(element => {
        element.addEventListener('mousemove', (e) => {
            const rect = element.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const xPercent = x / rect.width;
            const yPercent = y / rect.height;
            
            const xRotation = (yPercent - 0.5) * 10;
            const yRotation = (0.5 - xPercent) * 10;
            
            element.style.transform = `perspective(1000px) rotateX(${xRotation}deg) rotateY(${yRotation}deg)`;
        });
        
        element.addEventListener('mouseleave', () => {
            element.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });
    });
}

function createWaveAnimation() {
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    
    canvas.width = window.innerWidth;
    canvas.height = 200;
    canvas.style.cssText = 'position:absolute;bottom:0;left:0;width:100%;z-index:1;';
    
    document.querySelector('.wave-container').appendChild(canvas);
    
    let time = 0;
    const waves = [
        {
            amplitude: 20,
            frequency: 0.005,
            speed: 0.05,
            color: 'rgba(var(--primary-rgb), 0.3)'
        },
        {
            amplitude: 15,
            frequency: 0.015,
            speed: 0.03,
            color: 'rgba(var(--accent-rgb), 0.2)'
        }
    ];
    
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        waves.forEach(wave => {
            ctx.beginPath();
            ctx.moveTo(0, canvas.height / 2);
            
            for (let x = 0; x < canvas.width; x++) {
                const y = canvas.height / 2 + 
                  Math.sin(x * wave.frequency + time * wave.speed) * 
                  wave.amplitude;
                ctx.lineTo(x, y);
            }
            
            ctx.lineTo(canvas.width, canvas.height);
            ctx.lineTo(0, canvas.height);
            ctx.closePath();
            
            ctx.fillStyle = wave.color;
            ctx.fill();
        });
        
        time++;
        requestAnimationFrame(animate);
    }
    
    animate();
    
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
    });
}

function initTextReveal() {
    document.querySelectorAll('.text-reveal').forEach(element => {
        const text = element.textContent;
        element.innerHTML = '';
        
        [...text].forEach((char, i) => {
            const span = document.createElement('span');
            span.textContent = char;
            span.style.animationDelay = `${i * 0.05}s`;
            element.appendChild(span);
        });
    });
}

// Navigation Functions
function initializeNavigation() {
    const header = document.querySelector('.header');
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const navLinks = document.querySelector('.nav-links');
    
    // Mobile navigation toggle
    mobileNavToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        mobileNavToggle.textContent = navLinks.classList.contains('active') ? '✕' : '☰';
    });
    
    // Header scroll effect
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 50);
    });
    
    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', e => {
            e.preventDefault();
            
            if (navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileNavToggle.textContent = '☰';
            }
            
            const targetId = anchor.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Form Functions
function initializeForms() {
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactSubmit);
    }
}

function handleContactSubmit(e) {
    e.preventDefault();
    
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;
    
    if (!name || !email || !message) {
        alert('Please fill out all fields.');
        return;
    }
    
    // Display success message (in real implementation, would send to server)
    this.innerHTML = `
        <div class="text-center">
            <h3 class="mb-4">Thanks for your message!</h3>
            <p>We'll get back to you soon, ${name}.</p>
        </div>
    `;
}
