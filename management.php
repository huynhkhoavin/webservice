<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$connect->set_charset('utf8');
$action = $_GET['action'];
if ($action == 'load_room')
{
    $data = $_GET['data'];
    $obj = json_decode($data); //Giải mã json ra
    $user = $obj->{'username'};
    $sql = "SELECT * FROM `phong_dat`WHERE phong_dat.CH_ID IN (SELECT CH_ID FROM cua_hang WHERE TK_ID IN (SELECT TK_ID FROM tai_khoan WHERE TK_USER = '$user'))";
    $result = $connect->query($sql);
    $mang = array();
    while($row = mysqli_fetch_array($result)){
        array_push($mang,$row);      
}
echo json_encode($mang);
}
?>

