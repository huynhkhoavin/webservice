<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$action = $_POST["action"];
if ($action=="login")
{
   $data = $_POST['data'];
   $obj = json_decode($data);
   $user = $obj->{'username'};
   $pass = $obj->{'password'};
    
	$sql = "SELECT * FROM tai_khoan"." WHERE TK_USER ='$user' and TK_PASS='$pass'";
	$result = $connect->query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	if(count($row[1])>=1){
            if ($row[4] == 1) { // Hien dang dang nhap
                echo "Using";
            }
            else { // Hien chua dang nhap
//                $sql = "UPDATE tai_khoan SET TK_TRANG_THAI = 1 WHERE TK_USER = '$user'";
                $result2 = $connect->query($sql);
                echo $row[5];
            }
        }
}
?>