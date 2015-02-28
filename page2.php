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
			<h2 id="searchword"><?php echo $_GET['word']; ?></h2>
			<div id="songlist">
				<p><a href="songlyrics.php?artist=test&word=testtt&song=Song+Title+1">Song Title 1</a>.............................Frequency</p>
				<p>Song Title.............................Frequency</p>
				<p>Song Title.............................Frequency</p>
			</div>

			<!--  Chart lyrics
			<p>this is where cloud will go</p>*/ 
			<a href="page2.php" > ?php  echo $_GET["song"];  ?> </a>
			-->
			<div class="spacer">
				&nbsp;
			</div>

			<form action="submit.php" method="get">
				<!-- <input type="hidden" name="artist" value="testttt" /> -->
				<?php 
					$artist = $_GET['artist'];
					echo "<input type=\"hidden\" name=\"artist\" value=\"$artist\" />";
				?>
				<input class="purplebutton" type="submit" value="Back">
			</form>
		</div>

		</body>

</html>