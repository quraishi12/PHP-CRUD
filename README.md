
```markdown
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
- **Head Section**:
  - `<meta charset="UTF-8">`: Sets the character encoding to UTF-8, supporting a wide range of characters.
  - `<meta name="viewport" content="width=device-width, initial-scale=1.0">`: Makes the page responsive on different devices.
  - `<title>Simple Form</title>`: Sets the title of the webpage displayed in the browser tab.
  
- **Body Section**:
  - `<h3>Submit Your Information</h3>`: A heading that describes the form's purpose.
  
- **Form Element**:
  - `<form action="insert.php" method="post">`: Defines the form. It specifies the URL (in this case, `insert.php`) to which the form data will be sent when submitted. The `method="post"` indicates that the data will be sent using the POST method, which is suitable for sensitive data.

- **Input Fields**:
  - `<label for="name">Name</label>`: Label for the name input field.
  - `<input type="text" id="name" name="name" required>`: Input field for the user's name (required).
  
  - `<label for="email">Email</label>`: Label for the email input field.
  - `<input type="email" id="email" name="email" required>`: Input field for the user's email, with basic validation for email formats.

  - `<label for="section">Section</label>`: Label for the section input field.
  - `<input type="text" id="section" name="class" required>`: Input field for the user's section (required).

- **Submit Button**:
  - `<input type="submit" value="Submit" name="submit">`: Button to submit the form data to the server.

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

1. **Database Configuration**:
   - Sets up the server name, username, password, and database name.
  
2. **Create Connection**:
   ```php
   $conn = mysqli_connect($servername, $username, $password, $dbname);
   ```
   - Attempts to establish a connection to the MySQL database.

3. **Check Connection**:
   ```php
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   ```
   - Checks if the connection was successful; if it fails, it terminates the script and outputs an error message.

4. **User Input**:
   ```php
   $name = $_POST['name'];
   $email = $_POST['email'];
   $class = $_POST['class'];
   ```
   - Retrieves user input from the form fields.

5. **Prepare the SQL Statement**:
   ```php
   $sql = "INSERT INTO student_info (name, email, section) VALUES ('$name', '$email', '$class')";
   ```
   - Constructs an SQL INSERT statement to add a new record into the `student_info` table.

6. **Execute the Query**:
   ```php
   if (mysqli_query($conn, $sql)) {
       echo "New record created successfully";
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   ```
   - Executes the SQL query. If successful, it confirms the creation of a new record; if it fails, it outputs an error message.

7. **Close the Connection**:
   ```php
   mysqli_close($conn);
   ```
   - Closes the database connection, freeing up resources.

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



The PHP code you've provided seems to be part of a script for deleting a record from a MySQL database table (`Std_Info`) based on an `id` parameter passed via the URL (using `$_GET`). The script is used in scenarios like removing a student's record from a database, based on their unique ID.

### Explanation of the Code:

```php
<?php
include 'Connection.php';  // Include the database connection file

$id = $_GET['id'];  // Fetch the student ID from the URL query string (No checks for existence or validity)

$delete_query = "DELETE FROM Std_Info WHERE ID = $id";  // Create the DELETE SQL query

// Execute the DELETE query
mysqli_query($conn, $delete_query);

// Close the database connection
mysqli_close($conn);

// Redirect the user to the Display.php page after deletion
header("Location: Display.php");
exit;  // Ensure the script stops executing after the redirect
?>
```

### Breakdown of the code:

1. **Database Connection (`include 'Connection.php';`)**

   * The script includes another PHP file, `Connection.php`, which likely contains the logic for connecting to the MySQL database (e.g., setting up `$conn` as a connection variable).
   * Without seeing `Connection.php`, we can assume it initializes `$conn` using `mysqli_connect()` or `new mysqli()`.

2. **Fetching the ID (`$id = $_GET['id'];`)**

   * The script fetches the `id` from the URL query string. The `id` is expected to be passed in the URL, e.g., `delete.php?id=5`.
   * **Important note**: This line lacks checks for the existence or validity of the `id`. This can be dangerous, as the script would proceed even if no `id` is provided or if it's not a valid integer.

3. **Delete Query (`$delete_query = "DELETE FROM Std_Info WHERE ID = $id";`)**

   * This creates an SQL DELETE query that removes the record from the `Std_Info` table where the `ID` matches the provided `$id`. The query looks like:

     ```sql
     DELETE FROM Std_Info WHERE ID = 5;  // Example if $id = 5
     ```

4. **Executing the Query (`mysqli_query($conn, $delete_query);`)**

   * This function runs the delete query against the database. If the query is successful, the record will be removed from the table.

5. **Closing the Connection (`mysqli_close($conn);`)**

   * This function closes the database connection once the query is executed.

6. **Redirecting (`header("Location: Display.php");`)**

   * After deleting the record, the user is redirected back to `Display.php` (presumably a page that shows the list of students or records).
   * The `exit;` ensures that the script stops executing after the redirect.

### Considerations:

1. **Security Concern:**

   * **SQL Injection**: Since the `$id` value is directly inserted into the query without sanitization, this opens the door for **SQL injection** attacks. To prevent this, the code should use prepared statements or sanitize the input before using it in the query.
   * **Validation**: The script should also check if the `id` parameter exists and is valid (e.g., an integer) before proceeding with the query.

2. **Improvement Example:**
   Here's a more secure version of this code using prepared statements and basic validation:

```php
<?php
include 'Connection.php';  // Include the database connection file

// Check if 'id' exists and is a valid integer
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE query with a placeholder
    $delete_query = "DELETE FROM Std_Info WHERE ID = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $delete_query)) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "i", $id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Close the statement
        mysqli_stmt_close($stmt);
    }

    // Close the connection
    mysqli_close($conn);

    // Redirect to the student list page
    header("Location: Display.php");
    exit;
} else {
    // Handle invalid 'id' (optional)
    echo "Invalid ID";
}
?>
```
---

### `delete.php` - Deleting Student Records

This PHP script is responsible for deleting a student's record from the `Std_Info` table in the database based on a provided student ID (`id`). After successful deletion, it redirects to the `Display.php` page, which shows the updated list of students.

#### **How It Works**:

1. **Database Connection**: The script includes a `Connection.php` file that establishes a connection to the database.
2. **ID Validation**: The script expects the student ID (`id`) to be passed via the URL query string (`?id=5`).
3. **Delete Operation**: The script executes a `DELETE` SQL query to remove the record from the `Std_Info` table where the `ID` matches the provided ID.
4. **Redirect**: After the record is deleted, the user is redirected back to `Display.php`.

#### **Security Warning**:

* This script does not sanitize or validate the `id` before using it in the query. This can lead to **SQL injection vulnerabilities**. It is recommended to use **prepared statements** or sanitize inputs properly before using them in SQL queries.

#### **To Improve**:

* Use prepared statements to prevent SQL injection.
* Validate that the `id` is a valid number before executing the query.

#### Example Usage:

To delete a student with ID `5`, visit the following URL:


```
delete.php?id=5
```

---

mysqli_close($connection);
?>
```
