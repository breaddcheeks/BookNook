<?php
include 'config.php';

if (isset($_GET['BookID'])) {
    $bookID = $_GET['BookID'];

    $sql = "DELETE FROM book WHERE BookID = $bookID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid book ID.";
}
?>
