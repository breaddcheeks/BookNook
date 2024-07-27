<?php
include 'config.php';

$sql = "SELECT * FROM genre";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Genres</title>
</head>
<body>
    <h2>List of Genres</h2>
    <table border="1">
        <tr>
            <th>GenreID</th>
            <th>Name</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["GenreID"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No genres found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
