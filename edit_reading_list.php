<?php
include 'config.php';

if (isset($_GET['ReadingListID'])) {
    $readingListID = $_GET['ReadingListID'];

    $sql = "SELECT * FROM reading_list WHERE ReadingListID = $readingListID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No reading list found with the given ID.";
        exit();
    }
} else {
    echo "Invalid reading list ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reading List</title>
</head>
<body>
    <h2>Edit Reading List</h2>
    <form action="update_reading_list.php" method="post">
        <input type="hidden" name="ReadingListID" value="<?php echo $row['ReadingListID']; ?>">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="<?php echo $row['Title']; ?>"><br>
        <label for="Description">Description:</label>
        <textarea name="Description"><?php echo $row['Description']; ?></textarea><br><br>
        <input type="submit" value="Update Reading List">
    </form>
</body>
</html>
