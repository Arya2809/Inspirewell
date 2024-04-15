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
    <h2>YOUR INFORMATION</h2><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$Pid = mysqli_real_escape_string($conn, $_POST['Pid']);
$Patient_name = mysqli_real_escape_string($conn, $_POST['Patient_name']);
$Patient_phno = mysqli_real_escape_string($conn, $_POST['Patient_phno']);
$Patient_address = mysqli_real_escape_string($conn, $_POST['Patient_address']);

// Insert data into the patient table
$sql = "INSERT INTO patient (Pid, Patient_name, Patient_phno, Patient_address) VALUES ('$Pid', '$Patient_name', '$Patient_phno', '$Patient_address')";

if (mysqli_query($conn, $sql)) {
    echo "<p>Thank you for Registering!!</p><br>";
    echo "<p>Patient ID: $Pid </p><br>";
    echo "<p>Patient Name: $Patient_name</p><br>";
    echo "<p>Patient Phone Number: $Patient_phno </p><br>";
    echo "<p>Patient Address: $Patient_address</p><br>";
    echo "<p><br><a href='hospital.html'>BACK TO HOME PAGE</a></p>";
    exit();
    exit();

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
</body>
</html>