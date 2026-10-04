(function () {
    'use strict';

    /*UTILITY*/

    // Shorthand for querySelector; accepts an optional context element (defaults to document)
    function $(sel, ctx) { return (ctx || document).querySelector(sel); }

    // Shorthand for querySelectorAll; returns a real array and accepts an optional context element
    function $$(sel, ctx) { return [...(ctx || document).querySelectorAll(sel)]; }

    // Validates an email address using a basic regex pattern (requires local@domain.tld format)
    function isValidEmail(v) { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()); }

    /*SCROLL REVEAL */

    // Selects all elements marked with the 'reveal' class for scroll-triggered visibility
    var revealEls = $$('.reveal');

    // Creates an IntersectionObserver that adds the 'visible' class to each element
    // once at least 12% of it enters the viewport, then stops observing it
    var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    // Registers each reveal element with the observer to watch for scroll visibility
    revealEls.forEach(function (el) { revealObserver.observe(el); });


    /*FAQ ACCORDION*/

    // Selects all FAQ item containers
    var faqItems = $$('.faq-item');

    faqItems.forEach(function (item) {
        var btn    = item.querySelector('.faq-question');
        var answer = item.querySelector('.faq-answer');

        // Listens for a click on each FAQ question button
        btn.addEventListener('click', function () {
            var isOpen = btn.getAttribute('aria-expanded') === 'true';

            // Collapses all FAQ items by resetting aria-expanded and removing maxHeight
            faqItems.forEach(function (other) {
                var otherBtn    = other.querySelector('.faq-question');
                var otherAnswer = other.querySelector('.faq-answer');
                otherBtn.setAttribute('aria-expanded', 'false');
                otherAnswer.style.maxHeight = null;
            });

            // If the clicked item was not already open, expands it by
            // setting aria-expanded and applying its full scroll height as maxHeight
            if (!isOpen) {
                btn.setAttribute('aria-expanded', 'true');
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });


    /*FORM HELPERS*/

    // Returns the closest ancestor element with a [data-field] attribute for a given input
    function getFormGroup(input) {
        return input.closest('[data-field]');
    }

    // Adds the 'is-invalid' class to the input's form group and displays the error message
    function setError(input, msg) {
        var group = getFormGroup(input);
        if (!group) return;
        group.classList.add('is-invalid');
        var errEl = group.querySelector('.err-msg');
        if (errEl) errEl.textContent = msg;
    }

    // Removes the 'is-invalid' class from the input's form group and clears the error message
    function clearError(input) {
        var group = getFormGroup(input);
        if (!group) return;
        group.classList.remove('is-invalid');
        var errEl = group.querySelector('.err-msg');
        if (errEl) errEl.textContent = '';
    }

    // Shows a feedback element (success/error banner) by toggling the 'show' class;
    // forces a reflow to re-trigger CSS animations, and auto-hides after 6 seconds if type is 'auto-hide'
    function showFeedback(el, type) {
        el.classList.remove('show');
        void el.offsetWidth; // reflow for animation re-trigger
        el.classList.add('show');
        if (type === 'auto-hide') {
            setTimeout(function () { el.classList.remove('show'); }, 6000);
        }
    }

    // Hides a feedback element by removing the 'show' class
    function hideFeedback(el) { el.classList.remove('show'); }

    // Disables the submit button and toggles the 'sending' class to show a loading state;
    // re-enables the button and removes the class when loading is done
    function setLoading(btn, loading) {
        btn.disabled = loading;
        if (loading) {
            btn.classList.add('sending');
        } else {
            btn.classList.remove('sending');
        }
    }

    // Attaches input and change listeners to each field to clear its error state
    // as soon as the user starts correcting it (live validation)
    function attachLiveValidation(inputs) {
        inputs.forEach(function (input) {
            input.addEventListener('input', function () { clearError(input); });
            input.addEventListener('change', function () { clearError(input); });
        });
    }

    // Select the phone input fields for the main contact form and the support form
    var phoneInput  = $('#phone');
    var sPhoneInput = $('#sPhone');

    // Formats the main contact form phone input to PH format (+63 XXXXXXXXXX);
    // strips country code prefix (63) and leading zero, then limits to 10 digits
    if (phoneInput) {
        phoneInput.addEventListener('input', function () {
            var digits = this.value.replace(/\D/g, '');
            if (digits.startsWith('63')) digits = digits.slice(2);
            if (digits.startsWith('0')) digits = digits.slice(1);
            if (digits.length > 10) digits = digits.slice(0, 10);
            this.value = digits.length ? '+63 ' + digits : '';
        });
    }

    // Formats the support form phone input to PH format (+63 XXXXXXXXXX);
    // applies the same normalization logic as the main contact form phone input
    if (sPhoneInput) {
        sPhoneInput.addEventListener('input', function () {
            var digits = this.value.replace(/\D/g, '');
            if (digits.startsWith('63')) digits = digits.slice(2);
            if (digits.startsWith('0')) digits = digits.slice(1);
            if (digits.length > 10) digits = digits.slice(0, 10);
            this.value = digits.length ? '+63 ' + digits : '';
        });
    }

    // Restricts both name inputs (main form and support form) to letters and spaces only,
    // stripping any digits or special characters on each keystroke
    var nameInputs = [$('#fullName'), $('#sName')];
    nameInputs.forEach(function (input) {
        if (input) {
            input.addEventListener('input', function () {
                this.value = this.value.replace(/[^a-zA-Z\s]/g, '');
            });
        }
    });
    function suggestValue(sourceEl, targetEl) {
    if (!sourceEl || !targetEl) return;
    
    var val = sourceEl.value.trim();
    if (!val) return;
    targetEl.value = val;
    clearError(targetEl);
    targetEl.style.transition = 'border-color 0.3s ease, box-shadow 0.3s ease';
    targetEl.style.borderColor = 'var(--gold)';
    targetEl.style.boxShadow = '0 0 0 3px rgba(240,177,61,0.25)';
    setTimeout(function () {
        targetEl.style.borderColor = '';
        targetEl.style.boxShadow = '';
    }, 1200);
}

function attachSuggestTrigger(sourceEl, targetEl) {
    if (!sourceEl || !targetEl) return;
    sourceEl.addEventListener('blur', function () { suggestValue(sourceEl, targetEl); });
    sourceEl.addEventListener('change', function () { suggestValue(sourceEl, targetEl); });
}

attachSuggestTrigger($('#fullName'), $('#sName'));
attachSuggestTrigger($('#email'),    $('#sEmail'));
attachSuggestTrigger($('#phone'),    $('#sPhone'));
attachSuggestTrigger($('#sName'),  $('#fullName'));
attachSuggestTrigger($('#sEmail'), $('#email'));
attachSuggestTrigger($('#sPhone'), $('#phone'));

    /*MAIN CONTACT FORM*/

    // Select the main contact form and its feedback banners and submit button
    var mainForm    = $('#mainForm');
    var mainSuccess = $('#mainSuccess');
    var mainError   = $('#mainError');
    var mainSubmit  = $('#mainSubmit');
    var subjectSelect = $('#subject');

    // Hide feedback banners on page load so they don't show before any submission
    if (mainSuccess) mainSuccess.style.display = 'none';
    if (mainError) mainError.style.display = 'none';

    if (mainForm) {
        var mainInputs = $$('input, select, textarea', mainForm);
        attachLiveValidation(mainInputs);
        var bookingMessageField = $('#bookingMessage') || $('#message');

        function formatStoredTravelDate(storedBooking) {
            if (!storedBooking) return '';

            var startDate = String(storedBooking.startDate || storedBooking.date || '').trim();
            var endDate = String(storedBooking.endDate || '').trim();

            if (startDate && endDate) {
                return startDate + ' to ' + endDate;
            }

            return startDate;
        }

        function applyStoredBookingMessage(destinationFromUrl) {
            if (!bookingMessageField) return;

            try {
                var storedBookingRaw = localStorage.getItem('bookingData');
                if (!storedBookingRaw) return;

                var storedBooking = JSON.parse(storedBookingRaw);
                if (!storedBooking) return;

                var resolvedDestination = (storedBooking.destination || destinationFromUrl || '').trim();
                var hasGeneratedDestinationOnlyValue = destinationFromUrl &&
                    bookingMessageField.value.trim() === destinationFromUrl.trim() + ',';

                if (!resolvedDestination) return;
                if (bookingMessageField.value.trim() && !hasGeneratedDestinationOnlyValue) return;

                bookingMessageField.value =
                    'Booking Inquiry\n\n' +
                    'Destination: ' + resolvedDestination + '\n' +
                    'Travel Date: ' + formatStoredTravelDate(storedBooking) + '\n' +
                    'Adults: ' + String(storedBooking.adults || '') + '\n' +
                    'Children: ' + String(storedBooking.children || '');

                clearError(bookingMessageField);
            } catch (error) {
                // Prevent malformed localStorage data from breaking the contact page.
            }
        }

        // Reads URL query parameters to auto-populate the subject dropdown
        // and optionally pre-fill the message field based on the concern type
        var urlParams = new URLSearchParams(window.location.search);
        var concern = urlParams.get('concern');
        var destination = urlParams.get('destination');
        var bookingSubject = urlParams.get('subject');

        // Auto-selects 'Booking' in the subject dropdown if concern=booking is in the URL
        if (concern === 'booking') {
            if (subjectSelect) {
                subjectSelect.value = 'Booking';
                clearError(subjectSelect);
            }
        // Auto-selects 'Custom Itenary' in the subject dropdown if concern=custom is in the URL
        } else if (concern === 'custom') {
            if (subjectSelect) {
                subjectSelect.value = 'Custom Itenary';
                clearError(subjectSelect);
            }
        // Legacy support: auto-selects 'Booking' and pre-fills the message with
        // the destination value when using the old subject + destination URL parameter format
        } else if (bookingSubject === 'Booking' && destination) {
            if (subjectSelect) {
                subjectSelect.value = 'Booking';
                clearError(subjectSelect);
            }

            var bookingMessage = $('#bookingMessage') || $('#message');
            if (bookingMessage) {
                bookingMessage.value = destination.trim() + ',';
                clearError(bookingMessage);
            }
        }

        applyStoredBookingMessage(destination);

        mainForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Hide any previously shown feedback banners before re-validating
            hideFeedback(mainSuccess);
            hideFeedback(mainError);
            mainSuccess.style.display = 'none';
            mainError.style.display = 'none';

            // Grab all form field references and set a validity flag
            var fullName    = $('#fullName');
            var email       = $('#email');
            var phone       = $('#phone');
            var subject     = $('#subject');
            var message     = $('#message');
            var valid       = true;

            // Validates that the full name field is not empty
            if (!fullName.value.trim()) {
                setError(fullName, 'Please enter your full name.');
                valid = false;
            }

            // Validates that the email field is not empty and matches a valid format
            if (!email.value.trim()) {
                setError(email, 'Please enter your email address.');
                valid = false;
            } else if (!isValidEmail(email.value)) {
                setError(email, 'Please enter a valid email address.');
                valid = false;
            }

            // Validates that the phone field is not empty and matches the PH format (+63 XXXXXXXXXX)
            if (!phone.value.trim()) {
                setError(phone, 'Please enter your phone number.');
                valid = false;
            } else if (!/^\+63 \d{10}$/.test(phone.value.trim())) {
                setError(phone, 'Please enter a valid PH number.');
                valid = false;
            }

            // Validates that a subject has been selected from the dropdown
            if (!subject.value) {
                setError(subject, 'Please select a subject.');
                valid = false;
            }

            // Validates that the message field is not empty
            if (!message.value.trim()) {
                setError(message, 'Please enter a message.');
                valid = false;
            }

            // If any validation failed, show the error banner and stop submission
            if (!valid) {
                mainError.style.display = '';
                showFeedback(mainError, 'persist');
                return;
            }

            // Simulate send
            suggestValue($('#fullName'), $('#sName'));
    suggestValue($('#email'),    $('#sEmail'));
    suggestValue($('#phone'),    $('#sPhone'));
            setLoading(mainSubmit, true);

            setTimeout(function () {
                setLoading(mainSubmit, false);
                mainSuccess.style.display = '';
                showFeedback(mainSuccess, 'auto-hide');
                mainForm.reset();
            }, 1800);

        });
    }


    /* SUPPORT / HELPDESK FORM*/

    // Select the support form and its feedback banners, submit button, concern dropdown, and message textarea
    var supportForm    = $('#supportForm');
    var supportSuccess = $('#supportSuccess');
    var supportError   = $('#supportError');
    var supportSubmit  = $('#supportSubmit');
    var concernSelect  = $('#concernType');
    var sMessage       = $('#sMessage');

    // Hide feedback banners on page load so they don't show before any submission
    if (supportSuccess) supportSuccess.style.display = 'none';
    if (supportError) supportError.style.display = 'none';

    // Maps each concern type value to a contextual placeholder suggestion
    // to guide the user on what to write in the message textarea
    var placeholderMap = {
        'Booking':      'E.g. I\'d like to book a tour to Palawan for 4 people on June 15–20. What packages are available?',
        'Destinations': 'E.g. Can you suggest itineraries for Siargao or Batanes? Best time to visit?',
        'Payments':     'E.g. Do you accept GCash or PayPal? Is a downpayment required to confirm my booking?',
        'Refunds':      'E.g. I need to cancel my booking due to an emergency. What is the refund process?',
        'Others':       'Please describe your concern in as much detail as possible so we can assist you quickly.',
        '':             'Ask about packages, pricing, or travel dates…',
    };

    if (concernSelect && sMessage) {
        // Updates the message textarea placeholder based on the selected concern type,
        // and briefly highlights the textarea border in gold to draw the user's attention
        concernSelect.addEventListener('change', function () {
            var ph = placeholderMap[concernSelect.value] || placeholderMap[''];
            sMessage.setAttribute('placeholder', ph);
            sMessage.style.transition = 'border-color 0.3s';
            sMessage.style.borderColor = 'var(--gold)';
            setTimeout(function () { sMessage.style.borderColor = ''; }, 800);
        });
    }

    if (supportForm) {
        var supportInputs = $$('input, select, textarea', supportForm);
        attachLiveValidation(supportInputs);

        supportForm.addEventListener('submit', function (e) {
            e.preventDefault();

            // Hide any previously shown feedback banners before re-validating
            hideFeedback(supportSuccess);
            hideFeedback(supportError);
            supportSuccess.style.display = 'none';
            supportError.style.display = 'none';

            // Grab all support form field references and set a validity flag
            var sName       = $('#sName');
            var sEmail      = $('#sEmail');
            var sPhone      = $('#sPhone');
            var sConcern    = $('#concernType');
            var sMsgEl      = $('#sMessage');
            var valid       = true;

            // Validates that the full name field is not empty
            if (!sName.value.trim()) {
                setError(sName, 'Please enter your full name.');
                valid = false;
            }

            // Validates that the email field is not empty and matches a valid format
            if (!sEmail.value.trim()) {
                setError(sEmail, 'Please enter your email address.');
                valid = false;
            } else if (!isValidEmail(sEmail.value)) {
                setError(sEmail, 'Please enter a valid email address.');
                valid = false;
            }

            // Validates that the phone field is not empty and matches the PH format (+63 XXXXXXXXXX)
            if (!sPhone.value.trim()) {
                setError(sPhone, 'Please enter your phone number.');
                valid = false;
            } else if (!/^\+63 \d{10}$/.test(sPhone.value.trim())) {
                setError(sPhone, 'Please enter a valid PH number.');
                valid = false;
            }

            // Validates that a concern type has been selected from the dropdown
            if (!sConcern.value) {
                setError(sConcern, 'Please select a concern type.');
                valid = false;
            }

            // Validates that the message/concern field is not empty
            if (!sMsgEl.value.trim()) {
                setError(sMsgEl, 'Please describe your concern.');
                valid = false;
            }

            // If any validation failed, show the error banner and stop submission
            if (!valid) {
                supportError.style.display = '';
                showFeedback(supportError, 'persist');
                return;
            }

            // Simulates a form submission with a 1.8s loading delay, then shows the success banner,
            // resets the form, and restores the default message placeholder
            setLoading(supportSubmit, true);

            setTimeout(function () {
                setLoading(supportSubmit, false);
                supportSuccess.style.display = '';
                showFeedback(supportSuccess, 'auto-hide');
                supportForm.reset();
                if (sMessage) sMessage.setAttribute('placeholder', placeholderMap['']);
            }, 1800);
        });
    }

    // Selects the "Book Now" shortcut button that pre-selects 'Booking' in the main form subject dropdown
    var bookNowBtn = $('#bookNowBtn');
    if (bookNowBtn && subjectSelect) {
        // When clicked, auto-sets the subject dropdown to 'Booking' and clears any existing error on it
        bookNowBtn.addEventListener('click', function () {
            subjectSelect.value = 'Booking';
            clearError(subjectSelect);
        });
    }


    /* SMOOTH SCROLL for anchor links*/

    // Attaches a click listener to every anchor link that points to an on-page section (href starts with #);
    // scrolls smoothly to the target element with an 80px offset to account for the fixed navbar height
    $$('a[href^="#"]').forEach(function (anchor) {
        anchor.addEventListener('click', function (e) {
            var target = document.querySelector(anchor.getAttribute('href'));
            if (target) {
                e.preventDefault();
                var offset = 80; // navbar height
                var top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top: top, behavior: 'smooth' });
            }
        });
    });

})();
