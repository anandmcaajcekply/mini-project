<?Php
	include 'connection.php';


?>
<?php
$sql="select * from ownerstaffreg";
$result=mysqli_query($con,$sql);
	$rows = $result->num_rows;    // Find total rows returned by database
	if($rows > 0) {
		$cols = 7;    // Define number of columns
		$counter = 1;     // Counter used to identify if we need to start or end a row
		$nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns
 
                echo '<table width="100%" align="center" cellpadding="4" cellspacing="1">';
		while ($row = $result->fetch_array()) {
			if(($counter % $cols) == 1) {    // Check if it's new row
				echo '<tr>';	
			}
                   //$img =$row['image_name'];
			echo '<td><h5>'.$row['name'].'</h5></td>';
			if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
				echo '</tr>';	
			}
			$counter++;    // Increase the counter
		}
		$result->free();
		if($nbsp > 0) { // Add unused column in last row
			for ($i = 0; $i < $nbsp; $i++)	{ 
				echo '<td>&nbsp;</td>';		
			}
			echo '</tr>';
		}
                echo '</table>';
	}
?>