<?php
ini_set("display_errors",1);
include_once("class/connect.php");
class  employ extends dbConnection {

	public $data, $saveqry, $selectqry, $deleteqry, $inputs, $saveRecs,$recs, $limit, $reco,$re = array();

	public $id,$fname,$lname,$email,$row, $sex,$phone, $address, $experience, $age, $position, $image;
  
    public $error, $insert_recs, $update_recs, $read_recs, $saveFlag = true;
    
    public $uploadDirectory,$fileSize,$fileName,$fileExtensions,$currentDir,$uploadPath,$fileType;
    
    public $fileTmpName,$fileName_arr,$fileExtension;    
        
	public function __construct(){

		parent::__construct();
        
    }
   
    


	public function test_input($value) {
	  $this->data = trim($value);
	  $this->data = stripslashes($this->data);
	  $this->data = htmlspecialchars($this->data);
	  return $this->dbconnect->real_escape_string($this->data);
	}   
      
	public function validation($arr){
		$this->inputs     = $arr;
		$this->id         = ($this->test_input($this->inputs['id']) != "") ? $this->test_input($this->inputs['id']): "";
        $this->fname      = ($this->test_input($this->inputs['fname']) != "") ? $this->test_input($this->inputs['fname']): "";
	    $this->lname      = ($this->test_input($this->inputs['lname']) != "") ? $this->test_input($this->inputs['lname']): "";
	    $this->email      = ($this->test_input($this->inputs['email']) != "") ? $this->test_input($this->inputs['email']): "";
	    $this->sex        = ($this->test_input($this->inputs['gender']) != "") ? $this->test_input($this->inputs['gender']): "";
	    $this->phone      = ($this->test_input($this->inputs['phone']) != "") ? $this->test_input($this->inputs['phone']): "";
	    $this->address    = ($this->test_input($this->inputs['address']) != "") ? $this->test_input($this->inputs['address']): "";
	    $this->experience = ($this->test_input($this->inputs['experience']) != "") ? $this->test_input($this->inputs['experience']): "";
	    $this->age        = ($this->test_input($this->inputs['age']) != "") ? $this->test_input($this->inputs['age']): "";
        $this->position   = ($this->test_input($this->inputs['position']) != "") ? $this->test_input($this->inputs['position']): "";
       

	   $this->error = "";
	   if($this->fname == ""){
	    $this->error .= "Firstname cannot be empty <br>";
	    $this->saveFlag = false;
	   }
	   
	   if($this->lname== ""){
	    $this->error .= "Lastname cannot be empty <br>";
	    $this->saveFlag = false;
	   }
	   
	    if($this->phone == ""){
	    $this->error .= "Phone number cannot be empty <br>";
	    $this->saveFlag = false;
	    
	   }
	   
	  //echo "phone xter length = ".strlen($phone);die("wait...");
	   if(strlen($this->phone) < 11){
	     $this->error .= "Invalid Phone number <br>";
	    $this->saveFlag = false;
	   
	   }
	   
	   if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
        $this->error .= "Invalid Email<br>";
	    $this->saveFlag = false;
	   }
       if($this->sex == ""){
	    $this->error .= "Choose a gender<br>";
	    $this->saveFlag = false;
	    
	   }
        if($this->address == ""){
	    $this->error .= "Addresss cannot be empty <br>";
	    $this->saveFlag = false;
	    
	   }
       if($this->experience == "" || $this->experience < 2){
	    $this->error .= "Years of Experience cannot be empty and must be 2yrs above <br>";
	    $this->saveFlag = false;
	    
	   }
       if($this->age == "" || $this-> age > 25){
	    $this->error .= "Age cannot be empty and must not be above 25 <br>";
	    $this->saveFlag = false;
	    
	   }
      if($this->position == ""){
	    $this->error .= "Choose a position<br>";
	    $this->saveFlag = false;
	    
	   }
       
