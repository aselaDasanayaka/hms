<?php
include 'userInfo.php';

$i_empId = $_POST["i_empId"];
$i_PatientId = $_POST["i_PatientId"];
$i_Name = $_POST["i_Name"];
$i_Age = $_POST["i_Age"];
$i_Gender = $_POST["i_Gender"];
$i_Photo = $_POST["i_Photo"];
$i_Address = $_POST["i_Address"];
$i_Comments = $_POST["i_Comments"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO  `hospitalmanagementdb`.`records_ipd` (
`RecordId` ,
`empId` ,
`PatientId` ,
`Name` ,
`Age` ,
`Gender` ,
`Photo` ,
`Address` ,
`Comments` ,
`Time_Admitted` ,
`Time_Discharged`
)
VALUES (
NULL ,  '$i_empId',  '$i_PatientId',  '$i_Name',  '$i_Age',  '$i_Gender',  '$i_Photo',  '$i_Address',  '$i_Comments',  '2015-09-05 10:26:58',  NULL
)";

if ($conn->query($sql) === TRUE) {
    ?>	
		<tr>
		<td class="dataRowid"><?php echo '*' ?></td>
		<td class="dataRowImage"><img src="patients/<?php echo $i_Photo?>" width='70'/></td>
		<td><?php echo $i_PatientId ?></td>
		<td><?php echo $i_Name ?></td>
		<td><?php echo $i_Age ?></td>
		<td class="dataRowGender"><?php echo $i_Gender ?></td>
		<td><?php echo $i_Address ?></td>
		<td><?php echo $i_Comments ?></td>
		<td><?php echo 'Time' ?></td>
		
	</tr>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>