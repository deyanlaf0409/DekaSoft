var myButton = document.getElementById("evil-button");
var loginForm = document.getElementById("login-form");
// Set form opacity to 1
loginForm.style.opacity = 1;

var xPos = myButton.offsetLeft;
var isLeft = true;

myButton.onmouseover = function (e) {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  if (!email || !password) {
    if (isLeft) {
      xPos = 260;
    } else {
      xPos = 80;
    }
    myButton.style.left = xPos + "px";
    isLeft = !isLeft;
    
  }
};



function checkLogin(event) {
  event.preventDefault();

  var email = document.getElementById("email").value.trim();
  var password = document.getElementById("password").value.trim();
  

  if (!email || !password) {
    alert("Please enter both e-mail and password.");
    return false;
  }

  if (password.length < 8) {
    alert("Invalid password.");
    return false;
  }

  // Other validation logic...

  // Create a new FormData object to send the form data
  var formData = new FormData(loginForm);
  formData.append("email", email);
  formData.append("password", password);

  // Create a new XMLHttpRequest object
  var xhr = new XMLHttpRequest();

  // Configure it to send a POST request to your server-side script
  xhr.open("POST", "db_conn.php", true);

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            var response = xhr.responseText;

            // Log the server's response to the console
            console.log("Server Response:", response);

            if (response.trim() === "success") {
                //alert("Login successful!");
                window.location.href = "/project/profile/user-page.php"; // Redirect to another page
            } else if (response.trim() === "unverified") {
                alert("Please verify your email before logging in.");
                // Optionally: Redirect to a page with instructions on email verification
            } else {
                alert("Invalid email or password.");
            }

            // Allow form submission after the AJAX request completes
            // loginForm.submit();
        } else {
            console.error("Error:", xhr.status, xhr.statusText);
        }
    }
};

  // Send the form data to the server
  xhr.send(formData);
}






