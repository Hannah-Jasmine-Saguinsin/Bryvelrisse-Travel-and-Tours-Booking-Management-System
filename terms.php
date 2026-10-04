<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions | Bryvelrisse Travel and Tours</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Caveat:wght@400;600&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--surface);
            color: var(--primary-dark);
            line-height: 1.7;
        }

        /*  Hero Header */
        .terms-hero {
            width: 100%;
            min-height: 180px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 56px 24px;
            background: linear-gradient(160deg, var(--primary-dark) 0%, var(--dark) 50%, var(--secondary-dark) 100%);
        }

        .terms-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4.5vw, 2.8rem);
            font-weight: 700;
            color: var(--white);
            letter-spacing: 0.02em;
        }

        .terms-hero p {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.88rem;
            font-weight: 300;
            color: var(--primary-light);
            margin-top: 10px;
            letter-spacing: 0.03em;
        }

        /*Content Wrapper*/
        .terms-wrapper {
            max-width: 820px;
            margin: 0 auto;
            padding: 52px 24px 72px;
        }

        /*Term Boxes */
        .term-box {
            background: var(--white);
            border: 1px solid var(--surface-line);
            border-left: 3px solid var(--accent);
            border-radius: 8px;
            padding: 26px 28px;
            margin-bottom: 16px;
        }

        .term-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 12px;
        }

        .term-box p,
        .term-box li {
            font-size: 0.875rem;
            font-weight: 400;
            color: var(--secondary-light-dark);
            line-height: 1.8;
        }

        .term-box ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .term-box ul li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .term-box ul li::before {
            content: '–';
            color: var(--accent);
            font-weight: 600;
            flex-shrink: 0;
        }

        /* Last Box (Acceptance) */
        .term-box.acceptance {
            background: linear-gradient(135deg, var(--dark), var(--primary-dark));
            border-color: transparent;
            border-left-color: var(--gold);
        }

        .term-box.acceptance .term-title h2 {
            color: var(--white);
        }

        .term-box.acceptance p {
            color: var(--primary-light);
        }

        /* Responsive  */
        @media (max-width: 600px) {
            .term-box {
                padding: 20px 18px;
            }
        }
    </style>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
1   <!--Global Styles and Navbar -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="navbar.js"></script>
</head>
<body>
    <!-- Navbar -->
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
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <!-- Hero -->
    <header class="terms-hero">
        <h1>Terms and Conditions</h1>
        <p>Welcome to Bryvelrisse Travel and Tours. Please read these terms carefully before making a booking.</p>
    </header>

    <!-- Content -->
    <main class="terms-wrapper">

        <section class="terms-content">

            <div class="term-box">
                <div class="term-title"><h2>1. General Policy</h2></div>
                <p>All travel packages offered by Bryvelrisse Travel and Tours are non-transferable and non-exchangeable. Bookings are confirmed only upon receipt of full or agreed partial payment.</p>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>2. Booking and Confirmation</h2></div>
                <ul>
                    <li>Clients must provide accurate and complete personal information, including a valid email address and contact number.</li>
                    <li>Travel vouchers and booking confirmations will be sent via email.</li>
                    <li>By proceeding with the booking, the client agrees to accept email or Facebook Page Messenger as an official form of communication.</li>
                </ul>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>3. Cancellation and Amendments</h2></div>
                <ul>
                    <li>Any amendment made after travel vouchers have been issued will be treated as a cancellation of the original booking.</li>
                    <li>Corresponding cancellation charges will apply depending on the timing and nature of the change.</li>
                    <li>Requests for changes are subject to availability and approval.</li>
                </ul>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>4. Refund Policy</h2></div>
                <ul>
                    <li>Refunds, if applicable, will be processed according to the company's cancellation policy and partner terms (airlines, hotels, tour providers).</li>
                    <li>Processing time may vary depending on the service provider.</li>
                </ul>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>5. Client Responsibility</h2></div>
                <ul>
                    <li>Clients are responsible for ensuring that all submitted information is correct.</li>
                    <li>Bryvelrisse Travel and Tours will not be held liable for any issues arising from incorrect or incomplete details provided by the client.</li>
                </ul>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>6. Communication Disclaimer</h2></div>
                <ul>
                    <li>By proceeding with the booking, the client agrees to accept Email or Facebook Page Messenger as an official form of communication.</li>
                    <li>The company is not liable for non-receipt of emails or travel documents due to incorrect email addresses, spam filtering, or technical issues beyond its control.</li>
                </ul>
            </div>

            <div class="term-box">
                <div class="term-title"><h2>7. Liability Limitations</h2></div>
                <p style="margin-bottom: 10px;">Bryvelrisse Travel and Tours acts only as an agent for third-party service providers (airlines, hotels, transport services). The company shall not be held liable for:</p>
                <ul>
                    <li>Any damages, losses, or expenses arising from the use of third-party services.</li>
                    <li>Delays or failures in the performance of third-party services.</li>
                </ul>
            </div>

            <div class="term-box acceptance">
                <div class="term-title"><h2>8. Acceptance of Terms</h2></div>
                <p>By confirming a booking, the client acknowledges that they have read, understood, and agreed to these Terms and Conditions.</p>
            </div>

        </section>

    </main>

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
