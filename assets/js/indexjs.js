// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
  // Initialize Lucide icons
  lucide.createIcons();
  
  // Set current year in footer
  document.getElementById('current-year').textContent = new Date().getFullYear();
  
  // Theme toggle functionality
  const body = document.documentElement;
  const themeToggle = document.getElementById('theme-toggle');
  const mobileThemeToggle = document.getElementById('mobile-theme-toggle');
  const moonIcons = document.querySelectorAll('.moon-icon');
  const sunIcons = document.querySelectorAll('.sun-icon');
  const themeLabel = document.querySelector('.theme-label');
  
  // Check for saved theme preference or use device preference
  const savedTheme = localStorage.getItem('theme');
  
  if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    body.classList.add('dark');
    moonIcons.forEach(icon => icon.classList.add('hidden'));
    sunIcons.forEach(icon => icon.classList.remove('hidden'));
    if (themeLabel) themeLabel.textContent = 'Light Mode';
  } else {
    body.classList.remove('dark');
    moonIcons.forEach(icon => icon.classList.remove('hidden'));
    sunIcons.forEach(icon => icon.classList.add('hidden'));
    if (themeLabel) themeLabel.textContent = 'Dark Mode';
  }
  
  // Theme toggle event handlers
  function toggleTheme() {
    if (body.classList.contains('dark')) {
      body.classList.remove('dark');
      localStorage.setItem('theme', 'light');
      moonIcons.forEach(icon => icon.classList.remove('hidden'));
      sunIcons.forEach(icon => icon.classList.add('hidden'));
      if (themeLabel) themeLabel.textContent = 'Dark Mode';
    } else {
      body.classList.add('dark');
      localStorage.setItem('theme', 'dark');
      moonIcons.forEach(icon => icon.classList.add('hidden'));
      sunIcons.forEach(icon => icon.classList.remove('hidden'));
      if (themeLabel) themeLabel.textContent = 'Light Mode';
    }
  }
  
  themeToggle.addEventListener('click', toggleTheme);
  mobileThemeToggle.addEventListener('click', toggleTheme);
  
  // Mobile menu functionality
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuIcon = document.querySelector('.menu-icon');
  const closeIcon = document.querySelector('.close-icon');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
  
  function toggleMobileMenu() {
    if (mobileMenu.classList.contains('open')) {
      mobileMenu.classList.remove('open');
      menuIcon.classList.remove('hidden');
      closeIcon.classList.add('hidden');
      document.body.style.overflow = '';
    } else {
      mobileMenu.classList.add('open');
      menuIcon.classList.add('hidden');
      closeIcon.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }
  }
  
  mobileMenuBtn.addEventListener('click', toggleMobileMenu);
  
  // Close mobile menu when clicking a nav link
  mobileNavLinks.forEach(link => {
    link.addEventListener('click', toggleMobileMenu);
  });
  
  // Navbar scroll effect
  const navbar = document.getElementById('navbar');
  
  function handleScroll() {
    if (window.scrollY > 10) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }
  
  window.addEventListener('scroll', handleScroll);
  
  // Initialize animations on scroll
  const animatedElements = document.querySelectorAll('.section-header, .about-content, .stats-grid, .clubs-grid, .events-grid, .contact-content');
  
  const animateOnScroll = (entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.querySelectorAll('.badge, h2, p, .club-card, .event-card, .about-image-container, .about-text, .stat-card, .contact-info, .contact-form-container')
          .forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            
            // Staggered delay based on index
            setTimeout(() => {
              element.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
              element.style.opacity = '1';
              element.style.transform = 'translateY(0)';
            }, 100 * index);
          });
        
        observer.unobserve(entry.target);
      }
    });
  };
  
  const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0.1
  };
  
  const observer = new IntersectionObserver(animateOnScroll, options);
  
  animatedElements.forEach(element => {
    observer.observe(element);
  });
  
  // Contact form submission
  const contactForm = document.getElementById('contactForm');
  const submitButton = document.getElementById('submitButton');
  const buttonText = submitButton.querySelector('.button-text');
  const buttonIcon = submitButton.querySelector('.btn-icon');
  const spinner = submitButton.querySelector('.spinner');
  const checkIcon = submitButton.querySelector('.check-icon');
  const toast = document.getElementById('toast');
  const toastClose = document.querySelector('.toast-close');
  
  contactForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show spinner, hide text and icon
    buttonText.textContent = 'Sending...';
    buttonIcon.classList.add('hidden');
    spinner.classList.remove('hidden');
    submitButton.disabled = true;
    
    // Simulate form submission (replace with actual form submission)
    setTimeout(() => {
      // Hide spinner, show check icon
      spinner.classList.add('hidden');
      buttonText.textContent = 'Message Sent';
      checkIcon.classList.remove('hidden');
      
      // Show toast notification
      toast.classList.remove('hidden');
      
      // Reset form after a delay
      setTimeout(() => {
        // Reset button
        buttonText.textContent = 'Send Message';
        checkIcon.classList.add('hidden');
        buttonIcon.classList.remove('hidden');
        submitButton.disabled = false;
        
        // Reset form
        contactForm.reset();
        
        // Hide toast after 5 seconds
        setTimeout(() => {
          closeToast();
        }, 5000);
      }, 3000);
    }, 1500);
  });
  
  // Close toast when clicking close button
  function closeToast() {
    toast.classList.add('toast-closing');
    setTimeout(() => {
      toast.classList.add('hidden');
      toast.classList.remove('toast-closing');
    }, 300);
  }
  
  toastClose.addEventListener('click', closeToast);
  
  // Create a placeholder SVG for demo
  createPlaceholderSVG();
});

// Function to create a placeholder SVG if image sources are '/placeholder.svg'
function createPlaceholderSVG() {
  // Create SVG Element
  const svgContent = `
  <svg xmlns="http://www.w3.org/2000/svg" width="800" height="600" viewBox="0 0 800 600">
    <rect width="800" height="600" fill="#f3f4f6" />
    <path d="M400 175 L550 325 L400 475 L250 325 Z" fill="#e5e7eb" stroke="#d1d5db" stroke-width="8" />
    <circle cx="400" cy="250" r="30" fill="#d1d5db" />
    <rect x="350" y="300" width="100" height="10" rx="5" fill="#d1d5db" />
    <rect x="375" y="320" width="50" height="10" rx="5" fill="#d1d5db" />
  </svg>
  `;
  
  // Convert SVG to data URL
  const svgBlob = new Blob([svgContent], { type: 'image/svg+xml' });
  const svgUrl = URL.createObjectURL(svgBlob);
  
  // Find all images with placeholder.svg and replace their src
  document.querySelectorAll('img[src="/placeholder.svg"]').forEach(img => {
    img.src = svgUrl;
  });
}