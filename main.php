<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>DekaSoft</title>
    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="mainstyle.css">
    <link rel="stylesheet" href="master/footer-style.css">
    <link rel="stylesheet" href="master/content-style.css">
</head>


<body>
    <header id="home">
    </header>

    <nav>
        <a href="Login/construct.php" class="login-btn" id="log-btn">Login</a>
        <a href="Register/register-construct.php" class="register-btn" id="reg-btn">Register</a>
        
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

    <img src="/project/res/grey-brand.png" class="brand-logo">

    <?php include 'master/content.php'; ?>

    <?php include 'master/footer.php'; ?>

    <script src="mainscripts.js"></script>

</body>

</html>


