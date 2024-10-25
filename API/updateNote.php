<?php
header('Content-Type: application/json');

// Optional: Set the error reporting level (E_ALL logs all types of errors)
error_reporting(E_ALL);

// Allow PUT request
if ($_SERVER['REQUEST_METHOD'] != 'PUT') {
    http_response_code(405);
    echo json_encode(['message' => 'Only PUT requests are allowed']);
    exit();
}

// Read the PUT request body
$input = json_decode(file_get_contents('php://input'), true);

// Validate input
if (!isset($input['id']) || !isset($input['text']) || !isset($input['dateModified'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid input']);
    exit();
}

$id = $input['id'];
$text = $input['text'];
$dateModified = $input['dateModified'];

// Connect to PostgreSQL database
include '../conn_db.php';

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to connect to the database']);
    exit();
}

// Prepare the SQL query to update the note
$query = "UPDATE data SET text = $1, date_modified = $2 WHERE note_id = $3";
$result = pg_query_params($conn, $query, [$text, $dateModified, $id]);

if ($result) {
    echo json_encode(['message' => 'Note updated successfully']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'Failed to update the note']);
}

// Close the database connection
pg_close($conn);
?>
