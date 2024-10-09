<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="../master/footer-style.css">
</head>
<body>

  <div class="custom-arrow">
    <a href="../main.php" class="back-link"></a>
  </div>

  <form class="fade-in" id="login-form">
    <h1>Login</h1>

    <label for="email">E-mail:</label>
    <input type="text" id="email" name="email">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">


    <div class="resolve-section">
      <p>Forgot Password? <a href="../Login/ResolvePass/valid_page.php" class="forgot-pass">Resolve</a></p>
    </div>

    <!-- "Don't have an account?" text and register link -->
    <div class="register-section">
      <p>Don't have an account? <a href="../Register/register-construct.php" class="register-link">Create</a></p>
    </div>

    <button id="evil-button" type="submit" onclick="checkLogin(event)">Login</button>
  </form>


  <?php include '../master/footer.php'; ?>

  <script src="script.js"></script>

</body>
</html>




