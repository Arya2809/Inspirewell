<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
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

    <h2>Appointment Form</h2>

    <form action="submit_appointment.php" method="POST">
        <!-- Patient ID dropdown -->
        <label for="patientID">Patient ID:</label>
        <select name="patientID" id="patientID">
            <?php
                
                $conn = new mysqli("localhost", "root", "", "project");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                

                // Fetch patient data from the database
                $patientQuery = "SELECT Pid FROM patient";
                $patientResult = $conn->query($patientQuery);

                // Display patient options in the dropdown
                while ($patient = $patientResult->fetch_assoc()) {
                    echo "<option value='{$patient['Pid']}'>{$patient['Pid']}</option>";
                }

                
                $conn->close();
            ?>
        </select>
        <br><br>

        <!-- Doctor ID dropdown -->
        <label for="doctorID">Doctor ID:</label>
        <select name="doctorID" id="doctorID">
            <?php
               
                $conn = new mysqli("localhost", "root", "", "project");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch doctor data from the database
                $doctorQuery = "SELECT Docid FROM doctor";
                $doctorResult = $conn->query($doctorQuery);

                // Display doctor options in the dropdown
                while ($doctor = $doctorResult->fetch_assoc()) {
                    echo "<option value='{$doctor['Docid']}'>{$doctor['Docid']}</option>";
                }

                // Close the database connection
                $conn->close();
            ?>
        </select>
        <br><br>

        
        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" name="appointmentDate" id="appointmentDate" required>
        <br><br>
        <label for="appointmentID">Appointment ID:</label>
        <input type="text" name="appointmentID" id="appointmentID" value="<?php echo uniqid(); ?>" readonly>
        <br><br>
        <!-- Submit button -->
        <input type="submit" value="Submit Appointment">
    </form>
    <p><br><a href="hospital.html">BACK TO HOME PAGE</a><br></p>
</body>
</html>
