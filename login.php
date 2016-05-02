<?php
$action = $_POST["action"];
if ($action=="login")
{
   $data = $_POST['data'];
   $obj = json_decode($data);
   $user = $obj->{'username'};
   $pass = $obj->{'password'};
   
    $connect = mysqli_connect("localhost","root","","karaoke_booking");
	$sql = "SELECT * FROM tai_khoan". " WHERE TK_USER ='$user' and TK_PASS='$pass'";
	$result = $connect->query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	echo count($row[1]);
}
?>