<html>

	<head>
		<title>Scope</title>
	</head>

	<body>
		<?php
		$var = 1;

		function test1()
		{

			global $var;
			$var = 2;
			echo $var . '<br>';
		}

		test1();

		echo $var . '<br>';

		$var = 1;

		function test3()
		{

			static $var;
			$var++;
			echo $var . '<br>';
		}

		test3();
		test3();
		test3();

		?>


	</body>

</html>