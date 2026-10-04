/* =========================
   GLOBAL CHECK
========================= */

// Checks if the current device is mobile based on viewport width (768px breakpoint)
const isMobile = window.innerWidth <= 768;

/* =========================
   GALLERY (PACKAGES)
========================= */

// Select the scrollable gallery track and its left/right arrow button controls
const galleryTrack = document.getElementById('galleryTrack');
const galleryLeft  = document.getElementById('galleryLeft');
const galleryRight = document.getElementById('galleryRight');

/* Arrow Button Scrolling */

// Scrolls the gallery track 80% of its visible width to the left when the left arrow is clicked
galleryLeft?.addEventListener('click', () => {
    galleryTrack.scrollBy({
        left: -galleryTrack.offsetWidth * 0.8,
        behavior: 'smooth'
    });
});

// Scrolls the gallery track 80% of its visible width to the right when the right arrow is clicked
galleryRight?.addEventListener('click', () => {
    galleryTrack.scrollBy({
        left: galleryTrack.offsetWidth * 0.8,
        behavior: 'smooth'
    });
});

/* Drag to Scroll (Mouse) */

// Tracks drag state, initial mouse X position, and scroll position for click-and-drag scrolling
let isDragging = false;
let startX = 0;
let scrollLeft = 0;

if (galleryTrack) {

    // Records the starting position and initial scroll offset when the user presses the mouse button,
    // and changes the cursor to indicate active dragging
    galleryTrack.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - galleryTrack.offsetLeft;
        scrollLeft = galleryTrack.scrollLeft;
        galleryTrack.style.cursor = 'grabbing';
    });

    // Cancels drag state and resets cursor when the mouse leaves the gallery track
    galleryTrack.addEventListener('mouseleave', () => {
        isDragging = false;
        galleryTrack.style.cursor = 'grab';
    });

    // Cancels drag state and resets cursor when the mouse button is released
    galleryTrack.addEventListener('mouseup', () => {
        isDragging = false;
        galleryTrack.style.cursor = 'grab';
    });

    // Calculates how far the mouse has moved from the starting point and
    // scrolls the gallery track accordingly with a 1.5x speed multiplier
    galleryTrack.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();

        const x = e.pageX - galleryTrack.offsetLeft;
        const walk = (x - startX) * 1.5;

        galleryTrack.scrollLeft = scrollLeft - walk;
    });
}

/* Mobile swipe enable */

// Enables horizontal scrolling and grab cursor on the gallery track for mobile devices
function enableMobileSwipe() {
    if (!galleryTrack) return;

    if (isMobile) {
        galleryTrack.style.overflowX = 'auto';
        galleryTrack.style.cursor = 'grab';
    }
}
enableMobileSwipe();

/* =========================
   PACKAGE MODAL
========================= */

// Select modal elements: the modal container, image, caption, close button, and backdrop
const pkgModal      = document.getElementById('pkgModal');
const modalImg      = document.getElementById('modalImg');
const modalCaption  = document.getElementById('modalCaption');
const modalClose    = document.getElementById('modalClose');
const modalBackdrop = document.getElementById('modalBackdrop');

// Attaches a click listener to each package card;
// when clicked, it populates the modal with the card's image and title, then opens the modal
document.querySelectorAll('.pkg-card').forEach(card => {
    card.addEventListener('click', () => {
        const imgSrc = card.getAttribute('data-img');
        const title  = card.getAttribute('data-title');

        modalImg.src = imgSrc;
        modalImg.alt = title;
        modalCaption.textContent = title;

        pkgModal.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevents background scrolling while modal is open
    });
});

// Closes the modal by removing the active class, restoring body scroll,
// and clearing the image src after the CSS transition completes (300ms)
function closeModal() {
    pkgModal.classList.remove('active');
    document.body.style.overflow = '';

    setTimeout(() => {
        modalImg.src = '';
    }, 300);
}

// Closes the modal when the close button is clicked
modalClose?.addEventListener('click', closeModal);

// Closes the modal when the backdrop (outside the modal content) is clicked
modalBackdrop?.addEventListener('click', closeModal);

// Closes the modal when the Escape key is pressed
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
});


/* =========================
   TESTIMONIAL SLIDER
========================= */

// Select the slider track, navigation arrow buttons, and dots container
const sliderTrack = document.getElementById('sliderTrack');
const sliderPrev  = document.getElementById('sliderPrev');
const sliderNext  = document.getElementById('sliderNext');
const dotsWrap    = document.getElementById('sliderDots');

