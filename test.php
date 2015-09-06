<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="src/jquery2.js"></script>
	<title>test</title>
</head>
<body>
	begin <br/>
	<div id="afterthis">
		existingContent::

		and some other content
	</div>

	end <br/>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
			  method: "POST",
			  url: "view_opd.php",
			  data: { name: "John", location: "Boston" }
			})
			  .done(function( msg ) {
			    alert( "Data Saved: " + msg );
			    $("#afterthis").after(msg);
			  });
		});
	</script>
</body>
</html>