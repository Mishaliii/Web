<?php
$servername = "localhost";
$username = "root";
$password = "Azeem@2003";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = "";
$errorMessage = "";
$searchResults = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_book'])) {
    $accession_number = $_POST['accession_number'];
    $title = $_POST['title'];
    $authors = $_POST['authors'];
    $edition = $_POST['edition'];
    $publisher = $_POST['publisher'];

    $sql = "INSERT INTO books (accession_number, title, authors, edition, publisher) 
            VALUES ('$accession_number', '$title', '$authors', '$edition', '$publisher')";
    
    if ($conn->query($sql) === TRUE) {
        $successMessage = "New book added successfully!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['title'])) {
    $title = $_GET['title'];
    $sql = "SELECT * FROM books WHERE title LIKE '%$title%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $searchResults = $result;
    } else {
        $errorMessage = "No results found for '$title'.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('library.jpg'); 
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            color: #333;
            margin: 0;
            padding: 0;

        }
        header {
           
            color:rgb(108, 111, 114);
            padding: 20px;
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
        }
        h2, h3 {
            font-size: 1.8em;
            color: #2E4053;
        }
        .container {
            width: 800px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 30px;
        }
        label {
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        input[type="submit"] {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #2E4053;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 1.2em;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        hr {
            border: 1px solid #ddd;
        }
        .nav-links {
            margin-top: 20px;
            text-align: center;
        }
        .nav-links a {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #5D6D7E;
            color: white;
            border-radius: 4px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }
        .nav-links a:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>

    <header>
        <h1>Library System</h1>
    </header>

    <div class="container">
        <h2><a name="add_book_section"></a>Add Book Information</h2>
        <form action="library.php" method="post">
            <label for="accession_number">Accession Number:</label>
            <input type="text" id="accession_number" name="accession_number" required><br><br>
            
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="authors">Authors:</label>
            <input type="text" id="authors" name="authors"><br><br>
            
            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition"><br><br>
            
            <label for="publisher">Publisher:</label>
            <input type="text" id="publisher" name="publisher"><br><br>
            
            <input type="submit" name="add_book" value="Add Book">
        </form>

        <?php if ($successMessage): ?>
            <div class="message success"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <?php if ($errorMessage): ?>
            <div class="message error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <hr>

        <h2><a name="search_book_section"></a>Search Book by Title</h2>
        <form action="library.php" method="get">
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" required>
            <input type="submit" value="Search">
        </form>

        <?php if ($searchResults): ?>
            <h3>Search Results</h3>
            <table>
                <tr>
                    <th>Accession Number</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Edition</th>
                    <th>Publisher</th>
                </tr>
                <?php while ($row = $searchResults->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['accession_number']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['authors']; ?></td>
                        <td><?php echo $row['edition']; ?></td>
                        <td><?php echo $row['publisher']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php endif; ?>

        <hr>

       
    </div>

</body>
</html>

<?php
$conn->close();
?>
