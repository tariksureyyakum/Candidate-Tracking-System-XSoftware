<?php
$result = mysqli_query($con,"SELECT college  FROM user") or die('Error');
echo  '<div class="panel3"><table class="table table-striped title1">
<tr><td><b>Aday İsimleri</b></td><td><b>Departman</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$college = $row['college'];

	echo '<tr><td>'.$name.'</td><td>'.$college.'</td></tr>';
}
$c=0;
echo '</table></div>';
?>