<html>
	<head>
		<title>LyricFloat</title>
		<link rel="stylesheet" type="text/css" href="css/styles.css">
	</head>

	<body>
		<!-- <h1>LyricFloat - Page 2 </h1> -->
		<div id="logo">
			<a href="./"><img src="images/lyricfloat_sm.png" alt="LyricFloat" /></a>
		</div>

		<!-- album cover goes here -->
		<h1>Song Title</h1>
		<h2>Artist Name</h2>
		<p>Lyrics</p>
		<p>Yes very</p>
		<p>So song</p>

		
		<div style="height:25px;">
			&nbsp;
		</div>
		
		
		<div>
			<form action="page2.php" method="get">
				<input type="hidden" name="word" value="testttt" />
				<input class="purplebutton floatleft marginright10" type="submit" value="Song Selection">
			</form>

			<form action="submit.php" method="get">
				<input type="hidden" name="song" value="testttt" />
				<input class="purplebutton floatleft" type="submit" value="Word Cloud">
			</form>
		</div>

		</body>

</html>