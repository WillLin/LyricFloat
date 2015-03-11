<html>
	<head>
		<title>LyricFloat</title>

		<!-- Stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		
		<!-- jQuery -->
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>

		<!-- AutoComplete -->
		<script src="scripts/autocomplete.js"></script>

	</head>
	
	<body>

		<div id="largelogo">
			<a href="./"><img src="images/lyricfloat.png" alt="LyricFloat" /></a>
		</div>


		<div style="height:25px;">
		</div>

		<div id="inputarea">
			<form action="submit.php" method="get" >
				<input id="artist" class="ui-widget" type="text" name="artist" placeholder="Enter artist name" size="35" >
				<br />
				<div class="floatright">
					<input id="submitbutton" class="purplebutton marginleft10" type="submit" value="Submit">
				</div>
			</form>
		</div>

	</body>
	
</html>