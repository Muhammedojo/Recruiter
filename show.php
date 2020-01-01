<?php
include_once("class/boldclass.php");
/*$maxobj = new employ();
$max = $maxobj->max();*/
$showobj = new employ ;
$show = $showobj->readData();
?>
<!DOCTYPE html>
<head>
<title>Show_All</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
tbody{font-size: 15px;background-color:whitesmoke;}
.thead{background-color: #1A1A1A;font-size: 12px; color: white;font-weight:normal;}
.btnS{float: right;background-color: hotpink;border: none;color: white;padding: 5px 15px;text-align: left;font-size: 14px;}
.btnS:focus{outline:none;}
.btnS:after {content: "Less";float: right;margin-left: 3px;}
.btnS.collapsed:after {content: "More";}

</style>
</head>
<body>

<div class="container">
  <h2>New_intake Records</h2>   <br>  
  <div class="row">
	<a href="index.php"><button type="button" class="btn bg-blue fs-it-btn">
		<i class="fa fa-plus" ></i>
		 Add new
	</button></a>
  </div>                                                                          
  <div id="boom" class="collapse show">
  <div class="table-responsive">
    <table class="table">
      <thead class="thead">
      
      
        <tr>
          <th>#</th>
          <th>FirstName</th>
          <th>LastName</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Experience</th>
          <th>Age</th>
          <th>Sex</th>
          <th>Position</th>
          <th>Uploads</th>
          <th>Action</th>
      
        </tr>
      </thead>
      <tbody>
       <?php
       if(count($show) > 0){
       foreach($show as $row){
       echo"
        
        <tr>
          <td>{$row['id']}</td>
          <td>{$row['fName']}</td>
          <td>{$row['lName']}</td>
          <td>{$row['email']}</td>
          <td>{$row['phone']}</td>
          <td>{$row['address']}</td>
          <td>{$row['experience']}</td>
          <td>{$row['age']}</td>
          <td>{$row['sex']}</td>
          <td>{$row['position']}</td>
          <td>{$row['image']}</td>
          <td>
            <a title='Click to view' href='view.php?id={$row['id']}' class='btn'><i class='fa fa-eye'></i></a>
            <a title='Click to Edit' href='edit.php?id={$row['id']}' class='btn'><i class='fa fa-edit'></i></a>
            <a title='Click to Delete' href='delete.php?id={$row['id']}' class='btn'><i class='fa fa-trash'></i></a>
          </td>
          
        </tr>";
        }
        }
        ?>
       </tbody>
    </table>
  </div>
</div>
 
 <button type="button" class="btnS" data-toggle="collapse" data-target="#boom">Show</button>

</div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>