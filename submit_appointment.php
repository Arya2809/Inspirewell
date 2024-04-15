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
    <h2>YOUR APPOINTMENT INFORMATION</h2><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $patientID = $_POST['patientID'];
    $doctorID = $_POST['doctorID'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentID = $_POST['appointmentID'];

    $conn = new mysqli("localhost", "root", "", "project");
   

    

    // Update appointment status based on your criteria
    $currentMin=date('i');
   if($currentMin %2 == 0)
   {
    $appointmentstatus = "Scheduled";
   }
   else{
    $appointmentstatus = "Not Scheduled";
   }
   $sql = "INSERT INTO appointment (AppointmentID, PatientID, DoctorID, AppointmentDate,AppointmentStatus) VALUES ('$appointmentID','$patientID', '$doctorID', '$appointmentDate','$appointmentstatus')";
    if (mysqli_query($conn, $sql)) {
        echo "<p>Appointment ID: $appointmentID</p><br>";
        echo "<p>Patient ID: $patientID</p><br>";
        echo "<p>Doctor ID: $doctorID</p><br>";
        echo "<p>Appointment Date: $appointmentDate</p><br>";
        echo "<p>Appointment Status: $appointmentstatus</p><br>";
        echo "<p><br><a href='hospital.html'>BACK TO HOME PAGE</a></p>";
        exit();
    
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $conn->close();
}
?>
</body>
</html>