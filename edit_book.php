<?php
include 'config.php';

if (isset($_GET['BookID'])) {
    $bookID = $_GET['BookID'];

    $sql = "SELECT * FROM book WHERE BookID = $bookID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No book found with the given ID.";
        exit();
    }
} else {
    echo "Invalid book ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>
    <form action="update_book.php" method="post">
        <input type="hidden" name="BookID" value="<?php echo $row['BookID']; ?>">
        <label for="Title">Title:</label>
        <input type="text" name="Title" value="<?php echo $row['Title']; ?>"><br>
        <label for="Author">Author:</label>
        <input type="text" name="Author" value="<?php echo $row['Author']; ?>"><br>
        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" value="<?php echo $row['ISBN']; ?>"><br>
        <label for="CoverImage">Cover Image URL:</label>
        <input type="text" name="CoverImage" value="<?php echo $row['CoverImage']; ?>"><br>
        <label for="Format">Format:</label>
        <select name="Format">
            <option value="Audio" <?php if ($row['Format'] == 'Audio') echo 'selected'; ?>>Audio</option>
            <option value="Physical" <?php if ($row['Format'] == 'Physical') echo 'selected'; ?>>Physical</option>
            <option value="Online" <?php if ($row['Format'] == 'Online') echo 'selected'; ?>>Online</option>
        </select><br>
        <input type="submit" value="Update Book">
    </form>
</body>
</html>
