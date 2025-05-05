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

// Get the search term from the query string
$title = $_GET['title'];

// SQL query to search for books by title
$sql = "SELECT * FROM books WHERE title LIKE '%$title%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output results in a table
    echo "<h2>Search Results</h2>";
    echo "<table border='1'>
            <tr>
                <th>Accession Number</th>
                <th>Title</th>
                <th>Authors</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['accession_number'] . "</td>
                <td>" . $row['title'] . "</td>
                <td>" . $row['authors'] . "</td>
                <td>" . $row['edition'] . "</td>
                <td>" . $row['publisher'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No results found for '$title'.";
}

$conn->close();
?>
