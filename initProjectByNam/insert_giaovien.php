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

for ($i=2000; $i <= 2050; $i++) { 
	// tách
	$name_gender = explode(',', $nameData[$i]);
	$name = ucwords(trim($name_gender[0]));
	$date = rand(1970, 1990).'-'.rand(1, 12).'-'.rand(1, 28);
	$gender = trim($name_gender[1]) == "f"? 1:0;

	$address = $listaddress[array_rand($listaddress)];


	$sql = 'INSERT INTO `giaovien`(`tenGV`, `ngaySinh`, `gioiTinh`, `diaChi`) VALUES ("'.$name.'","'.$date.'",'.$gender.',"'.$address.'")';
	echo $sql."\n";
	$mysqli->query($sql);

}