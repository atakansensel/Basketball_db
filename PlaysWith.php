<html>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$link = mysqli_connect("localhost", "root", "", "bball");


// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$check = mysqli_query($link, "SELECT * FROM PlaysWith");

$myarr=array();

while($row = mysqli_fetch_array($check))
{
array_push($myarr, $row);
}

?>

<h1 class="h1"> Matches </h1>
<body style="background-color : yellow">
<table class="table">
            <thead>
                <tr class="success">
                    <th>mid</th>
                    <th>minfo</th>
                    <th>cid1</th>
					<th>cid2</th>
                </tr>
            </thead>
            <tbody>

				<?php
				$row_number=count($myarr);

				for($i=0;$i<$row_number;$i++)
				{
					echo "<td>". $myarr[$i]['mid'].  "</td>";
                    echo "<td>". $myarr[$i]['minfo'].  "</td>";		
          echo "<td>". $myarr[$i]['cid1'].  "</td>";
          echo "<td>". $myarr[$i]['cid2'].  "</td>";
        echo "</tr>";
				}

				?>
				</tbody>




</table>

</html>
