<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClubHub - BVM College</title>
  <link rel="stylesheet" href="assets/css/indexstyle.css">
  <link href="https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@400;500;600;700&family=SF+Mono&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
  <div id="root">
    <main class="min-h-screen">
      <!-- Navbar -->
      <header class="navbar" id="navbar">
        <div class="navbar-container">
          <a href="#" class="logo">
            <div class="logo-text">
              <span class="logo-letter">C</span>
              <span class="logo-text-part">lub</span>
              <span class="logo-letter">H</span>
              <span class="logo-text-part">ub</span>
            </div>
          </a>

          <nav class="desktop-nav">
            <a href="#" class="nav-link">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#clubs" class="nav-link">Clubs</a>
            <a href="#events" class="nav-link">Events</a>
            <a href="#contact" class="nav-link">Contact Us</a>
          </nav>

          <div class="desktop-actions">
            <button id="theme-toggle" class="theme-toggle">
              <i data-lucide="moon" class="theme-icon moon-icon"></i>
              <i data-lucide="sun" class="theme-icon sun-icon hidden"></i>
            </button>
            <a href="login.php" class="btn-secondary">Login</a>
            <a href="register.php" class="btn-primary">Register</a>
          </div>

          <button id="mobile-menu-btn" class="mobile-menu-btn">
            <i data-lucide="menu" class="menu-icon"></i>
            <i data-lucide="x" class="close-icon hidden"></i>
          </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu">
          <div class="mobile-menu-container">
            <a href="#" class="mobile-nav-link">Home</a>
            <a href="#about" class="mobile-nav-link">About</a>
            <a href="#clubs" class="mobile-nav-link">Clubs</a>
            <a href="#events" class="mobile-nav-link">Events</a>
            <a href="#contact" class="mobile-nav-link">Contact Us</a>
            
            <button id="mobile-theme-toggle" class="mobile-theme-toggle">
              <i data-lucide="moon" class="theme-icon moon-icon"></i>
              <i data-lucide="sun" class="theme-icon sun-icon hidden"></i>
              <span class="theme-label">Dark Mode</span>
            </button>
            
            <div class="mobile-actions">
              <a href="#login" class="btn-secondary">Login</a>
              <a href="#register" class="btn-primary">Register</a>
            </div>
          </div>
        </div>
      </header>

      <!-- Hero Section -->
      <section class="hero-section">
        <div class="bg-effect-1"></div>
        <div class="bg-effect-2"></div>

        <div class="container hero-container">
          <!-- Text Content -->
          <div class="hero-content">
            <span class="badge animate-item">BVM College ClubHub</span>
            
            <h1 class="hero-title animate-item">
              Discover Your <span class="text-gradient">Passion</span> at BVM College
            </h1>
            
            <p class="hero-description animate-item">
              Join clubs, attend events, and connect with like-minded students at Birla Vishvakarma Mahavidyalaya.
            </p>
            
            <div class="hero-actions animate-item">
              <a href="#clubs" class="btn-primary">
                Explore Clubs
                <i data-lucide="arrow-right" class="btn-icon"></i>
              </a>
              <a href="#events" class="btn-secondary">Upcoming Events</a>
            </div>
          </div>
          
          <!-- Hero Image -->
          <div class="hero-image-container animate-item">
            <div class="image-wrapper">
              <div class="image-glow"></div>
              <div class="image-card">
                <img src="/placeholder.svg" alt="BVM College Students" class="hero-image">
                
                <!-- Floating Stats Pill -->
                <div class="stats-pill">
                  <div class="stats-dot"></div>
                  <span class="stats-text">20+ Active Clubs</span>
                </div>
                
                <!-- Floating Activity Card -->
                <div class="activity-card">
                  <div class="activity-header">
                    <div class="activity-dot"></div>
                    <p class="activity-title">Student Activity Dashboard</p>
                  </div>
                  <div class="activity-stats">
                    <div class="stat-item">
                      <p class="stat-label">Events</p>
                      <p class="stat-value">47</p>
                    </div>
                    <div class="stat-item">
                      <p class="stat-label">Clubs</p>
                      <p class="stat-value">24</p>
                    </div>
                    <div class="stat-item">
                      <p class="stat-label">Members</p>
                      <p class="stat-value">1.2K</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
          <div class="scroll-icon">
            <div class="scroll-dot"></div>
          </div>
          <span class="scroll-text">Scroll Down</span>
        </div>
      </section>

      <!-- About Section -->
      <section id="about" class="about-section">
        <div class="bg-effect-3"></div>
        <div class="bg-effect-4"></div>

        <div class="container">
          <div class="section-header">
            <div class="badge">
              <i data-lucide="info" class="badge-icon"></i>
              <span>About ClubHub</span>
            </div>
            
            <h2 class="section-title">Unlocking Student Potential</h2>
            
            <p class="section-description">
              ClubHub is more than just a platform—it's a gateway to a vibrant community of students 
              who share your interests and passions.
            </p>
          </div>

          <div class="about-content">
            <!-- Image Side -->
            <div class="about-image-container">
              <div class="about-image-glow"></div>
              <div class="about-image-card">
                <div class="about-image-wrapper">
                  <img src="/placeholder.svg" alt="BVM College Campus" class="about-image">
                </div>
              </div>
            </div>

            <!-- Content Side -->
            <div class="about-text">
              <div class="info-card bvm-card">
                <div class="info-icon-wrapper blue">
                  <i data-lucide="school" class="info-icon"></i>
                </div>
                <div>
                  <h3 class="info-title">BVM College</h3>
                  <p class="info-description">
                    Established in 1948, Birla Vishvakarma Mahavidyalaya is one of Gujarat's oldest and most prestigious engineering colleges, 
                    with a rich history of academic excellence and innovation.
                  </p>
                </div>
              </div>

              <div class="info-card clubhub-card">
                <div class="info-icon-wrapper orange">
                  <i data-lucide="users" class="info-icon"></i>
                </div>
                <div>
                  <h3 class="info-title">What is ClubHub?</h3>
                  <p class="info-description">
                    ClubHub is a comprehensive platform for students to discover and engage with clubs, 
                    register for events, showcase their talents, and connect with peers who share their interests.
                  </p>
                </div>
              </div>

              <div class="tag-cloud">
                <span class="tag">Social</span>
                <span class="tag">Technical</span>
                <span class="tag">Cultural</span>
                <span class="tag">Sports</span>
                <span class="tag">Academic</span>
                <span class="tag">Innovation</span>
              </div>
            </div>
          </div>

          <!-- Stats -->
          <div class="stats-grid">
            <div class="stat-card">
              <p class="stat-number">24+</p>
              <p class="stat-label">Active Clubs</p>
            </div>
            <div class="stat-card">
              <p class="stat-number">50+</p>
              <p class="stat-label">Events Per Year</p>
            </div>
            <div class="stat-card">
              <p class="stat-number">3,000+</p>
              <p class="stat-label">Students</p>
            </div>
            <div class="stat-card">
              <p class="stat-number">75+</p>
              <p class="stat-label">Faculty Mentors</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Clubs Section -->
      <section id="clubs" class="clubs-section">
        <div class="bg-effect-5"></div>

        <div class="container">
          <div class="section-header">
            <div class="badge">
              <i data-lucide="activity" class="badge-icon"></i>
              <span>Explore</span>
            </div>
            
            <h2 class="section-title">Featured Clubs</h2>
            
            <p class="section-description">
              Discover and join student clubs that match your interests and help you develop new skills.
            </p>
          </div>

          <div class="clubs-grid">
            <!-- Club 1 -->
            <div class="club-card">
              <div class="club-icon-wrapper blue">
                <i data-lucide="code" class="club-icon"></i>
              </div>
              <h3 class="club-name">Coding Club</h3>
              <p class="club-description">Learn programming, participate in hackathons, and develop your tech skills.</p>
              <div class="club-stats">
                <span>128 members</span>
                <span>12 events/year</span>
              </div>
              <div class="club-footer">
                <a href="#" class="club-link">
                  <span>Learn more</span>
                  <i data-lucide="chevron-right" class="link-icon"></i>
                </a>
              </div>
            </div>

            <!-- Club 2 -->
            <div class="club-card">
              <div class="club-icon-wrapper green">
                <i data-lucide="book-open" class="club-icon"></i>
              </div>
              <h3 class="club-name">Innovation Hub</h3>
              <p class="club-description">Transform your ideas into reality with our innovation and entrepreneurship club.</p>
              <div class="club-stats">
                <span>98 members</span>
                <span>8 events/year</span>
              </div>
              <div class="club-footer">
                <a href="#" class="club-link">
                  <span>Learn more</span>
                  <i data-lucide="chevron-right" class="link-icon"></i>
                </a>
              </div>
            </div>

            <!-- Club 3 -->
            <div class="club-card">
              <div class="club-icon-wrapper purple">
                <i data-lucide="music" class="club-icon"></i>
              </div>
              <h3 class="club-name">Music Society</h3>
              <p class="club-description">Express yourself through music, join band practice, and perform at college events.</p>
              <div class="club-stats">
                <span>75 members</span>
                <span>15 events/year</span>
              </div>
              <div class="club-footer">
                <a href="#" class="club-link">
                  <span>Learn more</span>
                  <i data-lucide="chevron-right" class="link-icon"></i>
                </a>
              </div>
            </div>

            <!-- Club 4 -->
            <div class="club-card">
              <div class="club-icon-wrapper amber">
                <i data-lucide="camera" class="club-icon"></i>
              </div>
              <h3 class="club-name">Photography Club</h3>
              <p class="club-description">Capture moments, learn photography techniques, and showcase your creativity.</p>
              <div class="club-stats">
                <span>64 members</span>
                <span>9 events/year</span>
              </div>
              <div class="club-footer">
                <a href="#" class="club-link">
                  <span>Learn more</span>
                  <i data-lucide="chevron-right" class="link-icon"></i>
                </a>
              </div>
            </div>

            <!-- Club 5 -->
            <div class="club-card">
              <div class="club-icon-wrapper red">
                <i data-lucide="activity" class="club-icon"></i>
              </div>
              <h3 class="club-name">Sports Club</h3>
              <p class="club-description">Stay active, compete in tournaments, and build teamwork through sports activities.</p>
              <div class="club-stats">
                <span>156 members</span>
                <span>24 events/year</span>
              </div>
              <div class="club-footer">
                <a href="#" class="club-link">
                  <span>Learn more</span>
                  <i data-lucide="chevron-right" class="link-icon"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="section-footer">
            <a href="#" class="btn-secondary">
              View All Clubs
              <i data-lucide="chevron-right" class="btn-icon"></i>
            </a>
          </div>
        </div>
      </section>

      <!-- Events Section -->
      <section id="events" class="events-section">
        <div class="bg-effect-6"></div>

        <div class="container">
          <div class="events-header">
            <div>
              <div class="badge orange">
                <i data-lucide="calendar" class="badge-icon"></i>
                <span>Mark Your Calendar</span>
              </div>
              
              <h2 class="section-title">Upcoming Events</h2>
              
              <p class="section-description">
                Stay updated with the latest events happening at BVM College and never miss an opportunity.
              </p>
            </div>
            
            <a href="#" class="view-all-link">
              View all events
              <i data-lucide="arrow-right" class="link-icon"></i>
            </a>
          </div>

          <div class="events-grid">
            <!-- Event 1 -->
            <div class="event-card">
              <div class="event-image-container">
                <img src="/placeholder.svg" alt="TechFest 2023" class="event-image">
                <div class="event-date-pill">
                  <i data-lucide="clock" class="date-icon"></i>
                  <span>November 15, 2023</span>
                </div>
              </div>
              
              <div class="event-content">
                <h3 class="event-title">TechFest 2023</h3>
                
                <div class="event-details">
                  <div class="event-detail">
                    <i data-lucide="clock" class="detail-icon"></i>
                    <span>10:00 AM - 5:00 PM</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="map-pin" class="detail-icon"></i>
                    <span>Main Auditorium</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="users" class="detail-icon"></i>
                    <span>240 attending</span>
                  </div>
                </div>
                
                <div class="event-footer">
                  <span class="event-organizer">Coding Club</span>
                  <a href="#" class="register-link">
                    Register
                    <i data-lucide="arrow-right" class="link-icon-sm"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event 2 -->
            <div class="event-card">
              <div class="event-image-container">
                <img src="/placeholder.svg" alt="Cultural Night" class="event-image">
                <div class="event-date-pill">
                  <i data-lucide="clock" class="date-icon"></i>
                  <span>November 28, 2023</span>
                </div>
              </div>
              
              <div class="event-content">
                <h3 class="event-title">Cultural Night</h3>
                
                <div class="event-details">
                  <div class="event-detail">
                    <i data-lucide="clock" class="detail-icon"></i>
                    <span>6:00 PM - 10:00 PM</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="map-pin" class="detail-icon"></i>
                    <span>Open Air Theatre</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="users" class="detail-icon"></i>
                    <span>350 attending</span>
                  </div>
                </div>
                
                <div class="event-footer">
                  <span class="event-organizer">Cultural Committee</span>
                  <a href="#" class="register-link">
                    Register
                    <i data-lucide="arrow-right" class="link-icon-sm"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event 3 -->
            <div class="event-card">
              <div class="event-image-container">
                <img src="/placeholder.svg" alt="Startup Bootcamp" class="event-image">
                <div class="event-date-pill">
                  <i data-lucide="clock" class="date-icon"></i>
                  <span>December 10, 2023</span>
                </div>
              </div>
              
              <div class="event-content">
                <h3 class="event-title">Startup Bootcamp</h3>
                
                <div class="event-details">
                  <div class="event-detail">
                    <i data-lucide="clock" class="detail-icon"></i>
                    <span>9:00 AM - 4:00 PM</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="map-pin" class="detail-icon"></i>
                    <span>Entrepreneurship Centre</span>
                  </div>
                  
                  <div class="event-detail">
                    <i data-lucide="users" class="detail-icon"></i>
                    <span>120 attending</span>
                  </div>
                </div>
                
                <div class="event-footer">
                  <span class="event-organizer">Innovation Hub</span>
                  <a href="#" class="register-link">
                    Register
                    <i data-lucide="arrow-right" class="link-icon-sm"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Section -->
      <section id="contact" class="contact-section">
        <div class="bg-effect-7"></div>

        <div class="container">
          <div class="section-header">
            <div class="badge">
              <i data-lucide="mail" class="badge-icon"></i>
              <span>Get in Touch</span>
            </div>
            
            <h2 class="section-title">Contact Us</h2>
            
            <p class="section-description">
              Have questions about clubs or events? Feel free to reach out to us.
            </p>
          </div>

          <div class="contact-content">
            <!-- Contact Information -->
            <div class="contact-info">
              <h3 class="contact-title">Get in Touch</h3>
              
              <div class="contact-details">
                <div class="contact-item">
                  <div class="contact-icon-wrapper">
                    <i data-lucide="mail" class="contact-icon"></i>
                  </div>
                  <div>
                    <h4 class="contact-item-title">Email Us</h4>
                    <p class="contact-item-detail">clubhub@bvmengineering.ac.in</p>
                    <p class="contact-item-detail">support@bvmcollege.edu</p>
                  </div>
                </div>
                
                <div class="contact-item">
                  <div class="contact-icon-wrapper">
                    <i data-lucide="phone" class="contact-icon"></i>
                  </div>
                  <div>
                    <h4 class="contact-item-title">Call Us</h4>
                    <p class="contact-item-detail">+91 123 456 7890</p>
                    <p class="contact-item-detail">+91 098 765 4321</p>
                  </div>
                </div>
                
                <div class="contact-item">
                  <div class="contact-icon-wrapper">
                    <i data-lucide="map-pin" class="contact-icon"></i>
                  </div>
                  <div>
                    <h4 class="contact-item-title">Visit Us</h4>
                    <p class="contact-item-detail">
                      Birla Vishvakarma Mahavidyalaya<br>
                      Vallabh Vidyanagar, Anand<br>
                      Gujarat, India - 388120
                    </p>
                  </div>
                </div>
              </div>
              
              <div class="social-links">
                <h4 class="social-title">Follow Us</h4>
                <div class="social-icons">
                  <a href="#" class="social-icon">
                    <i data-lucide="facebook" class="icon"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i data-lucide="twitter" class="icon"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i data-lucide="instagram" class="icon"></i>
                  </a>
                  <a href="#" class="social-icon">
                    <i data-lucide="linkedin" class="icon"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-container">
              <div class="contact-form-card">
                <h3 class="contact-form-title">Send a Message</h3>
                
                <form id="contactForm" class="contact-form">
                  <div class="form-row">
                    <div class="form-group">
                      <label for="name" class="form-label">Your Name</label>
                      <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="form-input"
                        placeholder="John Doe"
                      >
                    </div>
                    
                    <div class="form-group">
                      <label for="email" class="form-label">Your Email</label>
                      <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="form-input"
                        placeholder="john@example.com"
                      >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input
                      type="text"
                      id="subject"
                      name="subject"
                      required
                      class="form-input"
                      placeholder="How can we help you?"
                    >
                  </div>
                  
                  <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea
                      id="message"
                      name="message"
                      required
                      rows="4"
                      class="form-textarea"
                      placeholder="Your message here..."
                    ></textarea>
                  </div>
                  
                  <button
                    type="submit"
                    id="submitButton"
                    class="submit-button btn-primary"
                  >
                    <span class="button-text">Send Message</span>
                    <i data-lucide="arrow-right" class="btn-icon"></i>
                    <div class="spinner hidden"></div>
                    <i data-lucide="check" class="check-icon hidden"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="footer">
        <div class="footer-container">
          <div class="footer-content">
            <!-- Logo & Info -->
            <div class="footer-info">
              <div class="footer-logo">
                <span class="footer-logo-text">
                  Club<span class="footer-logo-blue">Hub</span>
                </span>
              </div>
              
              <p class="footer-description">
                Connecting students with clubs and activities that match their interests and help them grow.
              </p>
              
              <div class="footer-social">
                <a href="#" class="footer-social-icon">
                  <i data-lucide="facebook" class="icon"></i>
                </a>
                <a href="#" class="footer-social-icon">
                  <i data-lucide="twitter" class="icon"></i>
                </a>
                <a href="#" class="footer-social-icon">
                  <i data-lucide="instagram" class="icon"></i>
                </a>
                <a href="#" class="footer-social-icon">
                  <i data-lucide="linkedin" class="icon"></i>
                </a>
              </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-links">
              <h4 class="footer-title">Quick Links</h4>
              <ul class="footer-link-list">
                <li class="footer-link-item">
                  <a href="#" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>Home</span>
                  </a>
                </li>
                <li class="footer-link-item">
                  <a href="#about" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>About</span>
                  </a>
                </li>
                <li class="footer-link-item">
                  <a href="#clubs" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>Clubs</span>
                  </a>
                </li>
                <li class="footer-link-item">
                  <a href="#events" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>Events</span>
                  </a>
                </li>
                <li class="footer-link-item">
                  <a href="#" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>Gallery</span>
                  </a>
                </li>
                <li class="footer-link-item">
                  <a href="#" class="footer-link">
                    <i data-lucide="chevron-right" class="footer-link-icon"></i>
                    <span>FAQ</span>
                  </a>
                </li>
              </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="footer-contact">
              <h4 class="footer-title">Contact Info</h4>
              <ul class="footer-contact-list">
                <li class="footer-contact-item">
                  <i data-lucide="map-pin" class="footer-contact-icon"></i>
                  <span class="footer-contact-text">
                    Birla Vishvakarma Mahavidyalaya<br>
                    Vallabh Vidyanagar, Gujarat
                  </span>
                </li>
                <li class="footer-contact-item">
                  <i data-lucide="phone" class="footer-contact-icon"></i>
                  <span class="footer-contact-text">+91 123 456 7890</span>
                </li>
                <li class="footer-contact-item">
                  <i data-lucide="mail" class="footer-contact-icon"></i>
                  <span class="footer-contact-text">info@bvmclubhub.edu</span>
                </li>
              </ul>
            </div>
            
            <!-- Newsletter -->
            <div class="footer-newsletter">
              <h4 class="footer-title">Newsletter</h4>
              <p class="footer-newsletter-text">
                Subscribe to stay updated with the latest events and club activities.
              </p>
              <form class="footer-form">
                <div class="footer-form-group">
                  <input
                    type="email"
                    placeholder="Your Email"
                    class="footer-input"
                  >
                </div>
                <button type="submit" class="footer-subscribe">
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          
          <div class="footer-bottom">
            <p class="footer-copyright">
              © <span id="current-year"></span> ClubHub | BVM College. All rights reserved.
            </p>
            <div class="footer-bottom-links">
              <a href="#" class="footer-bottom-link">Privacy Policy</a>
              <a href="#" class="footer-bottom-link">Terms of Service</a>
              <a href="#" class="footer-bottom-link">Cookies</a>
            </div>
          </div>
        </div>
      </footer>

      <!-- Toast Notification -->
      <div id="toast" class="toast hidden">
        <div class="toast-content">
          <i data-lucide="check-circle" class="toast-icon"></i>
          <div class="toast-message">
            <span class="toast-title">Success!</span>
            <span class="toast-description">Your message has been sent successfully!</span>
          </div>
        </div>
        <button class="toast-close">
          <i data-lucide="x" class="close-icon-small"></i>
        </button>
      </div>
    </main>
  </div>

  <script src="assets/js/indexjs.js"></script>
</body>
</html>
