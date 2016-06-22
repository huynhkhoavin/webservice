<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); 
$connect->set_charset('utf8');
$sql = "SELECT pdd.TK_ID, pdd.PD_ID, pdd.GIO_BAT_DAU, pdd.GIO_KET_THUC, pdd.QR_STRING, br.CH_TEN FROM danh_sach_dat_phong pdd, phong_dat pd, cua_hang br WHERE(pdd.TK_ID = '1' AND pdd.PD_ID = pd.PD_ID AND pd.CH_ID = br.CH_ID)";
$result = $connect->query($sql);
$mang = array();
while($row = mysqli_fetch_array($result)){
 array_push($mang,$row);      
}
echo json_encode($mang);
?>

