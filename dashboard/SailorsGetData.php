
<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "cs306");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link,"SELECT * FROM Sailors ");

if (!$check) { // add this check.
    die('Invalid query: ' . mysql_error());
}

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Sailors Example </h1>
<body style="background-color : orange">
<table class="table">
            <thead>
                <tr class="success">
                    <th>sid</th>
                    <th>sname</th>
                    <th>rating</th>
					<th>age</th>
                </tr>
            </thead>
            <tbody>

				<?php
				$row_number=count($myarr);

				for($i=0;$i<$row_number;$i++)
				{
					$sid=$myarr[$i]['sid'];
					$sailor_name=$myarr[$i]['sname'];
				echo "<tr>";
					echo "<td>" .$sid.  "</td>";
          echo "<td>".$sailor_name .  "</td>";
					echo"<td> " .$myarr[ $i]['rating'].  "</td>";
          echo "<td>". $myarr[$i]['age'].  "</td>";
        echo "</tr>";
				}

				?>
				</tbody>




</table>

</html>
