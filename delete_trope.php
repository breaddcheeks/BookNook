<?php
include 'config.php';

if (isset($_GET['TropeID'])) {
    $tropeID = $_GET['TropeID'];

    $sql = "DELETE FROM trope WHERE TropeID = $tropeID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid trope ID.";
}
?>
