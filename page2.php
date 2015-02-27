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

		<h2>Search World</h2>
		<p>Song Title.............................Frequency</p>
		<p>Song Title.............................Frequency</p>
		<p>Song Title.............................Frequency</p>

		<!--  Chart lyrics
		<p>this is where cloud will go</p>*/ 
		<a href="page2.php" > ?php  echo $_GET["song"];  ?> </a>
		-->
		<div style="height:25px;">
			&nbsp;
		</div>

		<form action="submit.php" method="get">
			<input type="hidden" name="song" value="testttt" />
			<input class="purplebutton" type="submit" value="Back">
		</form>

		</body>

</html>