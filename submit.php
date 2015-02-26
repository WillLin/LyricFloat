<html>
	  <head>
	    <title>LyricFloat</title>
	    <link rel="stylesheet" type="text/css" href="css/styles.css">
	  </head>
	
	  <body>
	  <!-- <h1>LyricFloat</h1> -->
	  <div id="logo">
	  	<img src="images/lyricfloat.png" alt="LyricFloat" />
	  </div>
	    
	   <!-- <p>this is where cloud will go</p>*/ -->
	   <a href="page2.php" > <?php  echo $_GET["song"];  ?> </a>

	   <br><br><br><br><br><br><br><br><br><br>
	    <form action="submit.php" method="get">
			<input type="text" name="song" placeholder="Input text here" size="35" >
			<br>
			<input type="button" value="Add to Cloud">
			<input type="button" value="Share">
			<input type="submit" value="Submit">
	    </form>


	  </body>
	
</html>