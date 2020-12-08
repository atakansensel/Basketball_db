<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" type = "text/css" href = "css/bootstrap.min.css"/>
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--  using boost library    -->

  </head>
  <body>
    <?php
    $link = mysqli_connect("localhost", "root", "", "bball");


    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $check = mysqli_query($link,"SELECT * FROM player");

    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }

    $myarr=array();

    while($row = mysqli_fetch_array($check))
    {
    array_push($myarr, $row);
    }

    	?>
   
    
     

    <form class="" action="EditPlayer.php" method="get">
      <div class="add">
        <h3>Add new record</h3>
          <input type="text" id="task" placeholder="Name" name="addname" autocomplete="off" >
		  <input type="text" id="task" placeholder="Age" name="addage" autocomplete="off" >
        <input type="text" id="task" placeholder="Pid" name="addpid" autocomplete="off"  >
        <button type="submit" name="add1">Add</button>

      </div>

      <div class="remove">
        <h3>Remove a record</h3>
        <input type="text" id="task" placeholder="Pid" name="pid_delete" autocomplete="off"  >

        <button type="submit" name="remove1">Remove</button>

      </div>

     

      <div class="edit">
        <h3>Edit Record</h3>
        <h5>if you dont want to change a spesific column please type it again.</h5>

        <input type="text" id="task" placeholder="Pid that you want to edit" name="pid_edit" autocomplete="off"  >

        <input type="text" id="task" placeholder="Name" name="newname" autocomplete="off"  >

        <input type="text" id="task" placeholder="New age" name="newage" autocomplete="off"  >

        <button type="submit" name="edit1">Edit</button>

      </div>


<?php

if(isset($_GET['add1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $sql = "INSERT INTO player (pid,pname,page)
	VALUES ('".$_GET["addpid"]."','".$_GET["addname"]."','".$_GET["addage"]."')";

  $result = mysqli_query($conn,$sql);
  

  header('location: EditPlayer.php');


}
if(isset($_GET['edit1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $id = $_GET['pid_edit'];



  $sql = "UPDATE player SET pname ='".$_GET["newname"]."',page='".$_GET["newage"]."' WHERE pid=".$id;


  $result = mysqli_query($conn,$sql);

  header('location: EditPlayer.php');


}


if(isset($_GET['remove1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
  $sql = "DELETE From player
  WHERE pid =".$_GET["pid_delete"];

  $result = mysqli_query($conn,$sql);

  header('location: EditPlayer.php');


}



 ?>
</form>
    <body style="background-color : orange">
    <table class="table">
                <thead>
                    <tr class="success">
                     <th>pid</th>
                    <th>pname</th>
                    <th>page</th>

                    </tr>
                </thead>
                <tbody class="table-dark">

    				<?php
    				$row_number=count($myarr);

    				for($i=0;$i<$row_number;$i++)
    				{
    					$pname=$myarr[$i]['pname'];
              	        $pid=$myarr[$i]['pid'];
						$page =$myarr[$i]['page'];
    				echo "<tr>";
					    echo "<td>" .$pid.  "</td>";
    					echo "<td>" .$pname.  "</td>";
						echo "<td>" .$page.  "</td>";
              

            echo "</tr>";
    				}

    				?>
    				</tbody>




    </table>

	<script src="js/bootstrap.min.js"><script/>
  </body>
</html>
