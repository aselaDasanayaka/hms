<?php
// include 'ChromePhp.php';
session_start();

// ChromePhp::log(($_SESSION["userSet"]));
if(!isset($_SESSION["userSet"])){
	header('Location: signin.php');
}
?>
<!DOCTYPE>
<html>
<head>
<title>Hospital Management System | CO226 Project</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<script src="src/jquery2.js">
	$.ajax({
		  method: "POST",
		  url: "check_login.php"
		  data: {loggedIn: <?php echo $_POST['loggedIn'] ?>;}
		})
		  .done(function( msg ) {
			alert(msg);
		  });
</script>
<script src="src/capture.js"></script>
<script>
</script>
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" href="icons/flaticon.css">
<style>

</style>
</head>
<body>
<div id="sidebarMini">
	<div id="settingsPanel"></div>
	<img id="sidebarLogo" src="img/icon.png" width="60">
	<div id="userInformation">
		<img id="staffUserImage" src="people/male.png" align="left" width="100">
		<span>Hello,<br />Mr. Piyasena	</span>
	</div><span id="stats_servedToday"><span id="patientCount" style="text-align:center; display:inline-block;width:100px; font-size:16pt;">0</span> Patients served today</span>
	<div class="button_mini" id="homeButton_mini">Home</div>
	<div class="button_mini" id="preferencesButton_mini">Change Preferences</div>
	<div class="button_mini" id="logoutButton_mini" onclick="logOut()">Switch user</div>
	<div class="button_mini" id="quitButton_mini" onclick="logOut()">Logout and Quit</div>
