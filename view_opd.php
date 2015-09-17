<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT `RecordId`,`Name`,`Age`,`Gender`,`status` FROM `records_opd` ORDER BY `RecordId` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>	
	<tr>
		<td class="dataRowid"><?php echo $row["RecordId"] ?></td>
		<td class="dataRowImage"><img src="people/<?php if(strcmp($row["Gender"], "Female")==0) echo "Fe";
		?>male.png" width='70'/></td>
		<td><?php echo $row["Name"] ?></td>
		<td><?php echo $row["Age"] ?></td>
		<td class="dataRowGender"><?php echo $row["Gender"] ?></td>
		<?php
			if(strcmp("waiting",$row["status"])==0){
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
    }
} else {
    echo "0 results";
}
$conn->close();

?>