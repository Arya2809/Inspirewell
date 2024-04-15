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
    <h2>DOCTOR INFORMATION</h2><br>
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
$sql = "SELECT * FROM doctor";
$result = mysqli_query($conn, $sql);

// Display data in a table
echo "<table border='1'>
        <tr>
            <th>Doctor ID</th>
            <th>Name</th>
            <th>Deparment</th>
            <th>Gender</th>
            <th>Experience</th>
        </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['Docid']}</td>
            <td>{$row['name']}</td>
            <td>{$row['dept']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['experience']}</td>
          </tr>";
}

echo "</table>";

// Close the connection
mysqli_close($conn);
?>
<p><br><a href="hospital.html">BACK TO HOME PAGE</a></p>
</body>
</html>