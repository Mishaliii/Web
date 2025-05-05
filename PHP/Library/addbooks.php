<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Azeem@2003";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$accession_number = $_POST['accession_number'];
$title = $_POST['title'];
$authors = $_POST['authors'];
$edition = $_POST['edition'];
$publisher = $_POST['publisher'];

// SQL query to insert data into books table
$sql = "INSERT INTO books (accession_number, title, authors, edition, publisher) 
        VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";

// Execute the query and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "New book added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
