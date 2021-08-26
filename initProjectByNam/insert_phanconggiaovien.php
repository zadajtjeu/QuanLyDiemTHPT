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


$dslop = $mysqli->query('SELECT * FROM `lop`')->fetch_all(MYSQLI_ASSOC);
$dsmon = $mysqli->query('SELECT * FROM `monhoc`')->fetch_all(MYSQLI_ASSOC);

$magv=1;
//Duyệt theo lớp
foreach ($dslop as $lop) {
	//duyệt môn
	foreach ($dsmon as $mon) {
		$sql = 'INSERT INTO `phanconggiaovien`(`maGV`, `maLop`, `maMH`) VALUES ('.$mon['maMH'].','.$lop['maLop'].','.$mon['maMH'].')';
		print_r($mysqli->query($sql));
	}
}
