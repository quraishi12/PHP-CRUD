# PHP-CRUD
Simple Create, Read, Update, Delete (CRUD) in PHP &amp; MySQL
<h2>Expaline the all file code step by step </h2>
<h1>Form.php File</h1>
## Document Type Declaration
`<!DOCTYPE html>` specifies that this document is an HTML5 document.

## HTML Tag
`<html lang="en">` indicates the start of the HTML document and specifies the language as English.

## Head Section
- `<head>` contains meta-information about the document.
- `<meta charset="UTF-8">` sets the character encoding to UTF-8, allowing for a wide range of characters.
- `<meta name="viewport" content="width=device-width, initial-scale=1.0">` makes the web page responsive, adjusting its layout based on the device's width.
- `<title>Simple Form</title>` sets the title of the document that appears in the browser tab.

## Body Section
- `<body>` contains the visible content of the web page.
- `<h3>Submit Your Information</h3>` is a heading for the form.
- `<form action="insert.php" method="post">` defines the form. The `action` attribute specifies where to send the form data upon submission, and `method="post"` indicates that the data should be sent using the POST method.

## Form Elements
- Each `<label>` element is associated with an `<input>` element via the `for` attribute, which improves accessibility.
- `<input>` elements of type "text" and "email" gather user input. The `required` attribute ensures that the user must fill these fields before submitting the form.
- The final `<input>` is a submit button that sends the form data.
<h1>Insert.php file </h1>
# PHP MySQL Insert Example

This document provides an overview of a PHP script that connects to a MySQL database, retrieves form data, and inserts it into a specific table.

## Code Example

```php
<?php
$servername = "localhost"; // Your server name
$username = "root";         // Your database username (e.g., "root" for XAMPP)
$password = "";             // Your database password (usually empty for XAMPP)
$dbname = "logininfo";      // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data (assuming POST method)
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];

// Prepare the SQL statement
$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>

Explanation

    Database Connection Variables:
        $servername: The name of the server where your database is hosted (commonly "localhost" for local development).
        $username: The username to connect to the database (often "root" for XAMPP).
        $password: The password for the database user (usually empty for XAMPP).
        $dbname: The name of the database you are connecting to (in this case, "logininfo").

    Creating a Connection:
    php

$conn = mysqli_connect($servername, $username, $password, $dbname);

This line establishes a connection to the MySQL database using the mysqli_connect function.

Checking the Connection:
php

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

If the connection fails, the script terminates and displays an error message using mysqli_connect_error().

Retrieving Form Data:
php

$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];

This section retrieves the data submitted from a form using the POST method. It assumes that the form fields are named "name", "email", and "class".

Preparing the SQL Statement:
php

$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";

This line constructs an SQL query to insert the retrieved data into the student_info table. The values are enclosed in single quotes and interpolated into the query string.

Executing the Query:
php

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

The mysqli_query function executes the SQL query. If successful, it outputs a success message; if it fails, it displays the error message along with the SQL statement that caused the error.

Closing the Connection:
php

mysqli_close($conn);

Finally, the script closes the database connection to free up resources.
