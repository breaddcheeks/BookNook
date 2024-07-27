<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $readingListID = $_POST['ReadingListID'];
    $title = $_POST['Title'];
    $description = $_POST['Description'];

    $sql = "UPDATE reading_list SET Title='$title', Description='$description' WHERE ReadingListID=$readingListID";

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
