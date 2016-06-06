<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$connect->set_charset('utf8');
$user_id = "khoavin@gmail.com";
    $sql = "SELECT * FROM `phong_dat`WHERE phong_dat.CH_ID IN (SELECT CH_ID FROM cua_hang WHERE TK_ID IN (SELECT TK_ID FROM tai_khoan WHERE TK_USER = '$user_id'))";
    $result = $connect->query($sql);
    $mang = array();
    while($row = mysqli_fetch_assoc($result)){
        array_push($mang,$row);      
    }
    echo json_encode($mang);
?>