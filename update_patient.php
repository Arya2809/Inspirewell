<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Record</title>
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
    <h2>Update Patient Record</h2>

    <form action="update_patientprocess.php" method="post">
        <label for="patient_id">Select Patient ID:</label>
        <select name="patient_id">
            <?php
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $sql = "SELECT Pid FROM patient";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['Pid'] . "'>" . $row['Pid'] . "</option>";
                    }
                }

                $conn->close();
            ?>
        </select>
        <br><br>

        <label for="patient_name">Patient Name:</label>
        <input type="text" name="patient_name" required>
        <br><br>

        <label for="patient_phno">Phone Number:</label>
        <input type="text" name="patient_phno" required>
        <br><br>

        <label for="patient_address">Address:</label>
        <textarea name="patient_address" rows="4" required></textarea>
        <br><br>

        <input type="submit" value="UPDATE RECORD">
    </form>
</body>
</html>
