<?php
include 'config.php';

if (isset($_GET['ReadingListID'])) {
    $readingListID = $_GET['ReadingListID'];

    $sql = "DELETE FROM reading_list WHERE ReadingListID = $readingListID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid reading list ID.";
}
?>
