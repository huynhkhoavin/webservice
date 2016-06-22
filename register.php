<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking"); // Ket noi database
$action = $_POST["action"]; // Lay thong tin phương thức post cần gì
if ($action=="register") 
{
   $data = $_POST['data']; // Lấy dữ liệu được gửi lên xem là gì
   $obj = json_decode($data); //Giải mã json ra
   
		$userName 		= $obj->{'userName'};
		$displayName 	= $obj->{'displayName'};
        $password 		= $obj->{'password'};
		$status 		= $obj->{'status'};
		$clientType 	= $obj->{'clientType'};
		$location 		= $obj->{'location'};
        $regularPrice 	= $obj->{'regularPrice'};
        $amount 		= $obj->{'amount'};
    
	$sql = "SELECT * FROM tai_khoan"." WHERE TK_USER ='$userName'"; // Viết querry
	$result = $connect->query($sql);
	$row = mysqli_fetch_array($result,MYSQLI_NUM); // Tách kết quả ra trả về 1 Array
	if(count($row)>=1){
		//trường hợp username đã tồn tại
		echo"-1";
	}
	else 
		if(count($row) == 0){
		
		try 
		{
			$insertQuery = "INSERT INTO tai_khoan (TK_ID, TK_USER, TK_TEN_HIEN_THI, TK_PASS, TK_TRANG_THAI, TK_QUYEN_HAN, TK_DIA_DIEM, TK_GIA_TRUNG_BINH, TK_SO_DU) VALUES ('NULL', '$userName', '$displayName', '$password', '$status ', '$clientType', '$location ', '$regularPrice', '$amount')";
			$result1 = $connect->query($insertQuery);
			echo"1";
		} 
		catch(Exception $e) {
			echo"0";
		}
		
	}     
}
?>