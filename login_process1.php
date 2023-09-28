<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* styles.css */

        body {
            font-family: Arial, sans-serif;
            background-image: url(https://images.unsplash.com/photo-1553095066-5014bc7b7f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8d2FsbCUyMGJhY2tncm91bmR8ZW58MHx8MHx8fDA%3D&w=1000&q=80);
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            background-color: rgba(149, 149, 149, 0.3);
            margin: 0 center;
            margin-top: 200px;
            margin-bottom: 100px;
            margin-left: 100px;
            margin-right: 100px;
            padding-left: 35px;
            padding-right: 50px;
            padding-top: 35px;
            padding-bottom: 60px;
            border-radius: 7px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.9);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            background-color: rgba(255 , 255 , 255 , 0.3) ;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            width: 105.5%;
            background-color: #007bff;
            color: #ffffff;
            margin-top: 15px;
            border: none;
            padding: 10px;
            border-radius: 7px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Icon styles */
        .button-icon {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <label for="error" id="error" name="error"></label>
            <div id="error">
                <?php
                // Check for the error query parameter and display it using JavaScript
                if (isset($_GET['error']) && $_GET['error'] === 'incorrect_password') {
                    echo "<span id='error-message'>Incorrect password.</span>";
                }
                ?>
            </div>
            <button type="submit"><i class="fas fa-sign-in-alt button-icon"></i> Login</button>
        </form>
        <p>Don't have an account? <a href="register.html"><i class="fas fa-user-plus button-icon"></i> Register</a></p> 
    </div>

    <script>
        // Add JavaScript to hide the error message after 2 seconds
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
</body>
</html>
