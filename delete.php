<?php
include_once("class/boldclass.php");
if (isset($_GET['id']) && $_GET['id'] != ""){
    $id = $_GET['id'];
}
$deleteobj = new employ();
echo $deleteobj->deleteData($id);


?>