// Select all testimonial slides and store the total count
const slides = document.querySelectorAll('.testimonial-slide');
const totalSlides = slides.length;

// Tracks the currently active slide index and stores the auto-slide timer reference
let currentSlide = 0;
let autoSlideTimer;

/* Build dots */

// Dynamically creates a dot button for each slide, marks the first one as active,
// and attaches a click listener to jump directly to that slide
slides.forEach((_, i) => {
    const dot = document.createElement('button');
    dot.classList.add('slider-dot');
    dot.setAttribute('aria-label', `Go to slide ${i + 1}`);

    if (i === 0) dot.classList.add('active');

    dot.addEventListener('click', () => goToSlide(i));
    dotsWrap?.appendChild(dot);
});

/* Core slide function */

// Moves the slider to the specified index by updating the CSS transform,
// and syncs the active state on all dot indicators
function goToSlide(index) {
    currentSlide = index;

    console.log("Slide:", currentSlide); // debug

    if (sliderTrack) {
        sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    document.querySelectorAll('.slider-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === currentSlide);
    });
}

/* Next / Prev */

// Advances to the next slide, wrapping back to the first slide after the last
function nextSlide() {
    goToSlide((currentSlide + 1) % totalSlides);
}

// Goes back to the previous slide, wrapping to the last slide if already on the first
function prevSlide() {
    goToSlide((currentSlide - 1 + totalSlides) % totalSlides);
}

/* Arrow buttons (DESKTOP ONLY behavior) */

// Advances to the next slide and resets the auto-slide timer when the next arrow is clicked
sliderNext?.addEventListener('click', () => {
    nextSlide();
    resetAutoSlide();
});

// Goes to the previous slide and resets the auto-slide timer when the previous arrow is clicked
sliderPrev?.addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
});

/* Auto slide (DESKTOP ONLY) */

// Starts an interval that automatically advances the slider every 4.5 seconds;
// skipped entirely on mobile devices
function startAutoSlide() {
    if (isMobile) return;

    autoSlideTimer = setInterval(nextSlide, 4500);
}

// Clears the existing auto-slide timer and restarts it to prevent skipping slides
// after a manual navigation action
function resetAutoSlide() {
    clearInterval(autoSlideTimer);
    startAutoSlide();
}

/* INIT */

// Starts the auto-slide timer and ensures the slider begins at the first slide
startAutoSlide();
goToSlide(0);

/* Mobile touch/swipe for testimonials slider */

// Adds touch-based swipe support for the testimonial slider on mobile devices
if (isMobile && sliderTrack) {
    let startX = 0;
    let currentX = 0;
    let isDragging = false;
    let startTime = 0;

    // Select the wrapper element that contains the slider track
    const sliderContainer = document.querySelector('.slider-track-wrap');

    // Records the starting touch position and timestamp when the user begins a touch gesture,
    // and resets the auto-slide timer
    sliderContainer.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        currentX = startX;
        isDragging = true;
        startTime = Date.now();
        resetAutoSlide();
    });

    // Continuously updates the current touch position as the user drags across the screen
    sliderContainer.addEventListener('touchmove', (e) => {
        if (!isDragging) return;
        currentX = e.touches[0].clientX;
    });

    // When the touch ends, calculates the swipe distance and speed;
    // navigates to the next or previous slide if the swipe exceeds the distance
    // threshold (50px) or velocity threshold (0.3px/ms)
    sliderContainer.addEventListener('touchend', (e) => {
        if (!isDragging) return;
        isDragging = false;

        const diffX = startX - currentX;
        const diffTime = Date.now() - startTime;
        const threshold = 50; // minimum swipe distance
        const velocity = Math.abs(diffX) / diffTime;

        if (Math.abs(diffX) > threshold || velocity > 0.3) {
            if (diffX > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    });
}

/* =========================
   FADE IN ON SCROLL
========================= */

// Selects all elements marked for scroll-triggered fade-in animation
const fadeItems = document.querySelectorAll('.fade-in-up');

// Creates an IntersectionObserver that adds the 'visible' class to each element
// once it enters the viewport (at least 15% visible), then stops observing it
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target); // Stops observing once animation is triggered
        }
    });
}, { threshold: 0.15 });

// Registers each fade-in element with the observer to watch for scroll visibility
fadeItems.forEach(item => observer.observe(item));