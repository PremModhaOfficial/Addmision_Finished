<?php
// Replace with your database connection details
$host = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$database = "school_admission_form"; // Database name

// Create a database connection
$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

// Get data from the form
$student_id = $_POST['student_id'];
$medical_condition = $_POST['medical_condition'];
$medication = $_POST['medication'];
$doctor_name = $_POST['doctor_name'];
$doctor_phone_number = $_POST['doctor_phone_number'];

// Prepare and execute the SQL statement to insert data into the "medical_details" table
$sql = "INSERT INTO medical_details (student_id, medical_condition, medication, doctor_name, doctor_phone_number) VALUES (?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$student_id, $medical_condition, $medication, $doctor_name, $doctor_phone_number]);

// Redirect to a success page or handle errors as needed
header("Location: success_page.php"); // Change to your success page URL