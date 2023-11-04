scholarship details:


<?php
// Replace with your database connection details
$host = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$database = "school_admission_form"; // Database name

// Create a database connection
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// Prepare and execute an SQL query to retrieve data from the "scholarship_details" table
$sql = "SELECT * FROM scholarship_details";
$stmt = $pdo->query($sql);

// Fetch the data into an associative array
$scholarships = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scholarship Details</title>
</head>
<body>

<form action="process_scholarship_details.php" method="POST">
    <input type="text" name="student_id" value="123"> <!-- Replace with the actual student_id -->
    <label for="scholarship_name">Scholarship Name:</label>
    <input type="text" id="scholarship_name" name="scholarship_name" required><br>

    <label for="scholarship_provider">Scholarship Provider:</label>
    <input type="text" id="scholarship_provider" name="scholarship_provider" required><br>

    <label for="scholarship_amount">Scholarship Amount:</label>
    <input type="text" id="scholarship_amount" name="scholarship_amount" required><br>

    <label for="scholarship_start_date">Start Date:</label>
    <input type="date" id="scholarship_start_date" name="scholarship_start_date" required><br>

    <label for="scholarship_end_date">End Date:</label>
    <input type="date" id="scholarship_end_date" name="scholarship_end_date" required><br>

    <input type="submit" value="Submit">

</form>
<h1>Scholarship Details</h1>
<table border="1">
    <thead>
    <tr>
        <th>Scholarship Name</th>
        <th>Scholarship Provider</th>
        <th>Scholarship Amount</th>
        <th>Start Date</th>
        <th>End Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($scholarships as $scholarship) : ?>
        <tr>
            <td><?php echo $scholarship['scholarship_name']; ?></td>
            <td><?php echo $scholarship['scholarship_provider']; ?></td>
            <td><?php echo $scholarship['scholarship_amount']; ?></td>
            <td><?php echo $scholarship['scholarship_start_date']; ?></td>
            <td><?php echo $scholarship['scholarship_end_date']; ?></td>
        </tr>
    <?php endforeach; ?>
    <label for="ll"></label><select name="ll" id="ll">
            <?php foreach ($scholarships as $scholarship) : ?>
            <option value="<?php echo $scholarship['scholarship_end_date']?>">
                <?php echo $scholarship['scholarship_end_date']?>
            </option>
            <?php endforeach; ?>
        </select>
    </tbody>
</table>
</body>
</html>