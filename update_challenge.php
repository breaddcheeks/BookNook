<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $challengeID = $_POST['ChallengeID'];
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $startDate = $_POST['StartDate'];
    $endDate = $_POST['EndDate'];
    $reward = $_POST['Reward'];

    $sql = "UPDATE challenge SET 
            Name='$name', 
            Description='$description', 
            StartDate='$startDate', 
            EndDate='$endDate', 
            Reward='$reward' 
            WHERE ChallengeID=$challengeID";

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
