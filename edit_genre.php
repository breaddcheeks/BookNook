<?php
include 'config.php';

if (isset($_GET['GenreID'])) {
    $genreID = $_GET['GenreID'];

    $sql = "SELECT * FROM genre WHERE GenreID = $genreID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No genre found with the given ID.";
        exit();
    }
} else {
    echo "Invalid genre ID.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Genre</title>
</head>
<body>
    <h2>Edit Genre</h2>
    <form action="update_genre.php" method="post">
        <input type="hidden" name="GenreID" value="<?php echo $row['GenreID']; ?>">
        <label for="Name">Name:</label>
        <input type="text" name="Name" value="<?php echo $row['Name']; ?>"><br><br>
        <input type="submit" value="Update Genre">
    </form>
</body>
</html>
