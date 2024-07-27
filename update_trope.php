<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tropeID = $_POST['TropeID'];
    $title = $_POST['Title'];
    $description = $_POST['Description'];

    $sql = "UPDATE trope SET Title='$title', Description='$description' WHERE TropeID=$tropeID";

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