</div>
<div id="darkenTheWorld"></div>
<div id="contentPane">
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div id="Home">
		<h1>Home</h1>
		<div class="patients">
			<h2>Patients</h2>
			<span id="OPD" class="flaticon-transfusion1">OPD</span>
			<span id="IPD" class="flaticon-healthclinic2">IPD</span>
		</div>
		<div class="employees">
			<h2>Employees</h2>
			<span id="DOCTORS" class="flaticon-md">Doctors</span>
			<span id="NURSES" class="flaticon-nurse8">Nurses</span>
			<span id="STAFF" class="flaticon-family21">Other staff</span>
		</div>
		<div class="labs">
			<h2>Labs</h2>
			<span id="LABREPORTS" class="flaticon-microscope4">Lab reports</span>
			<span id="TREATMENT" class="flaticon-stethoscope11">Treatment</span>
			<span id="MEDICINES" class="flaticon-pill">Medicines</span>
			<span id="EQUIPMENT" class="flaticon-first21">Equipment</span>
		</div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- OPD list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_opd">
		<h1>New Out Patient</h1>
		<table id="opd_patient_table" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td class="dataRowImage"></td>
					<td>Name</td>
					<td>Age</td>
					<td class="dataRowGender">Gender</td>
					<td width="200">Status</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_patient_opd" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage"></td>
						<td><input id="updateName" type="textbox" placeholder="Patient Name" required/></td>
						<td><input id="updateAge" class="AgeInput" type="number" placeholder="Age" required/></td>
						<td><input id="updateGender" type="textbox" value="Male" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_opd()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- IPD list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_ipd">
		<h1>New In Patient</h1>
			<div id="search_ipd">
				<form id="search_ipd_form">Search Patients&nbsp;&nbsp; <input id="search_ipd_value" type="text" placeholder="Patient ID"/></form>
			</div>
		<table id="ipd_patient_table" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td class="dataRowImage"></td>
					<td>ID</td>
					<td>Name</td>
					<td>Age</td>
					<td class="dataRowGender">Gender</td>
					<td>Address</td>
					<td>Comments</td>
					<td width="200">Admitted Time</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_patient_ipd" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage">
						<div id="photoCapture">
							<div class="camera" id="camera">
								<video id="video">Video stream not available.</video>
							</div>
							<canvas id="canvas"></canvas>
							<div class="output">
							<img id="photo" alt="The screen capture will appear in this box."> 
							</div>
						</div>
						</td>
						<td><input class="IdInput" id="updatePatientID" type="textbox" placeholder="ID" required/></td>
						<td><input id="updateName" type="textbox" placeholder="Patient Name" required/></td>
						<td><input class="AgeInput" id="updateAge" type="number" placeholder="Age" required/></td>
						<td><input class="GenderInput" id="updateGender" type="textbox" value="Male" required/></td>
						<td><input id="updateAddress" type="textbox" placeholder="Address" required/></td>
						<td><input id="updateComments" type="textbox" placeholder="Comments" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_ipd()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Doctors list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_doctors">
		<h1>Doctors</h1>
		<table id="table_doctors" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<!-- ID	Photo	Name	Salary	Gender	Experience	Qualification	ContactNo	 -->
				<tr class="DisplayContentHeader">
					<td></td>
					<td class="dataRowImage">
					<td>Name</td>
					<td>Salary</td>
					<td class="dataRowGender" width="50">Gender</td>
					<td>Experience</td>
					<td>Qualification</td>
					<td>Contact no.</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_doctors" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage">
							<!-- <div id="photoCapture" style="margin-right:33px;">
								<div class="camera" id="camera">
									<video id="video">Video stream not available.</video>
								</div>
								<canvas id="canvas"></canvas>
								<div class="output">
								<img id="photo" alt="The screen capture will appear in this box."> 
								</div>
							</div> -->
						</td>
						<td><input id="updateName" type="textbox" placeholder="Doctor's Name"/></td>
						<td><input id="updateSalary" type="number" placeholder="Salary"/></td>
						<td><input id="updateGender" type="textbox" value="Male"/></td>
						<td><input id="updateExperience" type="text" placeholder="Experience"/></td>
						<td><input id="updateQualification" type="text" placeholder="Qualification"/></td>
						<td><input id="updateContact" type="text" placeholder="Contact no."/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_doctors()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Nurse list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_nurse">
		<h1>Nurses</h1>
		<table id="table_nurses" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td class="dataRowImage">
					<td>Name</td>
					<td>Salary</td>
					<td class="dataRowGender" width="50">Gender</td>
					<td>Experience</td>
					<td>Qualification</td>
					<td>Contact no.</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_nurses" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage">
							<!-- <div id="photoCapture" style="margin-right:33px;">
								<div class="camera" id="camera">
									<video id="video">Video stream not available.</video>
								</div>
								<canvas id="canvas"></canvas>
								<div class="output">
								<img id="photo" alt="The screen capture will appear in this box."> 
								</div>
							</div> -->
						</td>
						<td><input id="updateName" type="textbox" placeholder="Nurse's Name"/></td>
						<td><input id="updateSalary" type="number" placeholder="Salary"/></td>
						<td><input id="updateGender" type="textbox" value="Male"/></td>
						<td><input id="updateExperience" type="text" placeholder="Experience"/></td>
						<td><input id="updateQualification" type="text" placeholder="Qualification"/></td>
						<td><input id="updateContact" type="text" placeholder="Contact no."/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_nurses()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Other staff list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_otherStaff">
		<h1>Staff</h1>
		<table id="table_staff" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td class="dataRowImage">
					<td>Name</td>
					<td>Salary</td>
					<td class="dataRowGender" width="50">Gender</td>
					<td>Experience</td>
					<td>Qualification</td>
					<td>Contact no.</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_staff" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage">
							<!-- <div id="photoCapture" style="margin-right:33px;">
								<div class="camera" id="camera">
									<video id="video">Video stream not available.</video>
								</div>
								<canvas id="canvas"></canvas>
								<div class="output">
								<img id="photo" alt="The screen capture will appear in this box."> 
								</div>
							</div> -->
						</td>
						<td><input id="updateName" type="textbox" placeholder="Patient Name"/></td>
						<td><input id="updateSalary" type="number" placeholder="Salary"/></td>
						<td><input id="updateGender" type="textbox" value="Male"/></td>
						<td><input id="updateExperience" type="text" placeholder="Experience"/></td>
						<td><input id="updateQualification" type="text" placeholder="Qualification"/></td>
						<td><input id="updateContact" type="text" placeholder="Contact no."/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_opd()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Lab reports list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_lab_reports">
		<h1>Lab Reports</h1>
		<table id="table_labreports" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td>Patient ID</td>
					<td>Name</td>
					<td>Report Type</td>
					<td>Status</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_labreports" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td><input id="updateID" type="textbox" placeholder="Patient ID" required/></td>
						<td></td>
						<td><input id="updateType" type="number" placeholder="TypeId" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_opd()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Treatment list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_treatment">
		<h1>Treatment</h1>
		<table id="table_treatment" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td>Patient ID</td>
					<td>Patient Name</td>
					<td>Treatment</td>
					<td>Description</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_treatment" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage"></td>
						<td><input id="updatePatient" type="number" placeholder="Patient Name" required/></td>
						<td><input id="updateTreatment" type="number" placeholder="Age" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_treatment()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Medicines list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_medicines">
		<h1>Medicines</h1>
		<table id="table_medicines" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td>Patient ID</td>
					<td>Patient Name</td>	
					<td>Medicine Name</td>
					<td>Description</td>		
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_medicines" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td><input id="updateName" type="textbox" placeholder="Patient ID" required/></td>
						<td><input id="updateMedicine" type="textbox" placeholder="Medicine ID" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_opd()"/></td>
						<td></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- Equipments list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_equipments">
		<h1>Equipments</h1>
		<table id="table_equipments" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td></td>
					<td>Patient ID</td>
					<td>Patient Name</td>
					<td>Equipment</td>
					<td>Quantity</td>
				</tr>
				
				<!-- <form id="new_patient_opd"> -->
					<tr id="new_equipments" class="newPatientUpdateFormRow">
						<td class="dataRowid"></td>
						<td class="dataRowImage"></td>
						<td><input id="updatePatient" type="number" placeholder="Patient Name" required/></td>
						<td><input id="updateTreatment" type="number" placeholder="Age" required/></td>
						<td><input id="updateSubmit" type="submit" value="Register" onclick="insert_into_equipment()"/></td>
					</tr>
				<!-- </form> -->
			</tbody>
		</table>
		<!--<div id="updateRowShadow"></div>-->
	</div>
