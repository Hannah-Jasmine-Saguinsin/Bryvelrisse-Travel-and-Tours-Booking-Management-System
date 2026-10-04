// ============================================================
// STATIC DATA — DESTINATIONS & PACKAGE DATE RANGES
// ============================================================

// List of all available travel destinations
const DESTINATIONS = [
  "South Korea",
  "Shanghai, China",
  "Taiwan",
  "Hongkong",
  "Singapore",
  "Thailand",
  "Japan",
  "Batanes, Philippines",
  "El Nido, Philippines",
  "Siargao, Philippines",
  "Iloilo, Philippines",
  "Boracay, Philippines"
];

// Maps each destination (lowercase) to its available package date ranges [start, end]
const PACKAGE_DATE_RANGES = {
  "south korea": [
    ["2026-09-02", "2026-09-07"],
    ["2026-10-16", "2026-10-21"],
    ["2026-10-17", "2026-10-22"],
    ["2026-11-02", "2026-11-07"],
    ["2026-11-12", "2026-11-17"],
    ["2026-11-14", "2026-11-19"],
    ["2026-11-20", "2026-11-25"],
    ["2026-11-22", "2026-11-27"],
    ["2026-11-26", "2026-12-01"],
    ["2026-11-29", "2026-12-04"],
    ["2026-11-30", "2026-12-05"],
    ["2026-04-16", "2026-04-21"],
    ["2026-04-21", "2026-04-26"],
    ["2026-04-23", "2026-04-28"],
    ["2026-05-09", "2026-05-14"],
    ["2026-05-16", "2026-05-21"],
    ["2026-10-27", "2026-11-01"],
    ["2026-11-28", "2026-12-03"],
    ["2026-12-19", "2026-12-24"],
    ["2026-12-22", "2026-12-27"],
    ["2026-12-24", "2026-12-29"],
    ["2026-12-25", "2026-12-30"],
    ["2026-12-28", "2027-01-02"]
  ],
  "shanghai, china": [
    ["2026-05-20", "2026-05-24"],
    ["2026-05-29", "2026-06-02"],
    ["2026-05-27", "2026-05-31"],
    ["2026-06-08", "2026-06-12"],
    ["2026-06-09", "2026-06-13"],
    ["2026-06-12", "2026-06-16"],
    ["2026-08-25", "2026-08-29"],
    ["2026-09-02", "2026-09-06"],
    ["2026-09-17", "2026-09-21"],
    ["2026-09-30", "2026-10-04"],
    ["2026-10-02", "2026-10-06"],
    ["2026-10-08", "2026-10-12"],
    ["2026-10-26", "2026-10-30"],
    ["2026-10-28", "2026-11-01"],
    ["2026-10-29", "2026-11-02"],
    ["2026-10-30", "2026-11-03"],
    ["2026-11-03", "2026-11-07"],
    ["2026-11-06", "2026-11-10"],
    ["2026-11-12", "2026-11-16"],
    ["2026-11-26", "2026-11-30"],
    ["2026-12-05", "2026-12-09"],
    ["2026-12-27", "2026-12-31"],
    ["2026-12-28", "2027-01-01"],
    ["2027-02-24", "2027-02-28"],
    ["2027-03-04", "2027-03-08"]
  ],
  "taiwan": [
    ["2026-06-03", "2026-06-07"],
    ["2026-06-09", "2026-06-13"],
    ["2026-07-24", "2026-07-28"],
    ["2026-08-21", "2026-08-25"],
    ["2026-09-09", "2026-09-13"],
    ["2026-10-28", "2026-11-01"],
    ["2026-11-27", "2026-12-01"],
    ["2026-12-08", "2026-12-12"],
    ["2026-12-22", "2026-12-26"],
    ["2026-12-23", "2026-12-27"],
    ["2026-12-24", "2026-12-28"],
    ["2026-12-25", "2026-12-29"],
    ["2026-12-26", "2026-12-30"],
    ["2026-12-30", "2027-01-03"]
  ],
  "hongkong": [
    ["2026-05-06", "2026-05-09"],
    ["2026-05-15", "2026-05-18"],
    ["2026-05-21", "2026-05-24"],
    ["2026-06-10", "2026-06-13"],
    ["2026-08-20", "2026-08-23"],
    ["2026-09-11", "2026-09-14"],
    ["2026-10-28", "2026-10-31"],
    ["2026-11-28", "2026-12-01"],
    ["2026-12-22", "2026-12-25"],
    ["2026-12-23", "2026-12-26"],
    ["2026-12-25", "2026-12-28"],
    ["2026-12-26", "2026-12-29"],
    ["2026-12-27", "2026-12-30"]
  ],
  "singapore": [
    ["2026-04-29", "2026-05-02"],
    ["2026-04-30", "2026-05-03"],
    ["2026-05-06", "2026-05-09"],
    ["2026-05-13", "2026-05-16"],
    ["2026-05-28", "2026-05-31"],
    ["2026-06-09", "2026-06-12"],
    ["2026-07-02", "2026-07-06"],
    ["2026-08-27", "2026-08-31"],
    ["2026-09-23", "2026-09-26"],
    ["2026-10-28", "2026-11-01"],
    ["2026-11-26", "2026-11-30"],
    ["2026-12-04", "2026-12-08"],
    ["2026-12-23", "2026-12-27"],
    ["2026-12-24", "2026-12-28"],
    ["2026-12-25", "2026-12-29"],
    ["2026-12-26", "2026-12-30"],
    ["2026-12-31", "2027-01-04"],
    ["2027-01-13", "2027-01-17"],
    ["2027-02-11", "2027-02-15"],
    ["2027-02-24", "2027-02-28"],
    ["2027-03-23", "2027-03-27"]
  ],
  "thailand": [
    ["2026-04-30", "2026-05-03"],
    ["2026-05-01", "2026-05-05"],
    ["2026-05-06", "2026-05-10"],
    ["2026-06-10", "2026-06-14"],
    ["2026-06-12", "2026-06-16"],
    ["2026-07-22", "2026-07-26"],
    ["2026-08-21", "2026-08-25"],
    ["2026-08-27", "2026-08-31"],
    ["2026-09-16", "2026-09-20"],
    ["2026-10-31", "2026-11-04"],
    ["2026-11-29", "2026-12-03"],
    ["2026-12-05", "2026-12-09"],
    ["2026-12-22", "2026-12-26"],
    ["2026-12-26", "2026-12-30"],
    ["2026-12-29", "2027-01-02"],
    ["2027-01-12", "2027-01-16"],
    ["2027-02-10", "2027-02-14"],
    ["2027-02-11", "2027-02-15"],
    ["2027-02-24", "2027-02-28"],
    ["2027-03-23", "2027-03-27"],
    ["2027-03-24", "2027-03-28"]
  ],
  "japan": [
    ["2026-04-07", "2026-04-11"],
    ["2026-04-22", "2026-04-26"],
    ["2026-05-06", "2026-05-10"],
    ["2026-05-16", "2026-05-20"],
    ["2026-06-10", "2026-06-14"],
    ["2026-08-27", "2026-08-31"],
    ["2026-10-27", "2026-10-31"],
    ["2026-11-27", "2026-12-01"],
    ["2026-12-21", "2026-12-25"],
    ["2026-12-24", "2026-12-28"],
    ["2026-12-25", "2026-12-29"],
    ["2026-07-29", "2026-08-02"],
    ["2026-09-15", "2026-09-19"],
    ["2026-11-02", "2026-11-06"],
    ["2026-11-26", "2026-11-30"],
    ["2026-12-08", "2026-12-12"],
    ["2026-12-17", "2026-12-21"]
  ],
  "batanes, philippines": [
    ["2026-05-15", "2026-05-18"],
    ["2026-06-26", "2026-06-29"],
    ["2026-07-10", "2026-07-13"],
    ["2026-08-21", "2026-08-24"],
    ["2026-09-04", "2026-09-07"],
    ["2026-10-30", "2026-11-02"],
    ["2026-11-20", "2026-11-23"],
    ["2026-12-23", "2026-12-26"],
    ["2026-12-30", "2027-01-02"]
  ],
  "el nido, philippines": [
    ["2026-04-10", "2026-04-13"],
    ["2026-04-16", "2026-04-19"],
    ["2026-04-23", "2026-04-26"],
    ["2026-04-28", "2026-05-01"],
    ["2026-04-30", "2026-05-03"],
    ["2026-05-01", "2026-05-04"],
    ["2026-05-08", "2026-05-11"],
    ["2026-05-13", "2026-05-16"],
    ["2026-05-21", "2026-05-24"],
    ["2026-05-28", "2026-05-31"],
    ["2026-06-11", "2026-06-14"],
    ["2026-07-02", "2026-07-05"],
    ["2026-08-28", "2026-08-31"],
    ["2026-09-17", "2026-10-31"],
    ["2026-10-28", "2026-12-01"],
    ["2026-12-24", "2026-12-27"]
  ],
  "siargao, philippines": [
    ["2026-03-28", "2026-04-01"],
    ["2026-04-09", "2026-04-13"],
    ["2026-04-30", "2026-05-04"],
    ["2026-06-12", "2026-06-16"]
  ],
  "iloilo, philippines": [
    ["2026-04-30", "2026-05-03"],
    ["2026-05-01", "2026-05-04"],
    ["2026-05-08", "2026-05-11"],
    ["2026-05-13", "2026-05-16"],
    ["2026-06-10", "2026-06-13"],
    ["2026-07-22", "2026-07-25"],
    ["2026-08-20", "2026-08-23"],
    ["2026-09-10", "2026-09-13"],
    ["2026-10-29", "2026-11-01"],
    ["2026-11-27", "2026-11-30"]
  ]
};

