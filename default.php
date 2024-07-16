<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkHub - Your Personal Link Management App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        body {
            color: var(--dark-color);
            position: relative;
        }
        .navbar {
            background-color: var(--primary-color) !important;
            transition: background-color 0.3s ease;
        }
        .navbar-light .navbar-brand,
        .navbar-light .navbar-nav .nav-link {
            color: var(--light-color);
        }
        .hero {
            background-image: linear-gradient(rgba(46, 204, 113, 0.8), rgba(39, 174, 96, 0.8)), url('/api/placeholder/1600/900');
            background-size: cover;
            background-position: center;
            color: var(--light-color);
            padding: 100px 0;
        }
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        .btn-primary:hover {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        .cta-section {
            background-color: var(--light-color);
        }
        .example-page {
            border: 1px solid var(--primary-color);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            height: 100%;
        }
        .example-page:hover {
            transform: translateY(-10px);
        }
        .social-icons {
            font-size: 2rem;
        }
        .social-icons a {
            color: var(--primary-color);
            margin: 0 10px;
            transition: color 0.3s ease-in-out;
        }
        .social-icons a:hover {
            color: var(--secondary-color);
        }
        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .review-card {
            background-color: var(--light-color);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            height: 100%;
        }
        .counter-item {
            text-align: center;
            padding: 20px;
            background-color: var(--primary-color);
            color: var(--light-color);
            border-radius: 10px;
        }
        .counter-number {
            font-size: 2.5rem;
            font-weight: bold;
        }
        #goToTop {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 99;
        }
        footer {
            background-color: var(--primary-color);
            color: var(--light-color);
        }
        @media (max-width: 768px) {
            .hero {
                padding: 50px 0;
            }
            .feature-icon {
                font-size: 2.5rem;
            }
            .social-icons {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">LinkHub</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#examples">Examples</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-light" href="#download">Download App</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div class="container text-center">
            <h1 class="display-4" data-aos="fade-down">Welcome to LinkHub</h1>
            <p class="lead" data-aos="fade-up" data-aos-delay="200">Your all-in-one solution for managing and sharing your important links</p>
            <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                <a href="#" class="btn btn-light btn-lg mr-2"><i class="fab fa-apple mr-2"></i>App Store</a>
                <a href="#" class="btn btn-light btn-lg"><i class="fab fa-google-play mr-2"></i>Google Play</a>
            </div>
        </div>
    </header>

    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Key Features</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-link feature-icon"></i>
                    <h3>Centralized Links</h3>
                    <p>Keep all your important links in one place for easy access and sharing.</p>
                </div>
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-palette feature-icon"></i>
                    <h3>Customizable Profiles</h3>
                    <p>Personalize your profile with custom themes and layouts.</p>
                </div>
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="600">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3>Analytics</h3>
                    <p>Track link clicks and profile views with our built-in analytics.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="examples" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Example Pages</h2>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="flip-left" data-aos-delay="200">
                    <div class="example-page">
                        <img src="/api/placeholder/400/300" alt="Creator Profile" class="img-fluid">
                        <div class="p-3">
                            <h4>Creator Profile</h4>
                            <p>Perfect for artists and content creators to showcase their work and social media.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="flip-left" data-aos-delay="400">
                    <div class="example-page">
                        <img src="/api/placeholder/400/300" alt="Business Card" class="img-fluid">
                        <div class="p-3">
                            <h4>Digital Business Card</h4>
                            <p>A modern way to share your professional information and portfolio.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="flip-left" data-aos-delay="600">
                    <div class="example-page">
                        <img src="/api/placeholder/400/300" alt="Event Page" class="img-fluid">
                        <div class="p-3">
                            <h4>Event Page</h4>
                            <p>Organize all your event details and ticket links in one convenient location.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="counters" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="zoom-in">
                    <div class="counter-item">
                        <div class="counter-number" data-target="1000000">0</div>
                        <div>Users</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="counter-item">
                        <div class="counter-number" data-target="10000000">0</div>
                        <div>Links Created</div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="400">
                    <div class="counter-item">
                        <div class="counter-number" data-target="100000000">0</div>
                        <div>Profile Views</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <img src="/api/placeholder/150/150" alt="Team Member 1">
                        <h4>John Doe</h4>
                        <p>Co-founder & CEO</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">
                        <img src="/api/placeholder/150/150" alt="Team Member 2">
                        <h4>Jane Smith</h4>
                        <p>Co-founder & CTO</p>
                    </div>
                </div>
                <div class="col-md-4 text-center mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="team-member">
                        <img src="/api/placeholder/150/150" alt="Team Member 3">
                        <h4>Mike Johnson</h4>
                        <p>Head of Design</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reviews" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="review-card">
                        <p>"LinkHub has revolutionized how I share my content. It's so easy to use!"</p>
                        <strong>- Sarah K., Content Creator</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="review-card">
                        <p>"As a small business owner, LinkHub has been a game-changer for my online presence."</p>
                        <strong>- Tom R., Entrepreneur</strong>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="600">
                    <div class="review-card">
                        <p>"The analytics feature is incredible. I can see exactly how my links are performing."</p>
                        <strong>- Emily L., Marketing Manager</strong>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="download" class="cta-section py-5">
        <div class="container text-center">
            <h2 class="mb-4" data-aos="fade-up">Download LinkHub Now</h2>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-md-3 mb-3" data-aos="fade-right" data-aos-delay="200">
                    <a href="#" class="btn btn-dark btn-lg btn-block"><i class="fab fa-apple mr-2"></i>App Store</a>
                </div>
                <div class="col-sm-6 col-md-3 mb-3" data-aos="fade-left" data-aos-delay="400">
                    <a href="#" class="btn btn-dark btn-lg btn-block"><i class="fab fa-google-play mr-2"></i>Google Play</a>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Get in Touch</h2>
            <div class="row">
                <div class="col-md-6 mb-4" data-aos="fade-right">
                    <h4 class="mb-4">Contact Us</h4>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6 mb-4" data-aos="fade-left">
                    <h4 class="mb-4">Follow Us</h4>
                    <p>Stay connected with us on social media for the latest updates and features!</p>
                    <div class="social-icons">
                        <a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        <a href="#" target="_blank" title="TikTok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" target="_blank" title="Snapchat"><i class="fab fa-snapchat-ghost"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4">
        <div class="container text-center">
            <p>&copy; 2024 LinkHub. All rights reserved.</p>
            <div class="mt-3">
                <a href="#" class="btn btn-light btn-sm mr-2"><i class="fab fa-apple mr-2"></i>App Store</a>
                <a href="#" class="btn btn-light btn-sm"><i class="fab fa-google-play mr-2"></i>Google Play</a>
            </div>
        </div>
    </footer>

    <a id="goToTop" href="#" class="btn btn-primary" style="display: none;"><i class="fas fa-arrow-up"></i></a>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true
        });

        // Counter animation
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-target'));
            const duration = 2000; // Animation duration in milliseconds
            const step = target / (duration / 16); // 60 fps
            let current = 0;
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    clearInterval(timer);
                    current = target;
                }
                el.textContent = Math.round(current).toLocaleString();
            }, 16);
        }

        // Start counter animation when the element is in view
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.counter-number').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Go to top button
        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('#goToTop').fadeIn();
            } else {
                $('#goToTop').fadeOut();
            }
        });

        $('#goToTop').click(function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 'slow');
        });

        // Navbar color change on scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').css('background-color', 'rgba(46, 204, 113, 0.9) !important');
            } else {
                $('.navbar').css('background-color', 'var(--primary-color) !important');
            }
        });
    </script>
</body>
</html>