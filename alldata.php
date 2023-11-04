<?php
// Replace with your database connection details
$host = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$database = "school_admission_form"; // Database name

// Create a database connection
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// Perform an SQL JOIN query to combine data from all three tables
$sql = " SELECT
        af.id AS student_id,
        af.name AS student_name,
        af.date_of_birth AS date_of_birth,
        md.medical_condition,
        md.medication,
        md.doctor_name,
        md.doctor_phone_number,
        sd.scholarship_name,
        sd.scholarship_provider,
        scholarship_amount,
        sd.scholarship_start_date,
        sd.scholarship_end_date
    FROM admission_form AS af
    LEFT JOIN medical_details AS md ON af.id = md.student_id
    LEFT JOIN scholarship_details AS sd ON af.id = sd.student_id ";

$stmt = $pdo->query($sql);
$student_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Details</title>
</head>
<body>
<h1>Student Details</h1>

<table border="1">
    <thead>
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>DOB</th>
        <th>Medical Condition</th>
        <th>Medication</th>
        <th>Doctor's Name</th>
        <th>Doctor's Phone Number</th>
        <th>Scholarship Name</th>
        <th>Scholarship Provider</th>
        <th>Scholarship Amount</th>
        <th>Scholarship Start Date</th>
        <th>Scholarship End Date</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($student_data as $row) : ?>
        <tr>
            <td><?php echo $row['student_id']; ?></td>
            <td><?php echo $row['student_name']; ?></td>
            <td><?php echo $row['date_of_birth']; ?></td>
            <td><?php echo $row['medical_condition']; ?></td>
            <td><?php echo $row['medication']; ?></td>
            <td><?php echo $row['doctor_name']; ?></td>
            <td><?php echo $row['doctor_phone_number']; ?></td>
            <td><?php echo $row['scholarship_name']; ?></td>
            <td><?php echo $row['scholarship_provider']; ?></td>
            <td><?php echo $row['scholarship_amount']; ?></td>
            <td><?php echo $row['scholarship_start_date']; ?></td>
            <td><?php echo $row['scholarship_end_date']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