// Generates a URL map for each destination pointing to its filtered destinations page
const DESTINATION_LINKS = DESTINATIONS.reduce((links, destination) => {
  links[destination.toLowerCase()] = `destinations.html?destination=${encodeURIComponent(destination)}#destination-columns`;
  return links;
}, {});


// ============================================================
// DOM ELEMENT SELECTORS
// ============================================================

// Destination search box elements
const destinationBox = document.getElementById("destination-box");
const destinationInput = document.getElementById("destination-input");
const suggestionsList = document.getElementById("suggestions");

// Date picker box elements — calendar dropdown is created dynamically and appended
const dateBox = document.getElementById("date-box");
const dateInput = document.getElementById("date-input");
const dateTrigger = document.getElementById("date-trigger");
const calendarDropdown = document.createElement("div");
calendarDropdown.className = "calendar-dropdown";
calendarDropdown.id = "calendar-dropdown";
calendarDropdown.setAttribute("role", "dialog");
calendarDropdown.setAttribute("aria-label", "Available travel dates");
dateBox.appendChild(calendarDropdown);

// People (passenger count) box elements
const peopleBox = document.getElementById("people-box");
const peopleDisplay = document.getElementById("people-display");
const peopleLabel = document.getElementById("people-label");
const peopleDropdown = document.getElementById("people-dropdown");

