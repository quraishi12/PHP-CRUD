# PHP-CRUD
Simple Create, Read, Update, Delete (CRUD) in PHP & MySQL

---

## 📝 Explanation of Code Files

### 📝 `Form.php` File

#### Document Type Declaration
`<!DOCTYPE html>` specifies that this document is an HTML5 document.

#### HTML Tag
`<html lang="en">` indicates the start of the HTML document and specifies the language as English.

#### Head Section
- `<head>` contains meta-information about the document.
- `<meta charset="UTF-8">` sets the character encoding to UTF-8, allowing for a wide range of characters.
- `<meta name="viewport" content="width=device-width, initial-scale=1.0">` makes the web page responsive, adjusting its layout based on the device's width.
- `<title>Simple Form</title>` sets the title of the document that appears in the browser tab.

#### Body Section
- `<body>` contains the visible content of the web page.
- `<h3>Submit Your Information</h3>` is a heading for the form.
- `<form action="insert.php" method="post">` defines the form. The `action` attribute specifies where to send the form data upon submission, and `method="post"` indicates that the data should be sent using the POST method.

#### Form Elements
- Each `<label>` element is associated with an `<input>` element via the `for` attribute, which improves accessibility.
- `<input>` elements of type "text" and "email" gather user input. The `required` attribute ensures that the user must fill these fields before submitting the form.
- The final `<input>` is a submit button that sends the form data.

---

### 📝 `Insert.php` File

#### PHP MySQL Insert Example

This document provides an overview of a PHP script that connects to a MySQL database, retrieves form data, and inserts it into a specific table.

#### Code Example:

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

Step 1: Create connection Variable

$servername = "localhost"; // Because you're probably working locally (unless you're some kind of database wizard).
$username = "root";       // The classic root user (unless you have more security concerns than a fortress).
$password = "";           // Because we're not using passwords for XAMPP... but you should on production. Seriously.
$dbname = "logininfo";    // Your very own database where all the magic happens (also, your data lives here).

Step 2: Making the Connection

Now it's time to connect. Don’t worry, we’re not talking about high-tech networking stuff—just good ol' PHP. 🚀

$conn = mysqli_connect($servername, $username, $password, $dbname);

This command ensures you're linked to your database, like calling your friend on the phone and saying, "Hey, let's talk data

!" 📞💬
Step 3: Let's Check the Connection

Before we go too far, let’s check if we successfully connected, because no one likes a dead connection. 😱

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // If it fails, throw a tantrum (or just an error message).
}

If the connection doesn't happen, you'll see a nice error message telling you where things went wrong. If it works, you can start playing with your data!
Step 4: Retrieving Form Data

Time to grab that data from the form! 📄👀

$name = $_POST['name'];  // What's your name? Let's find out.
$email = $_POST['email']; // Where do you live on the internet?
$class = $_POST['class']; // What class are you in? No, not Hogwarts.

This grabs the data you submitted in a form with the POST method. The names must match the names of your input fields in the HTML form. Easy peasy!
Step 5: Preparing the SQL Statement

Now for the real magic. We take that data and inject it into the SQL query:

$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";

This query says: "Hey MySQL, take this data and stuff it into the student_info table."

    Important Note: Be careful with these kinds of queries in real life. You should always use prepared statements to avoid SQL injection attacks. But for now, we’ll live dangerously. 😎

Step 6: Execute the Query

Time to actually make the database do its thing! 🎩✨

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully! 🎉";  // Success! The world loves new data!
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);  // Oops! Something went wrong... let's find out what.
}

If everything works, you’ll see "New record created successfully." If it doesn’t, it’ll tell you where things went wrong so you can fix it. Sweet, right?
Step 7: Closing the Connection

The party's over. You've done the work, and now it's time to tidy up.

mysqli_close($conn);


