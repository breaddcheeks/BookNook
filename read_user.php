<?php
include 'config.php';

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Users</title>
</head>
<body>
    <h2>List of Users</h2>
    <table border="1">
        <tr>
            <th>UserID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["UserID"] . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td><a href='edit_user.php?UserID=" . $row["UserID"] . "'>Edit</a> | <a href='delete_user.php?UserID=" . $row["UserID"] . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