// Adult and child count controls
const adultDec = document.getElementById("adult-dec");
const adultInc = document.getElementById("adult-inc");
const adultCount = document.getElementById("adult-count");
const childDec = document.getElementById("child-dec");
const childInc = document.getElementById("child-inc");
const childCount = document.getElementById("child-count");

// Search button and search bar container
const searchBtn = document.getElementById("search-button");
const searchBar = document.querySelector(".search-bar");
const BOOKING_STORAGE_KEY = "bookingData";


// ============================================================
// STATE VARIABLES
// ============================================================

let selectedDate = null;                          // Currently selected travel date
let calendarViewDate = new Date(2026, 3, 1);      // Default calendar view (April 2026)
let calendarMode = "months";                      // Calendar display mode: 'months' or 'days'
let adults = 1;                                   // Default adult passenger count
let children = 0;                                 // Default child passenger count
let errorTimeoutId = null;                        // Timeout ID for auto-dismissing error messages
let typingTimer;                                  // Debounce timer for destination input

// Abbreviated and full month name arrays used for calendar rendering
const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
const fullMonthNames = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December"
];


// ============================================================
// DATE UTILITY FUNCTIONS
// ============================================================

// Returns today's date with time zeroed out for accurate comparisons
function getToday() {
  const today = new Date();
  today.setHours(0, 0, 0, 0);
  return today;
}

// Formats a Date object to MM/DD/YYYY for display in the date input field
function formatDate(date) {
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  const year = date.getFullYear();
  return `${month}/${day}/${year}`;
}

// Formats a Date object to YYYY-MM-DD for use as a data key or URL parameter
function formatDateForInput(date) {
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  const year = date.getFullYear();
  return `${year}-${month}-${day}`;
}

// Parses an ISO date string (YYYY-MM-DD) into a midnight-normalized Date object
function parseIsoDate(value) {
  const parsedDate = new Date(`${value}T00:00:00`);
  parsedDate.setHours(0, 0, 0, 0);
  return parsedDate;
}

// Parses a date string in ISO or display (MM/DD/YYYY) format; returns null if invalid
function parseNativeDate(value) {
  if (!value) {
    return null;
  }

  const isoMatch = value.match(/^(\d{4})-(\d{2})-(\d{2})$/);
  const displayMatch = value.match(/^(\d{2})\/(\d{2})\/(\d{4})$/);
  const parsedDate = isoMatch
    ? new Date(`${value}T00:00:00`)
    : displayMatch
      ? new Date(Number(displayMatch[3]), Number(displayMatch[1]) - 1, Number(displayMatch[2]))
      : new Date(value);

  if (Number.isNaN(parsedDate.getTime())) {
    return null;
  }

  parsedDate.setHours(0, 0, 0, 0);
  return parsedDate;
}

// Returns true if the given date is today or in the future
function isDateAllowed(date) {
  return date >= getToday();
}

// Returns true if two Date objects represent the same calendar day
function sameDate(dateA, dateB) {
  return (
    dateA &&
    dateB &&
    dateA.getFullYear() === dateB.getFullYear() &&
    dateA.getMonth() === dateB.getMonth() &&
    dateA.getDate() === dateB.getDate()
  );
}


// ============================================================
// DESTINATION UTILITY FUNCTIONS
// ============================================================

// Returns a list of unique, future-allowed Date objects for the given destination
function getAvailableDatesForDestination(destination) {
  const normalized = destination.trim().toLowerCase();

  if (!normalized || !DESTINATIONS.some((item) => item.toLowerCase() === normalized)) {
    return [];
  }

  const ranges = PACKAGE_DATE_RANGES[normalized] || [];
  const dates = ranges.map(([startValue]) => parseIsoDate(startValue));

  return dates.filter((date, index, allDates) =>
    isDateAllowed(date) && allDates.findIndex((item) => sameDate(item, date)) === index
  );
}

