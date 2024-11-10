<?php
include 'Connection.php';

$id = $_GET['id'];  // No checks for existence or validity

$delete_query = "DELETE FROM Std_Info WHERE ID = $id";
// Delete Query Execute
mysqli_query($conn, $delete_query);

// Close the connection
mysqli_close($conn);

// Redirect back to the student list
header("Location: Display.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Information</title>
</head>
<body>

<h2>Student Deleted</h2>
<p>The student has been deleted successfully.</p>
<a href="Display.php">Go back to the student list</a>

</body>
</html>