<?php
include 'config.php';

if (isset($_GET['ChallengeID'])) {
    $challengeID = $_GET['ChallengeID'];

    $sql = "DELETE FROM challenge WHERE ChallengeID = $challengeID";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid challenge ID.";
}
?>
