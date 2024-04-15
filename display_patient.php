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
    <h2>PATIENT RECORD</h2><br>
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

// Fetch data from the doctor table
$sql = "SELECT * FROM patient";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
        <tr>
            <th>Patient ID</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Address</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['Pid']}</td>
            <td>{$row['Patient_name']}</td>
            <td>{$row['Patient_phno']}</td>
            <td>{$row['Patient_address']}</td>
          </tr>";
}

echo "</table>";

// Close the connection
mysqli_close($conn);
?>
<p><br><a href="hospital.html">BACK TO HOME PAGE</a></p>
</body>
</html>