// Returns a Set of YYYY-MM-DD keys for all available dates of a destination
function getAvailableDateKeysForDestination(destination) {
  return new Set(getAvailableDatesForDestination(destination).map(formatDateForInput));
}

// Returns a Set of YYYY-MM keys for all months that have available dates
function getAvailableMonthKeysForDestination(destination) {
  const monthKeys = new Set();

  getAvailableDatesForDestination(destination).forEach((date) => {
    monthKeys.add(`${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`);
  });

  return monthKeys;
}

// Returns the earliest available date for a given destination, or null if none
function getFirstAvailableDate(destination) {
  return getAvailableDatesForDestination(destination).sort((a, b) => a - b)[0] || null;
}

// Returns true if the given destination has an available package on the specified date
function destinationHasAvailableDate(destination, date) {
  return getAvailableDatesForDestination(destination).some((availableDate) => sameDate(availableDate, date));
}

// Finds the exact matching destination string (case-insensitive); returns null if not found
function getDestinationMatch(value) {
  const normalized = value.trim().toLowerCase();
  return DESTINATIONS.find((destination) => destination.toLowerCase() === normalized) || null;
}

// Returns the destinations page link for a given destination, or '#packages' as fallback
function getDestinationPackagesLink(destination) {
  return DESTINATION_LINKS[destination.toLowerCase()] || "#packages";
}

// Finds the matching package date range [startDate, endDate] for a destination and date
function getPackageDateRangeForSelection(destination, date) {
  if (!destination || !date) {
    return null;
  }

  const normalized = destination.trim().toLowerCase();
  const ranges = PACKAGE_DATE_RANGES[normalized] || [];
  const selectedDateKey = formatDateForInput(date);
  const matchingRange = ranges.find(([startValue]) => startValue === selectedDateKey);

  if (!matchingRange) {
    return null;
  }

  return {
    startDate: matchingRange[0],
    endDate: matchingRange[1]
  };
}

// Returns the currently typed destination if it exactly matches a known destination
function getCurrentDestination() {
  return getDestinationMatch(destinationInput.value.trim());
}


// ============================================================
// UI STATE — BOX ACTIVE / FILLED STATES
// ============================================================

// Adds or removes the 'filled' class based on whether a box has a value
function setBoxPersistentState(box, hasValue) {
  box.classList.toggle("filled", hasValue);
}

// Adds the 'active' class to a box to show it is currently focused
function activateBox(box) {
  box.classList.add("active");
}

// Syncs the filled/active state of all three search boxes based on current values
function updatePersistentStates() {
  setBoxPersistentState(destinationBox, destinationInput.value.trim().length > 0);
  setBoxPersistentState(dateBox, Boolean(selectedDate || dateInput.value));
  setBoxPersistentState(peopleBox, adults > 1 || children > 0);
}

// Removes 'active' state from boxes that have no entered value
function closeBoxesIfEmpty() {
  if (!destinationInput.value.trim()) {
    destinationBox.classList.remove("active");
    closeDestinationPanel();
  }

  if (!dateInput.value && !selectedDate) {
    dateBox.classList.remove("active");
    closeDatePanel();
  }

  if (adults <= 1 && children <= 0) {
    peopleBox.classList.remove("active");
    peopleDropdown.classList.remove("show");
    peopleBox.classList.remove("dropdown-open");
  }
}


// ============================================================
// DESTINATION PANEL — OPEN, CLOSE & SUGGESTIONS
// ============================================================

// Opens the destination panel and shows suggestions if the input has a value
function openDestinationPanel() {
  activateBox(destinationBox);

  const value = destinationInput.value.trim();

  if (value.length > 0) {
    buildSuggestions(value);
  } else {
    suggestionsList.innerHTML = "";
    suggestionsList.classList.remove("show");
  }
}

// Hides the suggestions dropdown and clears its content
function closeDestinationPanel() {
  suggestionsList.innerHTML = "";
  suggestionsList.classList.remove("show");
}

// Focuses the destination input on the next animation frame and moves cursor to end
function focusDestinationInput() {
  window.requestAnimationFrame(() => {
    destinationInput.focus();
    const valueLength = destinationInput.value.length;
    destinationInput.setSelectionRange(valueLength, valueLength);
  });
}

// Strips digits and excess spaces from destination input to prevent invalid entries
function normalizeDestinationValue(value) {
  return value.replace(/[0-9]/g, "").replace(/\s{2,}/g, " ");
}

