<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="qrcheck") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì
    
	$sql = "SELECT * FROM danh_sach_dat_phong"." WHERE QR_STRING ='$data'";
	$result = $connect->query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_NUM); // Tách kết quả ra trả về 1 Array
	if(count($row)>=1){
		//mã xác nhận chính xác.
		echo"1";
	}
	else 
	{
		//mã xác nhận không chính xác.
		echo "0";
	}     
}
?>