</div>
<script>
"use strict";
var sideBarExpanded = false;
var sideBarLimit = 300;
var stats_served_today = 0;
$(document).ready(function(){
	$("div#Home").show();
	$("div.ListView").hide();
	$("div#darkenTheWorld").hide();
	$("div#contentPane").css("width",$(document).width()-100);
	$("div#contentPane").css("left", "100px");
});
$("div#sidebarMini").mouseover(function(){
	$("div#darkenTheWorld").fadeIn(300);
});
$("div#sidebarMini").mouseout(function(e){
	if(e.pageX>sideBarLimit){
		$("div#darkenTheWorld").fadeOut();
	}
});
$("#darkenTheWorld").click(function(){
	$("div#darkenTheWorld").fadeOut();
});
$("div#preferencesButton_mini").click(function(){
	//sideBarLimit = 500;
	// $("div#sidebarMini").css("left", "200px");
});
//////////////////////// Sidebar
$("#homeButton_mini").click(function(){
	$("div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#Home").fadeIn();
	}, 100);

	setTimeout(function(){
		hideLists();
	}, 200);
});
//////////////////////// Home menus

// remove this.. before build
// $("div#Home div span").click(function(){
// 	$("div#Home").fadeOut(100, function(){
// 		$("div#list_opd").fadeIn();
// 	});
// });
// OPD
$("#OPD").click(function(){
	$("div#Home, div.ListView").fadeOut(100);

	$("div.ListView").hide();
	setTimeout(function(){
		$("div#list_opd").fadeIn();
	}, 100);
	load_view_opd();
});
// IPD
$("#IPD").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_ipd").fadeIn();
	}, 100);
	load_view_ipd();
});
////////////////////////////
// DOCTORS
$("#DOCTORS").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_doctors").fadeIn();
	}, 100);
	load_view_doctors();
});
// NURSES
$("#NURSES").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_nurse").fadeIn();
	}, 100);
	load_view_nurses();
});
// STAFF
$("#STAFF").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_otherStaff").fadeIn();
	}, 100);
	load_view_staff();
});
// LABREPORTS
$("#LABREPORTS").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_lab_reports").fadeIn();
	}, 100);
	load_view_labreports();
});
// TREATMENT
$("#TREATMENT").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_treatment").fadeIn();
	}, 100);
	load_view_treatment();
});
// MEDICINES
$("#MEDICINES").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_medicines").fadeIn();
	}, 100);
	load_view_medicines();
});
// EQUIPMENT
$("#EQUIPMENT").click(function(){
	$("div#Home, div.ListView").fadeOut(100);
	setTimeout(function(){
		$("div#list_equipments").fadeIn();
	}, 100);
	load_view_equipment();

});

function hideLists(){
	$("div#list_opd").hide();
	$("div#list_ipd").hide();
	$("div#list_doctors").hide();
	$("div#list_nurse").hide();
	$("div#list_otherStaff").hide();
	$("div#list_lab_reports").hide();
	$("div#list_treatment").hide();
	$("div#list_medicines").hide();
	$("div#list_equipments").hide();
}
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
function load_view_opd(){
	$.ajax({
	  url: "view_opd.php",
	})
	  .done(function( msg ) {
	  	$("#opd_patient_table").find("tr:gt(1)").remove();
	  	$("#new_patient_opd").after(msg);	
	    
	  });
};

function load_view_ipd(){
	$.ajax({
	  url: "view_ipd.php",
	})
	  .done(function( msg ) {
	  	$("#ipd_patient_table").find("tr:gt(1)").remove();
	  	$("#new_patient_ipd").after(msg);	
	  });
};


