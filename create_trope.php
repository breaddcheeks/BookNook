<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO trope (Title, Description) VALUES ('$title', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New trope created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a New Trope</title>
</head>
<body>
    <h2>Create a New Trope</h2>
    <form method="post" action="create_trope.php">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
