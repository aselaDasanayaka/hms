<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `patient_treatment`.`RecordId`,\n"
    . "`patient_treatment`.`PatientID`,\n"
    . "`records_ipd`.`Name` ,\n"
    . "`lab_treatment`.`Name` AS `tName`,\n"
    . "`lab_treatment`.`Description`\n"
    . "FROM `patient_treatment`, `records_ipd`,`lab_treatment`\n"
    . "WHERE `lab_treatment`.`treatmentId` = `patient_treatment`.`TreatmentID`\n"
    . "AND `patient_treatment`.`PatientID` = `records_ipd`.`PatientId` ORDER BY `patient_treatment`.`RecordId` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>	
	<tr>
		<td class="dataRowid"><?php echo $row["RecordId"] ?></td>
		<td><?php echo $row["PatientID"] ?></td>
		<td><?php echo $row["Name"] ?></td>	
		<td><?php echo $row["tName"] ?></td>
		<td><?php echo $row["Description"] ?></td>
	</tr>
	<!-- <tr class="DisplayContentHeader">
					<td class="dataRowid"></td>
					<td class="dataRowImage"></td>
					<td>Patient ID</td>
					<td>Name</td>
					<td>Age</td>
					<td class="dataRowGender">Gender</td>
					<td>Address</td>
					<td>Comments</td>
					<td width="200">Status</td>
				</tr> -->
    <?php
    }
} else {
    echo "0 results";
}
$conn->close();

?>