// Filters DESTINATIONS by query and renders matching buttons in the suggestions list
function buildSuggestions(query) {
  const normalizedQuery = query.trim().toLowerCase();

  if (!normalizedQuery) {
    suggestionsList.innerHTML = "";
    suggestionsList.classList.remove("show");
    return;
  }

  suggestionsList.innerHTML = "";

  const matches = DESTINATIONS.filter((destination) =>
    destination.toLowerCase().includes(normalizedQuery)
  );

  if (matches.length === 0) {
    suggestionsList.classList.remove("show");
    showError(
      "No destinations are available. Please explore more packages for other available options.",
      "Click here.",
      "destinations.html#destination-columns"
    );
    return;
  }

  matches.forEach((destination) => {
    const option = document.createElement("button");
    option.type = "button";
    option.className = "suggestion-item";
    option.textContent = destination;

    // On click: fills the input, closes the panel, refreshes the date, and moves focus to date box
    option.addEventListener("click", (event) => {
      event.stopPropagation();
      destinationInput.value = destination;
      activateBox(destinationBox);
      updatePersistentStates();
      clearError();
      closeDestinationPanel();
      refreshSelectedDateForDestination();
      dateTrigger.focus();
    });

    suggestionsList.appendChild(option);
  });

  suggestionsList.classList.add("show");
}

// Clears the selected date if it's no longer valid for the newly typed destination
function refreshSelectedDateForDestination() {
  const destination = getCurrentDestination();

  if (selectedDate && (!destination || !destinationHasAvailableDate(destination, selectedDate))) {
    clearDateSelection();
  }

  if (calendarDropdown.classList.contains("show")) {
    if (destination) {
      ensureCalendarMonth(destination);
    }

    renderCalendar();
  }
}


// ============================================================
// DATE PANEL — OPEN, CLOSE & SYNC
// ============================================================

// Collapses the calendar dropdown and updates the trigger's aria-expanded attribute
function closeDatePanel() {
  dateTrigger.setAttribute("aria-expanded", "false");
  calendarDropdown.classList.remove("show");
}

// Opens the calendar dropdown, validates destination, and renders the calendar
function openDateCalendar() {
  activateBox(dateBox);
  dateTrigger.setAttribute("aria-expanded", "true");
  calendarDropdown.classList.add("show");

  const destination = getCurrentDestination();

  if (!destination) {
    showError("Please select a destination first.");
  } else {
    ensureCalendarMonth(destination);
    calendarMode = "months";
    clearError();
  }

  renderCalendar();
}

// Sets selectedDate and updates the date input field to show the formatted date
function syncDateInput(date) {
  selectedDate = new Date(date);
  selectedDate.setHours(0, 0, 0, 0);
  dateInput.value = formatDate(selectedDate);
  dateInput.dataset.filled = "true";
  updatePersistentStates();
}

// Resets the selected date and clears the date input field
function clearDateSelection() {
  selectedDate = null;
  dateInput.value = "";
  delete dateInput.dataset.filled;
  updatePersistentStates();
}

// Parses and validates the current date input value; clears or shows errors as needed
function applySelectedDate() {
  const parsedDate = parseNativeDate(dateInput.value);

  if (!parsedDate) {
    clearDateSelection();
    return true;
  }

  if (!isDateAllowed(parsedDate)) {
    showError(`Please choose a date on or after ${formatDate(getToday())}.`);
    clearDateSelection();
    return false;
  }

  const destination = getCurrentDestination();
  if (destination && !destinationHasAvailableDate(destination, parsedDate)) {
    showError("Please choose one of the available package dates.");
    clearDateSelection();
    return false;
  }

  syncDateInput(parsedDate);
  clearError();
  return true;
}


// ============================================================
// CALENDAR RENDERING
// ============================================================

// Ensures the calendar view is set to the month of the selected or first available date
function ensureCalendarMonth(destination) {
  if (selectedDate && destinationHasAvailableDate(destination, selectedDate)) {
    calendarViewDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 1);
    return;
  }

  const firstAvailableDate = getFirstAvailableDate(destination);
  if (firstAvailableDate) {
    calendarViewDate = new Date(firstAvailableDate.getFullYear(), firstAvailableDate.getMonth(), 1);
  }
}

