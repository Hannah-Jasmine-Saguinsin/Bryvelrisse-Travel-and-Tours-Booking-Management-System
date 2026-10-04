<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Caveat:wght@500;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">

    <!--Global CSS-->
    <link rel="stylesheet" href="style.css">
    <!--Navbar CSS-->
    <link rel="stylesheet" href="navbar.css">
    <!--About CSS-->
    <link rel="stylesheet" href="about.css">

    <script src="navbar.js" defer></script>
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <title>About Us | Bryvelrisse Travel and Tours</title>
</head>
<body>

    <!-- ── Navbar ── -->
    <nav class="navigation">
        <a href="index.html" class="logo">Bryvelrisse Travels and Tours</a>
        <div class="nav-links">
            <a href="index.html">Home</a>
            <a href="destinations.html">Destinations</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact</a>
            <a href="booking.html" class="btn-booking">
                <i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i>
                Booking
            </a>
            <a href="login.html" class="btn-login">
                <i class="fa-solid fa-user nav-icon" aria-hidden="true"></i>
                Sign In
            </a>
        </div>
        </div>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <!-- ── Hero ── -->
    <div class="abt-content" id="section-4">
        <h2>Get to know Bryvelrisse</h2>
        <h3>Where a Part-Time Traveler Becomes a Full-Time Wanderer!</h3>
        <p>Pick &middot; Plan &middot; Travel</p>
    </div>

    <!-- ── Introduction ── -->
    <section class="seg seg--intro">
        <div class="intro__layout">
            <div class="intro__label" aria-hidden="true">
                <span class="label-line"></span>
                <span class="label-text">Who We Are</span>
            </div>
            <div class="intro__card">
                <h2 class="intro__heading">A Short Introduction</h2>
                <p>
                    Welcome to Bryvelrisse Travel and Tours — your gateway to unforgettable travel experiences.
                    Whether you are looking for a budget-friendly package or a luxury leisure escape,
                    we have the perfect solution for you.
                </p>
                <p>
                    Founded with a passion for exploration, we began with a simple goal: to make travel
                    accessible, enjoyable, and meaningful for everyone. We are committed to providing safe,
                    reliable, and well-organised trips tailored to your needs. We want to help you see your
                    dream destination and tick off your bucket list.
                </p>
                <a href="contact.html#faq" class="btn-primary">
                    Learn More <i class="fa-regular fa-lightbulb" aria-hidden="true"></i>
                </a>
            </div>
            <div class="intro__accent-img" aria-hidden="true">
                <img src="assets/about-hero.jpg" alt="" loading="lazy">
            </div>
        </div>
    </section>

    <!-- ── Mission / Vision / Goals ── -->
    <section class="seg seg--svm">
        <div class="section-header">
            <h3>The Heart of Our Brand</h3>
            <p class="section-subtitle">The values that guide how we serve every traveler</p>
        </div>

        <div class="values-grid values-grid--about">
            <article class="value-card">
                <div class="value-card__icon value-card__icon--image">
                    <img src="assets/mission.png" alt="" aria-hidden="true">
                </div>
                <h4>Our Mission</h4>
                <p>To create travel experiences that exceed expectations and leave lasting memories — delivered with love our clients will always remember.</p>
            </article>

            <article class="value-card">
                <div class="value-card__icon value-card__icon--image">
                    <img src="assets/bulb.png" alt="" aria-hidden="true">
                </div>
                <h4>Our Vision</h4>
                <p>To be the most trusted travel partner, connecting people to the world with ease, joy, and genuine care.</p>
            </article>

            <article class="value-card">
                <div class="value-card__icon value-card__icon--image">
                    <img src="assets/goal.png" alt="" aria-hidden="true">
                </div>
                <h4>Our Goals</h4>
                <p>To build a loyal customer base, expand travel packages, establish industry partnerships, and boost brand recognition through digital marketing.</p>
            </article>
        </div>
    </section>

    <!-- ── Services ── -->
    <section class="seg seg--services">
        <div class="seg__header seg__header--light">
            <span class="section-label section-label--light">What We Offer</span>
            <h2>Services Offered</h2>
            <p class="section-sub">Your trusted partner for all travel needs</p>
        </div>

        <ul class="services-grid" role="list">
            <li class="service-card">
                
                <h3>Customised Travel Packages</h3>
                <p>Tailor-made itineraries designed to match your budget, interests, and preferred destinations.</p>
            </li>
            <li class="service-card">
                
                <h3>Local &amp; International Tours</h3>
                <p>Explore the world with our expertly crafted tours, whether you want to discover hidden gems or iconic landmarks.</p>
            </li>
            <li class="service-card">
                
                <h3>Flight &amp; Hotel Booking</h3>
                <p>Convenient and competitive booking services for flights and accommodations worldwide.</p>
            </li>
            <li class="service-card">
                
                <h3>Corporate Travel Solutions</h3>
                <p>Comprehensive travel management for businesses — meetings, incentives, conferences, and events.</p>
            </li>
            <li class="service-card">
                
                <h3>Visa Assistance</h3>
                <p>Guidance and support for visa applications to ensure a smooth, stress-free travel experience.</p>
            </li>
            <li class="service-card">
                
                <h3>Travel Insurance</h3>
                <p>Reliable travel insurance that ensures protection and peace of mind throughout your journey.</p>
            </li>
        </ul>
    </section>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top">
        <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!-- ── Footer ── -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-main">
                <div class="footer-brand">
                    <a href="index.html" class="footer-logo">Bryvelrisse<br><span>Travel and Tours</span></a>
                    <p class="footer-tagline">Crafting unforgettable journeys since 2019. Your adventure begins with a single step.</p>
                    <div class="footer-socials">
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="tel:+639422699852" aria-label="Phone"><i class="fa-solid fa-phone"></i></a>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com" aria-label="Email"><i class="fa-regular fa-envelope"></i></a>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" aria-label="Location">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="contact.html#faq">FAQ</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="terms.html" target="_blank">Terms</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-col footer-contact">
                <h4>Contact Info</h4>
                <ul class="footer-contact-list">
                    <li><i class="fa-solid fa-phone"></i><a href="tel:+639422699852">+63 942 269 9852</a></li>
                    <li><i class="fa-solid fa-location-dot"></i><a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">336 E. Bautista St., Brgy. San Vicente, Angono, Philippines, 1930</a></li>
                    <li><i class="fa-regular fa-envelope"></i><a href="mailto:bryvelrissetravelandtours@gmail.com">bryvelrissetravelandtours@gmail.com</a></li>
                    <li><i class="fa-brands fa-facebook-f"></i><a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener">Bryvelrisse Travel and Tours</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
            <p>Designed with <i class="fa-solid fa-heart" style="color:#F0B13D;" aria-hidden="true"></i> for every traveler</p>
        </div>
    </footer>

</body>
</html>
