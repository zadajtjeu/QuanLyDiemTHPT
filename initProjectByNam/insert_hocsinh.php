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
	$name = my_ucwords(trim($name_gender[0]));
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




function my_ucwords($str)
{
	mb_internal_encoding('UTF-8');
	$string = $str;
	return ucwords_specific( mb_strtolower($string, 'UTF-8'), "-'");
}

function ucwords_specific ($string, $delimiters = '', $encoding = NULL)
{
	if ($encoding === NULL) { $encoding = mb_internal_encoding();}

	if (is_string($delimiters))
	{
		$delimiters = str_split( str_replace(' ', '', $delimiters));
	}

	$delimiters_pattern1 = array();
	$delimiters_replace1 = array();
	$delimiters_pattern2 = array();
	$delimiters_replace2 = array();
	foreach ($delimiters as $delimiter)
	{
		$uniqid = uniqid();
		$delimiters_pattern1[] = '/'. preg_quote($delimiter) .'/';
		$delimiters_replace1[] = $delimiter.$uniqid.' ';
		$delimiters_pattern2[] = '/'. preg_quote($delimiter.$uniqid.' ') .'/';
		$delimiters_replace2[] = $delimiter;
	}

// $return_string = mb_strtolower($string, $encoding);
	$return_string = $string;
	$return_string = preg_replace($delimiters_pattern1, $delimiters_replace1, $return_string);

	$words = explode(' ', $return_string);

	foreach ($words as $index => $word)
	{
		$words[$index] = mb_strtoupper(mb_substr($word, 0, 1, $encoding), $encoding).mb_substr($word, 1, mb_strlen($word, $encoding), $encoding);
	}

	$return_string = implode(' ', $words);

	$return_string = preg_replace($delimiters_pattern2, $delimiters_replace2, $return_string);

	return $return_string;
}