// Builds and renders the full calendar header and body based on current calendarMode
function renderCalendar() {
  const destination = getCurrentDestination();
  calendarDropdown.innerHTML = "";

  if (!destination) {
    calendarDropdown.innerHTML = '<p class="cal-empty">Select a destination first.</p>';
    return;
  }

  const availableDates = getAvailableDatesForDestination(destination);
  if (!availableDates.length) {
    calendarDropdown.innerHTML = '<p class="cal-empty">No available dates for this destination.</p>';
    return;
  }

  // Build calendar header with prev/next year navigation and month/year labels
  const header = document.createElement("div");
  header.className = "cal-header";

  const previousButton = document.createElement("button");
  previousButton.type = "button";
  previousButton.className = "cal-nav-btn";
  previousButton.setAttribute("aria-label", "Previous year");
  previousButton.innerHTML = '<i class="fa-solid fa-chevron-left"></i>';

  const nextButton = document.createElement("button");
  nextButton.type = "button";
  nextButton.className = "cal-nav-btn";
  nextButton.setAttribute("aria-label", "Next year");
  nextButton.innerHTML = '<i class="fa-solid fa-chevron-right"></i>';

  const center = document.createElement("div");
  center.className = "cal-header-center";

  const yearButton = document.createElement("button");
  yearButton.type = "button";
  yearButton.className = "cal-year";
  yearButton.textContent = String(calendarViewDate.getFullYear());

  const monthButton = document.createElement("button");
  monthButton.type = "button";
  monthButton.className = "cal-month";
  monthButton.textContent = calendarMode === "months"
    ? "Choose Month"
    : fullMonthNames[calendarViewDate.getMonth()];

  center.append(yearButton, monthButton);
  header.append(previousButton, center, nextButton);
  calendarDropdown.appendChild(header);

  // Navigate to the previous year and re-render the calendar
  previousButton.addEventListener("click", (event) => {
    event.stopPropagation();
    calendarViewDate.setFullYear(calendarViewDate.getFullYear() - 1);
    renderCalendar();
  });

  // Navigate to the next year and re-render the calendar
  nextButton.addEventListener("click", (event) => {
    event.stopPropagation();
    calendarViewDate.setFullYear(calendarViewDate.getFullYear() + 1);
    renderCalendar();
  });

  // Clicking the month label switches back to the month picker view
  monthButton.addEventListener("click", (event) => {
    event.stopPropagation();
    calendarMode = "months";
    renderCalendar();
  });

  // Clicking the year label also resets to the month picker view
  yearButton.addEventListener("click", (event) => {
    event.stopPropagation();
    calendarMode = "months";
    renderCalendar();
  });

  // Render month grid or day grid depending on the current calendar mode
  if (calendarMode === "months") {
    renderMonthPicker(destination);
    return;
  }

  renderDayPicker(destination);
}

// Renders a 12-month grid; disables months with no available package dates
function renderMonthPicker(destination) {
  const availableMonthKeys = getAvailableMonthKeysForDestination(destination);
  const picker = document.createElement("div");
  picker.className = "cal-month-picker";

  monthNames.forEach((monthName, monthIndex) => {
    const monthKey = `${calendarViewDate.getFullYear()}-${String(monthIndex + 1).padStart(2, "0")}`;
    const option = document.createElement("button");
    option.type = "button";
    option.className = "cal-month-option";
    option.textContent = monthName;
    option.disabled = !availableMonthKeys.has(monthKey);

    if (calendarViewDate.getMonth() === monthIndex) {
      option.classList.add("cal-month-option--selected");
    }

    // Clicking a month switches to the day picker for that month
    option.addEventListener("click", (event) => {
      event.stopPropagation();
      calendarViewDate = new Date(calendarViewDate.getFullYear(), monthIndex, 1);
      calendarMode = "days";
      renderCalendar();
    });

    picker.appendChild(option);
  });

  calendarDropdown.appendChild(picker);
}

// Renders a day grid for the current month; only available package start dates are enabled
function renderDayPicker(destination) {
  const availableDateKeys = getAvailableDateKeysForDestination(destination);
  const daysRow = document.createElement("div");
  daysRow.className = "cal-days-row";

  // Render weekday header labels (Sun–Sat)
  ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"].forEach((dayName) => {
    const day = document.createElement("span");
    day.className = "cal-day-name";
    day.textContent = dayName;
    daysRow.appendChild(day);
  });

  const grid = document.createElement("div");
  grid.className = "cal-grid";

  const year = calendarViewDate.getFullYear();
  const month = calendarViewDate.getMonth();
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  // Add empty cells to align the first day of the month correctly
  for (let i = 0; i < firstDay; i += 1) {
    const emptyCell = document.createElement("span");
    emptyCell.className = "cal-cell cal-cell--empty";
    grid.appendChild(emptyCell);
  }

  // Render a button for each day; disable unavailable dates and highlight the selected one
  for (let day = 1; day <= daysInMonth; day += 1) {
    const cellDate = new Date(year, month, day);
    cellDate.setHours(0, 0, 0, 0);
    const dateKey = formatDateForInput(cellDate);
    const cell = document.createElement("button");
    cell.type = "button";
    cell.className = "cal-cell";
    cell.textContent = String(day);
    cell.disabled = !availableDateKeys.has(dateKey);

    if (cell.disabled) {
      cell.classList.add("cal-cell--disabled");
    }

    if (sameDate(cellDate, selectedDate)) {
      cell.classList.add("cal-cell--selected");
    }

    // On click: save the selected date, close the calendar, and clear any errors
    cell.addEventListener("click", (event) => {
      event.stopPropagation();
      syncDateInput(cellDate);
      closeDatePanel();
      clearError();
    });

    grid.appendChild(cell);
  }

  calendarDropdown.append(daysRow, grid);
}


// ============================================================
// PEOPLE (PASSENGER COUNT) — LABEL & CONTROLS
// ============================================================

// Updates the people label text and counter displays; disables decrement buttons at minimums
function refreshPeopleLabel() {
  const parts = [`${adults} adult${adults !== 1 ? "s" : ""}`];

  if (children > 0) {
    parts.push(`${children} ${children === 1 ? "child" : "children"}`);
  }

  peopleLabel.textContent = parts.join(", ");
  adultCount.textContent = adults;
  childCount.textContent = children;
  adultDec.disabled = adults <= 1;
  childDec.disabled = children <= 0;
  updatePersistentStates();
}


