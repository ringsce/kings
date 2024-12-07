footer {
    div(class="footer-content") {
        // Logo
        div(class="footer-logo") {
            img(src="resources/img/ringsce.png", alt="Logo")
        }

        // Copyright notice
        div(class="footer-copyright") {
            "&copy; " + system.date("Y") + " Kreatyve Designs. All rights reserved."
        }

        // Three columns
        div(class="footer-columns") {
            // About Us Column
            div(class="footer-column") {
                h3("About Us")
                p("Lorem ipsum dolor sit amet, consectetur adipiscing elit.")
            }

            // Services Column
            div(class="footer-column") {
                h3("Services")
                ul {
                    li("Service 1")
                    li("Service 2")
                    li("Service 3")
                }
            }

            // Contact Us Column
            div(class="footer-column") {
                h3("Contact Us")
                p("Email: info@example.com")
                p("Phone: 123-456-7890")
            }
        }
    }
}

// JavaScript Section
js {
    """
    // Toggle menu function
    document.getElementById('menuToggle').addEventListener('click', function() {
        var menuContainer = document.getElementById('menuContainer');
        if (menuContainer.style.left === '-200px') {
            menuContainer.style.left = '0';
        } else {
            menuContainer.style.left = '-200px';
        }
    });
    """
}

// Font Awesome CDN
js(src="https://kit.fontawesome.com/a076d05399.js", crossorigin="anonymous")
