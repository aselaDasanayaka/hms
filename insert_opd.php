<?php
include 'userInfo.php';

$v_empID = $_POST["v_empID"];
$v_Name = $_POST["v_Name"];
$v_Age = $_POST["v_Age"];
$v_Gender = $_POST["v_Gender"];
$v_status = $_POST["v_status"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO  `hospitalmanagementdb`.`records_opd` (
`RecordId` ,
`empId` ,
`Name` ,
`Age` ,
`Gender` ,
`status`
)
VALUES (
NULL ,  '$v_empID',  '$v_Name',  '$v_Age',  '$v_Gender',  '$v_status'
)";

if ($conn->query($sql) === TRUE) {
    ?>	
	<tr>
		<td class="dataRowid"><?php echo '*' ?></td>
		<td class="dataRowImage"><img src="people/<?php if(strcmp($v_Gender, "Female")==0) echo "Fe";
		?>male.png" width='70'/></td>
		<td><?php echo $v_Name ?></td>
		<td><?php echo $v_Age ?></td>
		<td class="dataRowGender"><?php echo $v_Gender ?></td>
		<?php
			if(strcmp("waiting",$v_status)==0){
				?>
				<td><img class="statusImageIcon" src="img/status_waiting.png">Waiting</td>
				<?php
			} else {
				?>
				<td><img class="statusImageIcon" src="img/status_done.png">Served</td>
				<?php
			}
		?>
		
	</tr>
    <?php
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>