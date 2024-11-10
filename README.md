Here's the complete `README.md` content with the HTML form code added at the top:

```markdown
# Student Info Submission Script

## HTML Form
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

## Overview
This PHP script connects to a MySQL database and allows users to submit their information through a form. The data is then inserted into the `student_info` table.

## Features
- Connects to a MySQL database.
- Handles user input.
- Inserts new student records into the database.

## Code Breakdown

### Database Configuration

#### Variables
- **Server Name**: `localhost`  
  (Typically used for local development)
- **Username**: `root`  
  (Common default for XAMPP)
- **Password**: `""`  
  (Usually empty for local setups)
- **Database Name**: `logininfo`  
  (The name of your database)

#### Create Connection
```php
$conn = mysqli_connect($servername, $username, $password, $dbname);
```
- **Description**: This line attempts to establish a connection to the MySQL database using the credentials defined above.

#### Check Connection
```php
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
```
- **Description**: This block checks if the connection was successful. If it fails, it terminates the script and outputs an error message.

### User Input
The script retrieves the following data from an HTML form via POST:
```php
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];
```
- **Description**: These lines fetch user input from the form fields `name`, `email`, and `class`.

### Prepare the SQL Statement
```php
$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";
```
- **Description**: This line constructs an SQL `INSERT` statement to add a new record into the `student_info` table.

### Execute the Query
```php
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
```
- **Description**: This block executes the SQL query. If the execution is successful, it confirms the creation of a new record. If it fails, it outputs an error message along with the SQL statement and error details.

### Close the Connection
```php
mysqli_close($conn);
```
- **Description**: This line closes the database connection, freeing up resources.

## Security Note
**Important**: This code is vulnerable to SQL injection. It is highly recommended to use prepared statements to enhance security.

## Complete PHP Code
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
```

## Usage
1. Ensure your database is set up with the correct credentials.
2. Place the HTML form and the PHP script (`insert.php`) on your server.
3. Access the form via a web browser and submit the information.
