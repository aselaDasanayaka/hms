<!DOCTYPE>
<html>
<head>
<title>Hospital Management System | CO226 Project</title>
<script src="src/jquery2.js"></script>
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
		<img id="staffUserImage" src="staff/staff0001.png" align="left" width="100">
		<span>Hello,<br />Ishan Madhusanka</span>
	</div><span id="stats_servedToday"><span style="text-align:center; display:inline-block;width:100px; font-size:16pt;">127</span> Patients served today</span>
	<div class="button_mini" id="homeButton_mini">Home</div>
	<div class="button_mini" id="preferencesButton_mini">Change Preferences</div>
	<div class="button_mini" id="logoutButton_mini">Switch user</div>
	<div class="button_mini" id="quitButton_mini">Logout and Quit</div>
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
			<span class="flaticon-md">Doctors</span>
			<span class="flaticon-nurse8">Nurses</span>
			<span class="flaticon-family21">Other staff</span>
		</div>
		<div class="labs">
			<h2>Labs</h2>
			<span class="flaticon-microscope4">Lab reports</span>
			<span class="flaticon-stethoscope11">Treatment</span>
			<span class="flaticon-pill">Medicines</span>
			<span class="flaticon-first21">Equipment</span>
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
					<td class="dataRowid"></td>
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
		<div id="updateRowShadow"></div>
	</div>
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- IPD list -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<div class="ListView" id="list_ipd">
		<h1>New In Patient</h1>
		<table id="ipd_patient_table" class="listViewTable DisplayContent" cellspacing="0" cellpadding="0">
			<tbody>
				<tr class="DisplayContentHeader">
					<td class="dataRowid"></td>
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
						<td class="dataRowImage">Photo</td>
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
		<div id="updateRowShadow"></div>
	</div>
</div>
<script>
"use strict"
var sideBarExpanded = false;
var sideBarLimit = 300;
var stats_served_today = 123;
$(document).ready(function(){
	$("div#Home").show();
	$("div#ListView").hide();
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
$("div#preferencesButton_mini").click(function(){
	//sideBarLimit = 500;
	// $("div#sidebarMini").css("left", "200px");
});
//////////////////////// Sidebar
$("#homeButton_mini").click(function(){
	$("div#list_opd").fadeOut(100, function(){
		$("div#Home").fadeIn();
	});
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
	$("div#Home, div.listView").fadeOut(100, function(){
		$("div#list_opd").fadeIn();
		load_view_opd();
	});
});
// IPD
$("#IPD").click(function(){
	$("div#Home, div.listView").fadeOut(100, function(){
		$("div#list_ipd").fadeIn();
		load_view_ipd();
	});
});

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

function insert_into_opd(){
	var empID = "1";
	var name = $("#new_patient_opd #updateName").val();
	var age = $("#new_patient_opd #updateAge").val();
	var gender = $("#new_patient_opd #updateGender").val();
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
			  });
}
function insert_into_ipd(){
	var empId = "1"
	var PatientId = $("#new_patient_ipd #updatePatientID").val();
	var Name = $("#new_patient_ipd #updateName").val();
	var Age = $("#new_patient_ipd #updateAge").val();
	var Gender = $("#new_patient_ipd #updateGender").val();
	var Photo = "patient0001.png";
	var Address = $("#new_patient_ipd #updateAddress").val();
	var Comments = $("#new_patient_ipd #updateComments").val();

	$.ajax({
			  method: "POST",
			  url: "insert_ipd.php",
			  data: { 	i_empId: empId,
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
</script>
</body>
</html>