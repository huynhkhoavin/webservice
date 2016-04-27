<?php
$action = $_POST["action"];
if ($action=="login")
{
    $user = $_POST["user"];
    $pass = $_POST["pass"] ;
    $user = "huynhkhoavin";
    $pass = "123456";
    $connect = mysqli_connect("localhost","root","","karaoke_booking");
	$sql = "SELECT * FROM account WHERE user ='$user' and pass='$pass'";
	$result = $connect->query($sql);
	$mang = array();
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	echo $row[0];
}
?>