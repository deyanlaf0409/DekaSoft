<!DOCTYPE html>
<html>
<head>
    <title>Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Set the body to fill the viewport height */
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            margin: 200px auto;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
        }
        
        .btn {
            background: blue; /* Initial background color */
            color: white;
            padding: 8px 16px;
            margin-right: 10px;
            text-decoration: none;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            top: 10px; /* Adjust top position */
            left: 50px; /* Adjust left position */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition effect */
            background-image: linear-gradient(45deg, transparent 50%, rgba(255, 255, 255, 0.4) 50%);
            background-size: 200%;
            background-position: 100%;
        }
        .btn:hover {
            background-color: rgb(15, 122, 255); /* Change background color on hover */
            color: white; /* Change text color on hover */
            background-position: 0;
        }
    </style>
    <link rel="icon" type="image/x-icon" href="/project/favicon.ico">
    <link rel="stylesheet" href="master/footer-style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to our Website</h1>
        <p>Please log in or register to continue.</p>
        <a href="Login/construct.php" class="btn">Login</a>
        <a href="Register/register-construct.php" class="btn">Register</a>
    </div>

    <?php include 'master/footer.php'; ?>

</body>
</html>

