<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">

    <title>Test boucles</title>


</head>

<body>
	<?php 
	
	$tab_ligne = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10); 
	$tab_col = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
	

	echo "<table cellpadding='20' border='1'>";

	echo "<tr><th></th><th>A</th><th>B</th><th>C</th><th>D</th><th>E</th><th>F</th><th>G</th><th>H</th><th>I</th><th>J</th></tr>";

	foreach ($tab_ligne as $key => $ligne) {

		echo "<tr>";

		foreach ($tab_col as $key => $cellule) {
			if($key === 0) {
				echo "<td style='font-weight:bold;'>".$ligne."</td>";
			}

			echo "<td>";
			echo $cellule.$ligne;
			echo "</td>";
		}

		echo "</tr>";

	}
	
	?>

</body>
</html>