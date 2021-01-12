<?php

session_start();

$mysqli =new mysqli('localhost','root','','ipl') or die("f") ;
$username="";
$password="";
$address="";
$dob="";
$aadhar="";
$city="";
$country="";
$email="";
$mobile="";
$passport="";
$pin="";
$state="";
$gender="";
$update=false;
$id=0;
if(isset($_POST['save'])){
    $username = $_POST['name'];
    $password = $_POST['password'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $aadhar=$_POST['aadhar'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $passport=$_POST['passport'];
    $pin=$_POST['pin'];
    $state=$_POST['state'];
    $gender=$_POST['gender'];

   echo "INSERT INTO `registration`(`aadhar`, `address`, `city`, `country`, `dob`, `email`, `gender`,`id`,  `mobile`, `name`, `passport`, `password`, `pin`, `state`) VALUES ('$aadhar','$aadress','$city','$country','$dob','$email','$gender','$id',$mobile,'$username','$passport','$password','$pin','$state')";
    $mysqli->query("INSERT INTO `registration`(`aadhar`, `address`, `city`, `country`, `dob`, `email`, `gender`,`id`,  `mobile`, `name`, `passport`, `password`, `pin`, `state`) VALUES ('$aadhar','$address','$city','$country','$dob','$email','$gender','$id','$mobile','$username','$passport','$password','$pin','$state')") or die("fff");

    $_SESSION['message'] = "Record has been saved";
    $_SESSION['msg_type'] = "success";
    header("location: edit.php");
}


if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM registration WHERE id=$id")or die("f");

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "denger";
    header("location: edit.php");
}

if (isset($_GET['edit'])){
    $id= $_GET['edit'];
    $update=true;
    $result= $mysqli->query("SELECT * FROM registration WHERE id=$id")or die("f");
    
        $row = $result->fetch_array();
        $username=$row['name'];
        $password=$row['password'];
        $address=$row['address'];
        $dob=$row['dob'];
        $aadhar=$row['aadhar'];
        $city=$row['city'];
        $country=$row['country'];
        $email=$row['email'];
        $mobile=$row['mobile'];
        $passport=$row['passport'];
        $pin=$row['pin'];
        $state=$row['state'];
        $gender=$row['gender'];
    
}

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $username=$_POST['name'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $aadhar=$_POST['aadhar'];
    $city=$_POST['city'];
    $country=$_POST['country'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $passport=$_POST['passport'];
    $pin=$_POST['pin'];
    $state=$_POST['state'];
 $gender=$_POST['gender'];
// echo "UPDATE `registration` SET `aadhar`='$aadhar',`address`='$address',`city`='$city',`country`='$country',`dob`='$dob',`email`='$email',`gender`='$gender',`id`='$id',`mobile`='$mobile',`name`='$username',`passport`='$passport',`password`='$password',`pin`='$pin',`state`='$state' WHERE 1";
    $mysqli->query("UPDATE `registration` SET aadhar='$aadhar',address='$address',city='$city',country='$country',dob='$dob',email='$email',gender='$gender',mobile='$mobile',name='$username',passport='$passport',password='$password',pin='$pin',state='$state' WHERE id= '$id'")or die("f");

    $_SESSION['message']="Record has been update";
    $_SESSION['msg_type']="warning";
    header("location: edit.php");
}

?>
