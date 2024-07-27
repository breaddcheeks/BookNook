<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $reward = $_POST['reward'];

    $sql = "INSERT INTO challenge (Name, Description, StartDate, EndDate, Reward)
            VALUES ('$name', '$description', '$startDate', '$endDate', '$reward')";

    if ($conn->query($sql) === TRUE) {
        echo "New challenge created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create a New Challenge</title>
</head>
<body>
    <h2>Create a New Challenge</h2>
    <form method="post" action="create_challenge.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="startDate">Start Date:</label><br>
        <input type="date" id="startDate" name="startDate"><br>
        <label for="endDate">End Date:</label><br>
        <input type="date" id="endDate" name="endDate"><br>
        <label for="reward">Reward:</label><br>
        <input type="text" id="reward" name="reward"><br><br>
        <input type="submit" value="Create">
    </form>
</body>
</html>
