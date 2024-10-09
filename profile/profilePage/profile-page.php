<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>


    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="profile-style.css">
    <link rel="stylesheet" href="del-dialog-style.css">
    <link rel="stylesheet" href="/project/master/footer-style.css">
</head>
<body>

    <div class="custom-arrow">
        <a href="../user-page.php" class="back-link"></a>
    </div>

    <form class="fade-in" id="success-container">
        <h1>

            <img src="../../res/Default_pfp.png" width="110" height="110">

        </h1>

        <h2>
        <?php
        // Start session
        session_start();

        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            // Retrieve the username from the session
            $username = $_SESSION['username'];
            
            echo "<h1>$username</h1>";
        } else {
            // If username is not set, display default message
            header("Location: /project/Login/construct.php");
        }
        ?>
        </h2>

        <h3 style="text-align: left;">My Notes:</h3>
        <div class="order-status">
            <!-- Add your order status here -->
        </div>

        <button class="delete-button" id="delete">Delete Account</button>

    </form>

    <?php include '../../master/footer.php'; ?>
    <?php include 'delete-dialog.html'; ?>

    <script>
        var form = document.getElementById("success-container");
        // Set form opacity to 1
        form.style.opacity = 1;
    </script>

<script src="profilescripts.js"></script>

</body>
</html>