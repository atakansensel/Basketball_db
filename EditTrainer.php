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
    $check = mysqli_query($link,"SELECT * FROM trainer");

    if (!$check) { // add this check.
        die('Invalid query: ' . mysql_error());
    }

    $myarr=array();

    while($row = mysqli_fetch_array($check))
    {
    array_push($myarr, $row);
    }

   ?>
   
    
     

    <form class="" action="EditTrainer.php" method="get">
      <div class="add">
        <h3>Add new record</h3>
          <input type="text" id="task" placeholder="Trainer Name" name="addname" autocomplete="off" >
		  <input type="text" id="task" placeholder="Profession" name="pro_name" autocomplete="off" >
            		 
        <input type="text" id="task" placeholder="Tid" name="addtid" autocomplete="off"  >
        <button type="submit" name="add1">Add</button>

      </div>


      <div class="remove">
        <h3>Remove a record</h3>
        <input type="text" id="task" placeholder="Tid" name="tid_delete" autocomplete="off"  >

        <button type="submit" name="remove1">Remove</button>

      </div>

     

      <div class="edit">
        <h3>Edit Record</h3>
        <h5>if you dont want to change a spesific column please type it again.</h5>

        <input type="text" id="task" placeholder="Cid that you want to edit" name="cid_edit" autocomplete="off"  >
        <input type="text" id="task" placeholder="Profession" name="pro_edit" autocomplete="off" >
        <input type="text" id="task" placeholder="Name" name="newname" autocomplete="off"  >

       

        <button type="submit" name="edit1">Edit</button>

      </div>


<?php

if(isset($_GET['add1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $sql = "INSERT INTO trainer (tid,tname,profession)
	VALUES ('".$_GET["addtid"]."','".$_GET["addname"]."','".$_GET["pro_name"]."')";

  $result = mysqli_query($conn,$sql);
  

  header('location: EditTrainer.php');


}
if(isset($_GET['edit1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
    $id = $_GET['cid_edit'];



  $sql = "UPDATE trainer SET tname ='".$_GET["newname"]."',profession='".$_GET["pro_edit"]."' WHERE tid=".$id;


  $result = mysqli_query($conn,$sql);

  header('location: EditTrainer.php');


}


if(isset($_GET['remove1']))
{
    $conn =mysqli_connect("localhost","root","","bball");
  $sql = "DELETE From club
  WHERE cid =".$_GET["cid_delete"];

  $result = mysqli_query($conn,$sql);

  header('location: EditTrainer.php');


}



 ?>
</form>
    <body style="background-color : orange">
    <table class="table">
                <thead>
                    <tr class="success">
                     <th>trainer id</th>
                    <th>Team name</th>
                    <th>Profession</th>                    

                    </tr>
                </thead>
                <tbody class="table-dark">

    				<?php
    				$row_number=count($myarr);

    				for($i=0;$i<$row_number;$i++)
    				{
    					$tname=$myarr[$i]['tname'];
              	        $tid=$myarr[$i]['tid'];
						$pro=$myarr[$i]['profession'];
						
    				echo "<tr>";
					    echo "<td>" .$tid.  "</td>";
    					echo "<td>" .$tname.  "</td>";
						echo "<td>" .$pro.  "</td>";
						
              

            echo "</tr>";
    				}

    				?>
    				</tbody>




    </table>

	<script src="js/bootstrap.min.js"><script/>
  </body>
</html>
