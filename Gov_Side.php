<?php
// Database connection parameters
$servername = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$database = "school_admission_form"; // Database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$selectedStudentName = "";
$selectedStudentID = "";
$selectedStandard = "";

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedStudentName = $_POST["student_name"];
    $selectedStudentID = $_POST["student_id"];
    $selectedStandard = $_POST["standard"];
}

// Fetch student data based on filters
$sql = "SELECT * FROM admission_form WHERE 1=1"; // Initial query

if (!empty($selectedStudentName)) {
    $sql .= " AND name = '$selectedStudentName'";
}

if (!empty($selectedStudentID)) {
    $sql .= " AND id = '$selectedStudentID'";
}

if (!empty($selectedStandard)) {
    $sql .= " AND standard = '$selectedStandard'";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Government Dashboard</title>
</head>
<body>
<h1>Government Dashboard</h1>
<form method="post" action="">
    <label for="student_name">Select Student by Name:</label>
    <input type="text" name="student_name" id="student_name">
    <br>
    <label for="student_id">Select Student by ID:</label>
    <input type="text" name="student_id" id="student_id">
    <br>
    <label for="standard">Filter by Standard:</label>
    <input type="text" name="standard" id="standard">
    <br>
    <input type="submit" value="Apply Filters">
</form>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Standard</th>
        <!-- Add more table headers for other student details -->
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["standard"] . "</td>";
            // Add more table data for other student details
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No results found.</td></tr>";
    }
    $conn->close();
    ?>
</table>
</body>
</html>
