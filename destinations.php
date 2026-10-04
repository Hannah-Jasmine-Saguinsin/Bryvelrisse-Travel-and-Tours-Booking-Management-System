<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="destinations.css">
    <script src="destinations.js" defer></script>
    <script src="navbar.js" defer></script>

    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>

    <title>Destinations | Bryvelrisse Travel and Tours</title>
</head>
<body>

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

    <header class="destinations-header">
        <h1>Our Destinations</h1>
        <p>Explore our curated selection of local and international travel packages.</p>
        <span class="destinations-header__tagline">Pick · Plan · Travel</span>
    </header>
<br><br>
    <section class="destination-columns" id="destination-columns">
        <div class="column column--featured">
            <div class="section-header">
                <h3>Best Places to Visit</h3>
                <p class="section-subtitle">Our top-rated and most requested getaways</p>
            </div>

            <div class="package-list">
                <button type="button" class="text-card" data-preview-src="assets/packages-korea1.jpg" data-preview-alt="South Korea - Manila Departure">
                    <img src="assets/packages-korea1.jpg" alt="South Korea" class="text-card__image">
                    <span class="pkg-card__tag">Culture</span>
                    <h4>South Korea - Manila Departure</h4>
                    <p>Discover K-culture, scenic spots, and vibrant city life with a convenient Manila departure.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-shanghai.jpg" data-preview-alt="Shanghai, China">
                    <img src="assets/packages-shanghai.jpg" alt="Shanghai, China" class="text-card__image">
                    <span class="pkg-card__tag">Modernity</span>
                    <h4>Shanghai, China</h4>
                    <p>Experience a dynamic city where futuristic skylines meet rich cultural heritage.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-taiwan.jpg" data-preview-alt="Taiwan">
                    <img src="assets/packages-taiwan.jpg" alt="Taiwan" class="text-card__image">
                    <span class="pkg-card__tag">Top Spots</span>
                    <h4>Taiwan</h4>
                    <p>Explore popular attractions, vibrant night markets, and must-visit scenic destinations.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-hongkong.jpg" data-preview-alt="Hongkong">
                    <img src="assets/packages-hongkong.jpg" alt="Hongkong" class="text-card__image">
                    <span class="pkg-card__tag">City Life</span>
                    <h4>Hongkong</h4>
                    <p>Explore iconic skylines, shopping hubs, and world-class entertainment.</p>
                </button>
            </div>
        </div>

        <div class="column column--packages" id="all-packages">
            <div class="section-header">
                <h3>More Packages</h3>
                <p class="section-subtitle">International trips and cultural escapes</p>
            </div>

            <div class="package-list">
                <button type="button" class="text-card" data-preview-src="assets/packages-korea2.jpg" data-preview-alt="South Korea - Cebu Departure">
                    <img src="assets/packages-korea2.jpg" alt="South Korea" class="text-card__image">
                    <span class="pkg-card__tag">Culture</span>
                    <h4>South Korea - Cebu Departure</h4>
                    <p>Enjoy the best of Korea's modern cities and traditional charm with an easy Cebu departure.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-singapore.jpg" data-preview-alt="Singapore">
                    <img src="assets/packages-singapore.jpg" alt="Singapore" class="text-card__image">
                    <span class="pkg-card__tag">City</span>
                    <h4>Singapore</h4>
                    <p>Enjoy a clean, modern city filled with attractions and multicultural experiences.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-thailand.jpg" data-preview-alt="Thailand">
                    <img src="assets/packages-thailand.jpg" alt="Thailand" class="text-card__image">
                    <span class="pkg-card__tag">Adventure</span>
                    <h4>Thailand</h4>
                    <p>Dive into vibrant street markets, temples, and tropical escapes.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-japan.jpg" data-preview-alt="Japan">
                    <img src="assets/packages-japan.jpg" alt="Japan" class="text-card__image">
                    <span class="pkg-card__tag">Tradition</span>
                    <h4>Japan</h4>
                    <p>Discover a perfect blend of ancient traditions and cutting-edge technology.</p>
                </button>
            </div>
        </div>

        <div class="column column--packages">
            <div class="section-header">
                <h3>More Packages</h3>
                <p class="section-subtitle">Beach getaways and city adventures</p>
            </div>

            <div class="package-list">
                <button type="button" class="text-card" data-preview-src="assets/packages-batanes.jpg" data-preview-alt="Batanes, Philippines">
                    <img src="assets/packages-batanes.jpg" alt="Batanes, Philippines" class="text-card__image">
                    <span class="pkg-card__tag">Nature</span>
                    <h4>Batanes, Philippines</h4>
                    <p>Relax in peaceful rolling hills, dramatic cliffs, and untouched beauty.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-el-nido.jpg" data-preview-alt="El Nido, Philippines">
                    <img src="assets/packages-el-nido.jpg" alt="El Nido, Philippines" class="text-card__image">
                    <span class="pkg-card__tag">Islands</span>
                    <h4>El Nido, Philippines</h4>
                    <p>Explore crystal-clear lagoons and breathtaking limestone formations.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-siargao.jpg" data-preview-alt="Siargao, Philippines">
                    <img src="assets/packages-siargao.jpg" alt="Siargao, Philippines" class="text-card__image">
                    <span class="pkg-card__tag">Beach</span>
                    <h4>Siargao, Philippines</h4>
                    <p>Experience laid-back island vibes and world-famous waves.</p>
                </button>

                <button type="button" class="text-card" data-preview-src="assets/packages-iloilo.jpg" data-preview-alt="Iloilo, Philippines">
                    <img src="assets/packages-iloilo.jpg" alt="Iloilo, Philippines" class="text-card__image">
                    <span class="pkg-card__tag">Heritage</span>
                    <h4>Iloilo, Philippines</h4>
                    <p>Enjoy historic sites, local cuisine, and a calm riverside atmosphere.</p>
                </button>
            </div>
        </div>
    </section>

    <div class="modal-preview" id="destination-preview" aria-hidden="true">
        <button type="button" class="modal-preview__backdrop" aria-label="Close preview"></button>
        <div class="modal-preview__box" role="dialog" aria-modal="true" aria-label="Destination image preview">
            <img src="" alt="" class="modal-preview__img" id="destination-preview-image">
            <div class="modal-preview__actions">
                <a href="contact.html?concern=booking" class="modal-preview__book">Book Now</a>
                <a href="#" class="modal-preview__download" id="destination-preview-download" download>
                    <i class="fa-solid fa-download"></i> Download
                </a>
            </div>
            <button type="button" class="modal-preview__close" aria-label="Close preview">&times;</button>
        </div>
    </div>
    <section class="why-choose-us">
        <div class="section-header">
            <h3>Why Choose Our Packages</h3>
            <p class="section-subtitle">The values that drive every journey we plan</p>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-card__icon">🎯</div>
                <h4>Curated Itineraries</h4>
                <p>Every destination is hand-picked to ensure maximum value and comfort for our travelers.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">🛡️</div>
                <h4>Hassle-Free Booking</h4>
                <p>From flights to hotels, we manage all the paperwork and logistics for you.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">⭐</div>
                <h4>Expert Support</h4>
                <p>Get 24/7 travel assistance throughout your entire journey with our dedicated team.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">✈️</div>
                <h4>Best Value</h4>
                <p>We negotiate the best rates and package deals to make your dream vacation affordable.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">🌍</div>
                <h4>Local Expertise</h4>
                <p>Our team has firsthand knowledge of each destination to provide authentic experiences.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">💎</div>
                <h4>Premium Quality</h4>
                <p>We partner with top-rated accommodations and service providers for your peace of mind.</p>
            </div>
        </div>
    </section>

    <!-- Button -->
    <button id="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!--(Footer)-->
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
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+639422699852">+63 942 269 9852</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">336 E. Bautista St., Brgy. San Vicente, Angono, Philippines, 1930</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com">bryvelrissetravelandtours@gmail.com</a>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook-f"></i>
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener">Bryvelrisse Travel and Tours</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
            <p>Designed with <i class="fa-solid fa-heart" style="color:#F0B13D;"></i> for every traveler</p>
        </div>
    </footer>

</body>
</html>
