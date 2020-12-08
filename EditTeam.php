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
    $check = mysqli_query($link,"SELECT * FROM club");

    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }

    $myarr=array();

    while($row = mysqli_fetch_array($check))
    {
    array_push($myarr, $row);
    }

   ?>
   
    
     

    <form class="" action="EditTeam.php" method="get">
      <div class="add">
        <h3>Add new record</h3>
          <input type="text" id="task" placeholder="Club Name" name="addname" autocomplete="off" >
		 
        <input type="text" id="task" placeholder="Cid" name="addpid" autocomplete="off"  >
        <button type="submit" name="add1">Add</button>

      </div>

      <div class="remove">
        <h3>Remove a record</h3>
        <input type="text" id="task" placeholder="Cid" name="cid_delete" autocomplete="off"  >

        <button type="submit" name="remove1">Remove</button>

      </div>

     

      <div class="edit">
        <h3>Edit Record</h3>
        <h5>if you dont want to change a spesific column please type it again.</h5>

        <input type="text" id="task" placeholder="Cid that you want to edit" name="cid_edit" autocomplete="off"  >

        <input type="text" id="task" placeholder="Name" name="newname" autocomplete="off"  >

       

        <button type="submit" name="edit1">Edit</button>

      </div>


<?php

if(isset($_GET['add1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $sql = "INSERT INTO club (cid,cname)
	VALUES ('".$_GET["addpid"]."','".$_GET["addname"]."')";

  $result = mysqli_query($conn,$sql);
  

  header('location: EditTeam.php');


}
if(isset($_GET['edit1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $id = $_GET['cid_edit'];



  $sql = "UPDATE club SET cname ='".$_GET["newname"]."' WHERE cid=".$id;


  $result = mysqli_query($conn,$sql);

  header('location: EditTeam.php');


}


if(isset($_GET['remove1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
  $sql = "DELETE From club
  WHERE cid =".$_GET["cid_delete"];

  $result = mysqli_query($conn,$sql);

  header('location: EditTeam.php');


}



 ?>
</form>
    <body style="background-color : orange">
    <table class="table">
                <thead>
                    <tr class="success">
                     <th>tid</th>
                    <th>Team name</th>
                    

                    </tr>
                </thead>
                <tbody class="table-dark">

    				<?php
    				$row_number=count($myarr);

    				for($i=0;$i<$row_number;$i++)
    				{
    					$cname=$myarr[$i]['cname'];
              	        $cid=$myarr[$i]['cid'];
						
    				echo "<tr>";
					    echo "<td>" .$cid.  "</td>";
    					echo "<td>" .$cname.  "</td>";
						
              

            echo "</tr>";
    				}

    				?>
    				</tbody>




    </table>

	<script src="js/bootstrap.min.js"><script/>
  </body>
</html>
