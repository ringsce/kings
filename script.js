// new code
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const toggleSwitch = document.getElementById('toggle');
const container = document.querySelector('.container');

// Toggle sidebar
menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('active');
});

// Toggle dark mode
toggleSwitch.addEventListener('change', function() {
    if (this.checked) {
        container.classList.add('dark-mode');
    } else {
        container.classList.remove('dark-mode');
    }
});

// Close dropdown menu
function toggleDropdown() {
    var dropdownMenu = document.getElementById("dropdownMenu");
    dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
}

// Toggle dark mode
function toggleDarkMode() {
    var body = document.body;
    body.classList.toggle("dark-mode");
}

// Refresh content every 5 minutes
setInterval(function() {
    // Reload the page
    location.reload();
}, 300000); // 5 minutes in milliseconds
