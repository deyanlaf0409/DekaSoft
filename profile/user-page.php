<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>DekaSoft</title>
    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="page-style.css">
    <link rel="stylesheet" href="../master/footer-style.css">
    <link rel="stylesheet" href="../master/content-style.css">
    <link rel="stylesheet" href="dialog-style.css">

</head>

<body>

    <nav>
        <a class="logout" id="logout-btn">Logout</a>
        <a href="profilePage/profile-page.php" class="profile" id="prof-btn">Profile</a>

        <a href="#about" onclick="closeDropdown()" class="about">About Us</a>
        <a href="#software" onclick="closeDropdown()" class="software">Software</a>
        <a href="#footer" onclick="closeDropdown()" class="contacts">Contacts</a>

        <button class="dropdown-btn">≡</button>
        <div class="dropdown-content">
            <a href="#about">About Us</a>
            <a href="#software">Software</a>
            <a href="#footer">Contacts</a>
        </div>

    </nav>

    <header class="welcome">
        <?php
        // Start session
        session_start();

        // Check if the username is set in the session
        if (isset($_SESSION['username'])) {
            // Retrieve the username from the session
            $username = $_SESSION['username'];
            // Display the welcome message
            echo "<h1>Welcome, $username !</h1>";
        } else {
            // If username is not set, display default message
            header("Location: /project/Login/construct.php");
        }
        ?>
    </header>

    <?php include '../master/content.php'; ?>

    <?php include 'dialog-out.html'; ?>

    <?php include '../master/footer.php'; ?>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add 'fade-in' class to elements with class 'login-btn' and 'register-btn'
        document.querySelector('.logout').classList.add('fade-in');
        document.querySelector('.profile').classList.add('fade-in');
    });

    var logBtn = document.getElementById("logout-btn");
    logBtn.style.opacity = 1;
    var regBtn = document.getElementById("prof-btn");
    regBtn.style.opacity = 1;

</script>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            const offsetTop = targetElement.offsetTop;
            const headerHeight = document.querySelector('header').offsetHeight;
            const offset = offsetTop - headerHeight;

            window.scrollTo({
                top: offset,
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    function closeDropdown() {
        document.querySelector('.dropdown-btn').classList.remove('active');
    }

    document.querySelector('.dropdown-btn').addEventListener('click', function () {
        this.classList.toggle('active');
    });

    // Add event listeners for links inside the dropdown content
    document.querySelectorAll('.dropdown-content a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            closeDropdown(); // Close the dropdown when a link is clicked
        });
    });
</script>

<script src="userpagescripts.js"></script>


</body>

</html>

