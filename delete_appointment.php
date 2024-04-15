<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Appointment</title>
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
    <h2>Cancel Appointment</h2>

    <form action="deletionApp.php" method="post">
        <label for="AppointmentID">Select Appointment ID:</label>
        <select name="AppointmentID">
            <?php
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT AppointmentID FROM appointment";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['AppointmentID'] . "'>" . $row['AppointmentID'] . "</option>";
                    }
                }

                $conn->close();
            ?>
        </select>
        <br><br><br>

        <input type="submit" value="CANCEL APPOINTMENT">
    </form>
</body>
</html>
