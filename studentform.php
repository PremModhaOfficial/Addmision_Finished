<?php
// Database configuration
$host = "localhost"; // Hostname
$username = "root"; // Database username
$password = ""; // Database password
$database = "school_admission_form"; // Database name

// Create a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// If you reach this point, the database connection is successful
echo "Connected to the database successfully.";


//$targetDir = "uploads/";
//$targetFile = $targetDir . basename($_FILES["document"]["name"]);

// if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
//   $documentPath = $targetFile;
// } else {
//   echo "Sorry, there was an error uploading your file.";
//   $documentPath = null; // Set document path to null if upload fails
// }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data

    //$folder="/images";
$filename= $_FILES["uploadfile"]["name"];
$tempname= $_FILES["uploadfile"]["tmp_name"];
$folder="images/".$filename;
echo $folder;
move_uploaded_file($tempname,$folder)






  $standard = $_POST["standard"];
  $pic=$_pic["uploadfile"]
  $sex = $_POST["sex"];
  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $father_name = $_POST["father_name"];
  $mother_name = $_POST["mother_name"];
  $date_of_birth = $_POST["date_of_birth"];
  $place_of_birth = $_POST["place_of_birth"];
  $complete_age = $_POST["complete_age"];
  $aadhar_card_no = $_POST["aadhar_card_no"];
  $religion = $_POST["religion"];
  $caste = $_POST["caste"];
  $sub_caste = $_POST["sub_caste"];
  $nationality = $_POST["nationality"];
  $blood_group = $_POST["blood_group"];
  $mother_tongue = $_POST["mother_tongue"];
  $languages_spoken_at_home = $_POST["languages_spoken_at_home"];
  $residential_address = $_POST["residential_address"];
  $distance_from_residence_to_school = $_POST["distance_from_residence_to_school"];
  $res_tel_no = $_POST["res_tel_no"];
  $cell_no = $_POST["cell_no"];
  $name_and_address_of_last_school_attended = $_POST["name_and_address_of_last_school_attended"];
  $reason_for_leaving = $_POST["reason_for_leaving"];
  $medium = $_POST["medium"];
  $student_residing_with = $_POST["student_residing_with"];

    // Establish a database connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if a file has been uploaded
    if (!empty($_FILES['doc']['name'])) {
        // Define the directory where uploaded documents will be stored
        $uploadDirectory = "uploads/";

        // Generate a unique file name to avoid overwriting
        $uploadedFileName = $uploadDirectory . uniqid() . "_" . $_FILES["doc"]["name"];

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["doc"]["tmp_name"], $uploadedFileName)) {
            // File upload was successful
            $documentPath = $uploadedFileName;
        } else {
            echo "Error uploading the document.";
            $documentPath = null;
        }
    } else {
        // No file was uploaded, set the document path to null
        $documentPath = null;
    }

  $sql = "INSERT INTO admission_form (standard, sex, name,uploadfile, surname, father_name, mother_name, date_of_birth, place_of_birth, complete_age, aadhar_card_no, religion, caste, sub_caste, nationality, blood_group, mother_tongue, languages_spoken_at_home, residential_address, distance_from_residence_to_school, res_tel_no, cell_no, name_and_address_of_last_school_attended, reason_for_leaving_last_school, medium, student_residing_with) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $pdo->prepare($sql);
  $stmt->execute([$standard, $sex, $name,$pic, $surname, $father_name, $mother_name, $date_of_birth, $place_of_birth, $complete_age, $aadhar_card_no, $religion, $caste, $sub_caste, $nationality, $blood_group, $mother_tongue, $languages_spoken_at_home, $residential_address, $distance_from_residence_to_school, $res_tel_no, $cell_no, $name_and_address_of_last_school_attended, $reason_for_leaving, $medium, $student_residing_with]);
    // Prepare and execute the query, binding the document path
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssssssssss", $standard, $sex, $name, $surname, $father_name, $mother_name, $date_of_birth, $place_of_birth, $complete_age, $aadhar_card_no, $religion, $caste, $sub_caste, $nationality, $blood_group, $mother_tongue, $languages_spoken_at_home, $residential_address, $distance_from_residence_to_school, $res_tel_no, $cell_no, $name_and_address_of_last_school_attended, $reason_for_leaving, $medium, $student_residing_with, $documentPath);

    // Execute the query
    if ($stmt->execute()) {
        // Data has been successfully inserted
        echo "Student data with document has been successfully inserted into the database.";
    } else {
        // Error occurred during insertion
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
else {
  // If the form is not submitted, you can handle this case as needed
  echo "Form not submitted.";
}
// ... (existing code)









 // try {
   // $pdo = new PDO('mysql:host=localhost;dbname=school_admission_form', 'root', '');
   // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   // $sql = "INSERT INTO admission_form (standard, sex, name, surname, father_name, mother_name, date_of_birth, place_of_birth, complete_age, aadhar_card_no, religion, caste, sub_caste, nationality, blood_group, mother_tongue, languages_spoken_at_home, residential_address, distance_from_residence_to_school, res_tel_no, cell_no, name_and_address_of_last_school_attended, reason_for_leaving_last_school, medium, student_residing_with) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    //$stmt = $pdo->prepare($sql);
    //$stmt->execute([$standard, $sex, $name, $surname, $father_name, $mother_name, $date_of_birth, $place_of_birth, $complete_age, $aadhar_card_no, $religion, $caste, $sub_caste, $nationality, $blood_group, $mother_tongue, $languages_spoken_at_home, $residential_address, $distance_from_residence_to_school, $res_tel_no, $cell_no, $name_and_address_of_last_school_attended, $reason_for_leaving, $medium, $student_residing_with]);

    //header("Location: thank_you.php");
  //} catch (PDOException $e) {
   // echo "Error: " . $e->getMessage();
  //}
// } else {
//   // If the form is not submitted, you can handle this case as needed
//   echo "Form not submitted.";
// }
// You can perform database operations here

// Close the database connection when done
$mysqli->close();}
