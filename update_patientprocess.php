<!DOCTYPE html>
<html lang="en">
    <head>
        <title>hospital</title>
<style>
body {
  font-family: 'Times New Roman', Times, serif;          
  height: 500vh;
  background-image: url('https://www.fortech.ro/wp-content/uploads/2020/06/Hospital-Management-System_Fortech.png');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patient_id = $_POST['patient_id'];
    $patient_name = $_POST['patient_name'];
    $patient_phno = $_POST['patient_phno'];
    $patient_address = $_POST['patient_address'];

    // Update patient record in the database
    $update_sql = "UPDATE patient SET 
                   Patient_name = '$patient_name', 
                   Patient_phno = '$patient_phno', 
                   Patient_address = '$patient_address' 
                   WHERE Pid = '$patient_id'";
echo "<h2>Updated Patient Details</h2>";
echo "<p>Patient ID: $patient_id</p>";
echo "<p>Patient name: $patient_name</p>";
echo "<p>Patient Phone number: $patient_phno</p>";
echo "<p>Patient address: $$patient_address</p>";

    if ($conn->query($update_sql) === TRUE) {
        echo "<p>Patient record updated successfully!</p>";
        echo"<p><br><a href='hospital.html'>BACK TO HOMEPAGE</a></p>";
    } else {
        echo "Error updating patient record: " . $conn->error;
    }
}

$conn->close();
?>
</body>
</html>