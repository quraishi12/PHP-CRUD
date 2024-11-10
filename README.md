<h1> PHP complete crud operation </h1>

```
# Student Info Submission Script

## HTML Form
This HTML form allows users to submit their information. Below is the code for the form, followed by an explanation of its components:

```
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
- **DOCTYPE and HTML Structure**: 
  - `<!DOCTYPE html>` declares the document type and HTML version.
  - `<html lang="en">` specifies the language of the document as English.

- **Head Section**:
  - `<head>` contains metadata about the document.
  - `<meta charset="UTF-8">` sets the character encoding to UTF-8, supporting a wide range of characters.
  - `<meta name="viewport" content="width=device-width, initial-scale=1.0">` makes the page responsive on different devices.
  - `<title>Simple Form</title>` sets the title of the webpage displayed in the browser tab.

- **Body Section**:
  - `<body>` contains the content of the webpage.
  - `<h3>Submit Your Information</h3>` is a heading that describes the form's purpose.
  
- **Form Element**:
  - `<form action="insert.php" method="post">`: This defines the form. `action` specifies the URL (in this case, `insert.php`) to which the form data will be sent when submitted. `method="post"` indicates that the data will be sent using the POST method, which is suitable for sensitive data.
  
- **Input Fields**:
  - `<label for="name">Name</label>`: This label is associated with the input field for the name. It improves accessibility by allowing screen readers to identify the input.
  - `<input type="text" id="name" name="name" required>`: This input field accepts text input for the user's name. The `required` attribute ensures that the field must be filled before submission.
  
  - `<label for="email">Email</label>`: A label for the email input field.
  - `<input type="email" id="email" name="email" required>`: This input field accepts email addresses. The input type `email` provides basic validation for email formats.
  
  - `<label for="section">Section</label>`: A label for the section input field.
  - `<input type="text" id="section" name="class" required>`: This input field accepts text input for the user's section (or class). The `name` attribute is set to `class`, which will be used in the PHP script to retrieve this value.
  
- **Submit Button**:
  - `<input type="submit" value="Submit" name="submit">`: This button submits the form data to the server. The `value` attribute sets the button's text.

## Overview
This PHP script connects to a MySQL database and allows users to submit their information through the above form. The data is then inserted into the `student_info` table.

## Features
- Connects to a MySQL database.
- Handles user input.
- Inserts new student records into the database.

## PHP Code for Inserting Data
Once the form is submitted, the following PHP code processes the submitted data and inserts it into the database:
```
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
```

### Code Breakdown

#### Database Configuration

##### Variables
- **Server Name**: `localhost`  
  (Typically used for local development)
- **Username**: `root`  
  (Common default for XAMPP)
- **Password**: `""`  
  (Usually empty for local setups)
- **Database Name**: `logininfo`  
  (The name of your database)

##### Create Connection
```
$conn = mysqli_connect($servername, $username, $password, $dbname);
```
- **Description**: This line attempts to establish a connection to the MySQL database using the credentials defined above.

##### Check Connection
```
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
```
- **Description**: This block checks if the connection was successful. If it fails, it terminates the script and outputs an error message.

### User Input
The script retrieves the following data from an HTML form via POST:
```
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];
```
- **Description**: These lines fetch user input from the form fields `name`, `email`, and `class`.

### Prepare the SQL Statement
```
$sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";
```
- **Description**: This line constructs an SQL `INSERT` statement to add a new record into the `student_info` table.

### Execute the Query
```
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
```
- **Description**: This block executes the SQL query. If the execution is successful, it confirms the creation of a new record. If it fails, it outputs an error message along with the SQL statement and error details.

### Close the Connection
```
mysqli_close($conn);
```
- **Description**: This line closes the database connection, freeing up resources.

## Security Note
**Important**: This code is vulnerable to SQL injection. It is highly recommended to use prepared statements to enhance security.

## Usage
1. Ensure your database is set up with the correct credentials.
2. Place the HTML form and the PHP script (`insert.php`) on your server.
3. Access the form via a web browser and submit the information.
