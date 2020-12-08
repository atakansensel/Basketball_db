<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "bball");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link, "SELECT * FROM HeadCoach");

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Coaches </h1>
<body style="background-color : yellow">
<table class="table">
            <thead>
                <tr class="success">
                    <th>hcid</th>
                    <th>hcname</th>
                    
					
                </tr>
            </thead>
            <tbody>

				<?php
				$row_number=count($myarr);

				for($i=0;$i<$row_number;$i++)
				{
					echo "<td>". $myarr[$i]['hcid'].  "</td>";
                    echo "<td>". $myarr[$i]['hcname'].  "</td>";		
          
        echo "</tr>";
				}

				?>
				</tbody>




</table>

</html>
