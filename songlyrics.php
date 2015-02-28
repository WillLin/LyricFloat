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

		<div id="content">
			<div id="lyriccontent">
				<!-- album cover goes here -->
				<h1 id="songtitle">Song Title</h1>
				<h2 id="songartist">Artist Name</h2>

				<div id="songlyrics">
					<p>Lyrics</p>
					<p>Yes very</p>
					<p>So song</p>
				</div>
			</div>

			
			<div class="spacer">
				&nbsp;
			</div>
			
			
			<div>
				<form action="page2.php" method="get">
					<input type="hidden" name="word" value="testttt" />
					<input class="purplebutton floatleft marginright10" type="submit" value="Song Selection">
				</form>

				<form action="submit.php" method="get">
					<input type="hidden" name="artist" value="testttt" />
					<input class="purplebutton floatleft" type="submit" value="Word Cloud">
				</form>
			</div>
		</div>

		</body>

</html>