       //Image Uploading Process
   if($this->saveFlag == false){
    
    echo $this->error;      
   }
   else{
    
    if(isset($_POST['submit'])){
    $this->currentDir = getcwd();
    $this->uploadDirectory = "/images/";
   
    $this->errors = array();
   
    $this->fileExtensions = ['jpeg','jpg','png','gif']; 
    $this->fileName      = $_FILES['fileupload']['name'];
    $this->fileSize      = $_FILES['fileupload']['size'];
    $this->fileTmpName   = $_FILES['fileupload']['tmp_name'];
    $this->fileType      = $_FILES['fileupload']['type'];
    $this->fileName_arr  =  array();
    $this->fileName_arr  = explode('.',$this->fileName);
    $this->fileExtension = strtolower(end($this->fileName_arr));
    $this->uploadPath = $this->currentDir . $this->uploadDirectory . basename($this->fileName); 

    

        if (! in_array($this->fileExtension,$this->fileExtensions)) {
              //echo "somethng is wrong 2 ";
            $this->errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($this->fileSize > 2000000) {
              //echo "somethng is wrong 3 ";
            $this->errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

       if (empty($this->errors)) {
             
    }
       }
      }
	    
       if($this->saveFlag == false){
       		echo "Please correct the errors below <br><span style='color:red'>".$this->error;die()."</span>";
       } 
       return $this->saveFlag;
	}
    
      
      public function createData($arr){
       if(count($this->readData()) >= 5){
            
            echo "<script>alert('Maximum applicant reached try next time')</script>";die;
            header("refresh:2; url=http://localhost/oopbold/index.php"); 
        }
        else{
            
            
                
        if($this->validation($arr)){
			$this->saveqry   = "INSERT INTO oopbold 
                        (fName,lName,email,phone,age,sex,address,experience,position,image)
                        VALUES(' $this->fname', 
		                        '$this->lname',  
		                        '$this->email', 
		                        '$this->phone',
		                        '$this->age',
                                '$this->sex',
		                        '$this->address',
		                        '$this->experience',
                                '$this->position',
                                '$this->fileName'
                                
		                    	)";
                                                           
                
		    $this->insert_recs= mysqli_query($this->dbconnect,$this->saveqry);
                          
	        if(mysqli_affected_rows($this->dbconnect) > 0){
	            $this->didupload = move_uploaded_file($this->fileTmpName, $this->uploadPath);
                }
	            echo "<script>alert('record saved succesfully')</script>";
	            header("refresh:2; url=http://localhost/oopbold/show.php");
                
	        }
	        else{
	            echo "Records not saved - ".mysqli_error($this->dbconnect);
	        }
		}
		
	}
        
    
     
    public function readData(){
        $this->selectqry = "SELECT * FROM oopbold WHERE 1 = 1 ORDER BY id DESC";
        $this->rec = mysqli_query($this->dbconnect,$this->selectqry);
        if(mysqli_affected_rows($this->dbconnect) > 0){
           while($this->row = mysqli_fetch_assoc($this->rec)){
            $this->recs[] = $this->row;
            
           }
                      
           return $this->recs; 
                      
        }
        else{
            echo"No record selected ". mysqli_error($this->dbconnect);
        }
    }
    
    
    public function deleteData($id){
        $this->deleteqry = "DELETE FROM oopbold WHERE id = '$id'";
        $this->qry = mysqli_query($this->dbconnect,$this->deleteqry);
        if(mysqli_affected_rows($this->dbconnect) > 0){
            echo "<script>alert('Record deleted succesfully')</script>";
        header("refresh:1; url=http://localhost/oopbold/show.php");
        }
        else{
            echo "<script>alert('Record not deleted')</script>";
        header("refresh:1; url=http://localhost/oopbold/show.php");        }
        
    }
    public function viewer($id){
        $this->selectqry = "SELECT * FROM oopbold WHERE id = '$id' ";
        $this->rec = mysqli_query($this->dbconnect,$this->selectqry);
        if(mysqli_affected_rows($this->dbconnect) > 0){
           while($this->row = mysqli_fetch_assoc($this->rec)){
            $this->recs [] = $this->row;
           }
           return $this->recs; 
        }
        
    }
    public function updateData($arr){
		if($this->validation($arr)){
			$this->qry   = "UPDATE 
							oopbold
	                        SET fName        ='$this->fname',
	                            lName        ='$this->lname',
	                            email        ='$this->email',
	                            phone        ='$this->phone',
	                            age          ='$this->age',
	                            sex          ='$this->sex',
	                            address      ='$this->address',
	                            experience   ='$this->experience',
                                position     ='$this->position'

	                         WHERE
 
	                         	id   = '$this->id'
	                        ";

		    $this->update_recs    = mysqli_query($this->dbconnect,$this->qry);
	        if(mysqli_affected_rows($this->dbconnect) > 0){
	            echo "<script>alert('Record Updated succesfully')</script>";
	            //header("location:index.html");
	            header("refresh:2; url=http://localhost/oopbold/show.php");
	        }
	        else{
	            echo "Records not Updated  ";
	        }
		}	
	}
   
}
?>