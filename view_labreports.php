<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT \n"
    . "`serial_no`,\n"
    . "`patient_labreports`.`PatientID`,\n"
    . "`records_ipd`.`Name`,\n"
    . "`lab_reports`.`Name` AS reportName,\n"
    . "`status`\n"
    . "FROM `patient_labreports`,`records_ipd`, `lab_reports`\n"
    . "WHERE `patient_labreports`.`PatientID` = `records_ipd`.`PatientID`\n"
    . "AND `patient_labreports`.`report_type` = `lab_reports`.`typeId` LIMIT 0, 30 ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo $row['serial_no'];
    ?>	
	<tr style="height:50px;">
		<td class="dataRowid"><?php echo $row['serial_no']; ?></td>
		<td><?php echo $row['PatientID']; ?></td>
		<td><?php echo $row['Name']; ?></td>
		<td><?php echo $row['reportName']; ?></td>
		<?php
			if(strcmp("pending",$row["status"])==0){
				?>
				<td><img class="statusImageIcon" src="img/status_waiting.png">Pending</td>
				<?php
			} else {
				?>
				<td><img class="statusImageIcon" src="img/status_done.png">Served</td>
				<?php
			}
		?>
	</tr>
	<!-- <tr>
		<td class="dataRowid"></td>
		<td class="dataRowImage"></td>
		<td>Name</td>
		<td>Salary</td>
		<td class="dataRowGender" width="50">Gender</td>
		<td>Experience</td>
		<td>Qualification</td>
		<td>Contact no.</td>
	</tr> -->
    <?php
    }
} else {
    echo "0 results ";
}
$conn->close();

?>