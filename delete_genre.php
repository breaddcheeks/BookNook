<?php
include 'config.php';

if (isset($_GET['GenreID'])) {
    $genreID = $_GET['GenreID'];

    $sql = "DELETE FROM genre WHERE GenreID = $genreID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid genre ID.";
}
?>
