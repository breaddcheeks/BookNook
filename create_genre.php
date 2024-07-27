<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];

    $sql = "INSERT INTO genre (Name) VALUES ('$name')";

    if ($conn->query($sql) === TRUE) {
        echo "New genre created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a New Genre</title>
</head>
<body>
    <h2>Create a New Genre</h2>
    <form method="post" action="create_genre.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
