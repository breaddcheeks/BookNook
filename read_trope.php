<?php
include 'config.php';

$sql = "SELECT * FROM trope";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Tropes</title>
</head>
<body>
    <h2>List of Tropes</h2>
    <table border="1">
        <tr>
            <th>TropeID</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["TropeID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No tropes found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
