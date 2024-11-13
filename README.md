
# Student Info Submission and Display Script

This repository contains a PHP application that allows users to submit student information through an HTML form, insert it into a MySQL database, and display the submitted information.

## Features

- **Form Submission**: Users can submit their name, email, and section.
- **Data Insertion**: Submitted data is inserted into a MySQL database.
- **Data Display**: Displays the submitted student information in a structured format.

## Prerequisites

- PHP installed on your local server (e.g., XAMPP, MAMP)
- MySQL database
- A database named `logininfo` with a table named `student_info` containing the following columns:
  - `name`
  - `email`
  - `section`

## HTML Form

This HTML form allows users to submit their information. Below is the code for the form:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Form</title>
</head>
<body>
    <h3>Submit Your Information</h3>
    <form action="insert.php" method="post">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="section">Section</label>
        <input type="text" id="section" name="class" required><br>
        
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
```

### Explanation of the Form

- **DOCTYPE and HTML Structure**: Declares the document type and HTML version.
- **Head Section**: Contains metadata and responsive design settings.
- **Form Element**: Submits data to `insert.php` using the POST method.
- **Input Fields**: Collects the user's name, email, and section, ensuring all fields are required.
- **Submit Button**: Submits the form data to the server.

## PHP Code for Inserting Data

Once the form is submitted, the following PHP code processes the submitted data and inserts it into the database (`insert.php`):

```php
<?php
$servername = "localhost"; // Your server name
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "logininfo";      // Your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user input
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
```

### Code Breakdown

1. **Database Configuration**: Sets up the server name, username, password, and database name.
2. **Create Connection**: Attempts to establish a connection to the MySQL database.
3. **Check Connection**: Verifies if the connection was successful.
4. **User Input**: Retrieves user input from the form fields.
5. **Prepare the SQL Statement**: Constructs an SQL INSERT statement.
6. **Execute the Query**: Executes the SQL query and checks for success or failure.
7. **Close the Connection**: Closes the database connection.

## Displaying Data

To display the submitted information, create another PHP file (`display.php`):

```php
<?php
$Server = "localhost";
$User = "root";
$Password = "";
$DB_Name = "logininfo";

// Create connection
$connection = mysqli_connect($Server, $User, $Password, $DB_Name);

// Check connection
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    // Query to select all records
    $query = "SELECT * FROM student_info";
    $Res = mysqli_query($connection, $query);

    // Check if query was successful
    if ($Res) {
        echo "<h1>Student Information List</h1>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Section</th>
                </tr>";

        // Fetch and display data
        while ($row = mysqli_fetch_assoc($Res)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['ID']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['section']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Data not found!";
    }
}

// Close the connection
mysqli_close($connection);
?>
```
