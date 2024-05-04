<?php
require 'header.php';
?>

    <h1>Form with Download Link</h1>
    <form action="process_form.php" method="post">
        <!-- Name input field -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <!-- Creator input field -->
        <label for="creator">Creator:</label>
        <input type="text" id="creator" name="creator" required><br><br>

        <!-- Status input field -->
        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <!-- Last Edit input field -->
        <label for="last_edit">Last Edit:</label>
        <input type="date" id="last_edit" name="last_edit" required><br><br>

        <!-- Submit button -->
        <button type="submit">Submit</button>
    </form>

<?php
require 'footer.php';
?>