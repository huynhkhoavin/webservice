<?php
$connect = mysqli_connect("localhost","root","","karaoke_booking");

	$sql = "UPDATE tai_khoan SET TK_TRANG_THAI = 1 WHERE TK_USER = 'khoavin@gmail.com'";
	$result = $connect->query($sql);
	//$row = mysqli_fetch_array($result,MYSQLI_NUM);
//	if(count($row[1])>=1)
//		echo $row[5];
