// ============================================================
// DOM ELEMENT SELECTORS
// ============================================================

// Selects all text cards for the simple image modal
const cards = document.querySelectorAll(".text-card");
const modal = document.getElementById("modal");
const modalImg = document.getElementById("modal-img");
const closeBtn = document.querySelector(".close-btn");

// Selects elements for the destination preview modal
const previewModal = document.getElementById('destination-preview');
const previewImage = document.getElementById('destination-preview-image');
const previewButtons = document.querySelectorAll('[data-preview-src]');
const previewBookLink = previewModal.querySelector('.modal-preview__book');
const previewDownloadLink = document.getElementById('destination-preview-download');
const closePreviewButtons = previewModal.querySelectorAll('.modal-preview__backdrop, .modal-preview__close');


// ============================================================
// DESTINATION PREVIEW MODAL — OPEN & CLOSE FUNCTIONS
// ============================================================

// Opens the destination preview modal and populates it with
// the image, alt text, and a dynamic booking link from the clicked button's dataset
function openPreview(button) {
    previewImage.src = button.dataset.previewSrc;
    previewImage.alt = button.dataset.previewAlt;
    previewBookLink.href = 'contact.html?subject=Booking&destination=' + encodeURIComponent(button.dataset.previewAlt);
    previewDownloadLink.href = button.dataset.previewSrc;
    previewDownloadLink.download = `${button.dataset.previewAlt.replace(/[^a-z0-9]+/gi, '-').replace(/^-|-$/g, '').toLowerCase()}-package.jpg`;
    previewModal.classList.add('is-open');
    previewModal.setAttribute('aria-hidden', 'false');
    document.body.classList.add('modal-open');
    previewModal.querySelector('.modal-preview__close').focus();
}

// Closes the destination preview modal and resets the preview image source
function closePreview() {
    previewModal.classList.remove('is-open');
    previewModal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('modal-open');
    previewImage.src = '';
    previewDownloadLink.href = '#';
    previewDownloadLink.removeAttribute('download');
}


// ============================================================
// DESTINATION PREVIEW MODAL — EVENT LISTENERS
// ============================================================

// Attaches a click event to each preview button to trigger openPreview()
previewButtons.forEach((button) => {
    button.addEventListener('click', () => openPreview(button));
});

// Attaches a click event to backdrop and close button to trigger closePreview()
closePreviewButtons.forEach((button) => {
    button.addEventListener('click', closePreview);
});

// Closes the preview modal when the Escape key is pressed
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && previewModal.classList.contains('is-open')) {
        closePreview();
    }
});


// ============================================================
// URL SEARCH PARAMS — AUTO-SCROLL TO MATCHED DESTINATION
// ============================================================

// Reads the 'destination' query parameter from the current URL
const searchParams = new URLSearchParams(window.location.search);
const searchedDestination = searchParams.get('destination');

function normalizeDestination(value) {
    return (value || '')
        .trim()
        .toLowerCase()
        .replace(/\s*-\s*(manila|cebu)\s+departure$/i, '')
        .replace(/\s{2,}/g, ' ');
}

function getCardDestination(button) {
    const previewAlt = button.dataset.previewAlt || '';
    const imageAlt = button.querySelector('img')?.alt || '';
    const heading = button.querySelector('h4')?.textContent || '';

    return [
        normalizeDestination(previewAlt),
        normalizeDestination(imageAlt),
        normalizeDestination(heading)
    ];
}

// If a destination was passed via URL, finds the matching card and scrolls to it
if (searchedDestination) {
    const normalizedDestination = normalizeDestination(searchedDestination);

    const matchingButtons = Array.from(previewButtons).filter((button) =>
        getCardDestination(button).some((destination) =>
            destination === normalizedDestination ||
            destination.includes(normalizedDestination) ||
            normalizedDestination.includes(destination)
        )
    );

    matchingButtons.forEach((button) => {
        button.classList.add('search-match');
    });

    if (matchingButtons.length) {
        window.addEventListener('load', () => {
            matchingButtons[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
            matchingButtons[0].focus({ preventScroll: true });
        });
    }
}


// ============================================================
// SIMPLE IMAGE MODAL — EVENT LISTENERS
// ============================================================

// Opens the simple modal and sets its image source from the clicked card's data attribute
cards.forEach(card => {
    card.addEventListener("click", () => {
        const imgSrc = card.getAttribute("data-img");
        modalImg.src = imgSrc;
        modal.classList.add("show");
    });
});

// Closes the simple modal when the close button is clicked
closeBtn.addEventListener("click", () => {
    modal.classList.remove("show");
});

// Closes the simple modal when clicking outside the modal content (on the backdrop)
modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.classList.remove("show");
    }
});

// Closes the simple modal when the Escape key is pressed
document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
        modal.classList.remove("show");
    }
});
