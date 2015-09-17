<?php
include 'userInfo.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT *
 FROM `employee` WHERE `JobType` = 'Nurse' ORDER BY `ID` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    ?>	
	<tr>
		<td class="dataRowid"><?php echo $row["ID"] ?></td>
		<td class="dataRowImage"><img src="people/<?php echo "nurse.png"?>" width='70'/></td>
		<td><?php echo $row["Name"] ?></td>
		<td><?php echo $row["Salary"] ?></td>
		<td class="dataRowGender"><?php echo $row["Gender"] ?></td>
		<td><?php echo $row["Experience"] ?></td>
		<td><?php echo $row["Qualification"] ?></td>
		<td><?php echo $row["ContactNo"] ?></td>
		<td></td>
		
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