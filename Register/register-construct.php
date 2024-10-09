<!DOCTYPE html>
<html>
<head>
  <title>Register Page</title>
  <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
  <link rel="stylesheet" href="register-style.css">
  <link rel="stylesheet" href="../master/footer-style.css">
</head>
<body>

  <div class="custom-arrow">
    <a href="../main.php" class="back-link"></a>
  </div>
  
  <form class="fade-in" id="reg-form" enctype="multipart/form-data">
    <h1>Register</h1>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" title="Please enter a valid email address">
    <span class="password-info">Password must be at least 8 symbols long.</span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
   
    <label for="confirm-password">Confirm Password:</label>
    <input type="password" id="confirm-password" name="confirm-password">

    <div class="checkbox-container">
      <input type="checkbox" id="agree" name="agree">
      <label for="agree">I agree to the terms and conditions</label>
    </div>
    <button id="register-button" onclick="checkRegister(event)">Register</button>
  </form>

  <?php include '../master/footer.php'; ?>

  <script src="register-script.js"></script>

</body>
</html>