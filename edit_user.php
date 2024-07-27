<?php
include 'config.php';

if (isset($_GET['UserID'])) {
    $userID = $_GET['UserID'];

    $sql = "SELECT * FROM user WHERE UserID = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found with the given ID.";
        exit();
    }
} else {
    echo "Invalid user ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="update_user.php" method="post">
        <input type="hidden" name="UserID" value="<?php echo $row['UserID']; ?>">
        <label for="Username">Username:</label>
        <input type="text" name="Username" value="<?php echo $row['Username']; ?>"><br>
        <label for="Email">Email:</label>
        <input type="email" name="Email" value="<?php echo $row['Email']; ?>"><br>
        <label for="Password">Password (leave blank to keep current password):</label>
        <input type="password" name="Password"><br><br>
        <input type="submit" value="Update User">
    </form>
</body>
</html>
