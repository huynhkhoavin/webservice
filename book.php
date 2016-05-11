<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$user_id = 1;

$action = $_POST['action'];
if (action == 'get_all_room_booked') {
    $sql = "SELECT * FROM danh_sach_dat_phong". " WHERE TK_ID ='$user_id'";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_assoc($result)){
        array_push($mang, $data);       
  }
  echo json_encode($mang);
}
?>