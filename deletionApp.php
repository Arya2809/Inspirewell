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
    $AppointmentID = $_POST['AppointmentID'];

    
    $select_sql = $conn->prepare("SELECT * FROM appointment WHERE AppointmentID = ?");
    $select_sql->bind_param("i", $AppointmentID); 

    
    $select_sql->execute();

    // Get result
    $result = $select_sql->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $PatientID = $row['PatientID'];
        $DoctorID = $row['DoctorID'];
        $AppointmentDate = $row['AppointmentDate'];
        $AppointmentStatus = $row['AppointmentStatus'];

        // Display appointment details
        echo "<h2>Appointment Details</h2>";
        echo "<p>Appointment ID: $AppointmentID</p>";
        echo "<p>Patient ID: $PatientID</p>";
        echo "<p>Doctor ID: $DoctorID</p>";
        echo "<p>Appointment Date: $AppointmentDate</p>";
        echo "<p>Appointment Status: $AppointmentStatus</p>";

        // Prepare and bind the SQL statement with a parameter for deletion
        $delete_sql = $conn->prepare("DELETE FROM appointment WHERE AppointmentID = ?");
        $delete_sql->bind_param("i", $AppointmentID); 

        // Execute the statement for deletion
        if ($delete_sql->execute() === TRUE) {
            echo "<p>Appointment deleted successfully!</p>";
            echo "<p><br><a href='hospital.html'>BACK TO HOME PAGE</a></p>";
        } else {
            echo "Error deleting appointment: " . $delete_sql->error;
        }

        // Close the prepared statement for deletion
        $delete_sql->close();
    } else {
        echo "<p>No appointment found with ID: $AppointmentID</p>";
    }

    // Close the prepared statement for selection
    $select_sql->close();
}
$conn->close();
?>
</body>
</html>