function load_view_doctors(){
	$.ajax({
	  url: "view_doctors.php",
	})
	  .done(function( msg ) {
	  	$("#table_doctors").find("tr:gt(1)").remove();
	  	$("#new_doctors").after(msg);	
	  });
};


function load_view_nurses(){
	$.ajax({
	  url: "view_nurses.php",
	})
	  .done(function( msg ) {
	  	$("#table_nurses").find("tr:gt(1)").remove();
	  	$("#new_nurses").after(msg);	
	  });
};


function load_view_staff(){
	$.ajax({
	  url: "view_staff.php",
	})
	  .done(function( msg ) {
	  	$("#table_staff").find("tr:gt(1)").remove();
	  	$("#new_staff").after(msg);	
	  });
};


function load_view_labreports(){
	$.ajax({
	  url: "view_labreports.php",
	})
	  .done(function( msg ) {
	  	$("#table_labreports").find("tr:gt(1)").remove();
	  	$("#new_labreports").after(msg);	
	  });
};


function load_view_treatment(){
	$.ajax({
	  url: "view_treatment.php",
	})
	  .done(function( msg ) {
	  	$("#table_treatment").find("tr:gt(1)").remove();
	  	$("#new_treatment").after(msg);	
	  });
};


function load_view_medicines(){
	$.ajax({
	  url: "view_medicines.php",
	})
	  .done(function( msg ) {
	  	$("#table_medicines").find("tr:gt(1)").remove();
	  	$("#new_medicines").after(msg);	
	  });
};


function load_view_equipment(){
	$.ajax({
	  url: "view_equipment.php",
	})
	  .done(function( msg ) {
	  	$("#table_equipments").find("tr:gt(1)").remove();
	  	$("#new_equipments").after(msg);	
	  });
};

