<?php
include 'config.php';

if (isset($_GET['ChallengeID'])) {
    $challengeID = $_GET['ChallengeID'];

    $sql = "SELECT * FROM challenge WHERE ChallengeID = $challengeID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No challenge found with the given ID.";
        exit();
    }
} else {
    echo "Invalid challenge ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Challenge</title>
</head>
<body>
    <h2>Edit Challenge</h2>
    <form action="update_challenge.php" method="post">
        <input type="hidden" name="ChallengeID" value="<?php echo $row['ChallengeID']; ?>">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo $row['Name']; ?>"><br>
        <label for="Description">Description:</label>
        <input type="text" name="Description" value="<?php echo $row['Description']; ?>"><br>
        <label for="StartDate">Start Date:</label>
        <input type="date" name="StartDate" value="<?php echo $row['StartDate']; ?>"><br>
        <label for="EndDate">End Date:</label>
        <input type="date" name="EndDate" value="<?php echo $row['EndDate']; ?>"><br>
        <label for="Reward">Reward:</label>
        <input type="text" name="Reward" value="<?php echo $row['Reward']; ?>"><br>
        <input type="submit" value="Update Challenge">
    </form>
</body>
</html>
