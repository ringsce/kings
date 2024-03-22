<?php
include_once("header.php");
?>
<body>
    <!-- Sliding Menu -->
    <div class="container">
        <h1>Sliding Menu with Social Icons, Slideshows, and Dark Mode/Light Mode Toggle</h1>
        <!-- Dark Mode/Light Mode Toggle -->
        <label class="switch">
            <input type="checkbox" id="toggle">
            <span class="slider round"></span>
        </label>
        <!-- Slideshows -->
        <div class="slideshows">
            <!-- Slideshow 1 -->
            <div class="slideshow" id="slideshow1">
                <h2>Slideshow 1</h2>
                <!-- Slideshow content -->
                <img src="slideshow1.jpg" alt="Slideshow 1 Image">
            </div>

            <!-- Slideshow 2 -->
            <div class="slideshow" id="slideshow2">
                <h2>Slideshow 2</h2>
                <!-- Slideshow content -->
                <img src="slideshow2.jpg" alt="Slideshow 2 Image">
            </div>

            <!-- Slideshow 3 -->
            <div class="slideshow" id="slideshow3">
                <h2>Slideshow 3</h2>
                <!-- Slideshow content -->
                <img src="slideshow3.jpg" alt="Slideshow 3 Image">
            </div>

            <!-- Slideshow 4 -->
            <div class="slideshow" id="slideshow4">
                <h2>Slideshow 4</h2>
                <!-- Slideshow content -->
                <img src="slideshow4.jpg" alt="Slideshow 4 Image">
            </div>

            <!-- Slideshow 5 -->
            <div class="slideshow" id="slideshow5">
                <h2>Slideshow 5</h2>
                <!-- Slideshow content -->
                <img src="slideshow5.jpg" alt="Slideshow 5 Image">
            </div>
        </div>
    </div>

    <!-- Dark Mode/Light Mode Toggle JavaScript -->
    <script>
        const toggleSwitch = document.querySelector('#toggle');
        const container = document.querySelector('.container');

        toggleSwitch.addEventListener('change', function() {
            if (this.checked) {
                container.classList.add('dark-mode');
            } else {
                container.classList.remove('dark-mode');
            }
        });
    </script>
</body>
</html>
