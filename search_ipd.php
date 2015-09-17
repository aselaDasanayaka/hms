<?php
include 'userInfo.php';

$i_search = $_POST["i_search"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `RecordId` ,
`PatientId` ,
`Name` ,
`Age` ,
`Gender` ,
`Photo` ,
`Address` ,
`Comments` ,
`Time_Admitted` FROM  `records_ipd` WHERE `PatientId` = '$i_search'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>
	<tr>
		<td class="dataRowid"><?php echo $row["RecordId"] ?></td>
		<td class="dataRowImage"><img src="people/<?php echo $row["Photo"]?>" width='70'/></td>
		<td><?php echo $row["PatientId"] ?></td>
		<td><?php echo $row["Name"] ?></td>
		<td><?php echo $row["Age"] ?></td>
		<td class="dataRowGender"><?php echo $row["Gender"] ?></td>
		<td><?php echo $row["Address"] ?></td>
		<td><?php echo $row["Comments"] ?></td>
		<td><?php echo $row["Time_Admitted"] ?></td>
		
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