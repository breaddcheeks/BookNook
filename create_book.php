<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $coverImage = $_POST['coverImage'];
    $format = $_POST['format'];

    $sql = "INSERT INTO book (Title, Author, ISBN, CoverImage, Format)
            VALUES ('$title', '$author', '$isbn', '$coverImage', '$format')";

    if ($conn->query($sql) === TRUE) {
        echo "New book created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a New Book</title>
</head>
<body>
    <h2>Create a New Book</h2>
    <form method="post" action="create_book.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="author">Author:</label><br>
        <input type="text" id="author" name="author"><br>
        <label for="isbn">ISBN:</label><br>
        <input type="text" id="isbn" name="isbn"><br>
        <label for="coverImage">Cover Image URL:</label><br>
        <input type="text" id="coverImage" name="coverImage"><br>
        <label for="format">Format:</label><br>
        <select id="format" name="format">
            <option value="Audio">Audio</option>
            <option value="Physical">Physical</option>
            <option value="Online">Online</option>
        </select><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
