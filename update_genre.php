<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $genreID = $_POST['GenreID'];
    $name = $_POST['Name'];

    $sql = "UPDATE genre SET Name='$name' WHERE GenreID=$genreID";

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
