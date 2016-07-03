<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");
$connect->set_charset('utf8');
$user_id = 1;
$action = $_POST['action'];

if ($action == 'get_all_room_booked') 
{
    $sql = "SELECT * FROM danh_sach_dat_phong";
//    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        
        array_push($mang, $data); 
//        json_encode($data);
  }
  echo json_encode($mang); 
}
 if($action == 'get_all_store') // Danh sach tat ca cac cua hang
     {
    $sql = "SELECT * FROM cua_hang";
//    $sql = "SELECT * FROM menu";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        
        array_push($mang, $data); 
  }
  echo json_encode($mang);
}
if($action == 'get_room_of_store') // Lay ra cac phong co san trong khoang thoi gian do
    {
    $data = $_POST['data']; // Lấy dữ liệu đã truyền lên
    //$object = json_decode($data);
    $store = $data; // cửa hàng
    $sql = "SELECT * FROM phong_dat WHERE PD_ID IN (SELECT PD_ID FROM phong_dat WHERE CH_ID = '$store')";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        array_push($mang, $data); 
  }
  echo json_encode($mang);
}
if($action == 'get_status_one_room')
{
    $data = $_POST['data'];
    $obj = json_decode($data);
    $pd = $obj->{'PD_ID'};
    $date = $obj->{'Date'};
    $sql = "SELECT * FROM `danh_sach_dat_phong` WHERE PD_ID = '$pd' AND DATE(GIO_BAT_DAU) = '$date'";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        array_push($mang, $data); 
  }
  echo json_encode($mang);
}
if($action == 'room_order') // Xac nhan dat phong
{
    $data = $_POST['data']; // Lấy dữ liệu đã truyền lên
    $object = json_decode($data);
    $tk_id = $object['tk_id'];
    $pd_id = $object['pd_id'];
    $start = $object['start'];
    $stop  = $object['stop'];
    $sql = "insert into danh_sach_dat_phong values('$tk_id','$pd_id','$start','$stop')";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        
        array_push($mang, $data);
          }
  echo json_encode($mang);
}
if($action == 'get_history') // Lay lich su da dat phong
{
    $data = $_POST['data']; // Lấy dữ liệu đã truyền lên
    $object = json_decode($data);
    $tk_id = $object['tk_id']; // 
    $sql = "select * from danh_sach_dat_phong where TK_ID = '$tk_id'";
    $result = $connect->query($sql);
    $mang = array();
    while($data = mysqli_fetch_array($result)){
        
        array_push($mang, $data);
          }
    echo json_encode($mang);
}
?>