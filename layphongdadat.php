<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$connect->set_charset('utf8');
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="load_dsdat") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì
   $obj = json_decode($data); //Giải mã json ra
   $user = $obj->{'userName'};
	
	if($user == ""){
		echo "-1";
	}
	else
	{
	$sql = "SELECT pdd.TK_ID, pdd.PD_ID, pdd.GIO_BAT_DAU, pdd.GIO_KET_THUC, pdd.QR_STRING, br.CH_TEN FROM danh_sach_dat_phong pdd, phong_dat pd, cua_hang br, tai_khoan tk WHERE(tk.TK_ID = pdd.TK_ID AND tk.TK_USER = '$user' AND pdd.PD_ID = pd.PD_ID AND pd.CH_ID = br.CH_ID)";
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

