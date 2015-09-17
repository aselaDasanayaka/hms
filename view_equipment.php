<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `patient_equipments`.`RecordId`,\n"
    . "`patient_equipments`.`PatientID`,\n"
    . "`records_ipd`.`Name` ,\n"
    . "`lab_equipment`.`Name` AS `tName`,\n"
    . "`lab_equipment`.`Description`\n"
    . "FROM `patient_equipments`, `records_ipd`,`lab_equipment`\n"
    . "WHERE `lab_equipment`.`equipmentID` = `patient_equipments`.`EquitmentId`\n"
    . "AND `patient_equipments`.`PatientID` = `records_ipd`.`PatientId` ORDER BY `patient_equipments`.`RecordId` DESC";
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