// ============================================================
// ERROR MESSAGE — SHOW & CLEAR
// ============================================================

// Displays an error message below the search bar; auto-dismisses after 4 seconds
function showError(message, linkText, linkHref) {
  clearError();

  const errorBox = document.createElement("div");
  errorBox.className = "search-error";
  errorBox.id = "searchError";

  const messageNode = document.createElement("span");
  messageNode.textContent = `${message} `;
  errorBox.appendChild(messageNode);

  // Optionally appends a clickable link (e.g., "Click here") to the error message
  if (linkText) {
    const link = document.createElement("a");
    link.className = "search-error__link";
    link.href = linkHref || "#packages";
    link.textContent = linkText;
    errorBox.appendChild(link);
  }

  searchBar.insertAdjacentElement("afterend", errorBox);

  errorTimeoutId = window.setTimeout(() => {
    clearError();
  }, 4000);
}

// Removes the active error message and cancels any pending auto-dismiss timeout
function clearError() {
  if (errorTimeoutId) {
    clearTimeout(errorTimeoutId);
    errorTimeoutId = null;
  }

  const existingError = document.getElementById("searchError");
  if (existingError) {
    existingError.remove();
  }
}


// ============================================================
// LOCAL STORAGE — SAVE BOOKING DATA
// ============================================================

// Saves the current booking selection (destination, dates, passengers) to localStorage
function saveBookingDataToStorage(destination, date, adultCount, childCount) {
  try {
    const selectedRange = getPackageDateRangeForSelection(destination, date);

    const bookingData = {
      destination: destination || "",
      date: date ? formatDateForInput(date) : "",
      startDate: selectedRange ? selectedRange.startDate : (date ? formatDateForInput(date) : ""),
      endDate: selectedRange ? selectedRange.endDate : "",
      adults: String(Number(adultCount) || 1),
      children: String(Number(childCount) || 0)
    };

    localStorage.setItem(BOOKING_STORAGE_KEY, JSON.stringify(bookingData));
  } catch (error) {
    // Prevent localStorage failures from breaking the current booking flow.
  }
}


// ============================================================
// EVENT LISTENERS — DESTINATION BOX
// ============================================================

// Clicking the destination box (outside suggestions) opens the panel and focuses the input
destinationBox.addEventListener("click", (event) => {
  if (event.target.closest(".suggestions")) {
    return;
  }

  closeDatePanel();
  openDestinationPanel();
  focusDestinationInput();
});

// Clicking the input itself also opens the destination panel
destinationInput.addEventListener("click", (event) => {
  event.stopPropagation();
  openDestinationPanel();
});

// Pressing Enter or Space on the destination box opens the panel via keyboard
destinationBox.addEventListener("keydown", (event) => {
  if (event.key === "Enter" || event.key === " ") {
    event.preventDefault();
    openDestinationPanel();
    focusDestinationInput();
  }
});

// On input: sanitizes the value, updates state, refreshes date validity, and debounces suggestions
destinationInput.addEventListener("input", (event) => {
  clearTimeout(typingTimer);

  const sanitizedValue = normalizeDestinationValue(event.target.value);

  if (sanitizedValue !== event.target.value) {
    event.target.value = sanitizedValue;
  }

  activateBox(destinationBox);
  updatePersistentStates();
  refreshSelectedDateForDestination();

  if (!sanitizedValue.trim() || getDestinationMatch(sanitizedValue)) {
    clearError();
  }

  typingTimer = window.setTimeout(() => {
    buildSuggestions(event.target.value);
  }, 150);
});

// Focusing the destination input opens the suggestions panel
destinationInput.addEventListener("focus", () => {
  openDestinationPanel();
});

// Prevents numeric key input in the destination field
destinationInput.addEventListener("keydown", (event) => {
  if (/^\d$/.test(event.key)) {
    event.preventDefault();
  }
});


// ============================================================
// EVENT LISTENERS — DATE BOX
// ============================================================

// Clicking the date box (outside the calendar) opens the calendar dropdown
dateBox.addEventListener("click", (event) => {
  if (event.target.closest(".calendar-dropdown")) {
    return;
  }

  openDateCalendar();
});

// Clicking the date trigger button specifically also opens the calendar
dateTrigger.addEventListener("click", (event) => {
  event.stopPropagation();
  openDateCalendar();
});

// Pressing Enter or Space on the date box opens the calendar via keyboard
dateBox.addEventListener("keydown", (event) => {
  if (event.key === "Enter" || event.key === " ") {
    event.preventDefault();
    openDateCalendar();
  }
});

// Typing into the date input opens the calendar (for native date picker interactions)
dateInput.addEventListener("input", () => {
  openDateCalendar();
});

// On change: activates the date box and validates/applies the typed date
dateInput.addEventListener("change", () => {
  activateBox(dateBox);
  applySelectedDate();
});

