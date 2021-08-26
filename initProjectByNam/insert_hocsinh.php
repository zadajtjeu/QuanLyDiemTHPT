<?php 
set_time_limit(5000); // 
$configs = array(
    'hostname' => 'localhost',
    'dbuser' => 'root',
    'dbpass' => '',
    'dbname' => 'vnedu'
);

$mysqli = new mysqli($configs['hostname'], $configs['dbuser'], $configs['dbpass'], $configs['dbname']);

//Kiểm tra kết nối
if ($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	exit();
}
$mysqli->query('SET NAMES `utf8`');
date_default_timezone_set('Asia/Ho_Chi_Minh');



$jsonName  = file_get_contents('uit_member.json');
$nameData = explode("\n", $jsonName);
$namsinh = 2005;
$listaddress = array("Ba Đình",
"Bắc Từ Liêm",
"Cầu Giấy",
"Đống Đa",
"Hà Đông	",
"Hai Bà Trưng",
"Hoàn Kiếm",
"Hoàng Mai",
"Long Biên",
"Nam Từ Liêm",
"Tây Hồ",
"Thanh Xuân",
"Sơn Tây",
"Ba Vì",
"Chương Mỹ",
"Đan Phượng",
"Đông Anh",
"Gia Lâm",
"Hoài Đức",
"Mê Linh",
"Mỹ Đức",
"Phú Xuyên",
"Phúc Thọ",
"Quốc Oai",
"Sóc Sơn",
"Thạch Thất",
"Thanh Oai",
"Thanh Trì",
"Thường Tín",
"Ứng Hòa");

for ($i=1; $i <= 1890; $i++) { 
	// tách
	$name_gender = explode(',', $nameData[$i]);
	$name = ucwords(trim($name_gender[0]));
	$date = $namsinh.'-'.rand(1, 12).'-'.rand(1, 28);
	$gender = trim($name_gender[1]) == "f"? 1:0;

	$address = $listaddress[array_rand($listaddress)];

	$listDienUu = array("1", "2", "3", "4", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL", "NULL");
	$dienuutien = $listDienUu[array_rand($listDienUu)];

	$dantoc = ($dienuutien=="1")? "2":"1";

	$tpgiadinh = rand(1, 8);


	$sql = 'INSERT INTO `hocsinh`(`tenHS`, `ngaySinh`, `gioiTinh`, `noiSinh`, `maDUT`, `maDT`, `maTPGD`) VALUES ("'.$name.'","'.$date.'",'.$gender.',"'.$address.'",'.$dienuutien.','.$dantoc.','.$tpgiadinh.')
	';
	echo $sql."\n";
	$mysqli->query($sql);


	if ($i % 630 == 0) {
		$namsinh ++;
	}
}