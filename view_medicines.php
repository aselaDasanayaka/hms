<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `patient_medicines`.`RecordId` , `patient_medicines`.`PatientID` , `records_ipd`.`Name` , `lab_medicines`.`Name` AS `tName` , `lab_medicines`.`Description` \n"
    . "FROM `patient_medicines` , `records_ipd` , `lab_medicines` \n"
    . "WHERE `lab_medicines`.`ID` = `patient_medicines`.`MedicineID` \n"
    . "AND `patient_medicines`.`PatientID` = `records_ipd`.`PatientId` ORDER BY `patient_medicines`.`RecordId` DESC";
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