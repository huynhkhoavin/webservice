<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$connect->set_charset('utf8');
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="confirm") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì
   $obj = json_decode($data); //Giải mã json ra
   $qr_string = $obj->{'QR_STRING'};
	
	if($qr_string == ""){
		echo "-1";
	}
	else
	{
		$sql = "SELECT pdd.TK_ID, pdd.PD_ID, pdd.GIO_BAT_DAU, pdd.GIO_KET_THUC, pdd.QR_STRING, br.CH_TEN FROM danh_sach_dat_phong pdd, phong_dat pd, cua_hang br, tai_khoan tk WHERE(tk.TK_ID = pdd.TK_ID AND pdd.PD_ID = pd.PD_ID AND pd.CH_ID = br.CH_ID AND pdd.QR_STRING = '$qr_string')";
		$result = $connect->query($sql);
		$mang = array();
		while($row = mysqli_fetch_array($result))
		{
			array_push($mang,$row);      
		}
		echo json_encode($mang);
	}
   
}
?>

