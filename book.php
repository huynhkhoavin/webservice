<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$connect->set_charset('utf8');
$user_id = 1;
echo $_GET['action'];
//$action = $_POST['action'];
//if (action == 'get_all_room_booked') 
{
//    $sql = "SELECT * FROM danh_sach_dat_phong";
    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        
        array_push($mang, $data); 
//        json_encode($data);
  }
  echo json_encode($mang);
  
}
?>