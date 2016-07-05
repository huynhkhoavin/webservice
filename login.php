<?php

$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$connect->set_charset('utf8');
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="login") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì, ở đây là 1 object Account
   $obj = json_decode($data); //Giải mã json ra
   $user = $obj->{'TK_USER'};
   $pass = $obj->{'TK_PASS'};
    
	$sql = "SELECT * FROM tai_khoan WHERE TK_USER ='$user' and TK_PASS='$pass'"; // Viết querry
        $result = $connect->query($sql);
         $mang = array();
         while($data = mysqli_fetch_array($result)){
             array_push($mang, $data); 
       }
       echo json_encode($mang);
}
?>