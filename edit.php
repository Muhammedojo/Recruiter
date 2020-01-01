<?php
include_once("class/boldclass.php");
$id = "";
if(isset($_GET['id']) && $_GET['id'] != ""){
    $id = $_GET['id'];
}
$updateobj = new employ();
$res = $updateobj->viewer($id);

$fname = isset($res[0]['fName'])? $res[0]['fName'] :"";
$lname = isset($res[0]['lName'])? $res[0]['lName'] :"";
$email = isset($res[0]['email'])? $res[0]['email'] :"";
$gender = isset($res[0]['sex'])? $res[0]['sex'] :"";
$phone = isset($res[0]['phone'])? $res[0]['phone'] :"";
$address = isset($res[0]['address'])? $res[0]['address'] :"";
$experience = isset($res[0]['experience'])? $res[0]['experience'] :"";
$age = isset($res[0]['age'])? $res[0]['age'] :"";
$position = isset($res[0]['position'])? $res[0]['position'] :"";
 
 if(isset($_POST['Update'])){
    $upper = new employ();
    $updaterec = $upper->updateData($_POST);
 }

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/> 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
 </head>
<body>
    <div class="container">
       <div class="Back">
            <i class="fa fa-arrow-left" onclick="Back()"></i>
        </div>
        <p class="h2 text-center">Application Form</p>
       <form name="myForm" action="edit.php" method="POST">
            <div class="preview text-center">
                <img class="preview-img" src="bold_favicon.png" alt="Preview Image" width="200" height="200"/>
               
                <span class="Error"></span>
            </div>
            <input type="hidden" name="id" value="<?=$id?>"/>
            <div class="form-group">
                <label>First Name:</label>
                <input class="form-control" type="text" name="fname" value="<?=$fname?>"  placeholder="First Name"/>
                
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input class="form-control" type="text" name="lname" value="<?=$lname?>" placeholder="Last Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" value="<?=$email?>" placeholder="Email"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" value="<?=$phone?>" placeholder="Phone"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input class="form-control" type="text" name="age" value="<?=$age?>" placeholder="Age"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input class="form-control" type="text" name="address" value="<?=$address?>" placeholder="Address"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Experience:</label>
                <input class="form-control" type="text" name="experience" value="<?=$experience?>" placeholder="Experience"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Position:</label>
                <select class="form-control" name="position" >
                <?php

                        if($position != ""){
                           
                            if($position == 'Graphics Artists'){
                                        echo "<option value= '$position' >$position</option>";
                            }
                            if($position == 'Secretary'){
                                        echo "<option value= '$position' >$position</option>";
                            }
                            if($position == 'Software Engineer'){
                                        echo "<option value= '$position' >$position</option>";
                            }
                        }
                        

                  ?>
                <option>Select a Position</option>
                <option>Graphics Artists</option>
                <option>Secretary</option>
                <option>Software Engineer</option>
                </select>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <?php
                if($gender != ""){
                    //
                    if($gender == 'Male'){
                        echo "<option value='$gender'>$gender</option>";
                    }
                    
                    if($gender == 'Female'){
                        echo "<option value='$gender'>$gender</option>";
                    }
                    }
                ?>
                

                <label><input type="radio" name="gender" value="Male" /> Male</label>
                <label><input type="radio" name="gender" value="Female" /> Female</label>
               
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="Update" name="Update"/>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    function Back()
{
    window.history.back();
}
    </script>
</body>

</html>