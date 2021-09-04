<?php

if(isset($_POST['submitelectionfromadmin'])){
	session_start();
	include 'dbh.inc.php';
	$userId=$_SESSION['logged_in_userid'];

	$sql="SELECT * from election  ; ";
     $result = mysqli_query($connct,$sql);//this will excute the query
     $row=mysqli_fetch_assoc($result);
    if($row['publish']==1){

	 	$sql="UPDATE election SET publish = 0 ;";
    }
    else {

	 	$sql="UPDATE election SET publish =1 ;";  
    }

	$result=mysqli_query($connct, $sql);
}
	header("Location: ../adminelection.php");
	exit();
?>