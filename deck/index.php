<?php
require 'header.php';
?>


<!-- Tabbed Navigation -->
<div class="tab-nav">
<a class="tab" href="#cards">Cards</a>
<a class="tab" href="#deck">Deck</a>
<a class="tab" href="#play">Play</a>
<a class="tab" href="#signin">Sign In</a>
<a class="tab" href="#signup">Sign Up</a>
           </div>


    <!-- search icon -->
    <div class="container">
        <!-- Header with H1 and Search Form -->
        <div class="header">
            <br/>
            <form class="search-form" action="search_results.php" method="get">
            <h1>Login to create your Deck</h1>
            

                <!-- Search input field -->
                <label for="search">Search:</label>
                <input type="text" id="search" name="query" placeholder="Enter search term" required>
                <button type="submit">Search</button>
            </form>
        </div>
<br/>
<br/>
    <form class="horizontal-form" action="process_form.php" method="post">
        <!-- Name input field -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <!-- Creator input field -->
        <label for="creator">Creator:</label>
        <input type="text" id="creator" name="creator" required>

        <!-- Status input field -->
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required>

        <!-- Last Edit input field -->
        <label for="last_edit">Last Edit:</label>
        <input type="date" id="last_edit" name="last_edit" required>

        <!-- Submit button -->
        <button type="submit">Submit</button>
    </form>
<?php
require 'footer.php';
?>