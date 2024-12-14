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
        <h1 class="profile-picture">
            <img src="../../res/Default_pfp.png" width="110" height="110">
        </h1>

        <h2 class="user-name">
        <?php
        session_start();

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $user_id = $_SESSION['id'];
            echo "<h1>$username</h1>";
        } else {
            header("Location: /project/Login/construct.php");
            exit();
        }
        ?>
        </h2>

        <h3 style="text-align: left;">My Notes:</h3>
        <div class="notes">
            <?php
            // Database connection
            include '../../conn_db.php';

            try {
                // Establish a connection to the PostgreSQL database
                $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

                // Prepare a query to fetch all notes for the user with session ID, ordered by date_modified
                $query = $db->prepare('SELECT text, date_created, date_modified FROM data WHERE user_id = :user_id ORDER BY date_modified DESC');
                $query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $query->execute();

                // Fetch all the notes
                $notes = $query->fetchAll(PDO::FETCH_ASSOC);

                // Display each note inside a div
                if ($notes) {
                    foreach ($notes as $note) {
                        $formattedDateCreated = (new DateTime($note['date_created']))->format('d/m/Y H:i');
                        $formattedDateModified = (new DateTime($note['date_modified']))->format('d/m/Y H:i');
                        echo "<div class='note'>";
                        echo "<p>" . htmlspecialchars($note['text']) . "</p>";
                        echo "<small>Created on: " . htmlspecialchars($formattedDateCreated) . "</small>";
                        echo "<small>Last modified on: " . htmlspecialchars($formattedDateModified) . "</small>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No notes found.</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Error fetching notes: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>

        <button class="delete-button" id="delete">Delete Account</button>
    </form>

    <?php include '../../master/footer.php'; ?>
    <?php include 'delete-dialog.html'; ?>

    <script>
        var form = document.getElementById("success-container");
        form.style.opacity = 1;
    </script>

    <script src="profilescripts.js"></script>

</body>
</html>
