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

// Insert năm 2018-2019
// Insert khối 10 năm 2018-2019
$khoi = 10;
$manh = 1; // 2018-2019
$gvcn=1;
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
}



// Insert năm 2019-2020
// Insert khối 10 năm 2019-2020
$khoi = 10;
$manh = 2; // 2019-2020
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
}
// Insert khối 11 năm 2019-2020
$khoi = 11;
$manh = 2; // 2019-2020
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
}



// Insert năm 2020-2021
// Insert khối 10 năm 2020-2021
$khoi = 10;
$manh = 3; // 2020-2021
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
	if ($gvcn >50) {
		$gvcn = 1;
	}
}
// Insert khối 11 năm 2020-2021
$khoi = 11;
$manh = 3; // 2020-2021
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
	if ($gvcn >50) {
		$gvcn = 1;
	}
}
// Insert khối 12 năm 2020-2021
$khoi = 12;
$manh = 3; // 2020-2021
for ($i=1; $i <= 14; $i++) { 
	$tenlop = $khoi.'A'.$i;
	$sql = 'INSERT INTO `lop`(`maKhoiLop`, `tenLop`, `maNH`, `maGV`) VALUES ('.$khoi.',"'.$tenlop.'",'.$manh.','.$gvcn++.')';
	print_r($mysqli->query($sql));
	if ($gvcn >50) {
		$gvcn = 1;
	}
}


