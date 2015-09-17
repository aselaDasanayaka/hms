<?php
include 'userInfo.php';

// requires php5
define('UPLOAD_DIR', 'people/');
$img = $_POST['img'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$imageFileName = uniqid() . '.png';
$file = UPLOAD_DIR . $imageFileName;
$success = file_put_contents($file, $data);
//print $success ? $file : 'Unable to save the file.';


$i_empId = $_POST["i_empId"];
$i_PatientId = $_POST["i_PatientId"];
$i_Name = $_POST["i_Name"];
$i_Age = $_POST["i_Age"];
$i_Gender = $_POST["i_Gender"];
$i_Photo = $imageFileName;
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
		<td class="dataRowImage"><img src="people/<?php echo $i_Photo?>" width='70'/></td>
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