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

$ds_hs_lop = $mysqli->query('SELECT * FROM `phan_lop_hocsinh`');
$dsmon = $mysqli->query('SELECT * FROM `monhoc`')->fetch_all(MYSQLI_ASSOC);

echo 1;
while ($hs_lop = $ds_hs_lop->fetch_array(MYSQLI_ASSOC)) {
    foreach ($dsmon as $mon) {
        $diemtx = rand(4, 10);
        $diem15p = rand(4, 10);
        $diem1t = rand(4, 10);
        $diemhk = rand(4, 10);

        $diemtb = round((($diemtx+$diem15p)/2 + $diem1t*2 + $diemhk * 3)/6, 2);
        $sql = 'INSERT INTO `diem`(`hocsinh_phanlopID`, `maMH`, `diemtx`, `diem15p`, `diem1t`, `diemhk`, `DTBmhk`) VALUES ('.$hs_lop['id'].','.$mon['maMH'].','.$diemtx.','.$diem15p.','.$diem1t.','.$diemhk.','.$diemtb.' )';
        $mysqli->query($sql);

    }
}

echo 'End';