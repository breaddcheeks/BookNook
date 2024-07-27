<?php
include 'config.php';

if (isset($_GET['TropeID'])) {
    $tropeID = $_GET['TropeID'];

    $sql = "SELECT * FROM trope WHERE TropeID = $tropeID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No trope found with the given ID.";
        exit();
    }
} else {
    echo "Invalid trope ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Trope</title>
</head>
<body>
    <h2>Edit Trope</h2>
    <form action="update_trope.php" method="post">
        <input type="hidden" name="TropeID" value="<?php echo $row['TropeID']; ?>">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="<?php echo $row['Title']; ?>"><br>
        <label for="Description">Description:</label>
        <textarea name="Description"><?php echo $row['Description']; ?></textarea><br><br>
        <input type="submit" value="Update Trope">
    </form>
</body>
</html>
