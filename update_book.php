<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookID = $_POST['BookID'];
    $title = $_POST['Title'];
    $author = $_POST['Author'];
    $isbn = $_POST['ISBN'];
    $coverImage = $_POST['CoverImage'];
    $format = $_POST['Format'];

    $sql = "UPDATE book SET Title='$title', Author='$author', ISBN='$isbn', CoverImage='$coverImage', Format='$format' WHERE BookID=$bookID";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
