<?php
include 'config.php';

$sql = "SELECT * FROM book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Books</title>
</head>
<body>
    <h2>List of Books</h2>
    <table border="1">
        <tr>
            <th>BookID</th>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Cover Image</th>
            <th>Format</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["BookID"] . "</td>";
                echo "<td>" . $row["Title"] . "</td>";
                echo "<td>" . $row["Author"] . "</td>";
                echo "<td>" . $row["ISBN"] . "</td>";
                echo "<td><img src='" . $row["CoverImage"] . "' alt='Cover Image' width='50' height='50'></td>";
                echo "<td>" . $row["Format"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No books found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
