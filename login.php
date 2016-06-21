<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="login") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì, ở đây là 1 object Account
   $obj = json_decode($data); //Giải mã json ra
   $user = $obj->{'username'};
   $pass = $obj->{'password'};
    
	$sql = "SELECT * FROM tai_khoan"." WHERE TK_USER ='$user' and TK_PASS='$pass'"; // Viết querry
	$result = $connect->query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_NUM); // Tách kết quả ra trả về 1 Array
	if(count($row)>=1){
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
else if($action=="test")
{
    echo $_POST['data'];
}
?>