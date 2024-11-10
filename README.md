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
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];
$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
# 🎉 Database Connection Made Easy (and Slightly Fun)

Welcome to the most *exciting* part of web development – **Database Connection**! 🥳

If you're tired of dealing with error messages like *"Connection failed: No server found"* or *"Oops, we couldn't insert your data"*, you've come to the right place. Buckle up, it's time to get your database connection running smoothly.

---

## 📌 Step 1: Set Up Your Variables

First things first, you'll need some **magical connection variables**. These are like the **secret keys** to the kingdom of your database. 🔑✨

```php
$servername = "localhost";  // Because you're probably working locally (unless you're some kind of database wizard).
$username = "root";         // The classic root user (unless you have more security concerns than a fortress).
$password = "";             // Because we're not using passwords for XAMPP... but you should on production. Seriously.
$dbname = "logininfo";      // Your very own database where all the magic happens (also, your data lives here).

