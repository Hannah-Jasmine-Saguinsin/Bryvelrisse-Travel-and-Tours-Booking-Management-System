<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Bryvelrisse Travel and Tours</title>

    <!--Global CS-->
    <link rel="stylesheet" href="style.css">
    <!--Navbar CSS style-->
    <link rel="stylesheet" href="navbar.css">
    <!-- Contact Page CSS -->
    <link rel="stylesheet" href="contact.css">
    <script src="navbar.js" defer></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Navbar Section-->
    <nav class="navigation" id="navbar">
        <a href="index.html" class="logo">Bryvelrisse Travels and Tours</a>
        <div class="nav-links">
            <a href="index.html">Home</a>
            <a href="destinations.html">Destinations</a>
            <a href="about.html">About</a>
            <a href="contact.html" class="active">Contact</a>
            <a href="booking.html" class="btn-booking">
                <i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i>
                Booking
            </a>
            <a href="login.html" class="btn-login">
                <i class="fa-solid fa-user nav-icon" aria-hidden="true"></i>
                Sign In
            </a>
        </div>
        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <i class="fa-solid fa-bars" id="menuIcon"></i>
        </button>
    </nav>

    <!--Hero + Contact Form-->
    <section class="hero-contact" id="hero">
        <!-- Background image via CSS; overlay done in CSS -->
        <div class="hero-overlay"></div>

        <div class="hero-content reveal">
            <span class="hero-eyebrow">We'd love to hear from you</span>
            <h1 class="hero-title">Get in Touch<br><em>With Us</em></h1>
            <p class="hero-sub">Whether you're dreaming of a solo escape or a family adventure, our team is ready to craft your perfect journey.</p>
        </div>

        <!-- ── Main Contact Form Card ── -->
        <div class="contact-wrapper reveal reveal-delay-1">

            <!-- LEFT: form -->
            <div class="contact-form-card">
                <h2 class="card-title">Send Us a Message</h2>

                <form id="mainForm" novalidate>
                    <div class="form-row">
                        <div class="form-group" data-field="fullName">
                            <label for="fullName">Full Name <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="fa-regular fa-user input-icon"></i>
                                <input type="text" id="fullName" name="fullName" placeholder="Enter your name" autocomplete="name">
                            </div>
                            <span class="err-msg"></span>
                        </div>
                        <div class="form-group" data-field="email">
                            <label for="email">Email Address <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input type="email" id="email" name="email" placeholder="youremail@email.com" autocomplete="email">
                            </div>
                            <span class="err-msg"></span>
                        </div>
                    <div class="form-group" data-field="phone">
                     <label for="phone">Phone Number <span class="req">*</span></label>
                        <div class="input-wrap">
                        <i class="fa-solid fa-phone input-icon"></i>
                            <input type="tel" id="phone" name="phone" placeholder="+63 9XX XXX XXXX" autocomplete="tel">
                        </div>
                         <span class="err-msg"></span>
                    </div>
                    </div>

                    <div class="form-group" data-field="subject">
                        <label for="subject">Subject <span class="req">*</span></label>
                        <div class="input-wrap select-wrap">
                            <i class="fa-solid fa-tag input-icon"></i>  
                            <select id="subject" name="subject">
                                <option value="">— Select a subject —</option>
                                <option value="Tour Inquiry">Tour Inquiry</option>
                                <option value="Booking">Booking</option>
                                <option value="Package Pricing">Package Pricing</option>
                                <option value="Travel Insurance">Travel Insurance</option>
                                <option value="Visa Assistance">Visa / Passport Assistance</option>
                                <option value="Custom Itenary">Custom Itenary</option>
                                <option value="Other">Other</option>
                            </select>
                            <i class="fa-solid fa-chevron-down select-caret"></i>
                        </div>
                        <span class="err-msg"></span>
                    </div>

                    <div class="form-group" data-field="message">
                        <label for="message">Message <span class="req">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us about your dream trip — destinations, dates, group size, special requests…"></textarea>
                        <span class="err-msg"></span>
                    </div>

                    <div class="form-feedback success" id="mainSuccess" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Your message was sent! We'll be in touch within 24 hours.</span>
                    </div>
                    <div class="form-feedback error" id="mainError" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span id="mainErrorMsg">Please fix the highlighted fields.</span>
                    </div>

                    <button type="submit" class="btn-primary" id="mainSubmit">
                        <span class="btn-label"><i class="fa-solid fa-paper-plane"></i>&nbsp; Send Message</span>
                        <span class="btn-spinner"><i class="fa-solid fa-circle-notch fa-spin"></i></span>
                    </button>
                </form>
            </div>

            <!-- RIGHT: contact info + socials -->
            <div class="contact-info-panel">
                <h2 class="panel-title">Contact Info</h2>
                <p class="panel-sub">Reach us directly through any of the channels below.</p>

                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-phone"></i></div>
                    <div class="info-text">
                        <span class="info-label">Phone</span>
                        <a href="tel:+639422699852">+63 942 269 9852</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-regular fa-envelope"></i></div>
                    <div class="info-text">
                        <span class="info-label">Email</span>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com">bryvelrissetravelandtours@gmail.com</a>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-regular fa-clock"></i></div>
                    <div class="info-text">
                        <span class="info-label">Office Hours</span>
                        <span>Mon – Fri, 8:00 AM – 6:00 PM</span>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="info-text">
                        <span class="info-label">Location</span>
                        <span>336 E. Bautista St.,<br>Brgy. San Vicente,<br> Angono, Philippines, 1930</span>
                    </div>
                </div>

                <div class="socials-row">
                    <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener" class="social-btn facebook" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="mailto:bryvelrissetravelandtours@gmail.com" class="social-btn email" aria-label="Email">
                        <i class="fa-regular fa-envelope"></i>
                    </a>
                    <a href="tel:+639422699852" class="social-btn phone" aria-label="Phone">
                        <i class="fa-solid fa-phone"></i>
                    </a>
                    <a href="https://www.google.com/maps/place/336+E+Bautista+St,+Angono,+1930+Rizal/@14.5233892,121.1428003,17z/data=!3m1!4b1!4m6!3m5!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_?entry=ttu&g_ep=EgoyMDI2MDQxMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" class="social-btn location" aria-label="Location">
                        <i class="fa-solid fa-location-dot"></i>
                    </a>
                </div>
            </div>

        </div><!-- /contact-wrapper -->
    </section>


    <!--(FAQ)-->
    <section class="faq-section" id="faq">
        <div class="section-header reveal">
            <span class="section-eyebrow">Got Questions?</span>
            <h2 class="section-title">Frequently Asked<br>Questions</h2>
            <div class="title-bar"></div>
        </div>

        <div class="faq-list reveal">
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>How do I book a tour?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>You can book a tour by filling out our contact form above, sending us an email, calling us directly, or reaching out through our FB page Bryvelrisse Travel and Tours. Once we receive your inquiry, our team will get in touch within 24 hours to confirm details, availability, and payment options.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>What payment methods are accepted?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>We accept bank transfers (BDO, BPI, Metrobank), GCash, PayMaya, and major credit/debit cards. For international bookings, we also accept PayPal. A deposit may be required to confirm your reservation.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Can I cancel or reschedule my booking?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p> All packages cannot be transferred or exchanged. Any changes after vouchers are issued are treated as cancellation and will have charges. Customers must provide a correct email and accept it as the main way to receive booking details and vouchers, and the company is not responsible if these are not received.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Do you offer travel insurance?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes! We offer travel insurance assistance as part of our services. We partner with reputable insurance providers to help cover trip cancellations, medical emergencies, lost baggage, and more. Ask us about adding insurance to your package.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Can you assist with visa and passport applications?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Absolutely. Our team provides visa application guidance and documentation assistance for various countries. While we cannot guarantee visa approval, we'll help make sure your application is complete and accurate. Passport renewal assistance is also available.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Are your tour packages customizable?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes! Every traveler is different. We offer fully customizable itineraries, so you can choose your own destinations, travel dates, accommodation type, activities, and group size. Just get in touch and we'll tailor a package that suits your budget and preferences perfectly.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>Do you handle group tours and corporate travel?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>Yes! We specialize in group tours, team outings, and corporate travel arrangements. We manage everything from transport and accommodation to itinerary planning and on-ground coordination. Special rates apply for groups of 10 or more.</p>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question" aria-expanded="false">
                    <span>What destinations do you cover?</span>
                    <i class="fa-solid fa-plus faq-icon"></i>
                </button>
                <div class="faq-answer">
                    <p>We cover both domestic Philippine destinations (Palawan, Siargao, Batanes, Cebu, and more) and international destinations across Asia, Europe, and beyond.</p>
                </div>
            </div>
        </div>
    </section>


    <!--(Support Form)-->
    <section class="support-section" id="support">
        <div class="support-inner">
            <div class="section-header reveal" style="text-align:left; align-items:flex-start;">
                <span class="section-eyebrow">Help Desk</span>
                <h2 class="section-title" style="font-size:clamp(2rem,4vw,3rem);">Specific Concern?<br><em>We're Here.</em></h2>
                <div class="title-bar"></div>
                <p class="support-desc">Select your concern type below and our team will route your inquiry to the right department for a faster, more precise response.</p>
            </div>

            <div class="support-form-card reveal reveal-delay-1">
                <form id="supportForm" novalidate>
                    <div class="form-group" data-field="sName">
                            <label for="sName">Full Name <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="fa-regular fa-user input-icon"></i>
                                <input type="text" id="sName" name="sName" placeholder="Your full name">
                            </div>
                            <span class="err-msg"></span>
                        </div> 
                    <div class="form-group" data-field="sEmail">
                            <label for="sEmail">Email Address <span class="req">*</span></label>
                            <div class="input-wrap">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input type="email" id="sEmail" name="sEmail" placeholder="your@email.com">
                            </div>
                            <span class="err-msg"></span>
                    </div> 
                    <div class="form-group" data-field="sPhone">
                    <label for="phone">Phone Number <span class="req">*</span></label>
                        <div class="input-wrap">
                        <i class="fa-solid fa-phone input-icon"></i>
                            <input type="tel" id="sPhone" name="sPhone" placeholder="+63 9XX XXX XXXX" autocomplete="tel">
                        </div>
                        <span class="err-msg"></span>
                    </div>
                    
                    <div class="form-group" data-field="concernType">
                        <label for="concernType">Concern Type <span class="req">*</span></label>
                        <div class="input-wrap select-wrap">
                            <i class="fa-solid fa-headset input-icon"></i>
                            <select id="concernType" name="concernType">
                                <option value="">— Select your concern —</option>
                                <option value="Booking">Booking</option>
                                <option value="Destinations">Destinations</option>
                                <option value="Payments">Payments</option>
                                <option value="Refunds">Refunds</option>
                                <option value="Others">Others</option>
                            </select>
                            <i class="fa-solid fa-chevron-down select-caret"></i>
                        </div>
                        <span class="err-msg"></span>
                    </div>

                    <div class="form-group" data-field="sMessage">
                        <label for="sMessage">Message <span class="req">*</span></label>
                        <textarea id="sMessage" name="sMessage" rows="5" placeholder="Ask about packages, pricing, or travel dates…"></textarea>
                        <span class="err-msg"></span>
                    </div>

                    <div class="form-feedback success" id="supportSuccess" role="alert">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Your inquiry has been submitted! Our support team will respond within 24 hours.</span>
                    </div>
                    <div class="form-feedback error" id="supportError" role="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span id="supportErrorMsg">Please fix the highlighted fields.</span>
                    </div>

                    <button type="submit" class="btn-primary" id="supportSubmit">
                        <span class="btn-label"><i class="fa-solid fa-headset"></i>&nbsp; Submit Inquiry</span>
                        <span class="btn-spinner"><i class="fa-solid fa-circle-notch fa-spin"></i></span>
                    </button>
                </form>
            </div>
        </div>
    </section>


    <!--(CTA Section)-->
    <section class="cta-section" id="cta">
        <div class="cta-overlay"></div>
        <div class="cta-content reveal">
            <span class="hero-eyebrow" style="color:#F0B13D;">Your Adventure Awaits</span>
            <h2 class="cta-title">Ready to Start<br>Your Journey?</h2>
            <p class="cta-sub">From pristine beaches to mountain peaks, we turn your dream destination into lasting memories.</p>
            <div class="cta-buttons">
                <a href="destinations.html#package-list" class="btn-cta primary">
                    <i class="fa-solid fa-compass"></i> Explore Packages
                </a>
                <a href="#hero" class="btn-cta outline" id="bookNowBtn">
                    <i class="fa-solid fa-calendar-check"></i> Book Now
                </a>
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
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#hero">Contact</a></li>
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
      <script src="contact.js"></script>
</body>
</html>
