<?php
include 'config.php';

$sql = "SELECT * FROM reading_list";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Reading Lists</title>
</head>
<body>
    <h2>List of Reading Lists</h2>
    <table border="1">
        <tr>
            <th>ReadingListID</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ReadingListID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No reading lists found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
