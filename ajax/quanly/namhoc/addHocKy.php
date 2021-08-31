<?php
session_start();
ob_start();
require './../../../template/config.php';

header('Content-Type: application/json');


$response = [];

if((empty($_SESSION['username']) && empty($_SESSION['password']))) {
	$response['error'][] = 'Xin lỗi, Phiên làm việc của bạn đã hết hạn. Vui lòng đăng nhập lại!';
}
else {
	
	if (!empty($_POST['tenHK'])) {
		$tenHK = htmlspecialchars($_POST['tenHK']);

		// Xem phân quyền có cho phép sửa không
		$taikhoan = array();
		$result = $mysqli->query('SELECT * FROM `taikhoan` WHERE `username`=\''.htmlspecialchars($_SESSION['username']).'\' AND `password`=\''.htmlspecialchars($_SESSION['password']).'\';');
		if ($result->num_rows > 0) {
			$taikhoan = $result->fetch_array(MYSQLI_ASSOC);
			if (in_array($taikhoan['role'], array('admin', 'manager'))) {

				if (strlen($tenHK) < 2 || strlen($tenHK) > 50) {
					$response['error'][] = 'Độ dài tên học kỳ từ 2-50 kí tự!';
				}

				if (empty($response['error'])) {
					$searchMa = $mysqli->query('SELECT * FROM `hocky` WHERE `tenHK`=\''.$tenHK.'\';');
					if ($searchMa->num_rows > 0) {
						$response['error'][] = 'Bản ghi đã tồn tại!';
					} else {
						// insert DB
						$insert = $mysqli->query('INSERT INTO `hocky`(`tenHK`) VALUES (\''.$tenHK.'\');');
						
						if ($insert) {
							$response['success'] = 'Thêm thành công.';

							//Gửi email
						} else {
							$response['error'][] = 'Lỗi cập nhập dữ liệu!';
						}
					}
				}
			} else {
				$response['error'][] = 'Bạn không có quyền sửa bản ghi này!';
			}
		}
		else {
			$response['error'][] = 'Xin lỗi, Phiên làm việc của bạn đã hết hạn. Vui lòng đăng nhập lại!';
		}
	} else {

			$response['error'][] = 'Vui lòng nhập đầy đủ thông tin!';
	}
}

echo json_encode($response);