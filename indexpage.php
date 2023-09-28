<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Your existing styles here */
    </style>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST['password']) && $_POST['password'] == '123') {
            // Password is correct, display options
            echo '<h2>Select an Option</h2>
                <a href="login_process1.php">
                    <div class="option-button" id="admin-option">
                        <i class="fas fa-user"></i> Admin
                    </div>
                </a>
                <br>
                <a href="publicdashboard.html">
                    <div class="option-button" id="public-option">
                        <i class="fas fa-users"></i> Public
                    </div>
                </a>
                <br>
                <a href="eventcertification.html">
                    <div class="option-button" id="event-certification-option">
                        <i class="fas fa-certificate"></i> Event Certification
                    </div>
                </a>';
        } else {
            // Display password entry form
            echo '<h2>Enter Password</h2>
                <form method="post">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <input type="submit" value="Submit">
                </form>';
        }
        ?>
    </div>
</body>
</html>
