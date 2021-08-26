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
// HK 1
$hk = 1;
$student = 1;
for ($i=1; $i <= 14; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}
// HK 2
$hk = 2;
$student = 1;
for ($i=1; $i <= 14; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}


// Insert năm 2019-2020
// Insert khối 10 năm 2019-2020
// HK 1
$hk = 1;
$student10 = $student;
$student = $student10;
for ($i=15; $i <= 28; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}
// HK 2
$hk = 2;
$student = $student10;
for ($i=15; $i <= 28; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}

// Insert khối 11 năm 2019-2020
// HK 1
$hk = 1;
$student = 1;
for ($i=29; $i <= 42; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}
// HK 2
$hk = 2;
$student = 1;
for ($i=29; $i <= 42; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$student.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $student++;
    }
}


// Insert năm 2020-2021
// Insert khối 10 năm 2020-2021
// HK 1
$hk = 1;
$student20 = $student10;
$studentx = $student20;
for ($i=43; $i <= 56; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}
// HK 2
$hk = 2;
$studentx = $student10;
for ($i=43; $i <= 56; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}

// Insert khối 11 năm 2020-2021
// HK 1
$hk = 1;
$student20 = $student;
$studentx = $student;
for ($i=57; $i <= 70; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}
// HK 2
$hk = 2;
$studentx = $student;
for ($i=57; $i <= 70; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}
// Insert khối 12 năm 2020-2021
// HK 1
$hk = 1;
$studentx = 1;
for ($i=71; $i <= 84; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}
// HK 2
$hk = 2;
$studentx = $student;
for ($i=71; $i <= 84; $i++) { 
    for ($j=1; $j <= 45; $j++) { 
        $sql = 'INSERT INTO `phan_lop_hocsinh`(`maHS`, `maLop`, `maHK`) VALUES ('.$studentx.','.$i.','.$hk.')';
        print_r($mysqli->query($sql));
        $studentx++;
    }
}