///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
///////////////////////////////////////////////////
function insert_into_opd(){
	var empID = "1";
	var name = $("#new_patient_opd #updateName").val();
	var age = $("#new_patient_opd #updateAge").val();
	var gender = $("#new_patient_opd #updateGender").val();


	$("#new_patient_opd #updateName").val('').focus();
	$("#new_patient_opd #updateAge").val('');
	$("#new_patient_opd #updateGender").val('');

	$.ajax({
			  method: "POST",
			  url: "insert_opd.php",
			  data: { 	v_empID: empID, 
			  			v_Name: name,
			  			v_Age:age,
						v_Gender:gender,
						v_status:"waiting",
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );
			    $("#new_patient_opd").after(msg).fadeIn();
				increasePatientCount();
			  });
}
function insert_into_ipd(){
	var empId = "1";
	var PatientId = $("#new_patient_ipd #updatePatientID").val();
	var Name = $("#new_patient_ipd #updateName").val();
	var Age = $("#new_patient_ipd #updateAge").val();
	var Gender = $("#new_patient_ipd #updateGender").val();
	var Photo = "patient0001.png";
	var Address = $("#new_patient_ipd #updateAddress").val();
	var Comments = $("#new_patient_ipd #updateComments").val();

	$("#new_patient_ipd #updatePatientID").val('').focus();
	$("#new_patient_ipd #updateName").val('');
	$("#new_patient_ipd #updateAge").val('');
	$("#new_patient_ipd #updateGender").val('');
	$("#new_patient_ipd #updateAddress").val('');
	$("#new_patient_ipd #updateComments").val('');


    var canvas = document.getElementById('canvas');
	var dataUrl = canvas.toDataURL('image/png');
	$.ajax({
			  method: "POST",
			  url: "insert_ipd.php",
			  data: { 	loggedIn: dataUrl,
			  			i_empId: empId,
						i_PatientId: PatientId,
						i_Name: Name,
						i_Age: Age,
						i_Gender: Gender,
						i_Photo: Photo,
						i_Address: Address,
						i_Comments: Comments
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );
			    $("#new_patient_ipd").after(msg).fadeIn();
				increasePatientCount();
			  });
}
function insert_into_treatment(){
	var empId = "1"
	var PatientId = $("#new_patient_ipd #updatePatientID").val();
	var Name = $("#new_patient_ipd #updateName").val();
	var Age = $("#new_patient_ipd #updateAge").val();
	var Gender = $("#new_patient_ipd #updateGender").val();
	var Photo = "patient0001.png";
	var Address = $("#new_patient_ipd #updateAddress").val();
	var Comments = $("#new_patient_ipd #updateComments").val();

	$("#new_patient_ipd #updatePatientID").val('').focus();
	$("#new_patient_ipd #updateName").val('');
	$("#new_patient_ipd #updateAge").val('');
	$("#new_patient_ipd #updateGender").val('');
	$("#new_patient_ipd #updateAddress").val('');
	$("#new_patient_ipd #updateComments").val('');


    var canvas = document.getElementById('canvas');
	var dataUrl = canvas.toDataURL('image/png');
	$.ajax({
			  method: "POST",
			  url: "insert_ipd.php",
			  data: { 	loggedIn: dataUrl,
			  			i_empId: empId,
						i_PatientId: PatientId,
						i_Name: Name,
						i_Age: Age,
						i_Gender: Gender,
						i_Photo: Photo,
						i_Address: Address,
						i_Comments: Comments
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );
			    $("#new_patient_ipd").after(msg).fadeIn();
			  });
}
function insert_into_equipment(){
	var PatientId = $("#new_equipments #updatePatientID").val();
	var EquipmentId = $("#new_equipments #updateEquipmentId").val();
	

	$("#new_equipments #updatePatientID").val('').focus();
	$("#new_equipments #updateEquipmentId").val('');


 //    var canvas = document.getElementById('canvas');
	// var dataUrl = canvas.toDataURL('image/png');
	$.ajax({
			  method: "POST",
			  url: "insert_equipment.php",
			  data: { 	loggedIn: dataUrl,
			  			i_empId: empId,
						i_PatientId: PatientId,
						i_Name: Name,
						i_Age: Age,
						i_Gender: Gender,
						i_Photo: Photo,
						i_Address: Address,
						i_Comments: Comments
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );
			    $("#new_patient_ipd").after(msg).fadeIn();
			  });
}
function insert_into_doctors(){
	var Name = $("#new_doctors #updateName").val();
	var Salary = $("#new_doctors #updateSalary").val();
	var Gender = $("#new_doctors #updateGender").val();
	var Experience = $("#new_doctors #updateExperience").val();
	var Qualification = $("#new_doctors #updateQualification").val();
	var ContactNo = $("#new_doctors #updateContact").val();


	$.ajax({
			  method: "POST",
			  url: "insert_doctors.php",
			  data: {	i_Name : Name,
						i_Salary : Salary,
						i_Gender : Gender,
						i_Experience : Experience,
						i_Qualification : Qualification,
						i_ContactNo : ContactNo
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );

				$("#new_doctors #updateName").val('').focus();
				$("#new_doctors #updateSalary").val('');
				$("#new_doctors #updateGender").val('');
				$("#new_doctors #updateExperience").val('');
				$("#new_doctors #updateQualification").val('');
				$("#new_doctors #updateContact").val('');
			    $("#new_doctors").after(msg).fadeIn();
				increasePatientCount();
			  });
}
function insert_into_nurses(){
	var Name = $("#new_nurses #updateName").val();
	var Salary = $("#new_nurses #updateSalary").val();
	var Gender = $("#new_nurses #updateGender").val();
	var Experience = $("#new_nurses #updateExperience").val();
	var Qualification = $("#new_nurses #updateQualification").val();
	var ContactNo = $("#new_nurses #updateContact").val();


	$.ajax({
			  method: "POST",
			  url: "insert_nurses.php",
			  data: {	i_Name : Name,
						i_Salary : Salary,
						i_Gender : Gender,
						i_Experience : Experience,
						i_Qualification : Qualification,
						i_ContactNo : ContactNo
				}
			})
			  .done(function( msg ) {
			    // alert( "Data Saved: " + msg );

				$("#new_nurses #updateName").val('').focus();
				$("#new_nurses #updateSalary").val('');
				$("#new_nurses #updateGender").val('');
				$("#new_nurses #updateExperience").val('');
				$("#new_nurses #updateQualification").val('');
				$("#new_nurses #updateContact").val('');
			    $("#new_nurses").after(msg).fadeIn();
				increasePatientCount();
			  });
}
function logOut(){
	$.ajax({
			  method: "POST",
			  url: "destroy_session.php"
			})
			  .done(function( msg ) {
				window.location.replace("signin.php");
			  });
}
function increasePatientCount(){
	$("#patientCount").text(++stats_served_today);
}
$("#search_ipd_form").submit(function(e){
	e.preventDefault();
	var searchValue = $("#search_ipd_value").val();
	if(searchValue== ""){
		load_view_ipd();	
		return false;
	}
	$.ajax({
		method: "POST",
		url: "search_ipd.php",
		data: {	
			i_search : searchValue
		}
	})
	  .done(function( msg ) {
		$("#ipd_patient_table").find("tr:gt(1)").remove();
		$("#new_patient_ipd").after(msg);	
	  });
	return false;
});
</script>
</body>
</html>