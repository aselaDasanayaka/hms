<?php
include 'userInfo.php';

$i_Name = $_POST["i_Name"];
$i_Salary = $_POST["i_Salary"];
$i_Gender = $_POST["i_Gender"];
$i_Experience = $_POST["i_Experience"];
$i_Qualification = $_POST["i_Qualification"];
$i_ContactNo = $_POST["i_ContactNo"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `hospitalmanagementdb`.`patient_equipments` (`RecordId`, `PatientID`, `EquitmentId`) VALUES (NULL, \'93989871\', \'2\');";

if ($conn->query($sql) === TRUE) {
    ?>	
	<tr>
		<td class="dataRowid">*</td>
		<td class="dataRowImage"><img src="people/male.png" width='70'/></td>
		<td><?php echo $i_Name ?></td>
		<td><?php echo $i_Salary ?></td>
		<td class="dataRowGender"><?php echo $i_Gender ?></td>
		<td><?php echo $i_Experience ?></td>
		<td><?php echo $i_Qualification ?></td>
		<td><?php echo $i_ContactNo ?></td>
		
	</tr>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>