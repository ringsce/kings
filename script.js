const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const toggleSwitch = document.getElementById('toggle');
const container = document.querySelector('.container');

menuToggle.addEventListener('click', function() {
    sidebar.classList.toggle('active');
});

toggleSwitch.addEventListener('change', function() {
    if (this.checked) {
        container.classList.add('dark-mode');
    } else {
        container.classList.remove('dark-mode');
    }
});

function closeMenu() {
    sidebar.classList.remove('active');
}
