<?php
include 'config.php';

$sql = "SELECT * FROM challenge";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Challenges</title>
</head>
<body>
    <h2>List of Challenges</h2>
    <table border="1">
        <tr>
            <th>ChallengeID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reward</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ChallengeID"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td>" . $row["StartDate"] . "</td>";
                echo "<td>" . $row["EndDate"] . "</td>";
                echo "<td>" . $row["Reward"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No challenges found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