// Clicking the date input itself also opens the calendar
dateInput.addEventListener("click", (event) => {
  event.stopPropagation();
  openDateCalendar();
});


// ============================================================
// EVENT LISTENERS — PEOPLE BOX
// ============================================================

// Clicking the people box (outside the dropdown) opens the passenger count dropdown
peopleBox.addEventListener("click", (event) => {
  if (event.target.closest(".people-dropdown")) {
    return;
  }

  closeDatePanel();
  activateBox(peopleBox);
  peopleDropdown.classList.add("show");
  peopleBox.classList.add("dropdown-open");
});

// Clicking the people display also opens the dropdown
peopleDisplay.addEventListener("click", (event) => {
  event.stopPropagation();
  closeDatePanel();
  activateBox(peopleBox);
  peopleDropdown.classList.add("show");
  peopleBox.classList.add("dropdown-open");
});

// Pressing Enter or Space on the people box opens the dropdown via keyboard
peopleBox.addEventListener("keydown", (event) => {
  if (event.key === "Enter" || event.key === " ") {
    event.preventDefault();
    activateBox(peopleBox);
    peopleDropdown.classList.add("show");
    peopleBox.classList.add("dropdown-open");
  }
});

// Increment adult count by 1
adultInc.addEventListener("click", (event) => {
  event.stopPropagation();
  adults += 1;
  refreshPeopleLabel();
  clearError();
});

// Decrement adult count by 1 (minimum of 1)
adultDec.addEventListener("click", (event) => {
  event.stopPropagation();
  if (adults > 1) {
    adults -= 1;
    refreshPeopleLabel();
    clearError();
  }
});

// Increment child count by 1
childInc.addEventListener("click", (event) => {
  event.stopPropagation();
  children += 1;
  refreshPeopleLabel();
  clearError();
});

// Decrement child count by 1 (minimum of 0)
childDec.addEventListener("click", (event) => {
  event.stopPropagation();
  if (children > 0) {
    children -= 1;
    refreshPeopleLabel();
    clearError();
  }
});


// ============================================================
// EVENT LISTENERS — GLOBAL
// ============================================================

// Clicking outside the search bar or error closes all open panels
document.addEventListener("click", (event) => {
  if (!event.target.closest(".search-bar") && !event.target.closest(".search-error")) {
    closeDatePanel();
    closeBoxesIfEmpty();
  }
});


// ============================================================
// SEARCH BUTTON — VALIDATION & REDIRECT
// ============================================================

// Validates all fields and redirects to the destinations page with search parameters
searchBtn.addEventListener("click", () => {
  clearError();

  const destinationValue = destinationInput.value.trim();
  const matchedDestination = getDestinationMatch(destinationValue);
  const hasDateText = Boolean(dateInput.value);
  const selectedDateIsValid = !hasDateText || applySelectedDate();

  // Stop if the typed date is invalid
  if (!selectedDateIsValid) {
    activateBox(dateBox);
    return;
  }

  const hasSelectedDate = Boolean(selectedDate);

  // Validate: both destination and date are missing
  if (!destinationValue && !hasSelectedDate) {
    showError("Please enter a destination and select a travel date.");
    return;
  }

  // Validate: destination is missing
  if (!destinationValue) {
    showError("Please enter a destination.");
    return;
  }

  // Validate: destination is unrecognized and no date selected
  if (!matchedDestination && !hasSelectedDate) {
    showError(
      "No destinations are available. Please explore more packages for other available options.",
      "Click here.",
      "destinations.html#destination-columns"
    );
    return;
  }

  // Validate: destination is unrecognized
  if (!matchedDestination) {
    showError(
      "No destinations are available. Please explore more packages for other available options.",
      "Click here.",
      "destinations.html#destination-columns"
    );
    return;
  }

  const destinationLink = getDestinationPackagesLink(matchedDestination);
  const availableDates = getAvailableDatesForDestination(matchedDestination);

  // Validate: no available dates exist for this destination
  if (!availableDates.length) {
    showError("No available dates.", "Click here", destinationLink);
    return;
  }

  // Validate: no travel date was selected
  if (!hasSelectedDate) {
    showError("Please select a travel date.");
    return;
  }

  // Validate: selected date is not in the destination's available package dates
  if (!destinationHasAvailableDate(matchedDestination, selectedDate)) {
    showError("No available dates.", "Click here", destinationLink);
    return;
  }

  // All validations passed — build URL params, save to storage, and redirect
  const searchParams = new URLSearchParams({
    destination: matchedDestination,
    date: formatDate(selectedDate),
    adults: String(adults),
    children: String(children)
  });

  saveBookingDataToStorage(matchedDestination, selectedDate, adults, children);
  window.location.href = `destinations.html?${searchParams.toString()}`;
});


// ============================================================
// INITIALIZATION
// ============================================================

// Initialize the people label and sync all box states on page load
refreshPeopleLabel();
updatePersistentStates();
