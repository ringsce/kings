<?php

// Check if the user has given consent
function hasConsent() {
    // Check if the consent cookie is set
    return isset($_COOKIE['consent']) && $_COOKIE['consent'] === 'true';
}

// Set user consent
function setConsent() {
    // Set a cookie to store user consent
    setcookie('consent', 'true', time() + (365 * 24 * 60 * 60), '/'); // Expires in 1 year
}

// Remove user consent
function removeConsent() {
    // Remove the consent cookie
    setcookie('consent', '', time() - 3600, '/');
}

// Example usage:

// Check if the user has given consent
if (hasConsent()) {
    // User has given consent, proceed with data processing
    echo "You have given consent. Processing data...";
} else {
    // User has not given consent, ask for consent
    echo "Please give your consent to proceed.";
}

// Set user consent
setConsent();

// Remove user consent
removeConsent();

?>
